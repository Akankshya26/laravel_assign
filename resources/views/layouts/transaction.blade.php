@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card-form-holder">
                    <div class="card-body">
                        <h1></h1>

                        @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif
                        <form action="{{ route('transaction') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label> Type </label>
                                <input type="text" name="type" class="form-control" placeholder="Type" />
                                @if ($errors->has('type'))
                                    <p class="text-danger">{{ $errors->first('type') }}</p>
                                @endif
                            </div>
                            <div>
                                {{-- <label>Account Name</label> --}}
                                {{-- <select name="account_name">

                                    @foreach ($accounts as $acc)
                                        <option value="{{ $acc->id }}">{{ $acc->name }}
                                        </option>
                                    @endforeach
                                </select> --}}
                            </div>
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name="amount" class="form-control" placeholder="Amount" />
                                @if ($errors->has('amount'))
                                    <p class="text-danger">{{ $errors->first('amount') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Entry Date</label>
                                <input type="date" name="date" class="form-control" placeholder="Entry Date" />
                                @if ($errors->has('date'))
                                    <p class="text-danger">{{ $errors->first('date') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="catagory">Catagory</label>
                                <select name=catagory id=catagory>
                                    <option value="income">Income</option>
                                    <option value="expense">Expense</option>
                                    <option value="transfer">Transfer</option>

                                    @if ($errors->has('catagory'))
                                        <p class="text-danger">{{ $errors->first('catagory') }}</p>
                                    @endif
                            </div>
                            </select>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="Submit" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="m-4">
        <table class="table table-dark">

            <tr>
                <th>type</th>
                {{-- <th>Account Name</th> --}}
                <th>Amount</th>
                <th>Date</th>
                <th>Catagory</th>
                <th>Action</th>

            </tr>



            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction['type'] }}</td>
                    <td>{{ $transaction['amount'] }}</td>
                    <td>{{ $transaction['date'] }}</td>
                    <td>
                        {{ $transaction->catagory }}
                    </td>
                    <td>
                        <a href="{{ url('/edit-transaction', $transaction->id) }}" class="btn btn-info btn-sm">EDIT</a>
                        <a href="{{ url('/delete-transaction', $transaction->id) }}"
                            class="btn btn-danger btn-sm">DELETE</a>
                    </td>
                </tr>
            @endforeach
    </div>
@endsection
