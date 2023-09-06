<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Termwind\render;

class CheckoutController extends Controller
{
    // route
    public function checkout()
    {
		 return view('user_panel.checkout');
    }

    // store payments
    public function afterPayment(Request $request)
    {
        $sub_status = $request->get('sub_status');
        $name = $request->get('name');
        $price= $request->get('price');
        $method =$request->get('method');
        $plan =$request->get('plan');
        $tprice =$request->get('tprice');
        $user_id =$request->get('user_id');
        $email =$request->get('email');
        $billing_add =$request->get('billing_add');
        $b_number =$request->get('b_number');
        $b_trans =$request->get('b_trans');
        $billing_phone =$request->get('billing_phone');
        $sub_end = Carbon::now()->addMonths(1);
        if(Carbon::now()==$sub_end){
            $due_status = 1;
        } else{
            $due_status = 0;
        }

        $prod = new Payment();
        $prod -> sub_status=$sub_status;
        $prod -> name=$name;
        // $prod -> due_status=$due_status;
        $prod -> price=$price;
        $prod -> method=$method;
        $prod -> plan=$plan;
        $prod -> tprice=$tprice;
        $prod -> user_id=$user_id;
        $prod -> email=$email;
        $prod -> billing_add=$billing_add;
        $prod -> b_number=$b_number;
        $prod -> b_trans=$b_trans;
        $prod -> billing_phone=$billing_phone;
        $prod -> sub_end=$sub_end;
        $prod -> due_status=$due_status;

        $prod -> save();

        return redirect('/payment-success');
    }

    // transactions
    public function showPayment(){
        $id = Auth::user()->id;
        $payments = Payment::all()->where('user_id', '==', $id);
        $data = Payment::where('user_id', '=', $id)->first();
        return view('user_panel.transactions',compact('payments','data'));
    }
    // admin payments
    public function adminPayments(){
        $payments = Payment::all();
        $count = Payment::count();
        return view('admin.payments',compact('payments','count'));
    }
    // admin payment details
    public function adminPayment($id){
        $data = Payment::find($id);
        return view('admin.payment',compact('data'));
    }

    //show single transaction
    public function showTransaction($id)
    {
        $transaction = Payment::find($id);
        return view('user_panel.invoice', compact('transaction'));
    }

    // show dues
    public function showDues(){
        $data = Payment::where('due_status', '=', 1)->first();
        return view('user_panel.dues',compact('data'));
    }

    // payment approve
    public function approvePay($id){
        $pay = Payment::find($id);
        $pay->status = 1;
        $pay->save();
        return redirect()->route('adminPayment',$pay->id);
    }
}
