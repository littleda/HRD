
<!DOCTYPE html>
<html lang="th">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="images/icon.ico">
        <style>
            .blink-text {text-decoration:blink} 
        </style>
        <title>ระบบบันทึกการประชุม/อบรม/สัมมนา ภายนอก โรงพยาบาลพังงา</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap theme -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-theme.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/theme.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body role="document">

        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">                
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">

                        <li class="active"><a href="index.php">หน้าหลัก</a></li>
                        <?php
                        if ((!empty(Yii::app()->session["member_user_login"])) && (Yii::app()->session["user_type_login"] == 'ADMINISTRATOR')) {
                            ?> 
                            <li><a href="index.php?r=save/Index">บันทึกข้อมูล</a></li>
                            <li><a href="index.php?r=save/View">แก้ไขข้อมูล</a></li>  
                            <?php
                        }
                        if ((!empty(Yii::app()->session["member_user_login"]))) {
                            ?>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ออกรายงาน <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="index.php?r=report/PersonView">ตามบุคคล</a></li>
                                    <li><a href="index.php?r=report/WorkgroupView
                                           ">ตามกลุ่มงาน</a></li>
                                    <li><a href="index.php?r=report/TraintypeView">ตามประเภทการอบรม/ประชุม/สัมนา</a></li>
                                    <li><a href="index.php?r=report/DateView">ตามช่วงเวลา</a></li>                                
                                </ul>
                            </li> 

                            <?php
                        }
                        if ((!empty(Yii::app()->session["member_user_login"])) && (Yii::app()->session["user_type_login"] == 'ADMINISTRATOR')) {
                            ?>   
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">จัดการ <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="index.php?r=user/Adduser">ผู้ใช้</a></li>
                                    <li><a href="index.php?r=emp/View">บุคลากร</a></li>                                                             
                                </ul>
                            </li> 
                            <?php
                        }
                        ?>
                        <!--                        <li class="active"><a href="#">คู่มือ</a></li>-->
                    </ul> 
                    <!--                    <form class="navbar-form navbar-right">
                                            <div class="form-group">
                                                <input type="text" placeholder="Username" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" placeholder="Password" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-success">Sign in</button>
                                        </form>-->
                                  <!--            <p><button type="button" class="btn btn-success">เข้าสู่ระบบ</button></p>-->
                    <div class="navbar-form navbar-right">
                        <?php
                        if (empty(Yii::app()->session["member_user_login"])) {
                            ?> 
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/user/Login" class="btn btn-success">Sign In</a>
                            <?php
                        } else {
                            $attributes = array();
                            $attributes ["usernames"] = Yii::app()->session["member_user_login"];
                            $models = UserModels::model()->findByAttributes($attributes);
                            ?>
                            <a onclick="javascript:return confirm('ต้องการแก้ไขข้อมูลผู้ใช้?')"href="index.php?r=user/Update&id=<?php echo $models->id; ?>"> <p class="btn btn-warning">
                                    <img src="images/admin.png" width="20">
                                    <?php echo Yii::app()->session["member_fullname"] ?>
                                </p></a> <!-- สร้างปุ่มชื่อนามสกุล เมื่อ login -->
                            <a onclick="javascript:return confirm('ต้องการออกจากโปรแกรม?')"href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=/user/Logout"  class="btn btn-danger">Log out</a>
                            <?php
                        }
                        ?>
                    </div>    

                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="page-header">       

            <div class="container theme-showcase" role="main">
                <?php
                echo $content;
                ?>
                <!-- Main jumbotron for a primary marketing message or call to action -->
                <!--            <div class="jumbotron">
                                <h1>Theme example</h1>
                                <p>This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point to create something more unique by building on or modifying it.</p>
                            </div>-->

            </div> <!-- /container -->
        </div>
        <footer class="bs-docs-footer" role="contentinfo">
            <center>
                <p>Copyright ©2015. All rights reserved. | Design by YY.Chanida</p>                
                <p>Contact information: Comcenter Tel.3007</p>
                <p>Currently V.1.2</p>
            </center>                

        </footer>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/docs.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ie10-viewport-bug-workaround.js"></script>
    </body>

</html>
