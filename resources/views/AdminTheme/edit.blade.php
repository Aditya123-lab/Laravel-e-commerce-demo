@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Book Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Book</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <form action="{{route('Admin.update',$find1->id)}}" method="POST" id="admin_form" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Book Name</label>
                                    <input type="text" name="book" id="book" class="form-control" value="{{$find1->book}}" placeholder="Enter Book Name">
                                </div>
                                @if($errors->has('book'))
                                <span style="color: red;">{{$errors->first('book')}}</span>
                                @endif

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Book Quantity</label>
                                    <input type="text" name="quantity" id="quantity" class="form-control" value="{{$find1->quantity}}" placeholder="Enter Book Quantity">
                                </div>
                                @if($errors->has('quantity'))
                                <span style="color: red;">{{$errors->first('quantity')}}</span>
                                @endif
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Book Author Name</label>
                                    <input type="text" name="author" id="author" class="form-control" value="{{$find1->author}}" placeholder="Enter Book Author Name">
                                </div>
                                @if($errors->has('author'))
                                <span style="color: red;">{{$errors->first('author')}}</span>
                                @endif
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Book Price</label>
                                    <input type="text" name="price" id="price" class="form-control" value="{{$find1->price}}" placeholder="Enter Book Price">
                                </div>
                                @if($errors->has('price'))
                                <span style="color: red;">{{$errors->first('price')}}</span>
                                @endif
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Book Photo</label>
                                    <input type="file" name="photo" id="photo" class="form-control" placeholder="Select Book Photo">
                                </div>
                                &nbsp; &nbsp; &nbsp; <img src="{{asset('uploades/'.$find1->photo)}}" style="width: 80px;">
                                @if($errors->has('photo'))
                                <span style="color: red;">{{$errors->first('photo')}}</span>
                                @endif
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Book Intro</label>
                                    <textarea type="text" name="intro" id="intro" class="form-control" placeholder="Enter Book Intro"><?php echo $find1->intro ?></textarea>
                                </div>
                                @if($errors->has('intro'))
                                <span style="color: red;">{{$errors->first('intro')}}</span>
                                @endif
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->



                </div>
                <!-- /.card -->
                <button type="submit" class="btn btn-primary">Update Book</button>
                <a href="{{route('Admin.show_book')}}"><button type="button" class="btn btn-info">View Books</button></a>

        </div><!-- /.container-fluid -->
        </form>
    </section>
    <!-- /.content -->
</div>
@endsection