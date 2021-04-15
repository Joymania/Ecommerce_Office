<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        // //  if not admin show error
        // if(!auth()->user()->role == "admin"){
        //     return view('user.error')->with(['error_msg' => ""]);
        // }

        // if admin show users
        $users = User::paginate(10);
        return view('admin.users.index')->with(['users' => $users]);
    }

    // return create view
    public function create()
    {
        return view('admin.users.create');
    }

    // wil be used for user registration
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
        'name' => 'required|max:100',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
        ]);

        if($validator->fails()){
           
            $erorr = [ 'message' => 'Validation error!',
                        'errors' => ['name' => $validator->errors()->get('name'),
                                    'email' => $validator->errors()->get('email'),
                                    'password' => $validator->errors()->get('password')]];
            
            return view('admin.users.create')->with(['error' => $erorr]);
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        // $user->role = $request-> role;

        // if there is file in image field
        if($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time().'-'.uniqid().'.'.$file->getClientOriginalExtension();

            $file->move(public_path('public/uploads'), $filename);

            // save filename to database
            $user->image = $filename;
        }

        $user->save();

        return view('admin.users.create')->with(['success_msg' => 'Created successfully']);
    }
// ------------------------------------------------------------------------------------------
    public function edit()
    {
        return view('admin.users.edit');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit')->with(['user' => $user]);
    }
    
    //  to edit user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',

            // if requested email and user email same, no validation applied
            'email' => ($request->email != $user->email ? 'required|email|unique:users,email,':''),
            // if the password field is blank, no validation applied
            'password' => ($request->password!=''?'min:6':''),
            // 'role' => 'required|max: 20'
        ]);

        //  if validation fails
        if($validator->fails()){
           
            $erorr = [ 'message' => 'Validation error!',
                        'errors' => ['name' => $validator->errors()->get('name'),
                                    'email' => $validator->errors()->get('email'),
                                    'password' => $validator->errors()->get('password')]];
            
            return view('admin.users.edit')->with(['error' => $erorr]);
        }

        //  insert data ........
        $user->name = $request->name;
        $user->email = $request->email;
        // if there is password & not blank then insert password
        if($request->has('password') && !empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        // if request has role then update role
        if($request->has('role') && !empty($request->role)) {
            $user->role = $request->password;
        }

        //  if there is image
        if($request->hasFile('image')) {

            // remove image
            $this->removeImage($user);

            $file = $request->file('image');

            $filename = time().'-'.uniqid().'.'.$file->getClientOriginalExtension();

            $file->move(public_path('public/uploads'), $filename);

            $user->image = $filename;
        }

        $user->save();

        return view('admin.users.edit')->with(['success_msg' => 'Updated successfully']);

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // remove image
        $this->removeImage($user);
        $user->delete();
        
        return redirect()->route('users.index')->with("success", 'Deleted successfully');
    }
    
    private function removeImage($user)
    {
        if($user->image != "" && \File::exists('public/uploads/' . $user->image)) {
            @unlink(public_path('public/uploads/' . $user->image));
        }
    }
}