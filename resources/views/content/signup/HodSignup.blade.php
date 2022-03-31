<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quality Wear</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="signup-backup">
    <div class="ml-auto mr-auto links2">

        <form method="POST" action="/addUserPost" class="row" accept-charset="utf-8" enctype="multipart/form-data">>
            @csrf
            <div class="col-5 ml-5 m-3">
                <!-- Name -->
                <div class="form-group">
                    <label for="name" class="text-light">Name</label>
                    <input type="text" name="name" class="form-control" id='name' placeholder="Name" />
                </div>
                @if ($errors->has('name'))
                <label class="text-danger">{{ $errors->first('name') }}</label>
                @endif

                <!--User Name -->
                <div class="form-group">
                    <label for="UserName" class="text-light">User Name</label>
                    <input type="text" name="UserName" class="form-control" id='UserName' placeholder="User Name" />
                </div>
                @if ($errors->has('UserName'))
                <label class="text-danger">{{ $errors->first('UserName') }}</label>
                @endif

                <!--Email -->
                <div class="form-group">
                    <label for="Email" class="text-light">Email</label>
                    <input type="text" name="Email" class="form-control" id='Email' placeholder="Email" />
                </div>
                @if ($errors->has('Email'))
                <label class="text-danger">{{ $errors->first('Email') }}</label>
                @endif
            </div>
            <div class="col-5 m-3">
                <!--contact number -->
                <div class="form-group">
                    <label for="phone" class="text-light">phone Number</label>
                    <input type="number" name="phone" class="form-control" id='phone' placeholder="Phone Number" />
                </div>
                @if ($errors->has('phone'))
                <label class="text-danger">{{ $errors->first('phone') }}</label>
                @endif

                <!-- Select Option Rol type -->
                <div class="form-group">
                    <label for="department" class="text-light">Department</label>
                    <select name="department" class="form-control" style="width: 100%;">
                        <option value="">select department</option>
                        @foreach ($departmentData as $each)

                        @if ($each->name == 'user')
                        <option selected value="{{ $each->id }}">{{ $each->name }}</option>
                        @else
                        <option value="{{ $each->id }}">{{$each->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>


                <!--Password -->
                <div class="form-group">
                    <label for="password" class="text-light">Password</label>
                    <input type="password" name="password" class="form-control" id='password' placeholder="Password" />
                </div>
                @if ($errors->has('password'))
                <label class="text-danger">{{ $errors->first('password') }}</label>
                @endif

                <div class="form-group">
                    <label class="text-light">Image </label>
                    <input type="file" class="form-contol" name="file" />
                    @if ($errors->has('file'))
                    <label class="alert alert-danger">{{ $errors->first('file') }}</label>
                    @endif
                </div>
                <input type="hidden" name="role" value="HOD">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>

    </div>


    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
        console.log('hai');
        $(".alert").delay(2000).fadeOut(1000);
        $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })
    });
    
    </script>
</body>

</html>