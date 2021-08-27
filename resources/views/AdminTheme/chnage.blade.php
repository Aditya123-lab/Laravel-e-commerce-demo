@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chnage Password Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            @if(Session::get('success'))
                <script>
                    swal({
                        icon: 'success',
                        title: " {{Session::get('success')}}",
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
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('check_password')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" class="form-control" id="old_pass" name="old_pass" value="{{old('old_pass')}}" placeholder="Enter Old Password">
                                    @if($errors->has('old_pass'))
                                    <span style="color: red;">{{$errors->first('old_pass')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="Enter New Password">
                                    @if($errors->has('new_pass'))
                                    <span style="color: red;">{{$errors->first('new_pass')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" id="cof_pass" name="cof_pass" placeholder="Enter Confrim Password">
                                    @if($errors->has('cof_pass'))
                                    <span style="color: red;">{{$errors->first('cof_pass')}}</span>
                                    @endif
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Chnage Password</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->



                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection