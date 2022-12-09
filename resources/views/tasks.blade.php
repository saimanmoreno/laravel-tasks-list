@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <!-- Create Task Form -->
    <div class="panel-body">

        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">

            {{ csrf_field() }}

            <!-- Task Name -->

            <div class="form-group">
                <label for="task">Task</label>
                <input type="text" name="name" id="task-name" class="form-control" placeholder="Task name here">
            </div>

            <!-- Add Task Button -->
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Task
            </button>
        </form>
        

    </div>

    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <div class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <!-- Delete Button -->
                                <td>
                                    <form action="/task/{{ $task->id }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <!-- We can spoof a DELETE request -->

                                        <button>Delete Task</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </div>
            </div>
        </div>
    @endif
@endsection
