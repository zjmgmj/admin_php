$('#search').on('click', function() {
	var data = {};
	var html='';
	data['type'] = $('#searchType').val();
	data['timeStart'] = $('#logmin').val()+' 00:00:00';
	data['timeEnd'] = $('#logmax').val()+' 23:59:59';
	data['searchTitle'] = $('#searchTitle').val();
	$.ajax({
		type: "post",
		url: "/admin/data/search.php",
		data: data,
		success: function(res) {
			var obj = eval('(' + res + ')');
			for(var i in obj.post) {
				html = html + '<tr class="text-c">' +
					'<td><input type="checkbox" value="" name=""></td>' +
					'<td>' + obj.post[i].id + '</td>' +
					'<td class="text-l"><u style="cursor:pointer" class="text-primary"  title="查看">' + obj.post[i].post_title + '</u></td>' +
					'<td>' + obj.post[i].post_type + '</td>' +
					'<td>' + obj.post[i].post_time + '</td>' +
					'<td class="td-status"><span class="label label-success radius">' + obj.post[i].post_status + '</span></td>' +
					'<td class="f-14 td-manage">' +
					'<a style="text-decoration:none"  href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>' +
					'<a style="text-decoration:none" class="ml-5"  href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>' +
					'<a style="text-decoration:none" class="ml-5"  href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>' +
					'</td></tr>';
			}
			$('#content').html(html);
		}
	});
});