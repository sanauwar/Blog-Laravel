<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        // alert('coming');
        $('#post').on('click', function() {
            event.preventDefault();
            // alert('coming');
            let title = $('#title').val();
            let description = $('#description').val();
            // "_token": "{{ csrf_token() }}",
            // alert(description)

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
<script>
    $(document).ready(function() {
        // alert('coming');
        $(".blog-like").click(function() {
            // alert(this.attr('blog_id'))
            alert($(this).attr('blog_id'));
            $.ajax({
                method: 'GET',
                url: "{{route('blog.like')}}",
                data: {
                    like: 1,
                    Comment: 1,
                },
                success: function(res) {
                    alert(res);
                }
            })
        });
        // $("#comment").click(function() {
        //     // alert("comment");
        // });

    })
</script>

</html>