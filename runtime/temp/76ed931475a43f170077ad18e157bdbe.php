<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"C:\phpStudy\WWW\php5\public/../application/admin/view/default/zushou\edit.html";i:1507547050;s:78:"C:\phpStudy\WWW\php5\public/../application/admin/view/default/public\base.html";i:1496373782;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $meta_title; ?>|TwoThink管理平台</title>
    <link href="__ROOT__/public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/<?php echo \think\Config::get('color_style'); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="__PUBLIC__/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="__PUBLIC__/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/admin/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__['main']) || $__MENU__['main'] instanceof \think\Collection || $__MENU__['main'] instanceof \think\Paginator): $i = 0; $__LIST__ = $__MENU__['main'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                <li class="<?php echo (isset($menu['class']) && ($menu['class'] !== '')?$menu['class']:''); ?>"><a href="<?php echo url($menu['url']); ?>"><?php echo $menu['title']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username'); ?>"><?php echo session('user_auth.username'); ?></em></li>
                <li><a  onclick="go_home();">前台首页</a></li>
                <li><a href="<?php echo url('User/updatePassword'); ?>">修改密码</a></li>
                <li><a href="<?php echo url('User/updateNickname'); ?>">修改昵称</a></li>
                <li><a href="<?php echo url('Admin/delcache'); ?>">更新缓存</a></li>
                <li><a href="<?php echo url('Publics/logout'); ?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!(empty($_extra_menu) || (($_extra_menu instanceof \think\Collection || $_extra_menu instanceof \think\Paginator ) && $_extra_menu->isEmpty()))): ?>
                    
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; if(is_array($__MENU__['child']) || $__MENU__['child'] instanceof \think\Collection || $__MENU__['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $__MENU__['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?>
                    <!-- 子导航 -->
                    <?php if(!(empty($sub_menu) || (($sub_menu instanceof \think\Collection || $sub_menu instanceof \think\Paginator ) && $sub_menu->isEmpty()))): if(!(empty($key) || (($key instanceof \think\Collection || $key instanceof \think\Paginator ) && $key->isEmpty()))): ?><h3><i class="icon icon-unfold"></i><?php echo $key; ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu) || $sub_menu instanceof \think\Collection || $sub_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <a class="item" href="<?php echo url($menu['url']); ?>"><?php echo $menu['title']; ?></a>
                                </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    <?php endif; ?>
                    <!-- /子导航 -->
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!(empty($_show_nav) || (($_show_nav instanceof \think\Collection || $_show_nav instanceof \think\Paginator ) && $_show_nav->isEmpty()))): ?>
            <div class="breadcrumb">
                <span>您的位置:</span>
                <assign name="i" value="1" />
                <?php if(is_array($_nav) || $_nav instanceof \think\Collection || $_nav instanceof \think\Paginator): if( count($_nav)==0 ) : echo "" ;else: foreach($_nav as $k=>$v): if($i == count($_nav)): ?>
                    <span><?php echo $v; ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo $k; ?>"><?php echo $v; ?></a>&gt;</span>
                    <?php endif; ?>
                    <assign name="i" value="$i+1" />
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <?php endif; ?>
            <!-- nav -->
            

            
<script type="text/javascript" src="/static/static/uploadify/jquery.uploadify.min.js"></script>

<div class="main-title">
    <h2><?php echo isset($info['id'])?'编辑':'新增'; ?>房屋租售</h2>
</div>
<form action="<?php echo url(); ?>" method="post" class="form-horizontal">
    <div class="form-item">
        <label class="item-label">标题<span class="check-tips">（标题）</span></label>
        <div class="controls">
            <input type="text" class="text input-large" name="title" value="<?php echo (isset($info['title']) && ($info['title'] !== '')?$info['title']:''); ?>">
        </div>
    </div>
    <div class="form-item">
        <label class="item-label">类型<span class="check-tips">（类型）</span></label>
        <div class="controls">
            <select style="width: 200px;" name="form" >
                <option value="1" <?php if($info[form]==1) echo("selected");?>>出租</option>
                <option value="0" <?php if($info[form]==0) echo("selected");?>>出售</option>
            </select>

        </div>
    </div>
    <!--<div class="form-item">-->
    <!--<label class="item-label">模块<span class="check-tips">（所属模块）</span></label>-->
    <!--<div class="controls">-->
    <!--<input type="text" class="text input-large" name="module" value="<?php echo (isset($info['module']) && ($info['module'] !== '')?$info['module']:'admin'); ?>">-->
    <!--</div>-->
    <!--</div>-->
    <div class="form-item">
        <label class="item-label">价格<span class="check-tips">（价格）</span></label>
        <div class="controls">
            <input type="text" class="text input-large" name="price1" value="<?php echo (isset($info['price1']) && ($info['price1'] !== '')?$info['price1']:''); ?>">
            &nbsp;单位
            <select class="form-control" name="price2">
                <option>万元</option>
                <option>元/月</option>
            </select>
        </div>
    </div>
    <div class="form-item">
        <label class="item-label">结束时间<span class="check-tips">（社区服务结束时间）</span></label>
        <div class="controls">
            <input type="date" class="text input-large" name="update_time" value="<?php echo (isset($info['update_time']) && ($info['update_time'] !== '')?$info['update_time']:''); ?>">
        </div>
    </div>

    <!--//上传图片-->
    <div class="controls">
        <input type="file" id="upload_picture_path">
        <input type="hidden" name="logo" id="cover_id_path" value="<?php echo (isset($info['logo']) && ($info['logo'] !== '')?$info['logo']:''); ?>"/>
        <div class="upload-img-box">
        </div>
    </div>

    <script type="text/javascript">
        //上传图片
        /* 初始化上传插件 */
        var path=$('#cover_id_path').val();
        if(path){
            $("#cover_id_path").parent().find('.upload-img-box').html(
                '<div class="upload-pre-item"><img src="' + path + '"/></div>'
            );
        }
        //			alert(path);
        $("#upload_picture_path").uploadify({
            "height": 30,
            "swf": "__PUBLIC__/static/uploadify/uploadify.swf",
            "fileObjName": "download",
            "buttonText": "上传图片",
            "uploader": "<?php echo url('File/uploadPicture',array('session_id'=>session_id())); ?>",
            "width": 120,
            'removeTimeout': 1,
            'fileTypeExts': '*.jpg; *.png; *.gif;',
            "onUploadSuccess": uploadPicturepath,
            'onFallback': function () {
                alert('未检测到兼容版本的Flash.');
            }
        });
        function uploadPicturepath(file, data) {
            var data = $.parseJSON(data);
            var src = '';
            if (data.status) {
                $("#cover_id_path").val(data.path);
                src = data.url || '' + data.path
                $("#cover_id_path").parent().find('.upload-img-box').html(
                    '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                );

            } else {
                updateAlert(data.info);
                setTimeout(function () {
                    $('#top-alert').find('button').click();
                    $(that).removeClass('disabled').prop('disabled', false);
                }, 1500);
            }
        }
    </script>
    <!--<img src="<?php echo (isset($info['path']) && ($info['path'] !== '')?$info['path']:''); ?>" style="width: 120px"/>-->

    <div class="form-item">
        <input type="hidden" name="" value="0">
        <link rel="stylesheet" href="/static/static/kindeditor/default/default.css">
        <script charset="utf-8" src="/static/static/kindeditor/kindeditor-min.js"></script>
        <script charset="utf-8" src="/static/static/kindeditor/zh_CN.js"></script>


        </label>
    </div>
    <div class="form-item">
        <label class="item-label">内容<span class="check-tips">（内容详情）</span></label>
        <textarea name="content" rows="8" cols="50"><?php echo (isset($info['content']) && ($info['content'] !== '')?$info['content']:''); ?></textarea>
        <?php echo hook('adminArticleEdit', array('name'=>'content','value'=>$info['content'])); ?>
    </div>
    <div class="form-item">
        <label class="item-label">简单描述<span class="check-tips">（描述）</span></label>
        <textarea name="intro" rows="8" cols="50"><?php echo (isset($info['inreo']) && ($info['inreo'] !== '')?$info['inreo']:''); ?></textarea>
    </div>
    <div class="form-item">
        <label class="item-label">电话<span class="check-tips">（常用联系电话）</span></label>
        <div class="controls">
            <input type="text" class="text input-large" name="tel" value="<?php echo (isset($info['tel']) && ($info['tel'] !== '')?$info['tel']:''); ?>">
        </div>
    </div>

    <div class="form-item">
        <input type="hidden" name="id" value="<?php echo (isset($info['id']) && ($info['id'] !== '')?$info['id']:''); ?>">
        <button class="btn submit-btn ajax-posts" id="submit" type="submit" target-form="form-horizontal">确 定</button>
        <button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
    </div>
</form>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.twothink.cn" target="_blank">TwoThink</a>管理平台</div>
                <div class="fr">V<?php echo TWOTHINK_VERSION; ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "__ROOT__", //当前网站地址
            "APP"    : "__APP__", //当前项目地址
            "PUBLIC" : "__PUBLIC__", //项目公共目录地址
            "DEEP"   : "<?php echo config('pathinfo_depr'); ?>", //PATHINFO分割符
            "MODEL"  : ["3", "<?php echo config('url_convert'); ?>", "<?php echo config('url_html_suffix'); ?>"],//config('URL_MODEL')
            "VAR"    : ["<?php echo config('var_module'); ?>", "<?php echo config('var_controller'); ?>", "<?php echo config('var_action'); ?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="__PUBLIC__/static/think.js"></script>
    <script type="text/javascript" src="__PUBLIC__/admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
        function go_home() {
          window.open("<?php echo url('/'); ?>");
        }
    </script>
    
<script type="text/javascript">
    Think.setValue("pid", <?php echo (isset($info['pid']) && ($info['pid'] !== '')?$info['pid']: 0); ?>);
    Think.setValue("hide", <?php echo (isset($info['hide']) && ($info['hide'] !== '')?$info['hide']: 0); ?>);
    Think.setValue("is_dev", <?php echo (isset($info['is_dev']) && ($info['is_dev'] !== '')?$info['is_dev']: 0); ?>);
    //导航高亮
    highlight_subnav('<?php echo url('index'); ?>');
</script>

</body>
</html>
