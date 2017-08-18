$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,6]}// 不参与排序的列
	]
});

/*资讯-添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-删除*/
function article_del(obj,id,data){

	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '/admin/data/article_list.php',
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

/*资讯-审核*/
function article_shenhe(obj,id){
	layer.confirm('审核文章？', {
		btn: ['通过','不通过','取消'], 
		shade: false,
		closeBtn: 0
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布', {icon:6,time:1000});
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
		$(obj).remove();
    	layer.msg('未通过', {icon:5,time:1000});
	});	
}
/*资讯-下架*/
function article_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*资讯-发布*/
function article_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}
/*资讯-申请上线*/
function article_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}
var html='';
$.ajax({
	type:"post",
	url:"/admin/data/article_list.php",
	async:true,
	dataType: 'json',
	beforeSend:function () {
		layer.load(2);
	},
	success:function(res){
		layer.closeAll('loading');
		//var obj = eval( '(' + res + ')' );
		console.log(res);
		var obj=res;
			for(var i in obj.post){
				html=html+'<tr class="text-c checks">'+
					'<td><input type="checkbox" value="" name=""></td>'+
					'<td>'+obj.post[i].id+'</td>'+
					'<td class="text-l"><u style="cursor:pointer" class="text-primary"  title="查看">'+obj.post[i].post_title+'</u></td>'+
					'<td>'+obj.post[i].post_type+'</td>'+
					'<td>'+obj.post[i].post_update_time+'</td>'+
					'<td class="td-status"><span class="label label-success radius">'+obj.post[i].post_status+'</span></td>'+
					'<td class="f-14 td-manage">'+
					'<a style="text-decoration:none"  href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>'+
					'<a style="text-decoration:none" class="ml-5"  href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>'+
					'<a style="text-decoration:none" class="ml-5 delete" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>'+
					'</td></tr>';
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
				data[dataObj]['post_ID']=array[i][1];
				data[dataObj]['post_title']=array[i][2];
				data[dataObj]['post_type']=array[i][3];
				data[dataObj]['post_update_time']=array[i][4];
			}
			data['num']=num;
			article_del('.check','',data);
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
			data['opt']='1';
			data['post_ID']=array[1];
			data['post_title']=array[2];
			data['post_type']=array[3];
			data['post_update_time']=array[4];
			article_del(thisDom,'',data);
		});
	}
});
















