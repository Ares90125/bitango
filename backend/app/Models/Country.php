<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'user_countries';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'country_name',
  ];

  protected $appends = [
    
  ];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
