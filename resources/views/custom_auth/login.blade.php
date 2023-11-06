@include('layouts.head')

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">

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
                @if(session('success'))
                <div class="alert alert-success">

                    {{ session('success') }}
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
                </form>

            </div>
        </div>

    </div>
</body>

@include('layouts.footer')