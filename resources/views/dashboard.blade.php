<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="container py-5">
        <h4>Your Account: {{ auth()->user()->description }}</h4>
        <a href="javascript:;" class="btn btn-danger" style="width: 100px" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form method="POST" id="logout-form" action="{{ route('logout.store') }}">
            @csrf
        </form>
        <div class="row mt-5 justify-content-center">
            <table class="table mb-5">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Access Level</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->description }}</td>
                            <td>{{ $user->role->access_level }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-8 text-center">
                <h2>Sudoku</h2>
                <h3 id="errors">0</h3>

                <!-- Board -->
                <div id="board"></div>
                <br>
                <div id="digits"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('script.js') }}"></script>
</body>
</html>
