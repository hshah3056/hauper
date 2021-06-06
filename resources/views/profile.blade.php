@extends('layouts.app')

@section('content')

            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Profile</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    <div class="container-fluid">
                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle" src="{{$user->profile_image ? env('PROFILE_IMAGE_URL').$user->profile_image : '/admin/dist/img/user4-128x128.jpg'}}" alt="User profile picture">
                                            </div>

                                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                                            <p class="text-muted text-center">Software Engineer</p>

                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Email</b> <a class="float-right">{{$user->email}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-header p-2">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#activity" data-toggle="tab">Profile</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{ $user->name ? : old('name') }}" name="name" placeholder="Enter your Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{$user->contact ? : old('mobile_no') }}" name="contact" placeholder="Enter your Mobile No." required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="{{ $user->email ? : old('address') }}" placeholder="Enter your Address" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputFile">File input</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" name="profile_image" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <img src="" id="preview" width="40%" class="img-thumbnail">
                                                </div>
                                                <div class="text-center">
                                                    <button class="btn btn-success">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

@endsection

@section('page-javascript')
    <script>
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById("preview").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection
