<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todostore;
use App\Http\Resources\v1\Todoresource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Todoresource::collection(Todo::all());
        // return Todo::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Todostore $request)
    {
        Todo::create($request->validated());
        return response()->json("Saved in Todos table");
    }


    public function show(Todo $todo)
    {
        return new Todoresource($todo) ;
    }

    public function update(Todostore $request, Todo $todo)
    {
        $todo->update($request->validated());

        return response()->json('Updated');

    }


    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json("Data deleted");
    }
}
