<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    // subscription
    public function showSubscription(){
        $id = Auth::user()->id;
        $data =Payment::where('user_id', '=', $id)->orderBy('created_at', 'desc')->first();
        return view('user_panel.subscription', compact('data'));
    }

    // connection
    public function showConnection(){
        $id = Auth::user()->id;
        $data =Payment::where('user_id', '=', $id)->orderBy('created_at', 'desc')->first();
        return view('user_panel.connection', compact('data'));
    }
}