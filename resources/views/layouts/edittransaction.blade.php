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
                        <form action="" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label> Type </label>
                                <input type="text" name="type" class="form-control" placeholder="Type"
                                    value="{{ $transactions->type }}" />
                                @if ($errors->has('type'))
                                    <p class="text-danger">{{ $errors->first('type') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name="amount" class="form-control" placeholder="Amount"
                                    value="{{ $transactions->amount }}" />
                                @if ($errors->has('amount'))
                                    <p class="text-danger">{{ $errors->first('amount') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Entry Date</label>
                                <input type="date" name="date" class="form-control" placeholder="Entry Date"
                                    value="{{ $transactions->date }}" />
                                @if ($errors->has('date'))
                                    <p class="text-danger">{{ $errors->first('date') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="catagory">Catagory</label>
                                <select name=catagory id=catagory value="{{ $transactions->catagory }}">
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
    </div>
@endsection
