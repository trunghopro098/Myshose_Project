$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
$('.edit').click(function(){
    // ẩn lỗi
    $('.error').hide();
    // tạo một biến chưa id và $this lấy laijn id
    let id = $(this).data('id');
    $.ajax({
        //ủl dản dến ControllerCategory đến hàm edit
        url : 'admin/category/'+id+'/edit',
        //kiểu dử liệu nhân về
        DataType  : 'json',
        type : 'get',
        success  :function($result){
            console.log($result);
            $('.name').val($result.name);
            $('.title').val($result.name);
             if ($result.status == 1) {
                    $('.ht').attr('selected', 'selected');
                } else {
                    $('.kht').attr('selected', 'selected');
                }
        }
        });
        $('.update').click(function(){
            let ten = $('.name').val();
            let status = $('.status').val();
            $.ajax({
                // để sử dụng được hàm update t sử dụng metod put
                url : 'admin/category/'+id,
                // data laf kieeur duwr lieuj guiir qua ben xuwr li
                data : {
                    name : ten,
                    status : status
                },
                // kiểu dử liệu gủi đi
                type : 'put',
                //kiểu dử lieuej trả về
                dataType : 'json',
                success : function($result){
                    console.log($result);
                    if($result.error == 'true'){
                        $('.error').show();
                        $('.error').html($result.message.name[0]);
                    }
                    else{
                        toastr.success($result.success, 'Thông báo', {timeOut: 5000});
                        // ẩn modal
                        $('#edit').modal('hide');
                        location.reload();
                    }
                }
            });
        });
    });
    //delete category
    $('.delete').click(function(){
        let id = $(this).data('id');
        $('.del').click(function(){
            $.ajax({
                url: 'admin/category/' + id,
                dataType: 'json',
                type: 'delete',
                success: function($result) {
                    toastr.success($result.success, 'Thông báo', { timeOut: 5000 });
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });

    });
    //Edit ProductType
    $('.editProducttype').click(function(){
        $('.error').hide();
        let id = $(this).data('id');
        $.ajax({
            url : 'admin/producttype/'+id+'/edit',
            dataType : 'json',
            type : 'get',
            success : function($result){
                $('.name').val($result.producttype.name);
                var html = '';
                $.each($result.category,function($key,$value){
                    if($value['id'] == $result.producttype.idCategory){
                        html += '<option value='+$value['id']+' selected>';
                            html += $value['name'];
                        html += '</option>';    
                    }else{
                        html += '<option value='+$value['id']+'>';
                            html += $value['name'];
                        html += '</option>';
                    }   
                });
                $('.idCategory').html(html);
                if($result.producttype.status == 1){
                    $('.ht').attr('selected','selected');
                }else{
                    $('.kht').attr('selected','selected');
                }
            }
        });
        $('.updateProductType').click(function(){
            let idCategory = $('.idCategory').val();
            let name = $('.name').val();
            let status = $('status').val();
            $.ajax({
                url : 'admin/producttype/'+id,
                dataType : 'json',
                data : {
                    idCategory : idCategory,
                    name : name,
                    status : status,
                },
                type : 'put',
                success : function($data){
                    if($data.error == 'true'){
                        $('.error').show();
                        $('.error').text($data.message.name[0]);    
                    }else{
                        toastr.success($data.result, 'Thông báo', {timeOut: 5000});
                        $('#edit').modal('hide');
                        location.reload();
                    }
                }
            });
        });
    });
    $('.deleteProducttype').click(function(){
        let id = $(this).data('id');
        $('.delProductType').click(function(){
            $.ajax({
                url : 'admin/producttype/'+id,
                dataType : 'json',
                type : 'delete',
                success : function($data){
                    toastr.success($data.result, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });
    // phaan laoij dder hien thi
    $('.cateProduct').change(function(){
        // lấy ra id của danh mục
        let idCate = $(this).val();
        $.ajax({
            url : 'getproducttype',
            data : {
                idCate : idCate
            },
            type : 'get',
            dataType : 'json',
            success : function(data){
                let html = '';
                $.each(data,function($key,$value){
                    html += '<option value='+$value['id']+'>';
                        html += $value['name'];
                    html += '</option>';    
                });
                $('.proTypeProduct').html(html);
            }
        });
    });
    //Delete product
    $('.deleteProduct').click(function(){
        let id = $(this).data('id');
        $('.delProduct').click(function(){
            $.ajax({
                url : 'admin/product/'+id,
                type : 'delete',
                dataType : 'json',
                success : function(data){
                    toastr.success(data.result, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });
    // eidt product
    $('.editProduct').click(function(){
        $('.errorName').hide();
        $('.errorQuantity').hide();
        $('.errorPrice').hide();
        $('.errorPromotional').hide();
        $('.errorImage').hide();
        $('.errorDescription').hide();
        let id = $(this).data('id');
        $.ajax({
            url : 'admin/product/'+id+'/edit',
            dataType : 'json',
            type : 'get',
            success : function(data){
                $('.name').val(data.product.name);
                $('.quantity').val(data.product.quantity);
                $('.price').val(data.product.price);
                $('.promotional').val(data.product.promotional);
                // hien thi anh tư duobg link
                $('.imageThum').attr('src','img/upload/product/'+data.product.image);
                if(data.product.status == 1){
                    $('.ht').attr('selected','selected');
                }else{
                    $('.kht').attr('selected','selected');
                }
                CKEDITOR.instances['banhang'].setData(data.product.description); 
                let html1 = '';
                $.each(data.category,function(key,value){
                    if(data.product.idCategory == value['id']){
                        html1 += '<option value="'+value['id']+'" selected>';
                            html1 += value['name'];
                        html1 += '</option>';
                    }else{
                        html1 += '<option value="'+value['id']+'">';
                            html1 += value['name'];
                        html1 += '</option>';
                    }
                });
                $('.cateProduct').html(html1);
                let html2 = '';
                $.each(data.producttype,function(key,value){
                    if(data.product.idProductType == value['id']){
                        html2 += '<option value="'+value['id']+'" selected>';
                            html2 += value['name'];
                        html2 += '</option>';       
                    }else{
                        html2 += '<option value="'+value['id']+'">';
                            html2 += value['name'];
                        html2 += '</option>';   
                    }
                });
                $('.proTypeProduct').html(html2);                             
            }
        });
    // });
    // update product 
            $('#updateProduct').on('submit',function(event){
            //chặn form submit
            event.preventDefault();
            $.ajax({
                // gủi cải image nên t kg dùng put
                url : 'admin/updatePro/'+id,
                // dử liệu gủi đi tạo formdata
                data : new FormData(this),
                // vì dử liêu có file nên t dung f contenttype và ben clienct dùng enctype="multipart/form-data"
                contentType : false,
                // chặn lại cái tiến trình của dử liệu
                processData : false,
                // 
                cache : false,
                // khoong cos type looi 405
                type : 'post',
                success : function(data){
                    console.log(data);
                    if(data.error == 'true'){
                        if(data.message.image){
                            $('.errorImage').show();
                            $('.errorImage').text(data.message.image[0]);
                            $('.image').val('');
                        }
                        if(data.message.name){
                            $('.errorName').show();
                            $('.errorName').text(data.message.name[0]);
                            $('.name').val('');
                        }
                        if(data.message.quantity){
                            $('.errorQuantity').show();
                            $('.errorQuantity').text(data.message.quantity[0]);
                            $('.name').val('');
                        }

                        if(data.message.price){
                            $('.errorPrice').show();
                            $('.errorPrice').text(data.message.price[0]);
                            $('.price').val('');
                        }
                        if(data.message.promotional){
                            $('.errorPromotional').show();
                            $('.errorPromotional').text(data.message.promotional[0]);
                            $('.promotional').val('');
                        }
                        if(data.message.description){
                            $('.errorDescription').show();
                            $('.errorDescription').text(data.message.description[0]);
                            $('.image').val('');
                        }

                    }else{
                    toastr.success(data.result, 'Thông báo', {timeOut: 5000});
                    $('#edit').modal('hide');
                    location.reload();
                    }

                }
            });
        });
    });
// deleteorder

});