@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Display Data</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $show->name }}" name="name" placeholder="Enter your Name" required readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $show->mobile_no }}" name="mobile_no" placeholder="Enter your Mobile No." required readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $show->address }}" name="address" placeholder="Enter your Address" required readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $show->image }}" name="image" placeholder="Enter your Image " required readonly>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('home') }}" class="btn btn-success">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
