@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card-form-holder">
                    <div class="card-body">
                        <h1>Account Update</h1>

                        @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif
                        <form action="" method="post">
                            @csrf
                            @method('Put')
                            <div class="form-group">
                                <label> Bank Name</label>
                                <input type="text" name="bname" class="form-control" placeholder="bank name"
                                    value="{{ $accounts->bname }}" />
                                @if ($errors->has('bname'))
                                    <p class="text-danger">{{ $errors->first('bname') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Account Number</label>
                                <input type="text" name="acc_num" class="form-control" placeholder="Account Number"
                                    value="{{ $accounts->acc_num }}" />
                                @if ($errors->has('acc_num'))
                                    <p class="text-danger">{{ $errors->first('acc_num') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>IFSC Code</label>
                                <input type="text" name="ifsc" class="form-control" placeholder="ifsc"
                                    value="{{ $accounts->ifsc }}" />
                                @if ($errors->has('ifsc'))
                                    <p class="text-danger">{{ $errors->first('ifsc') }}</p>
                                @endif
                            </div>

                            <div class="col-4 text-right">
                                <input type="submit" class="btn btn-primary" value="Edit" />
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
