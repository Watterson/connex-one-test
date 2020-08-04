<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rule;

class PayloadController extends Controller
{
    public function handlePayload(Request $request)
    {
      $rules = Rule::all();
      $payload = $request->all();

    }

    public function checkRule($data, $rule)
    {
      if(!$rule->min_call_length && !$rule->min_call_length){

      }else if(!$rule->min_call_length && $rule->min_call_length){

      }else if($rule->min_call_length && !$rule->min_call_length)
    }
}
