@extends('layouts.app')
@section('content')

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Dark Table</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    </head>

    <body>
        <div class="m-4">
            <table class="table table-dark">

                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>Address</th>

                    <th>Action</th>

                </tr>



                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['phone'] }}</td>
                        <td>{{ $user['address'] }}</td>
                        <td>
                            <a href="{{ url('/edit', $user->id) }}" class="btn btn-info btn-sm">EDIT</a>
                            <a href="{{ url('/delete', $user->id) }}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                @endforeach



            </table>
        </div>
    </body>
@endsection
