
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm('Bạn có chắc chắn muốn mục này không?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: {id},
            url: url,
            success: function (result) {
                if(result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xảy ra lỗi! Vui lòng thử lại!');
                }
            }
        })
    }
}

//Upload hình ảnh
$('#upload').change(function(e) {
    const form = new FormData();

    if(e.target.files[0] !== undefined) {
        form.append('file', $(this)[0].files[0]);

        $.ajax({
            processData: false,
            contentType: false,
            type: 'POST',
            dataType: 'JSON',
            data: form,
            url: '/admin/upload/services',
            success: function(result) {
                if (result.error === false) {
                    $('#image_show').html('<a href="' + result.url + '"target="_blank">' +
                                '<img src="' + result.url + '"width=100% class="img-thumbnail"></a>');
    
                    var fileName = e.target.files[0].name;
                    $('#file').html(fileName);
    
                    $('#image').val(result.url);
                } else {
                    alert('Xảy ra lỗi! Vui lòng thử lại!');
                }
            }
        })
    }
})
