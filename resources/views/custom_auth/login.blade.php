@include('custom_auth.layouts')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="col-md-3">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif -->
                @if(session('email_error'))
                <div class="alert alert-danger">
                    {{ session('email_error') }}
                </div>
                @endif

                @if(session('password_error'))
                <div class="alert alert-danger">
                    {{ session('password_error') }}
                </div>
                @endif
                <h2>LogIN :</h2>
                <form method="POST" action="{{route('login')}}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button style="cursor:pointer" type="submit" class="btn btn-primary">Log In</button>
                        <a href="{{ route('register.view') }}"><button style="cursor:pointer" type="button" class="btn btn-primary">Signup</button></a>
                    </div>
                    <!-- <div class="form-group">
                        <a href="{{ route('register.view') }}"><button type="button">Create new account</button></a>
                    </div> -->
                </form>

            </div>
        </div>
    </div>
    <div class="col-md-3">

    </div>

</body>

</html>