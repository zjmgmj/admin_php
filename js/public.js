var windHeight = window.screen.height;
window.addEventListener('load', function() {
	if($('.mask')) {
		$('.mask').height(windHeight);
	}

});

var Load = {
	loadShow: function() {
		//var loadHtml = '<img src="img/ajax-loaders/ajax-loader-7.gif"/>'
		$('#load').show();
	},
	loadHide: function() {
		$('#load').hide();
	}
}

var errMsg=function(msg){
	$(".errMsg").show().text(msg);
}



$(function(){
	/*$("#min_title_list li").contextMenu('Huiadminmenu', {
		bindings: {
			'closethis': function(t) {
				console.log(t);
				if(t.find("i")){
					t.find("i").trigger("click");
				}		
			},
			'closeall': function(t) {
				alert('Trigger was '+t.id+'\nAction was Email');
			},
		}
	});*/
});
/*个人信息*/
function myselfinfo(){
	layer.open({
		type: 1,
		area: ['300px','200px'],
		fix: false, //不固定
		maxmin: true,
		shade:0.4,
		title: '查看信息',
		content: '<div>管理员信息</div>'
	});
}
$('#myselfinfo').on('click',function(){
	myselfinfo();
});
/*资讯-添加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
$('#article_add').on('click',function(){
	article_add('添加资讯','article-add.php');
});
/*图片-添加*/
function picture_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
$('#picture_add').on('click',function(){
	article_add('添加资讯','picture-add.php');
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
$('#product_add').on('click',function(){
	article_add('添加资讯','product-add.php');
});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
$('#member_add').on('click',function(){
	article_add('添加资讯','member-add.php');
});





