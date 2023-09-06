<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // dashboard status
    public function showDash(){
        $id = Auth::user()->id;
        $payments = Payment::all()->where('user_id', '==', $id)->sortByDesc('created_at')->take(3);
        $data =Payment::where('user_id', '=', $id);
        $conn =Payment::where('user_id', '=', $id)->orderBy('created_at', 'desc')->first();
        $due = Payment::where('due_status', '=', 1)->first();
        return view('user_panel.dashboard',compact('payments','data','conn','due'));
    }
    // super admin dashboard status
    public function superDash(){
        $users =User::where('role','0')->count();
        $admins =User::where('role','1')->count();
        return view('super_admin.dashboard',compact('users', 'admins'));
    }
    // admin dashboard status
    public function adminDash(){
        $users =User::where('role','0')->count();
        $subs = Payment::where('sub_status', '=', 1)->count();
        $dues = Payment::where('due_status', '=', 1)->count();
        $pending = Payment::where('status', '=', 0)->count();
        $complains = Complain::count();
        return view('admin.dashboard',compact('users','subs','dues','pending','complains'));
    }
}