/**
 * Created by Administrator on 2017/8/16.
 */

$(function(){
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });

    $("#tab-category").Huitab({
        index:0
    });
    $("#form-category-add").validate({
        rules:{

        },
        onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitHandler:function(form){
            //$(form).ajaxSubmit();
            var index = parent.layer.getFrameIndex(window.name);
            //parent.$('.btn-refresh').click();
            parent.layer.close(index);
        }
    });
    
    
    $('#submit').on('click',function () {
        var data={};
        //data['ColumnId']=$('#ColumnId').text();
        data['opt']='2';
        data['UpperSection']=$('#sel_Sub').val();
        data['CategoryName']=$('#CategoryName').val();
        data['Alias']=$('#Alias').val();
        data['Catalog']=$('#Catalog').val();
        data['ContentType']=$('#ContentType').val();

        $.ajax({
            type:"post",
            url:"/admin/data/system-category-add.php",
            data:data,
            
            beforeSend:function () {
                layer.load(2);
            },
            success:function(msg){
                layer.closeAll('loading');
                //layer.msg(msg,{icon:1,time:1000});
                layer.msg(msg);
            }
        });
    });

    $.ajax({
        type:"post",
        url:"/admin/data/system-category-add.php",
        dataType: 'json',
        beforeSend:function () {
            layer.load(2);
        },
        success:function(data){
            layer.closeAll('loading');
            var html='<option value="全部分类">全部分类</option>';
            for( var i in data.categoryName){
                html+='<option value=\"'+data.categoryName[i]+'\">'+data.categoryName[i]+'</option>'
            }
            $('#sel_Sub').html(html);
        }
    });
});