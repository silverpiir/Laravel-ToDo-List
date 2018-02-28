@extends('layouts.app')

@section('content')

    <div class="panel-body" style="margin:0 auto; width:60%">

        @include('common.errors')

        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task:</label>

                <div class="col-sm-6">
                    <textarea name="name" id="task-name" class="form-control" rows="4" cols="50"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default"  style="margin:0 0 5% 0">
            <div class="panel-heading" style="margin:0 auto; width:60%">
                <h2 style="margin:0 0 0 13px">Current Tasks</h2>
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table" style="margin:0 auto; width:60%">

                    <thead>
                        <th>Task</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>
                                    <form action="{{ url('task/'.$task->id) }}" method="POST">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}

                                        <button class="btn btn-primary">Delete Task</button>
                                    </form>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection