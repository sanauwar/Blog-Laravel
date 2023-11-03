@include('layouts.head')

<body>
    @include('layouts.nav')
    <!-- Modal -->
    <div class="modal fade" id="myblog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Add Blog</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form>@CSRF
                        <label>Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                        <label>Decription</label>
                        <input type="text" name="description" id="description" class="form-control"><br>
                        <button type="submit" id="post" class="btn btn-primary">Post</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!--Add Blog User Modal  -->
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myblog">
            Add Blog
        </button>

        <h3>My Blog</h3>
        <table class="table table-bordered blog-tbl">

            <th><b>title</b></th>
            <th><b>description</b></th>
            
            @foreach($users as $user)
            <tr>
                <td>{{$user->title}}</td>
                <td>{{$user->description}}</td>
            </tr>
            @endforeach

            </tr>
        </table>
    </div>
</body>

@include('layouts.footer')