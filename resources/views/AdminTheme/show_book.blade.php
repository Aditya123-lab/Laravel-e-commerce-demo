@extends('layout.master')

@section('content')
<div class="content-wrapper">
    @if(Session::get('success'))
    <script>
        swal({
            title: " {{Session::get('success')}}",
            icon: "success",
            button: "ok!",
        });
    </script>
    @endif
    @if(Session::get('fail'))
    <script>
        swal({
            icon: 'error',
            title: " {{Session::get('fail')}}",
            button: "ok!",
        });
    </script>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Book Name</th>
                                    <th>Book Author Name</th>
                                    <th>Book Price</th>
                                    <th>Book Quantity</th>
                                    <th>Book Intro</th>
                                    <th>Book Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->book}} </td>
                                    <td>{{$data->author}}</td>
                                    <td>{{$data->price}}</td>
                                    <td>{{$data->quantity}}</td>
                                    <td>{{$data->intro}}</td>                                   
                                    <td><img src="{{asset('uploades/'.$data->photo)}}" style="width: 80px;"></td>
                                   
                                    <td>
                                        <a href="edit/{{$data->id}}" class="btn btn-primary">Edit</a>
                                        <a href="Delete/{{$data->id}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection