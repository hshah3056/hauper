@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Users</li>
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
                        <form action="" method="post" id="user-form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Enter your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ old('contact') }}" name="contact" id="contact" placeholder="Enter your Mobile No.">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="Enter your Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" value="{{ old('password') }}" name="password" id="password" placeholder="Enter your Password">
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
            $("#user-form").validate({
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
                    },
                    password: {
                        required: true
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
                    },
                    password: {
                        required: "The password should be required"
                    }
                }
            });
        });

    </script>
@stop