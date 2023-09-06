<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;

use function Termwind\render;

class ComplainController extends Controller
{

    // route
    public function complain(){
        return view('user_panel.complain');
    }

    // store
    public function storeComplain(Request $request)
    {
        $user_id = $request->get('user_id');
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $description = $request->get('description');

        $prod = new Complain();
        // $prod -> status=$status;
        $prod -> user_id=$user_id;
        $prod -> name=$name;
        $prod -> email=$email;
        $prod -> phone=$phone;
        $prod -> description=$description;

        $prod -> save();

        // Redirect the user to a different page or route
        return redirect('/complain');
    }

    // complain list
    public function listComplain(){
        $complains =Complain::all();
        $count = Complain::count();
        return view('admin.complains',compact('complains', 'count'));
    }

    // show complain
    public function showComplain($id){
        $complain =Complain::find($id);
        return view('admin.complain',compact('complain'));
    }

    // delete complain
    public function destroyComplain($id){
        $complain =Complain::find($id);
        $complain->delete();
        return redirect()->route('adminComplains');
    }
}