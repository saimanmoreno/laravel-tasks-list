@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            <div class="pt-5">

                <!-- Display Validation Errors -->
                @include('common.errors')

                <section class="jumbotron text-center">

                    <div class="container">

                        <h1 class="jumbotron-heading">Task List</h1>

                        <p class="lead text-muted">
                            This quickstart guide provides a basic introduction to the Laravel framework and includes
                            content on database migrations, the Eloquent ORM, routing, validation, views, and Blade
                            templates. This is a great starting point if you are brand new to the Laravel framework or PHP
                            frameworks in general.
                        </p>

                    </div>

                    <hr>

                </section>

            </div>

            <div class="row">
                <div class="py-2 col-md-8 px-md-5">

                    <div class="py-5">

                        <!-- List Tasks -->
                        @if (count($tasks) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Task Name</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Due</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tasks as $task)
                                        <tr>

                                            <th scope="row"> {{ $task->id }} </th>
                                            <td>{{ $task->name }}</td>
                                            <td>{{ $task->created_at }}</td>
                                            <td> Data </td>
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
                            </table>
                        @else
                            <h4>No tasks yet! Create one first...</h4>
                        @endif

                    </div>
                </div>

                <div class="py-5 col-md-4 justify-content-center">

                    <!-- New Task Form -->
                    <form action="/task" method="POST" class="form-horizontal">

                        {{ csrf_field() }}

                        <!-- Task Name -->

                        <div class="form-group border p-md-5">

                            <div class="form-group mb-2">

                                <label for="task" class="sr-only">Task Name</label>

                                <input type="text" name="name" id="task-name" class="form-control"
                                    placeholder="Task name here">

                            </div>

                            <div class="form-group mb-2">

                                <label for="due-date" class="sr-only">Due Date</label>

                                <input type="date" name="due-date" id="due-date" class="form-control"
                                    placeholder="Due Date">

                            </div>

                            <!-- Add Task Button -->
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Add Task
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection
