$(document).ready(function () {
    
    
    $('.deleteCat').click(function () {
        if (confirm('Are you sure?')) {
            var id = $(this).data('id');
            var url = $(this).data('url');
            $.ajax({
                url: url+'/categories/delete/' + id,
                type: 'post',
                data: {id: id},
                beforeSend: function (){},
                error: function(){},
                success: function (data){
                    alert(data);
                    //location.reload();
                }
            });
        }
        else {
            alert('you not accept to delete category!');
        }
    })

});