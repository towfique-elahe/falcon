<?php

namespace App\Http\Controllers;

use App\Mail\SendMailtoUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class query_form extends Controller
{
    public function send_mail(Request $request){
        $fname   = $request->fname;
        $lname   = $request->lname;
        $email   = $request->email;
        $phone   = $request->phone;
        $description = $request->description;

        $send_mail = "alichy101@gmail.com";
        Mail::to( $send_mail)->send(new SendMailtoUser($fname, $lname, $email, $phone, $description));

        return redirect("/");
    }
}