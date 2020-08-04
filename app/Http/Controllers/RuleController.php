<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rule;


class RuleController extends Controller
{
    public function getRules()
    {
      $rules = return Rule::all();//get all rules from Rule table

      return view('rules/index', [
          'rules' =>$rules,
        ]);
    }
    public function getEdit($microservice)
    {
      $rule = Rule::where('microservice', $data->microservice)
                  ->get();//Get row from Rules table where microservice is equal to the one requested
      return view('rules/edit', [
          'rule' =>$rule,
        ]);
    }
    public function setRule(Request $request)
    {
      $data = $request->all();//Get all rule changes

      $rule = Rule::where('microservice', $data->microservice)
                  ->get();//Get row where 'microservice coloumn is equal to microservice being changed
      //Update row
      $rule->receieve_all = $data->receieve_all;
      $rule->campaign = $data->campaign;
      $rule->receieve_sales = $rule->receieve_sales;
      $rule->save();
      $rules = return Rule::all();//get all rules
      //return index veiw of all microserveice rules
      return view('rules/index', [
          'rules' =>$rules,
        ]);
    }

}
