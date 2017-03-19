<?php
  @session_start();
  @$id_num = $_POST['alt'];
  @mysql_connect('localhost','root','root') or die("数据库连接失败");
  @mysql_select_db('db_admin')or die ("数据表选择失败");
  $sql = mysql_query("select id,user,password from tb_admin where id=$id_num");
  $row = @mysql_fetch_array($sql);

  if(isset($_POST['alter'])){
    $user = @$_POST['user_name'];
    $pass = @$_POST['pass'];
    $id_num = @$_POST['id'];
    $update = "update tb_admin set user='$user',password='$pass' where id = '$id_num'";
    mysql_query($update);
    echo "<script>alert('修改成功!');location = 'update.php';</script>";
  }
 ?>

<html lang="en" class="app">
<head>
<meta charset="utf-8" />
<title>学生成绩管理系统</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/app.v2.css" type="text/css" />
<link rel="stylesheet" href="js\calendar/bootstrap_calendar.css" type="text/css" cache="false" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js" cache="false"></script> <script src="js/ie/respond.min.js" cache="false"></script> <script src="js/ie/excanvas.js" cache="false"></script> <![endif]-->
<style type="text/css">
		.id{
			display: none;
		}
	</style>
</head>
<body>
<section class="vbox">
  <header class="bg-dark dk header navbar navbar-fixed-top-xs">
    <div class="navbar-header aside-md"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="#" class="navbar-brand" data-toggle="fullscreen">STUDENT</a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a> </div>
    <ul class="nav navbar-nav hidden-xs">
      <li class="dropdown"> <a href="#" class="dropdown-toggle dker" data-toggle="dropdown"> <i class="fa fa-building-o"></i> <span class="font-bold">修改管理员信息</span> </a>
       <!--  <section class="dropdown-menu aside-xl on animated fadeInLeft no-borders lt">
          
        </section> -->
      </li>
      <!-- <li>
        <div class="m-t m-l"> <a href="price.html" class="dropdown-toggle btn btn-xs btn-primary" title="Upgrade"><i class="fa fa-long-arrow-up"></i></a> </div>
      </li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right hidden-xs nav-user">
      <!-- <li class="hidden-xs"> <a href="#" class="dropdown-toggle dk" data-toggle="dropdown"> <i class="fa fa-bell"></i> <span class="badge badge-sm up bg-danger m-l-n-sm coun">x</span> </a> -->
        <!-- <section class="dropdown-menu aside-xl">
          <section class="panel bg-white">
            <header class="panel-heading b-light bg-light"> <strong>你有 <span class="count">2</span> 条未读信息</strong> </header>
            <div class="list-group list-group-alt animated fadeInRight"> <a href="#" class="media list-group-item"> <span class="pull-left thumb-sm"> <img src="images/avatar.jpg" alt="John said" class="img-circle"> </span> <span class="media-body block m-b-none"> 你的账户存在安全风险<br>
              <small class="text-muted">10分钟之前</small> </span> </a> <a href="#" class="media list-group-item"> <span class="media-body block m-b-none"> 1.0 initial released<br>
              <small class="text-muted">1 hour ago</small> </span> </a> </div>
            <footer class="panel-footer text-sm"> <a href="#" class="pull-right"><i class="fa fa-cog"></i></a> <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a> </footer>
          </section>
        </section> -->
      <!-- </li> -->
      <li class="dropdown hidden-xs"> <a href="#" class="dropdown-toggle dker" data-toggle="dropdown"><i class="fa fa-fw fa-search"></i></a>
        <section class="dropdown-menu aside-xl animated fadeInUp">
          <section class="panel bg-white">
            <form role="search">
              <div class="form-group wrapper m-b-none">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="查找">
                  <span class="input-group-btn">
                  <button type="submit" class="btn btn-info btn-icon"><i class="fa fa-search"></i></button>
                  </span> </div>
              </div>
            </form>
          </section>
        </section>
      </li>
      <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <?php include('login/photo.php');?> </span> <?php echo @$_SESSION['user']; ?> <b class="caret"></b> </a>
        <ul class="dropdown-menu animated fadeInRight">
          <span class="arrow top"></span>
          <!-- <li> <a href="#">Settings</a> </li>
          <li> <a href="profile.html">Profile</a> </li>
          <li> <a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a> </li>
          <li> <a href="docs.html">Help</a> </li>
          <li class="divider"></li> -->
          <li> <a href="login.php">退出登录</a> </li>
        </ul>
      </li>
    </ul>
  </header>
  <section>
    <section class="hbox stretch"> <!-- .aside -->
      <aside class="bg-dark lter aside-md hidden-print" id="nav">
        <section class="vbox">
          <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333"> <!-- nav -->
              <nav class="nav-primary hidden-xs">
                <ul class="nav">
                  <li> <a href="admin_add_stu.php" class="active"> <i class="fa fa-dashboard icon"> <b class="bg-danger"></b> </i> <span>增加学生信息</span> </a> </li>
                  <li > <a href="admin_del_stu.php" > <i class="fa fa-columns icon"> <b class="bg-warning"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>删除学生信息</span> </a>
                    <ul class="nav lt">
                      <li > <a href="admin_del_stu.php" > <i class="fa fa-angle-right"></i> <span>删除学生</span> </a> </li>
                      <li > <a href="layout-r.html" > <i class="fa fa-angle-right"></i> <span>删除成绩</span> </a> </li>
                      <!-- <li > <a href="layout-h.html" > <i class="fa fa-angle-right"></i> <span>H-Layout</span> </a> </li> -->
                    </ul>
                  </li>
                  <li > <a href="admin_alt_stu.php" > <i class="fa fa-flask icon"> <b class="bg-success"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>修改学生信息</span> </a>
                    <ul class="nav lt">
                      <li > <a href="admin_alt_stu.php" > <i class="fa fa-angle-right"></i> <span>修改学生信息</span> </a> </li>
                      <!-- <li > <a href="icons.html" > <b class="badge bg-info pull-right">369</b> <i class="fa fa-angle-right"></i> <span>Icons</span> </a> </li> -->
                      <li > <a href="grid.html" > <i class="fa fa-angle-right"></i> <span>修改成绩</span> </a> </li>
                      <!-- <li > <a href="widgets.html" > <b class="badge pull-right">8</b> <i class="fa fa-angle-right"></i> <span>Widgets</span> </a> </li>
                      <li > <a href="components.html" > <i class="fa fa-angle-right"></i> <span>Components</span> </a> </li>
                      <li > <a href="list.html" > <i class="fa fa-angle-right"></i> <span>List group</span> </a> </li>
                      <li > <a href="#table" > <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> <span>Table</span> </a>
                        <ul class="nav bg">
                          <li > <a href="table-static.html" > <i class="fa fa-angle-right"></i> <span>Table static</span> </a> </li>
                          <li > <a href="table-datatable.html" > <i class="fa fa-angle-right"></i> <span>Datatable</span> </a> </li>
                          <li > <a href="table-datagrid.html" > <i class="fa fa-angle-right"></i> <span>Datagrid</span> </a> </li>
                        </ul>
                      </li>
                      <li > <a href="#form" > <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> <span>Form</span> </a>
                        <ul class="nav bg">
                          <li > <a href="form-elements.html" > <i class="fa fa-angle-right"></i> <span>Form elements</span> </a> </li>
                          <li > <a href="form-validation.html" > <i class="fa fa-angle-right"></i> <span>Form validation</span> </a> </li>
                          <li > <a href="form-wizard.html" > <i class="fa fa-angle-right"></i> <span>Form wizard</span> </a> </li>
                        </ul>
                      </li>
                      <li > <a href="chart.html" > <i class="fa fa-angle-right"></i> <span>Chart</span> </a> </li>
                      <li > <a href="fullcalendar.html" > <i class="fa fa-angle-right"></i> <span>Fullcalendar</span> </a> </li>
                      <li > <a href="portlet.html" > <i class="fa fa-angle-right"></i> <span>Portlet</span> </a> </li>
                      <li > <a href="timeline.html" > <i class="fa fa-angle-right"></i> <span>Timeline</span> </a> </li> -->
                    </ul>
                  </li>
                 <!--  <li > <a href="#pages" > <i class="fa fa-file-text icon"> <b class="bg-primary"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>查找学生信息</span> </a>
                    <ul class="nav lt">
                      <li > <a href="gallery.html" > <i class="fa fa-angle-right"></i> <span>查找学生</span> </a> </li>
                      <li > <a href="profile.html" > <i class="fa fa-angle-right"></i> <span>查找成绩</span> </a> </li> -->
                      <!-- <li > <a href="invoice.html" > <i class="fa fa-angle-right"></i> <span>Invoice</span> </a> </li>
                      <li > <a href="intro.html" > <i class="fa fa-angle-right"></i> <span>Intro</span> </a> </li>
                      <li > <a href="master.html" > <i class="fa fa-angle-right"></i> <span>Master</span> </a> </li>
                      <li > <a href="gmap.html" > <i class="fa fa-angle-right"></i> <span>Google Map</span> </a> </li>
                      <li > <a href="signin.html" > <i class="fa fa-angle-right"></i> <span>Signin</span> </a> </li>
                      <li > <a href="signup.html" > <i class="fa fa-angle-right"></i> <span>Signup</span> </a> </li>
                      <li > <a href="404.html" > <i class="fa fa-angle-right"></i> <span>404</span> </a> </li> -->
                    <!-- </ul>
                  </li> -->
                  <li > <a href="admin_add_admin.php" ><!--  <b class="badge bg-danger pull-right">3</b>  --><i class="fa fa-envelope-o icon"> <b class="bg-primary dker"></b> </i> <span>增加管理员</span> </a> </li>
                  <!-- <li > <a href="notebook.html" > <i class="fa fa-pencil icon"> <b class="bg-info"></b> </i> <span>修改权限</span> </a> </li> -->
                  <li > <a href="update.php" > <i class="fa fa-pencil icon"> <b class="bg-primary"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>修改权限</span> </a>
                    <!-- <ul class="nav lt"> -->
                      <!-- <li > <a href="gallery.html" > <i class="fa fa-angle-right"></i> <span>修改密码</span> </a> </li> -->
                      <!-- <li > <a href="profile.html" > <i class="fa fa-angle-right"></i> <span>删除管理员</span> </a> </li> -->
                      <!-- <li > <a href="invoice.html" > <i class="fa fa-angle-right"></i> <span>Invoice</span> </a> </li>
                      <li > <a href="intro.html" > <i class="fa fa-angle-right"></i> <span>Intro</span> </a> </li>
                      <li > <a href="master.html" > <i class="fa fa-angle-right"></i> <span>Master</span> </a> </li>
                      <li > <a href="gmap.html" > <i class="fa fa-angle-right"></i> <span>Google Map</span> </a> </li>
                      <li > <a href="signin.html" > <i class="fa fa-angle-right"></i> <span>Signin</span> </a> </li>
                      <li > <a href="signup.html" > <i class="fa fa-angle-right"></i> <span>Signup</span> </a> </li>
                      <li > <a href="404.html" > <i class="fa fa-angle-right"></i> <span>404</span> </a> </li> -->
                    <!-- </ul> -->
                  </li>
                </ul>
              </nav>
              <!-- / nav --> </div>
          </section>
          <footer class="footer lt hidden-xs b-t b-dark">
            <div id="chat" class="dropup">
              <section class="dropdown-menu on aside-md m-l-n">
                <section class="panel bg-white">
                  <header class="panel-heading b-b b-light">Active chats</header>
                  <div class="panel-body animated fadeInRight">
                    <p class="text-sm">No active chats.</p>
                    <p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p>
                  </div>
                </section>
              </section>
            </div>
            <div id="invite" class="dropup">
              <section class="dropdown-menu on aside-md m-l-n">
                <section class="panel bg-white">
                  <header class="panel-heading b-b b-light"> John <i class="fa fa-circle text-success"></i> </header>
                  <div class="panel-body animated fadeInRight">
                    <p class="text-sm">No contacts in your lists.</p>
                    <p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite from Facebook</a></p>
                  </div>
                </section>
              </section>
            </div>
            <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon"> <i class="fa fa-angle-left text"></i> <i class="fa fa-angle-right text-active"></i> </a>
            <div class="btn-group hidden-nav-xs">
              <button type="button" title="Chats" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#chat"><i class="fa fa-comment-o"></i></button>
              <button type="button" title="Contacts" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#invite"><i class="fa fa-facebook"></i></button>
            </div>
          </footer>
        </section>
      </aside>
      <!-- /.aside -->
      <section id="content">
        <section class="vbox">
          <section class="scrollable padder">
            <form method="post" action="d_alter.php" style="margin-top:10px;">
      				<input type="text" name="user_name" value="<?php echo $row['user']; ?>">
      				<input type="text" name="pass" value="<?php echo $row['password']; ?>">
      				<input type="submit" name="alter" value="修改">
              <?php $num = $row['id']?>
      				<input type="text" class='id' name="id" value="<?php echo $num;?>">
			       </form>
          </section>
        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
      <aside class="bg-light lter b-l aside-md hide" id="notes">
        <div class="wrapper">Notification</div>
      </aside>
    </section>
  </section>
</section>
<script src="js/app.v2.js"></script> <!-- Bootstrap --> <!-- App --> <script src="js/charts/easypiechart/jquery.easy-pie-chart.js" cache="false"></script> <script src="js/charts/sparkline/jquery.sparkline.min.js" cache="false"></script> <script src="js/charts/flot/jquery.flot.min.js" cache="false"></script> <script src="js/charts/flot/jquery.flot.tooltip.min.js" cache="false"></script> <script src="js/charts/flot/jquery.flot.resize.js" cache="false"></script> <script src="js/charts/flot/jquery.flot.grow.js" cache="false"></script> <script src="js/charts/flot/demo.js" cache="false"></script> <script src="js/calendar/bootstrap_calendar.js" cache="false"></script> <script src="js/calendar/demo.js" cache="false"></script> <script src="js/sortable/jquery.sortable.js" cache="false"></script>
</body>
</html>

