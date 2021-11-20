
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//--------- Xóa 1 dòng trong bảng ---------//

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

//--------- Xóa hình ảnh trong storage ---------//

function removeUploadStorage(val) {
    $.ajax({
        type: 'DELETE',
        datatype: 'JSON',
        data: {val},
        url: '/admin/destroy/services',
    })
}


//--------- Upload 1 hình ảnh ---------//

$('#upload').change(function(e) {
    const form = new FormData();

    if(e.target.files[0] !== undefined) {
        form.append('file', $(this)[0].files[0]);

        data = $('#image').val()
        if(data !== '') {
            removeUploadStorage(data)
        }

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

//--------- Xóa nhiều hình ảnh trong storage ---------//

function removeMultipleUploadStorage(arr) {
    for (var i = 0; i < arr.length; i++) {
        val = arr[i].value
        removeUploadStorage(val)
    }
}

//--------- Upload nhiều hình ảnh ---------//

$("#mul-file-input").change(function(e) {

    var files = Array.from(this.files)

    flength = files.length;
    
    if (flength > 0) {
        var fileName = files.map(f =>{return f.name}).join(", ")
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

        str = $('.store-image').get()
        arr = Object.values(str)
        
        if (arr.length > 0) {
            $('#images').val('')
            removeMultipleUploadStorage(arr)
        }

        for(var i=0; i < flength; i++) {
            console.log(i);
            const form = new FormData();
            form.append('file', files[i]);

            if(fileName !== '') {
                $('#images-show:first').html('');
            }

            $.ajax({
                processData: false,
                contentType: false,
                type: 'POST',
                dataType: 'JSON',
                data: form,
                url: '/admin/upload-gallery/services',
                success: function(result) {
                    if (result.error === false) {
                        images = $('#images').val();
                        html = $('#images-show').html();
                        $('#images-show').html(html +
                                '<div class="mt-3 col-md-3">' + 
                                    '<a href="' + result.url + '"target="_blank">' +
                                        '<img src="' + result.url + '"width=100% class="img-thumbnail" id="img">' + 
                                    '</a>' + 
                                '</div>' +
                                '<input type="hidden" class="store-image" value="'+ result.url + '" id="image">');
                    
                        $('#images').val(images + result.url + ',')
                    } else {
                        alert('Có lỗi xảy ra. Vui lòng thử lại!');
                    }
                }
            })
            
        }
    }
    
});
