<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title><?php echo C('sitename');?>-管理后台</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- bootstrap -->
    <link href="<?php echo ($Theme['P']['root']); ?>/bootadmin/css/bootstrap/bootstrap.css" rel="stylesheet" />
       <link href="<?php echo ($Theme['P']['root']); ?>/bootadmin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?php echo ($Theme['P']['root']); ?>/bootadmin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
    <!-- libraries -->
    <link href="<?php echo ($Theme['P']['root']); ?>/bootadmin/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo ($Theme['P']['root']); ?>/bootadmin/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ($Theme['P']['root']); ?>/bootadmin/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ($Theme['P']['root']); ?>/bootadmin/css/icons.css" />


    <!-- open sans font -->
      <link href='<?php echo ($Theme['P']['root']); ?>/font/italic.css' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

   
<!-- libraries -->
<link href="<?php echo ($Theme['P']['root']); ?>/bootadmin/css/compiled/tables.css" type="text/css" rel="stylesheet"  />
<link  href="<?php echo ($Theme['P']['root']); ?>/kindeditor/themes/default/default.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo ($Theme['P']['root']); ?>/bootadmin/css/compiled/form-showcase.css" type="text/css" media="screen" />
<link href="<?php echo ($Theme['P']['root']); ?>/bootadmin/css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
<link href="<?php echo ($Theme['P']['root']); ?>/bootadmin/css/lib/select2.css" type="text/css" rel="stylesheet" />
<body>
    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="brand" href="<?php echo U('index');?>" style=" padding-top:20px;"><img src="<?php echo ($Theme['P']['img']); ?>/wifilogo-mini.png" /></a>
            

            <ul class="nav pull-right">                
               
                <li class=" hidden-phone">
                    	<a href="javascript:void(0);">登录帐号:(<?php echo (session('adminmame')); ?>)</a>
                </li>
                 <li class=" hidden-phone">
                    	<a href="<?php echo U('Index/pwd');?>">修改密码</a>
                </li>
                <li class="settings hidden-phone">
                    <a href="<?php echo U('login/loginout');?>" role="button">
                        <i class="icon-share-alt"></i>
                    </a>
                </li>
            </ul>            
        </div>
    </div>
    <!-- end navbar -->
    <div class="footerbar" style="width:100%; line-height:20px; font-size:10px; background-color:#F7F7F7; position:absolute; left:0; bottom:-40px;; z-index:999; text-align:center;">厦门思可达信息科技有限公司 提供技术支持</div>
<!-- sidebar -->

<div id="sidebar-nav" style="padding-top:0;">
<ul id="dashboard-menu">
<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['pid'] == 1): if(in_array($vo['id'],$navids)): if($vo['single'] == 1): if((strtolower($nownav['m']) == strtolower($vo['m']) ) && strtolower($nownav['a']) == strtolower($vo['a'])): ?><li class="active">
    <div class="pointer">
      <div class="arrow"></div>
      <div class="arrow_border"></div>
    </div>
    <?php else: ?>
  <li><?php endif; ?>
<a href="<?php echo U(''.$vo['m'].'/'.$vo['a'].'');?>"  > <i class="<?php echo ($vo["ico"]); ?>"></i> <span><?php echo ($vo["title"]); ?></span> </a>
</li>
<?php else: ?>
<?php if($nownav['a'] == $vo['id']): ?><li class="active">
    <div class="pointer">
      <div class="arrow"></div>
      <div class="arrow_border"></div>
    </div>
    <?php else: ?>
  <li><?php endif; ?>
<a class="dropdown-toggle" href="#" > <i class="<?php echo ($vo["ico"]); ?>"></i> <span><?php echo ($vo["title"]); ?></span> <i class="icon-chevron-down"></i> </a>
<?php if($nownav['a'] == $vo['id']): ?><ul class="active submenu">
  <?php else: ?>
  <ul class="submenu"><?php endif; ?>
    <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sonnode): $mod = ($i % 2 );++$i; if($sonnode['pid'] == $vo['id']): if(in_array($sonnode['id'],$navids)): ?><li> <a href="<?php echo U(''.$sonnode['m'].'/'.$sonnode['a'].'');?>"><?php echo ($sonnode['title']); ?></a> </li><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
  </ul>
  </li><?php endif; endif; endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
<!-- end sidebar --> 


<form name="doad" action="__URL__/index" method="post" enctype="multpart/form-data" id="search_form">
    <!-- main container -->
    <div class="content" style="height: 100%;">
        <div id="pad-wrapper">
                <h4>
                   推送广告记录 <small></small>
                </h4>
        </div>
        <div id="pad-wrapper">
            <!-- orders table -->
            <div class="table-wrapper orders-table section">
                <div class="">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <!-- <th class="col-md-2"> <span class="line"></span> ap名称 </th>
                            <th class="col-md-2"> <span class="line"></span> 热点名称 </th>
                            <th class="col-md-2"> <span class="line"></span> 区域 </th>
                            <th class="col-md-2"> <span class="line"></span> 行业 </th>
                            <th class="col-md-2"> <span class="line"></span> APMAC </th>
                            <th class="col-md-2"> <span class="line"></span> AP坐标 </th> -->
                            <th class="col-md-2"> <span class="line"></span> 推送广告时间</th>
                            <th class="col-md-2"> <span class="line"></span> 推送广告位置</th>
                            <th class="col-md-2"> <span class="line"></span> 推送区域</th>
                            <th class="col-md-2"> <span class="line"></span> 推送行业</th>
                            <th class="col-md-2"> <span class="line"></span> 推送广告名称</th>
                            <th class="col-md-2"> <span class="line"></span> 操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- <td><?php echo ($vo['routename']); ?></td>
                            <td><?php echo ($vo['shopname']); ?></td>
                            <td><?php echo ($vo['area']); ?></td>
                            <td><?php echo ($vo['trade']); ?></td>
                            <td><?php echo ($vo['gw_id']); ?></td>
                            <td><?php echo ($vo['lat']); ?>,<?php echo ($vo['lng']); ?></td> -->
                            <td><?php echo (date('Y-m-d H:i:s',$vo['times'])); ?></td>
                            <td><?php echo ($vo['ad_pos']); ?></td>
                            <td><?php echo ($vo['area']); ?></td>
                            <td><?php echo ($vo['trade']); ?></td>
                            <td><?php echo ($vo['title']); ?></td>
                            <td><a href="<?php echo U('xx',array('time'=>$vo['times']));?>">查看详细</a></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div class="pagination pull-right"> <?php echo ($page); ?> </div>
                </div>
            </div>
            <!-- end orders table -->
        </div>
    </div>
</form>

<!-- scripts -->
<script src="<?php echo ($Theme['P']['js']); ?>/jquery.js"></script>
<script src="<?php echo ($Theme['P']['root']); ?>/bootadmin/js/bootstrap.min.js"></script>
<script src="<?php echo ($Theme['P']['root']); ?>/bootadmin/js/theme.js"></script>
<script src="<?php echo ($Theme['P']['root']); ?>/bootadmin/js/jquery.uniform.min.js"></script>
<script src="<?php echo ($Theme['P']['root']); ?>/bootadmin/js/common.js"></script>
<script src="<?php echo ($Theme['P']['root']); ?>/kindeditor/kindeditor-min.js" type="text/javascript"></script>
<script src="<?php echo ($Theme['P']['root']); ?>/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="<?php echo ($Theme['P']['root']); ?>/bootadmin/js/bootstrap.datepicker.js"></script>
<script src="<?php echo ($Theme['P']['js']); ?>/region_select.js"></script>
</body>
</html>