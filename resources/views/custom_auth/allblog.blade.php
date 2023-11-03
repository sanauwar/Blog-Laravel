@include('layouts.nav')
@include('layouts.head')

<style>
    * {
        box-sizing: border-box;
    }

    /* Add a gray background color with some padding */
    body {
        font-family: Arial;
        padding: 20px;
        background: #f1f1f1;
    }

    /* Header/Blog Title */
    .header {
        padding: 30px;
        font-size: 40px;
        text-align: center;
        background: white;
    }

    /* Create two unequal columns that floats next to each other */
    /* Left column */
    .leftcolumn {
        float: left;
        width: 75%;
    }

    /* Right column */
    .rightcolumn {
        float: left;
        width: 25%;
        padding-left: 20px;
    }

    /* Fake image */
    .fakeimg {
        background-color: #aaa;
        width: 100%;
        padding: 20px;
    }

    /* Add a card effect for articles */
    .card {
        background-color: white;
        padding: 20px;
        margin-top: 20px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Footer */
    .footer {
        padding: 20px;
        text-align: center;
        background: #ddd;
        margin-top: 20px;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 800px) {

        .leftcolumn,
        .rightcolumn {
            width: 100%;
            padding: 0;
        }
    }
</style>

<body>
    <div class="header">
        <h2>All Blogs </h2>
    </div>
    @foreach($allblogs as $blog)

    <div class="col-md-1">

    </div>
    <div class="row">
        <div class="leftcolumn">
            <div class="col-md-10>">
                <div class="card">
                    <h1><b>Title Heading:</b>{{$blog->title}}</h1>
                    <h4>
                        <h2><b>Description :</b>{{$blog->description}}</h2>
                    </h4>
                    <div class="blog-img">

                        <img src="{{url('images/laravel.jpeg')}}" alt="profile Pic" height="200" width="200">
                    </div>
                    <div >
                        <span>

                            <button type="button" id="comment" class="btn btn-primary btn-lg"><i class="fa fa-thumbs-up">Comment</i> </button>
                        </span>
                        <span>

                            <button type="button" id="like" blog_id="{{$blog->id}}" class="btn btn-primary btn-lg blog-like"><i class="fa fa-thumbs-up">Like</i> </button>
                        </span>
                    </div>

                </div>


            </div>


            <div class="rightcolumn">

            </div>
        </div>
    </div>
    <div class="col-md-1>">

    </div>

    @endforeach
</body>


@include('layouts.footer')