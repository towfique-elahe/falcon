<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function viewPlans(){
        $plan1 = Plan::where('id',1)->first();
        $plan2 = Plan::where('id',2)->first();
        $plan3 = Plan::where('id',3)->first();
        return view('super_admin.settings', compact('plan1','plan2','plan3'));
    }

    public function updatePlans(Request $request)
    {
        $plan1 = Plan::where('id',1)->first();
        $plan2 = Plan::where('id',2)->first();
        $plan3 = Plan::where('id',3)->first();
        $plan1->name = $request->name1;
        $plan2->name = $request->name2;
        $plan3->name = $request->name3;
        $plan1->price = $request->price1;
        $plan2->price = $request->price2;
        $plan3->price = $request->price3;

        $plan1->save();
        $plan2->save();
        $plan3->save();

        return redirect()->route('superSettings');
    }

    public function homePlans(){
        $plan1 = Plan::where('id',1)->first();
        $plan2 = Plan::where('id',2)->first();
        $plan3 = Plan::where('id',3)->first();
        return view('home', compact('plan1','plan2','plan3'));
    }
}