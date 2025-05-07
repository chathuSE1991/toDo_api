<?php

namespace App\Repositories\ToDo;

use App\Interfaces\ToDo\ToDoRepositoryInterface;
use App\Models\ToDo;

use App\Repositories\BaseEloquentRepository;

/**
 * Class MemberRepository.
 */
class ToDoRepository extends BaseEloquentRepository implements ToDoRepositoryInterface
{

    protected $model = ToDo::class;


    public function __construct(ToDo $model)
    {
        $this->model = $model;
    }

    public function findTodo(){
        return $this->model::orderBy('created_at', 'desc')->take(5)->get();

    }
}
