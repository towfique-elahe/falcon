<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\sslQueue;
use App\Models\User;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    //
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

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function planInput(Request $request)
    {
       $name = $request->name;
       $price = $request->price;
       $plan1 = Plan::where('id',1)->first();
       $plan2 = Plan::where('id',2)->first();
       $plan3 = Plan::where('id',3)->first();
       return view('user_panel.plans',compact('name','price','plan1','plan2','plan3'));
    }


    public function urlInput($name=null,$price=null)
    {
        $price = request('price');
        $prod = new sslQueue();
        $prod -> price=$price;
        $prod -> save();
        return view('user_panel.checkout',compact('name','price'));
    }

    // user list
    public function adminUsers(){
        $users = User::all()->where('role','=',0);
        $count = User::where('role','=',0)->count();
        return view('admin.users', compact('users','count'));
    }

}