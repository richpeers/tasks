<?php

namespace App\Http\Controllers;

use App\Task;

class ToggleTaskComplete extends Controller
{
    /**
     * ToggleTaskComplete  constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Toggle the task complete status.
     *
     * @param Task $task
     * @return Response
     */
    public function __invoke(Task $task)
    {
        $task->complete = !$task->complete;
        $task->save();
        return redirect()->route('tasks.index');
    }
}
