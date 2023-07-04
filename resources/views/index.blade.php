@extends('layout')

@section('main')
    <div class="col-md-7 bg-light --height-500 border tasks">
        <div class="m-3">

            <div class="d-flex">

                <!-- Button trigger modal -->
                <div class="col-md-6">
                    <h4 class="mt-5 mb-2">{{ $title }}</h4>
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <button id="addTaskBtn" type="button" class="btn btn-sm btn-dark ms-auto me-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter">
                        Add Task
                    </button>
                </div>
            </div>
            @error('body')
                <small class="text-danger">task requited</small>
            @enderror
            <hr class="text-secondary">
            <div class="tasks-wrapper">
                <ul class="ps-1">
                    @foreach ($tasks->reverse() as $task)
                        @if ($task->finished == 1)
                            <li
                                class="py-3 ps-2 me-2 h6 d-flex align-items-start task-finished rounded text-decoration-line-through">
                                <form action="/finished-toggle/{{ $task->id }}" method="post">
                                    @csrf
                                    <input type="checkbox" name="finish" class="me-2 text-primary check-box"
                                        onChange="this.form.submit()" checked>
                                </form>
                                <span class="fw-bold">{{ $task->body }}</span>
                                <form action="/delete/{{ $task->id }}" method="post" class="ms-auto">
                                    @csrf
                                    <button class="btn btn-sm btn-dark ms-auto me-2">Delete</button>
                                </form>
                            </li>
                        @endif
                        @if ($task->finished == 0 and $task->status == 0)
                            <li class="py-3 ps-2 me-2 h6 d-flex align-items-start rounded">
                                <form action="/finished-toggle/{{ $task->id }}" method="post">
                                    @csrf
                                    <input type="checkbox" name="finish" class="me-2 text-primary check-box"
                                        onChange="this.form.submit()">
                                </form>
                                <span class="fw-bold">{{ $task->body }}</span>
                                <form action="/status-update/{{ $task->id }}" method="post" class="ms-auto">
                                    @csrf
                                    <button class="btn btn-sm btn-dark ms-auto me-2">Do it now</button>
                                </form>
                            </li>
                        @endif
                        {{-- in progress --}}
                        @if ($task->status == 1)
                            <li class="py-3 ps-2 me-2 h6 d-flex align-items-start rounded task-inprogress">
                                <form action="/finished-toggle/{{ $task->id }}" method="post">
                                    @csrf
                                    <input type="checkbox" name="finish" class="me-2 text-primary check-box"
                                        onChange="this.form.submit()">
                                </form>
                                <span class="fw-bold">{{ $task->body }}</span>
                                <form action="/status-update/{{ $task->id }}" method="post" class="ms-auto">
                                    @csrf
                                    <button class="btn btn-sm btn-dark ms-auto me-2">Undo</button>
                                </form>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
