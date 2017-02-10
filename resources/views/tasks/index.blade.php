@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Tasks</h1>
                    </div>

                    <ul class="list-group">
                        @foreach($tasks as $task)
                            <li class="list-group-item">

                                <a href="{{ route('tasks.show', ['task' => $task]) }}"
                                   class="btn btn-link pull-left {{ $task->complete ? 'strike' : ''
                                   }}">{{$task->title}}</a>

                                <div class="dropdown pull-right">
                                    <button type="button" class="btn btn-default dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        Actions <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('complete', ['task'=>$task]) }}">Mark {{
                                        $task->complete ? 'in' : ''
                                   }}complete</a></li>
                                        <li>
                                            <a href="{{ route('tasks.destroy', ['task'=>$task]) }}" onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();">Delete</a>
                                            <form id="delete-form" method="POST"
                                                  action="{{ route('tasks.destroy', ['task'=>$task]) }}"
                                                  style="display: none;">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                                <div class="clearfix"></div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="panel-footer">
                        <a class="btn btn-default" href="{{ route('tasks.create') }}">New Task</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
