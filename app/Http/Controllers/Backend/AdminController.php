<?php
namespace App\Http\Controllers\Backend;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::paginate(10);
        return view('admin.admins.admin-index')->with(['admins' => $admins]);
    }

    // return create view
    public function create()
    {
        return view('admin.admins.admin-create');
    }

    // wil be used for admin registration
    public function store(Request $request, Admin $admin)
    {
        $this->validate($request, [
        'name' => 'required|max:100',
        'email' => 'required|email|unique:admins',
        'password' => 'required|min:8|confirmed',
        'role' => 'max: 20',
        'status' => '',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'gender' => 'required|max:10',
        'address' => 'max:255',
        ]);

        $admin = new Admin();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->role = $request-> role;
        $admin->gender = $request-> gender;
        $admin->address = $request-> address;

        // if there is file in image field
        if($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time().'-'.uniqid().'.'.$file->getClientOriginalExtension();

            $file->move(public_path('upload/admins'), $filename);

            // save filename to database
            $admin->image = $filename;
        }

        $admin->save();

        return redirect()->route('admin.index')->with(['success_msg' => 'Created successfully']);
    }

    // ------------------------------------------------------------------------------------------
    public function edit(Admin $admin)
    {
        return view('admin.admins.admin-edit', compact('admin'));
    }

    //  to update admin
    public function update(Request $request, Admin $admin)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            // if requested email and admin email same, no validation applied
            'email' => ($request->email != $admin->email ? 'required|email|unique:admins,email,':''),
            // if the password field is blank, no validation applied
            'password' => ($request->password!=''?'min:8|confirmed':''),
            'role' => 'max: 20',
            'status' => '',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|max:10',
            'address' => 'max:100'
        ]);

        //  if validation fails
        // if($validator->fails()){
        //     $erorrs = ['message' => 'Validation error!!!',
        //                'errors' => ['name' => $validator->errors()->get('name'),
        //                             'email' => $validator->errors()->get('email'),
        //                             'password' => $validator->errors()->get('password'),
        //                             'role' => $validator->errors()->get('role'),
        //                             'gender' => $validator->errors()->get('gender'),
        //                             'address' => $validator->errors()->get('address')
        //                             ]
        //             ];
        //     return redirect()->route('admin.edit', $admin->id)->withInput()->with(['errors' => $erorrs]);
        // }

        //  insert data ........
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request-> role;
        $admin->gender = $request-> gender;
        $admin->address = $request-> address;

        // if there is password & not blank then insert password
        if($request->has('password') && !empty($request->password)) {
            $admin->password = bcrypt($request->password);
        }

        //  if there is image
        if($request->hasFile('image')) {
            // remove image
            $this->removeImage($admin);
            $file = $request->file('image');
            $filename = time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/admins'), $filename);
            $admin->image = $filename;
        }

        $admin->save();

        return redirect()->route('admin.index')->with(['success_msg' => 'Updated successfully']);
    }

    public function showProfile()
    {   $admin = Admin::find(Auth::id());
        return view('admin.admins.admin-profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        // to update admin
        $admin = Admin::find(Auth::id());

        $this->validate($request, [
            'name' => 'required|max:100',
            // if requested email and admin email same, no validation applied
            'email' => ($request->email != $admin->email ? 'required|email|unique:admins,email,':''),
            // if the password field is blank, no validation applied
            'password' => ($request->password!=''?'min:8|confirmed':''),
            'role' => 'max: 20',
            'status' => '',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required|max:10',
            'address' => 'max:100'
        ]);

        //  insert data ........
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request-> role;
        $admin->gender = $request-> gender;
        $admin->address = $request-> address;

        // if there is password & not blank then insert password
        if($request->has('password') && !empty($request->password)) {
            $admin->password = bcrypt($request->password);
        }

        //  if there is image
        if($request->hasFile('image')) {
            // remove image
            $this->removeImage($admin);
            $file = $request->file('image');
            $filename = time().'-'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/admins'), $filename);
            $admin->image = $filename;
        }

        $admin->save();

        session()->flash('success_msg' , 'Updated successfully');
        return back();
    }


    public function destroy(Admin $admin)
    {
        // remove image
        $this->removeImage($admin);
        $admin->delete();

        return redirect()->route('admin.index')->with("success_msg", 'Deleted successfully!');
    }

    public function deleteImage(Admin $admin)
    {
        // remove image
        $this->removeImage($admin);
        $admin->image = null;
        $admin->save();
        return redirect()->back()->with("success_msg", ' Image Deleted successfully!');
    }

    private function removeImage($admin)
    {
        if($admin->image != "" && \File::exists('upload/admins/' . $admin->image)) {
            @unlink(public_path('upload/admins/' . $admin->image));
        }
    }
}
