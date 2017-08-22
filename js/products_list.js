/**
 * Created by Administrator on 2017/8/21.
 */
var setting = {
    view: {
        dblClickExpand: false,
        showLine: false,
        selectedMulti: false
    },
    data: {
        simpleData: {
            enable:true,
            idKey: "id",
            pIdKey: "pId",
            rootPId: ""
        }
    },
    callback: {
        beforeClick: function(treeId, treeNode) {
            var zTree = $.fn.zTree.getZTreeObj("tree");
            if (treeNode.isParent) {
                zTree.expandNode(treeNode);
                return false;
            } else {
                //demoIframe.attr("src",treeNode.file + ".html");
                return true;
            }
        }
    }
};

var zNodes =[
    { id:1, pId:0, name:"一级分类", open:true},
    { id:11, pId:1, name:"二级分类"},
    { id:111, pId:11, name:"三级分类"},
    { id:112, pId:11, name:"三级分类"},
    { id:113, pId:11, name:"三级分类"},
    { id:114, pId:11, name:"三级分类"},
    { id:115, pId:11, name:"三级分类"},
    { id:12, pId:1, name:"二级分类 1-2"},
    { id:121, pId:12, name:"三级分类 1-2-1"},
    { id:122, pId:12, name:"三级分类 1-2-2"},
];



$(document).ready(function(){
    var t = $("#treeDemo");
    t = $.fn.zTree.init(t, setting, zNodes);
    //demoIframe = $("#testIframe");
    //demoIframe.on("load", loadReady);
    var zTree = $.fn.zTree.getZTreeObj("tree");
    //zTree.selectNode(zTree.getNodeByParam("id",'11'));
});

$('.table-sort').dataTable({
    "aaSorting": [[ 1, "desc" ]],//默认第几个排序
    "bStateSave": true,//状态保存
    "aoColumnDefs": [
        {"orderable":false,"aTargets":[0,7]}// 制定列不参与排序
    ]
});
/*产品-添加*/
function product_add(title,url){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}
/*产品-查看*/
function product_show(title,url,id){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}
/*产品-审核*/
function product_shenhe(obj,id){
    layer.confirm('审核文章？', {
            btn: ['通过','不通过'],
            shade: false
        },
        function(){
            $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
            $(obj).remove();
            layer.msg('已发布', {icon:6,time:1000});
        },
        function(){
            $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
            $(obj).remove();
            layer.msg('未通过', {icon:5,time:1000});
        });
}
/*产品-下架*/
function product_stop(obj,id){
    layer.confirm('确认要下架吗？',function(index){
        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
        $(obj).remove();
        layer.msg('已下架!',{icon: 5,time:1000});
    });
}

/*产品-发布*/
function product_start(obj,id){
    layer.confirm('确认要发布吗？',function(index){
        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
        $(obj).remove();
        layer.msg('已发布!',{icon: 6,time:1000});
    });
}

/*产品-申请上线*/
function product_shenqing(obj,id){
    $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
    $(obj).parents("tr").find(".td-manage").html("");
    layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

/*产品-编辑*/
function product_edit(title,url,id){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}

/*产品-删除*/
function product_del(obj,id,data){
    console.log(data);
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            type: 'post',
            url: '/admin/data/products_list.php',
            data:data,
            beforeSend:function () {
                layer.load(2);
            },
            success: function(msg){
                layer.closeAll('loading');
                if(msg=='删除成功'){
                    $(obj).remove();
                    layer.msg(msg,{icon:1,time:1000});
                }else{
                    layer.msg(msg,{icon:1,time:1000});
                }
            },
            error:function(msg) {
                layer.closeAll('loading');
                layer.msg(msg,{icon:1,time:1000});
            },
        });
    });
}

$.ajax({
    type:'post',
    url:'/admin/data/products_list.php',
    dataType:'json',
    success:function (data) {
        console.log(data);
        var html='';
        for(var i in data.products){
            html+='<tr class="text-c va-m checks">'
                +'<td><input name="" type="checkbox" value=""></td>'
                +'<td>'+data.products[i].id+'</td>'
                +'<td><a href="javascript:;"><img width="60" class="product-thumb" src=\"'+data.products[i].product_pic+'\"></a></td>'
                +'<td class="text-l"><a style="text-decoration:none" href="javascript:;"><img title="" src="static/h-ui.admin/images/cn.gif">'+data.products[i].product_title+'</a></td>'
                +'<td class="text-l">'+data.products[i].product_content+'</td>'
                +'<td><span class="price">'+data.products[i].product_price+'</span> 元/平米</td>'
                +'<td class="td-status"><span class="label label-success radius">'+data.products[i].product_status+'</span></td>'
                +'<td class="td-manage">'
                +'<a style="text-decoration:none" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>'
                +'<a style="text-decoration:none" class="ml-5" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>'
                +'<a style="text-decoration:none" class="delete" class="ml-5" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>'
                +'</tr>';
        }
        $('#content').html(html);

        $('.checks').off('click');
        $('.checks').on('click',function () {
            $(this).toggleClass('check');
            var inputCheck=$(this).find('input[type=checkbox]');

            inputCheck.is(":checked") ?
            inputCheck.prop('checked',false) : inputCheck.prop('checked',true);

        });

        //批量删除
        $('#deleteALL').off('click');
        $('#deleteALL').on('click',function () {
            var checkTd=$('.check').find('td');
            var array=[];
            //循环选中的tr
            $('.check').each(function (index) {
                array[index]=[];//array子数组
                //循环 td 中数据内容 存储
                $('.check').eq(index).find('td').each(function (i) {
                    //多条数据存入array二维数组中
                    array[index].push($('.check').eq(index).find('td').eq(i).text());
                });
            });

            //数据整理为对象
            var data={};
            data['opt']='1';//传入后端判断操作方式
            var num=0;
            for(var i=0;i<array.length;i++){
                num++;
                var dataObj='data_'+i;
                data[dataObj]={};
                data[dataObj]['id']=array[i][1];
                data[dataObj]['poroduct_title']=array[i][3];
            }
            data['num']=num;
            product_del('.check','',data);
        });

        //删除
        $('.delete').off('click');
        $('.delete').on('click',function () {
            var array=[];
            var thisDom=$(this).parent().parent();
            thisDom.find('td').each(function () {
                array.push($(this).text());
            });
            var data={};
            console.log(thisDom);
            console.log(array);
            data['opt']='1';
            data['id']=array[1];
            data['poroduct_title']=array[3];
            product_del(thisDom,'',data);
        });
    }
});


//搜索
$('#search').on('click', function() {
    var data = {};
    var html='';
    data['opt']='2';
    data['timeStart'] = $('#logmin').val()+' 00:00:00';
    data['timeEnd'] = $('#logmax').val()+' 23:59:59';
    data['searchTitle'] = $('#searchTitle').val();
    $.ajax({
        type: "post",
        url: "/admin/data/products_list.php",
        data: data,
        dataType:'json',
        success: function(data) {
            console.log(data);
            for(var i in data.products){
                html+='<tr class="text-c va-m checks">'
                    +'<td><input name="" type="checkbox" value=""></td>'
                    +'<td>'+data.products[i].id+'</td>'
                    +'<td><a href="javascript:;"><img width="60" class="product-thumb" src=\"'+data.products[i].product_pic+'\"></a></td>'
                    +'<td class="text-l"><a style="text-decoration:none" href="javascript:;"><img title="" src="static/h-ui.admin/images/cn.gif">'+data.products[i].product_title+'</a></td>'
                    +'<td class="text-l">'+data.products[i].product_content+'</td>'
                    +'<td><span class="price">'+data.products[i].product_price+'</span> 元/平米</td>'
                    +'<td class="td-status"><span class="label label-success radius">'+data.products[i].product_status+'</span></td>'
                    +'<td class="td-manage">'
                    +'<a style="text-decoration:none" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>'
                    +'<a style="text-decoration:none" class="ml-5" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>'
                    +'<a style="text-decoration:none" class="delete" class="ml-5" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>'
                    +'</tr>';
            }
            $('#content').html(html);
        }
    });
});