<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;

class TaskController extends Controller
{
    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the user tasks.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new task.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task in storage.
     *
     * @param StoreTask $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {
        $task = $request->user()->tasks()->create($request->all());
        return redirect()->route('tasks.show', ['task' => $task]);
    }

    /**
     * Display the specified task.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified task in storage.
     *
     * @param  StoreTask $request
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTask $request, Task $task)
    {
        $task->update($request->all());
        return redirect()->route('tasks.show');
    }

    /**
     * Remove the specified task from storage.
     *
     * @param  \App\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
