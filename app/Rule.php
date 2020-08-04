<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'microservice',
      'receieve_all',
      'receieve_campaign',
      'receieve_sales',
      'min_call_length',
      'min_call_length',
  ];
}
