<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    /** @use HasFactory<\Database\Factories\ToDoFactory> */
  //  use HasFactory;

  protected $table = 'to_dos';
  protected $fillable = [
    'title',
    'description',
    'status'
  ];
  protected $primaryKey = 'id';
}
