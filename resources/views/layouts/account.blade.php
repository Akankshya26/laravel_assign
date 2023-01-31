@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card-form-holder">
                    <div class="card-body">
                        <h1>Account Details</h1>

                        @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif
                        <form action="{{ route('account') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label> Account Name</label>
                                <input type="text" name="bname" class="form-control" placeholder="Account Name" />
                                @if ($errors->has('bname'))
                                    <p class="text-danger">{{ $errors->first('bname') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="type" class="form-control" placeholder="Type " />
                                @if ($errors->has('type'))
                                    <p class="text-danger">{{ $errors->first('type') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Balance</label>
                                <input type="text" name="balance" class="form-control" placeholder="Balance" />
                                @if ($errors->has('balance'))
                                    <p class="text-danger">{{ $errors->first('balance') }}</p>
                                @endif
                            </div>

                            <div class="col-4 text-right">
                                <input type="submit" class="btn btn-primary" value="Submit" />
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="m-4">
        <table class="table table-dark">

            <tr>
                <th>id</th>
                <th>user_id</th>
                <th>Account Name</th>
                <th>type</th>
                <th>Balance</th>
                <th>Action</th>

            </tr>



            @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account['id'] }}</td>
                    <td>{{ $account['user_id'] }}</td>
                    <td>{{ $account['name'] }}</td>
                    <td>{{ $account['type'] }}</td>
                    <td>{{ $account['balance'] }}</td>
                    <td>
                        <a href="{{ url('/accountedit', $account->id) }}" class="btn btn-info btn-sm">EDIT</a>
                        <a href="{{ url('/delete', $account->id) }}" class="btn btn-danger btn-sm">DELETE</a>
                    </td>
                </tr>
            @endforeach
    </div>
@endsection
