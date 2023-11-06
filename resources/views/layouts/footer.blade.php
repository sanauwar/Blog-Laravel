<!-- Blog Title and description Insert -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('#post').on('click', function() {
            event.preventDefault();
            let title = $('#title').val();
            let description = $('#description').val();

            $.ajax({
                method: 'POST',
                url: "{{route('blog.store')}}",
                data: `title=${title}&&description=${description}`,
                success: function(res) {
                    alert(res.message);
                    $(function() {
                        $('#myblog').modal('toggle');
                    });
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                }
            })
        })
    })
</script>

<!-- All likes Count using Ajax  -->
<script>
    $(document).ready(function() {
        $(".blog-like").click(function() {
            let nxtSpan = $(this).closest('span').find('span')
            let blog_id = ($(this).attr('blog_id'));

            $.ajax({
                method: 'GET',
                url: "{{route('blog.like')}}",
                data: {
                    blog_id: `${blog_id}`,
                },
                success: function(res) {
                    console.log(res);
                    if (res.success) {
                        alert(res.message)
                        if (res.hasOwnProperty('lcount')) {
                            nxtSpan.html(res.lcount);
                        }
                    } else {
                        alert(res.message)
                    }
                }
            })
        });
    })
</script>

<!-- Remove Flash message  -->
<script>
    $("document").ready(function() {
        setTimeout(function() {
            $("div.alert").remove();
        }, 2000); // 2 sec remove

    });
</script>

</html>