<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'phone_book';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'phone_number',
  ];

  protected $appends = [
    
  ];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
