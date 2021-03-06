$(document).ready(function () {

    $('.addComment').hide();

    $('.deleteCat').click(function () {
        if (confirm('Are you sure?')) {
            var id = $(this).data('id');
            var url = $(this).data('url');
            $.ajax({
                url: url + '/categories/delete/' + id,
                type: 'post',
                data: {id: id},
                beforeSend: function () {
                },
                error: function () {
                },
                success: function (data) {
                    alert(data);
                    location.reload();
                }
            });
        }
        else {
            alert('you not accept to delete category!');
        }
    });

    $('.deletePost').click(function () {
        if (confirm('Are you sure?')) {
            var id = $(this).data('id');
            var url = $(this).data('url');
            $.ajax({
                url: url + id,
                type: 'post',
                data: {id: id},
                beforeSend: function () {
                },
                error: function () {
                },
                success: function (data) {
                    alert(data);
                    location.reload();
                }
            });
        }
        else {
            alert('You denied to delete post!');
        }
    });

    $('.comment').click(function () {
        $('.addComment').toggle();
    });

    $('.postComment').click(function () {
        var comment = $('#inputComment').val();
        var pid = $(this).data('id');
        var url = $(this).data('url');
        $.ajax({
            url: url, //+ 'comments/postComment',
            type: 'post',
            data: {pid: pid, comment: comment},
            beforeSend: function () {
            },
            error: function () {
            },
            success: function (data) {
                alert(data);
                location.reload();
            }
        });
    });

    $('.deleteComment').click(function () {
        var id = $(this).data('id');
        var url = $(this).data('url');
        $.ajax({
            url: url + id, //+ 'comments/postComment',
            type: 'post',
            data: {id: id},
            beforeSend: function () {
            },
            error: function () {
            },
            success: function (data) {
                alert(data);
                location.reload();
            }
        });
    });

    $('.editComment').click(function () {
        var cid = $(this).data('id');
        var comment = $('#commentPost' + cid).text();
        $('#commentPost' + cid).replaceWith("<div class='ecc'><textarea class='form-control' id='editComment'>" + comment + "</textarea><button class='btn btn-primary' id='saveCom' data-id='" + cid + "'>Save</button></div>");
    });


    $(document).on("click", "#saveCom", function (e) {
        var id = $(e.target).data('id');
        var comment = $("#editComment").val();
        $.ajax({
            url: '../comments/update',
            type: 'post',
            data: {id: id, comment: comment},
            beforeSend: function () {
            },
            error: function () {
            },
            success: function (data) {
                alert(data);
                location.reload();
            }
        });

    });


});