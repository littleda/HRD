<div class="panel panel-primary">
    <div class="panel-heading">USER LOGIN</div>
    <div class="panel-body">

        <div class="jumbotron">
            <div class="container">



                <div class="form-signin" >
                    <?php echo CHtml::form(array("user/Check")); ?>
                    <div class="form-group has-success col-lg-12">

                        <div class="input-group">
                            <span class="input-group-addon"><img src='images/user.png'></span>
                            <input type="text" class="form-control" required='True' placeholder="Username" name="txt_username">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><img src='images/pass.png'></span>
                            <input type="password" class="form-control" placeholder="Password" name="txt_password">
                        </div>

                        <br>
                        <div align='right'>
                            <input type="submit" value="เข้าระบบ" class="btn btn-primary" />
                        </div>
                        <br />
                    </div>
                    <?php echo CHtml::endForm(); ?>
                </div>
            </div>
        </div>

    </div>
</div>
