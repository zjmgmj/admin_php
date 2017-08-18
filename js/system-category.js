/**
 * Created by Administrator on 2017/8/16.
 */

$('.table-sort').dataTable({
    "aaSorting": [[ 1, "desc" ]],//默认第几个排序
    "bStateSave": true,//状态保存
    "aoColumnDefs": [
        //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
        {"orderable":false,"aTargets":[0,3]}// 制定列不参与排序
    ]
});
/*系统-栏目-添加*/
function system_category_add(title,url,w,h){
    layer_show(title,url,w,h);
}
/*系统-栏目-编辑*/
function system_category_edit(title,url,id,w,h){
    layer_show(title,url,w,h);
}
/*系统-栏目-删除*/
function system_category_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            type: 'POST',
            url: '',
            dataType: 'json',
            success: function(data){
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            },
            error:function(data) {
                console.log(data.msg);
            },
        });
    });
}

$.ajax({
    url:'/admin/data/system-category.php',
    dataType: 'json',
    success:function(data){
        var html='',id='',categoryName='';
        for(var i in data.column){
            html+='<tr class="text-c">'
                +'<td><input type="checkbox" name="" value=""></td>'
                +' <td>'+data.column[i].id+'</td>'
                +'<td class="text-l">'+data.column[i].categoryName+'</td>'
                +'<td class="f-14">' +
                '<a title="编辑" href="javascript:;"  style="text-decoration:none">' +
                '<i class="Hui-iconfont">&#xe6df;</i>' +
                '</a> ' +
                '<a title="删除" href="javascript:;" class="ml-5" style="text-decoration:none">' +
                '<i class="Hui-iconfont">&#xe6e2;</i>' +
                '</a>' +
                '</td>' +
                '</tr>';
        }
        console.log(data);

        $('#columns').html(html);
    },
});