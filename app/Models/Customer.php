<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $table = 'customers';
    protected $fillable = [
      'name',
      'tel_num',
      'model',
      'todo',
      'comment',
      'added_at',
      'finished_at',
      'price',
      'cost',
      'paid',
      'ready'
    ];
}