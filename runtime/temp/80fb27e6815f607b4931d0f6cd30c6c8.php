<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"C:\phpStudy\WWW\php5\public/../application/home/view/default/notice\ajaxpage.html";i:1507707169;}*/ ?>
<?php if(empty($notice) || (($notice instanceof \think\Collection || $notice instanceof \think\Paginator ) && $notice->isEmpty())): ?>
没有更多数据了
<?php else: if(is_array($notice) || $notice instanceof \think\Collection || $notice instanceof \think\Paginator): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$notice): $mod = ($i % 2 );++$i;?>
<div class="row noticeList">
    <a href="<?php echo url('notice_detail?id='.$notice['id']); ?>">
        <div class="col-xs-2">
            <img class="noticeImg" src="<?php echo $notice['logo']; ?>" />
        </div>
        <div class="col-xs-10">
            <p class="title"><?php echo $notice['title']; ?></p>
            <p class="description"><?php echo $notice['description']; ?></p>
            <p class="view">浏览: <?php echo $notice['view']; ?> <span class="pull-right"><?php echo date("Y-m-d H:i:s",$notice['create_time']); ?></span> </p>
        </div>
    </a>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<button class="btn btn-default btn-block btn_load" onclick="loadpage(<?php echo $num; ?>)">获取更多</button>
<?php endif; ?>
