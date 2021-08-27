<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- sweetalert -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>

<body>

    <form action="{{route('save')}}" method="POST" id="admin_form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="col-sm=12">
                <h2 style="text-align:center; color:blue;">Admin Details</h2>
            </div>
        </div>

        <hr />


        <div class="row">
            @if(Session::get('success'))
            <script>
                swal({
                    title: "Admin Succesfully Register!",
                    //text: "User Succesfully Added!",
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
            <div class="form-group col-sm-6">
                <label>Frist Name</label>
                <input type="text" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');" name="f_name" class="form-control" id="f_name" value="{{old('f_name')}}" placeholder="Enter Frist Name">
                @if($errors->has('f_name'))
                <span style="color: red;">{{$errors->first('f_name')}}</span>
                @endif
            </div>
            <div class="form-group col-sm-6">
                <label>Last Name</label>
                <input type="text" onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');" name="l_name" class="form-control" id="l_name" value="{{old('l_name')}}" placeholder="Enter Last Name">
                @if($errors->has('l_name'))
                <span style="color: red;">{{$errors->first('l_name')}}</span>
                @endif
            </div>
            <div class="form-group col-sm-12">
                <label>Email_Id</label>
                <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}" placeholder="Enter Email Name">
                @if($errors->has('email'))
                <span style="color: red;">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group col-sm-6">
                <label>Password</label>
                <input type="password" name="pass" class="form-control" id="pass" value="{{old('pass')}}" placeholder="Enter Password">
                @if($errors->has('pass'))
                <span style="color: red;">{{$errors->first('pass')}}</span>
                @endif
            </div>
            <div class="form-group col-sm-6">
                <label>Confrim Password</label>
                <input type="password" name="c_pass" class="form-control" id="c_pass" value="{{old('c_pass')}}" placeholder="Enter Confrom Password">
                @if($errors->has('c_pass'))
                <span style="color: red;">{{$errors->first('c_pass')}}</span>
                @endif
            </div>
            <div class="form-group col-sm-6">
                <label>BirthDate</label>
                <input type="date" name="date" class="form-control" id="date" value="{{old('date')}}" max="2021-12-31">
                @if($errors->has('date'))
                <span style="color: red;">{{$errors->first('date')}}</span>
                @endif
            </div>

            <div class="form-group col-sm-2">
                <label>Country Code</label>
                <input type="text" onkeyup="this.value=this.value.replace(/[^+1-9]/g,'');" name="c_code" class="form-control" id="c_code" value="{{old('c_code')}}" placeholder="Enter Country Code">
                @if($errors->has('c_code'))
                <span style="color: red;">{{$errors->first('c_code')}}</span>
                @endif
            </div>
            <div class="form-group col-sm-4">
                <label>Mobile Number</label>
                <input type="text" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" name="number" class="form-control" id="number" value="{{old('number')}}" placeholder="Enter Mobile Number">
                @if($errors->has('number'))
                <span style="color: red;">{{$errors->first('number')}}</span>
                @endif
            </div>

            <div class="form-group col-sm-6">
                <label>Gender</label><br />
                <input type="radio" name="gender" value="male"> Male<br />
                <input type="radio" name="gender" value="female"> Female <br />
                @if($errors->has('gender'))
                <span style="color: red;">{{$errors->first('gender')}}</span>
                @endif
            </div>

            <div class="form-group col-sm-6">
                <label>Profile Photo</label>
                <input type="file" name="file" class="form-control" id="File" value="{{old('file')}}" placeholder="Select Your Profile Photo">
                @if($errors->has('file'))
                <span style="color: red;">{{$errors->first('file')}}</span>
                @endif
            </div>

            <div class="form-group col-sm-12">
                <label>Address</label>
                <textarea type="text" name="address" class="form-control" id="address" value="{{old('address')}}" placeholder="Enter Your Address"></textarea>
                @if($errors->has('address'))
                <span style="color: red;">{{$errors->first('address')}}</span>
                @endif
            </div>


        </div>
        <center>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('Admin.login')}}">
                <button type="button" class="btn btn-info">Login</button>
            </a>
        </center>

    </form>
    
</body>


</html>