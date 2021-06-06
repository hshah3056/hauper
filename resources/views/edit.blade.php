@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Data</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $updates->name }}" name="name" placeholder="Enter your Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $updates->mobile_no }}" name="mobile_no" placeholder="Enter your Mobile No." required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $updates->address }}" name="address" placeholder="Enter your Address" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $updates->image }}" name="image" placeholder="Enter your Image " required>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
