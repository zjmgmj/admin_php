﻿
<?php include 'header.php' ?>
<?php include 'leftNav.php' ?>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="我的桌面" data-href="welcome.php">我的桌面</span>
					<em></em>
				</li>
		    </ul>
		</div>
		<div class="Hui-tabNav-more btn-group">
			<a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;">
				<i class="Hui-iconfont">&#xe6d4;</i>
			</a>
			<a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;">
				<i class="Hui-iconfont">&#xe6d7;</i>
			</a>
		</div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<?php include 'welcome.php'?>
		</div>
	</div>

</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
	</ul>
</div>
<?php include "publicJs.php"?>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>

<script src="js/public.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>