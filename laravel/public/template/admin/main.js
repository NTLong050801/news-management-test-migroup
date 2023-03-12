$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm("Bạn chắc chắn xóa ?")) {
        // $.ajax({
        //     type:"DELETE",
        //     datatype: "JSON",
        //     data:{
        //         id:id,
        //     },
        //     url:url,
        //     success: function (result){
        //         console.log(result)
        //     }
        // })
    }
}

function logout(url) {
    if (confirm("Bạn muốn đăng xuất ?")) {
        $.ajax({
            url: url,
            method: "GET",
            success: function (result) {
                location.replace(result)
            }
        })
    }
}

function changePage(page, url) {


    if (window.location.href == url) {
        location.replace(window.location.href + '?rcOfPage=' + page)
    } else {
        location.replace(window.location.href + '&rcOfPage=' + page)

    }
}

$('#image').change(function () {
    url_get = $(this).attr('url')
    form = new FormData();
    form.append('file', $(this)[0].files[0])
    $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        dataType: "JSON",
        data: form,
        url: url_get,
        success: function (dt) {
            if (dt.error == false) {
                $('#img_show').html('<a target="_blank" href="' + dt.url + '"><img src="' + dt.url + ' " width="200px" alt="" class="img-fluid"></a>')
                $('#file').val(dt.url);

            } else {
                alert("Upload file fail")
            }
            //console.log(dt)
        }
    })
})
$('.btn_edit').click(function () {
    id_edit = $(this).attr('id_edit');
    name_cate = $(this).attr('name_cate');
    $('#form_edit').attr('action','/admin/cate/'+id_edit+'/update')
    $('#name_edit').val(name_cate)
})

