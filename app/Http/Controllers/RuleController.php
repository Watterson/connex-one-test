<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rule;


class RuleController extends Controller
{
    public function getRules()
    {
      $rules = return Rule::all();
    }

    public function setRule(Request $request)
    {
      $data = $request->all();//Get all rule changes

      $rule = Rule::where('microservice', $data->microservice)
                  ->get();//Get row where 'microservice coloumn is equal to microservice being changed
      //Update row
      $rule->receieve_all = $data->receieve_all;
      $rule->receieve_campaign = $data->receieve_campaign;
      $rule->receieve_sales = $rule->receieve_sales;
      $rule->min_call_length = (!$rule->min_call_length) ? null : $rule->min_call_length;;
      $rule->max_call_length = (!$rule->max_call_length) ? null : $rule->max_call_length;;
      $rule->save(); 
      //return view with message confirming change
      return;
    }

}
