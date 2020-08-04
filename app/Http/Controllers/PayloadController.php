<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rule;

class PayloadController extends Controller
{
    public function analyse(Request $request)
    {
      $rules = Rule::all();
      $payload = $request->all();
      foreach ($payload as $key => $data) {
        foreach ($rules as $key => $rule) {
          checkRule($data, $rule);
        }
      }
      return;
    }

    public function checkRule($data, $rule)
    {
      if( $rule->receieve_all === true && $rule->recieve_sales === false && !$rule->campaign){
        //route data to appropriate microservice based on $rule->microservice
        return;
      }else if( $rule->receieve_all === true && $rule->recieve_sales === true && !$rule->campaign){
        if($data->query_type->title === 'SALE MADE'){
          //route data to appropriate microservice based on $rule->microservice
          return;
        }else{
          //data does not pass rules set and wont be sent to associated $rule->microservice
          return;
        }
      }else if( $rule->receieve_all === true && $rule->recieve_sales === false && $rule->campaign){
        if($data->campaign->name != $rule->campaign){
          //route data to appropriate microservice based on $rule->microservice

          return;
        }else{
         //data does not pass rules set and wont be sent to associated $rule->microservice
          return;
        }
      }else if( $rule->receieve_all === true && $rule->recieve_sales === true && $rule->campaign){
        if($data->campaign->name != $rule->campaign && $data->query_type->title === 'SALE MADE'){
          //route data to appropriate microservice based on $rule->microservice
          return;
        }else{
          //data does not pass rules set and wont be sent to associated $rule->microservice
          return;
        }
      }else if( $rule->receieve_all === false && $rule->recieve_sales === false && !$rule->campaign){
        //data does not pass rules set and wont be sent to associated $rule->microservice
      }else if( $rule->receieve_all === false && $rule->recieve_sales === true && !$rule->campaign){
        if($data->query_type->title === 'SALE MADE'){
          //route data to appropriate microservice based on $rule->microservice
          return;
        }else{
          //data does not pass rules set and wont be sent to associated $rule->microservice
          return;
        }
      }else if( $rule->receieve_all === false && $rule->recieve_sales === false && $rule->campaign){
        if($data->campaign->name != $rule->campaign){
          //route data to appropriate microservice based on $rule->microservice

          return;
        }else{
         //data does not pass rules set and wont be sent to associated $rule->microservice
          return;
        }
      }
    }
}
