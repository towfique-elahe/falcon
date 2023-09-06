<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
        // Admin Password
        public function UpdatePassword(Request $request)
        {
            $request->validate([
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'confirmpassword' => 'required|same:newpassword',
            ]);


            $hashedPassword = Auth::user()->password;
            #Match The Old Password
            if (Hash::check($request->oldpassword,$hashedPassword))

            {
                $users = User::find(Auth::id());
                $users ->password = bcrypt($request->newpassword);
                $users ->save();
                Session()->flash('message','Password updated Succesfully');
                return redirect()->back();
            }
            else
            {
                Session()->flash('message',"Password didn't match.");
                return redirect()->back();
            }


        }
        // Admin Profile
        public function profile(Request $request){
            return view('admin.profile',[
                'user' => $request->user(),
            ]);
        }
        public function update(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data ->name = $request->name;
        $data -> email = $request ->email;
        $data ->phone = $request ->phone;

        if ($request->file('image')) //profile_image is db image field name
        {
            $file = $request->file('image'); //here profile image is database image field name
            $filename = date('ymdHi') . $file->getClientOriginalName(); // renaming the image. video image update part 4
            $file->move(public_path('upload/admin_images'), $filename); // saving the image in public folder. under public/upload/admin_image folder.
            $data['image'] = $filename;
        }
        $data->save();

        return view('admin.profile')->with('status', 'profile-updated');
    }

    // admin panel - subscriptions list
    public function subscript(){
        $data = Payment::where('sub_status', '=', 1)->get();
        return view('admin.subscriptions',compact('data'));
    }
    public function subDetails($id){
        $sub = Payment::find($id);
        return view('admin.subscription',compact('sub'));
    }

    public function dues(){
        $data = Payment::where('due_status', '=', 1)->get();
        $count = Payment::where('due_status', 1)->count();
        return view('admin.dues',compact('data','count'));
    }

    public function due($id){
        $due = Payment::find($id);
        $user_id = $due->user_id;
        $user = User::find($user_id);
        return view('admin.due',compact('due','user'));
    }


    // super admin - admin list
    public function adminList(){
        $admins = User::all()->where('role', '1');
        $count = User::where('role', '1')->count();
        return view('super_admin.admins',compact('admins','count'));
    }

    // super admin - admin details
    public function adminDetails($id){
        $admin = User::find($id);
        return view('super_admin.admin',compact('admin'));
    }

    // super admin - users list
    public function userList(){
        $users = User::all()->where('role', '0');
        $count = User::where('role', '0')->count();
        return view('super_admin.users',compact('users','count'));
    }

    // super admin - user details
    public function userDetails($id){
        $user = User::find($id);
        return view('super_admin.user',compact('user'));
    }

    // super admin - make user
    public function makeUser($id){
        User::where('id', $id)
        ->update([
            'role' => '0',
        ]);
        return redirect('/super-admin/admins');
    }

    // super admin - make user
    public function makeAdmin($id){
        User::where('id', $id)
        ->update([
            'role' => '1',
        ]);
        return redirect('/super-admin/users');
    }

    // super admin - edit user
    public function editUser($id){
        $user = User::find($id);
        return view('super_admin.user_edit', compact('user'));
    }

    // super admin - update user
    public function updateUser(Request $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('superUser',$id);
    }

    // super admin - delete user
    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('superUsers');
    }

    // super admin - edit admin
    public function editAdmin($id){
        $admin = User::find($id);
        return view('super_admin.admin_edit', compact('admin'));
    }

    // super admin - update admin
    public function updateAdmin(Request $request, $id){
        $admin = User::find($id);
        $admin->update($request->all());
        return redirect()->route('superAdmin',$id);
    }

    // super admin - delete admin
    public function deleteAdmin($id){
        $admin = User::find($id);
        $admin->delete();
        return redirect()->route('superAdmins');
    }

    // admin - view user
    public function adminUserDetails($id){
        $user = User::find($id);
        return view('admin.user', compact('user'));
    }
}