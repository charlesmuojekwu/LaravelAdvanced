<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login Form</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-md-6 mt-5">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h3 class="mb-4">Login Form</h3>

                <form action="{{ url('/user') }} " method="post">
                   @csrf
                  
                        <input class="form-control" type="text" placeholder="Email" name="email" value="{{ old('email') }}"><br>
            
                        <input class="form-control" type="text" placeholder="password" name="paasword"><br>
                  
                        <input  type="submit" value="Submit" class="btn btn-md btn-primary form-control" >
                   
                </form>
            </div>    
           
        </div>
    </div>
</body>
</html>