@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $task->title }}</h3>
                    </div>

                    <div class="panel-body">
                        <p><strong>Description:</strong></p>
                        <p>{{ $task->description }}</p>
                        <p><strong>Due Date:</strong> {{ $task->due_date }}</p>
                        <P><strong>Complete:</strong> {{ $task->complete ? 'Yes' : 'No' }}</P>


                    </div>
                    <div class="panel-footer text-right">
                        <a class="btn btn-default"
                           href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>
                        &nbsp;
                        <a class="btn btn-default"
                           href="{{ route('tasks.index') }}">Close</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
