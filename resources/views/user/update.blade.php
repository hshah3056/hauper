@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="panel-body">
                    <div class="col-md-12">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="" method="post" id="update-form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name" placeholder="Enter your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $user->contact }}" name="contact" id="contact" placeholder="Enter your Mobile No.">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ $user->email }}" name="email" id="email" placeholder="Enter your Address" required>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="1" name="is_admin" id="exampleCheck1" {{$user->is_admin == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="exampleCheck1">Allow Is Admin</label>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@section('page-javascript')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#update-form").validate({
                rules: {
                    name : {
                        required: true
                    },
                    contact: {
                        required: true,
                        number: true,
                        min: 10
                    },
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages : {
                    name: {
                        required: "Name should be Required"
                    },
                    contact: {
                        required: "Please enter your ContactNumber",
                        number: "Please enter your contact Number",
                        min: "You must be 10 digit compulsory"
                    },
                    email: {
                        required: "The email should be required",
                        email: "The email should be in the format: abc@domain.tld"
                    }
                }
            });
        });

    </script>
@stop