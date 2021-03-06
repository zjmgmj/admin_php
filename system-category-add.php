<?php include "headerCss.php"?>

<title>栏目设置</title>
</head>
<body>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-category-add">
		<div id="tab-category" class="HuiTab">
			<div class="tabBar cl">
				<span>基本设置</span>
				<span>模版设置</span>
				<span>SEO</span>
			</div>
			<div class="tabCon">
				<!--<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">栏目ID：</label>
					<div class="formControls col-xs-8 col-sm-9"><span id="ColumnId">11230</span></div>
				</div>-->
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						上级栏目：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" id="sel_Sub" name="sel_Sub" <!--onchange="SetSubID(this);"-->>
						</select>
						</span>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						分类名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="CategoryName" class="input-text" value="" placeholder="" id="" name="">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">别名：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="Alias" class="input-text" value="" placeholder="" id="" name="">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">目录：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="Catalog" class="input-text" value="" placeholder="" id="" name="">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">内容类型：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select name="" class="select" id="ContentType">
							<option value="文章">文章</option>
							<option value="图片">图片</option>
							<option value="商品">商品</option>
							<option value="视频">视频</option>
							<option value="专题">专题</option>
							<option value="链接">链接</option>
						</select>
						</span>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">是否生成静态html：</label>
					<div class="formControls col-xs-8 col-sm-9 skin-minimal">
						<div class="check-box">
							<input type="checkbox" id="checkbox-pinglun">
							<label for="checkbox-pinglun">&nbsp;</label>
						</div>
					</div>
					<div class="col-3">
					</div>
				</div>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">首页模版：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" style="width:200px;">
						<input type="button" class="btn btn-default" value="浏览">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">列表页模版：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" style="width:200px;">
						<input type="button" class="btn btn-default" value="浏览">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">详情页模版：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" style="width:200px;">
						<input type="button" class="btn btn-default" value="浏览">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">详细页存储规则：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" id="" name="">
							<option value="1">按年度划子目录</option>
							<option value="2">按年/月划分子目录</option>
							<option value="3">按年/月/日划分子目录</option>
						</select>
						</span>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">每页显示多少条：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="20" style="width:200px;">
					</div>
					<div class="col-3">
					</div>
				</div>
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">首页文件名：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="index.html" style="width:200px;">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">关键词：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">描述：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,100)"></textarea>
						<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
					</div>
					<div class="col-3">
					</div>
				</div>
			</div>
		</div>
		<div class="row cl">
			<div class="col-9 col-offset-3">
				<input class="btn btn-primary radius" id="submit" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>
<?php include "publicJs.php"?>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>

<script type="text/javascript" src="js/system-category-add.js"></script>
<!--/请在上方写此页面业务相关的脚本-->
