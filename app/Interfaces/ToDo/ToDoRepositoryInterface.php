<?php

namespace App\Interfaces\ToDo;
use App\Interfaces\BaseEloquentRepositoryInterface;

interface ToDoRepositoryInterface  extends BaseEloquentRepositoryInterface
{
  public function findTodo();
}
