<!-- Session::get('$email'); -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{route('home')}}">Home</a></li>
            <li><a href="#">Welcome to "{{ Auth::user()->email }}"</a></li>
            <li><a href="{{route('allblog')}}">All Blogs</a></li>

            <li> <a href="{{route('user.logout')}}">Logout</a></li>
        </ul>
    </div>
</nav>