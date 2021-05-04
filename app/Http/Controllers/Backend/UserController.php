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
        $users = User::paginate(10);
        return view('admin.users.index')->with(['users' => $users]);
    }
 
// ------------------------------------------------------------------------------------------
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    
    //  to update user
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            // if requested email and user email same, no validation applied
            'email' => ($request->email != $user->email ? 'required|email|unique:users,email,':''),
            // if the password field is blank, no validation applied
            'password' => ($request->password!=''?'min:8|confirmed':''),
            'status' => '',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'max:10',
            'address' => 'max:255',
            'phone' => 'max:15'
        ]);

        //  if validation fails
        // if($validator->fails()){
        //     $errors = ['message' => 'Validation error!',
        //                'errors' => ['name' => $validator->errors()->get('name'),
        //                             'email' => $validator->errors()->get('email'),
        //                             'password' => $validator->errors()->get('password'),
        //                             'gender' => $validator->errors()->get('gender'),
        //                             'address' => $validator->errors()->get('address'),                    
        //                             'phone' => $validator->errors()->get('phone')                    
        //                             ]
        //             ]; 
        //     // dd($errors['errors']['password'] ? 'password': null);
        //     return redirect()->route('users.edit', $user->id)->withInput()->with(['errors' => $errors]);
        // }

        //  insert data ........
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request-> gender;
        $user->address = $request-> address;
        $user->phone = $request->phone;

        // if there is password & not blank then insert password
        if($request->has('password') && !empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        //  if there is image
        if($request->hasFile('image')) {

            // remove image
            $this->removeImage($user);

            $file = $request->file('image');

            $filename = time().'-'.uniqid().'.'.$file->getClientOriginalExtension();

            $file->move(public_path('upload/users'), $filename);

            $user->image = $filename;
        }

        $user->save();

        return redirect()->route('users.index')->with("success_msg", 'Updated successfully');

    }

    public function destroy(User $user)
    {
        // remove image
        $this->removeImage($user);
        $user->delete();
        
        return redirect()->route('users.index')->with("success_msg", 'Deleted successfully');
    }
    
    public function deleteImage(User $user)
    {
        // remove image
        $this->removeImage($user);
        $user->image = null;
        $user->save();
        return redirect()->route('users.edit', $user)->with("success_msg", ' Image Deleted successfully');
    }

    private function removeImage($user)
    {
        if($user->image != "" && \File::exists('upload/users/' . $user->image)) {
            @unlink(public_path('upload/users/' . $user->image));
        }
    }
}