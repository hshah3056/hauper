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
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div>
                </div>
                <div class="row text-right">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <a href="{{route('user-create')}}" class="btn btn-primary text-right">Create User</a>
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
                        <table class="table table-responsive text-center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th width="20%">Name</th>
                                <th width="20%">Mobile No</th>
                                <th width="20%">Email Id</th>
                                <th width="20%">Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->contact }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <img src="{{$user->profile_image  ? env('PROFILE_IMAGE_URL').$user->profile_image : ' N.A'}}" width="100%">
                                    </td>
                                    <td>
                                        <a href = '{{ route('user-update',['id' => $user->id]) }}' class="btn btn-primary">edit</a>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <button class="deleteRecord btn btn-danger" data-id="{{ $user->id }}" >Delete </button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('page-javascript')
    <script type="text/javascript">
        $(".deleteRecord").click(function(){
            var id = $(this).data("id");
            $.ajax(
                {
                    url: "users/"+id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (response){
                        if (response !== 0) {
                            swal('Processing', response.message, 'success');
                            window.location.reload()
                        }
                        else {
                            swal('Processing', response.message, 'error');
                        }
                    }
                });

        });

    </script>
@stop
