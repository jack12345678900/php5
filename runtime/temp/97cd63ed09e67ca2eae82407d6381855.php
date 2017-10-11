<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"C:\phpStudy\WWW\php5\public/../application/home/view/default/service\ajaxpage.html";i:1507708328;}*/ ?>
<?php if(empty($service) || (($service instanceof \think\Collection || $service instanceof \think\Paginator ) && $service->isEmpty())): ?>
<h1 style="color: red">没有更多数据了</h1>
<?php else: if(is_array($service) || $service instanceof \think\Collection || $service instanceof \think\Paginator): $i = 0; $__LIST__ = $service;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$service): $mod = ($i % 2 );++$i;?>

    <div class="row noticeList">
        <a href="<?php echo url('service_detail?id='.$service['id']); ?>">
            <div class="col-xs-2">
                <img class="noticeImg" src="<?php echo $service['logo']; ?>" />
            </div>
            <div class="col-xs-10">
                <p class="title"><?php echo $service['title']; ?></p>
                <p class="description"><?php echo $service['description']; ?></p>
                <p class="view">浏览: <?php echo $service['view']; ?> <span class="pull-right"><?php echo date("Y-m-d H:i:s",$service['create_time']); ?></span> </p>
            </div>
        </a>
    </div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<button class="btn btn-default btn-block btn_load" onclick="loadpage(<?php echo $num; ?>)">获取更多</button>
<?php endif; ?>
