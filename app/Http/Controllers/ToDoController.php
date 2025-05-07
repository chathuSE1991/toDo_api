<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use App\Http\Requests\StoreToDoRequest;
use App\Http\Requests\UpdateToDoRequest;
use App\Http\Traits\ResponseTrait;
use App\Interfaces\ToDo\ToDoRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
class ToDoController extends Controller
{

    use ResponseTrait; // Trait for http response
    protected $toDoRepository;

    public function __construct(ToDoRepositoryInterface $toDoRepository)
    {
        $this->toDoRepository = $toDoRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->toDoRepository->findTodo();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToDoRequest $request)
    {
        $request->validated();

        try {
            $saveData = $this->toDoRepository->store([
                'title' => $request->title,
                'description' => $request->description
            ]);

            if ($saveData) {
                return $this->successResponse('Data has been sent successfully', 200);
            } else {
                return $this->errorResponse('System error', Response::HTTP_BAD_REQUEST);
            }
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ToDo $toDo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDo $toDo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToDoRequest $request, ToDo $toDo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDo $toDo)
    {
        //
    }
    public function updateToDoStatus($id){
    try {
        $update = $this->toDoRepository->update($id,['status'=>1]);

        if ($update) {
            return $this->successResponse('Data has been sent successfully', 200);
        } else {
            return $this->errorResponse('System error', Response::HTTP_BAD_REQUEST);
        }

    } catch (\Throwable $th) {
        //throw $th;
    }


    }
}
