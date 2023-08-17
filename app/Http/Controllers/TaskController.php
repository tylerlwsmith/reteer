<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => Task::all(),
            'count' => Task::where('volunteer', '=', null)->count(),
        ]);
    }

    public function show(Request $request, Task $task)
    { // this is literally a guess
        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    public function edit(Request $request, Task $task)
    {
        // $userId = Auth::user()->id;
        // $taskId = $task->id;
        return view('tasks.update');
    }

    public function update(Request $request, Task $task)
    {
        return 'hello world';
    }

    public function create(Request $request)
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        Task::create(request()->only([
            'name',
            'task_description',
            'start_time',
            'start_date',
            'client_address',
            'destination',
            'volunteer',
            'contact_information',
        ]));

        return redirect('tasks');
    }
}
