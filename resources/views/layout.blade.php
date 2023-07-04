<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <main class="main">
        <div class="container pt-3">
            <div class="d-flex pt-5">
                <div class="col-md-2 --height-500 menu">
                    <div class="menu-wrapper mx-4 my-5">
                        <a href="/"
                            class="menu-buttons d-block p-1 ps-3 rounded  all-hover
                        {{ request()->is('/') ? 'bg-dark text-light' : '' }}">
                            <i class="fa-regular fa-star me-1"></i>
                            All</a>
                        <a href="/inprogress"
                            class="menu-buttons d-block p-1 ps-3 rounded inprogress-hover
                        {{ request()->is('inprogress') ? 'task-inprogress' : '' }}
                        ">
                            <i class="fa-solid fa-clock me-1"></i>
                            In Progress
                        </a>
                        <a href="/finished"
                            class="menu-buttons d-block p-1 ps-3 rounded finished-hover
                        {{ request()->is('finished') ? 'task-finished' : '' }}
                        ">
                            <i class="fa-solid fa-check me-1"></i>
                            Finisned
                        </a>
                    </div>
                </div>
                @yield('main')
                <div class="col-md-3 bg-light --height-500 rightside-bar">


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Add a new task</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="/add" method="post">
                                        @csrf
                                        <input type="text" name="body" id="addInput" class="form-control"
                                            placeholder="new task">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        data-bs-dismiss="modal">Dismiss</button>
                                    <button type="submit" class="btn btn-sm task-finished finished-hover">Save
                                        changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
