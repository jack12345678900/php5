<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"C:\phpStudy\WWW\php5\public/../application/home/view/default/life\ajaxpage.html";i:1507708775;}*/ ?>
<?php if(empty($life) || (($life instanceof \think\Collection || $life instanceof \think\Paginator ) && $life->isEmpty())): ?>
<h1 style="color: red">没有更多数据了</h1>
<?php else: if(is_array($life) || $life instanceof \think\Collection || $life instanceof \think\Paginator): $i = 0; $__LIST__ = $life;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$life): $mod = ($i % 2 );++$i;?>

<div class="row noticeList">
    <a href="<?php echo url('life_detail?id='.$life['id']); ?>">
        <div class="col-xs-2">
            <img class="noticeImg" src="<?php echo $life['logo']; ?>" />
        </div>
        <div class="col-xs-10">
            <p class="title"><?php echo $life['title']; ?></p>
            <p class="description"><?php echo $life['description']; ?></p>
            <p class="view">浏览: <?php echo $life['view']; ?> <span class="pull-right"><?php echo date("Y-m-d H:i:s",$life['create_time']); ?></span> </p>
        </div>
    </a>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<button class="btn btn-default btn-block btn_load" onclick="loadpage(<?php echo $num; ?>)">获取更多</button>
<?php endif; ?>
