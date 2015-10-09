<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script>
<script type="text/javascript">

    function checkpass(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "<?php echo Yii::app()->theme->baseurl; ?>/ajax/getpass.php?q=" + str + "&id=<?php echo $model->id ?>", true);
            xmlhttp.send();
        }
    }
    $(document).ready(function () {
        var newP = " ";
        var l = " ";

        $(this).mousemove(function () {
            //l = $("#txtHint").children().length;
            l = $("#txtHint").children("div").text();
            //l="x";
            //alert(l);
            if (l == "รหัสผ่านตรงกับที่บันทึกไว้") {
                //alert("ss");
                $("#newpass").prop('readonly', false);
                $("#newpass").css({"background": "#FFFFFF"});
            } else {
                $("#newpass").prop('readonly', true);
                $("#newpass").css({"background": "#DDDDDD"});
            }

        });

        $("#newpass").keyup(function () {
            //alert("ne");
            newP = $("#newpass").val();
            $("#UserModels_passwords").val(newP);
        });
    });
</script>
<div class="panel panel-warning">
    <div class="panel-heading">
        <?php if ((!empty($model->id)) || (!empty($id))) { ?>
            <h3 class="panel-title"><?php echo CHtml::image('images/admin.png'); ?> แก้ไขผู้ใช้ </h3>
        <?php } else { ?>
            <h3 class="panel-title"><?php echo CHtml::image('images/admin.png'); ?> เพิ่มผู้ใช้ </h3>
        <?php } ?>
    </div>
    <div class="panel_body">
        <br>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'User-form',
            'enableAjaxValidation' => false,
        ));
        ?>
        <div class="row">
            <div class="col-md-1 col-md-offset-1" align="right">
                <?php echo $form->labelEx($model, "username"); ?>
            </div>
            <?php if ((!empty($model->id)) || (!empty($id))) { ?>
                <div class="col-md-3">
                    <?php echo $form->textField($model, "usernames", array('readonly' => true, 'style' => 'background: #DDDDDD')); ?>
                </div>
            <?php } else { ?>
                <div class="col-md-3">
                    <?php echo $form->textField($model, "usernames"); ?>
                </div>
            <?php } ?>
        </div><br>
        <div class="row">
            <div class="col-md-1 col-md-offset-1" align="right">
                <?php echo $form->labelEx($model, 'fullname'); ?>
            </div>
            <div class="col-md-3">
                <?php echo $form->textField($model, 'fullname'); ?>
            </div>       
        </div><br>
        <div class="row">

            <?php if ((!empty($model->id)) || (!empty($id))) { ?>
                <div class="col-md-2 " align="right">
                    <?php echo $form->labelEx($model, 'changepassword'); ?>
                </div>
                <div class="col-md-3">
                    <input id="oldpass" type="password"  placeholder="รหัสผ่านเก่า" pattern="[a-zA-Z0-9]{4,}$" data-toggle="tooltip" data-placement="right" title="ต้องเป็นอักษรภาษาอังกฤษ หรือ ตัวเลข ไม่น้อยกว่า 4 ตัว" onkeyup="checkpass(this.value)">
                    <input type="password" id="newpass" placeholder="รหัสผ่านใหม่" pattern="[a-zA-Z0-9]{4,}$" data-toggle="tooltip" data-placement="right" title="ต้องเป็นอักษรภาษาอังกฤษ หรือ ตัวเลข ไม่น้อยกว่า 4 ตัว" style="background: rgb(221, 221, 221);" readonly>
                    <?php echo $form->hiddenField($model, 'passwords'); ?>
                </div>
                <div class="col-md-4 " id="txtHint"></div>

            <?php } else { ?>
                <div class="col-md-1 col-md-offset-1" align="right">
                    <?php echo $form->labelEx($model, 'password'); ?>
                </div>
                <div class="col-md-3">
                    <?php echo $form->passwordField($model, 'passwords', array('pattern' => '[a-zA-Z0-9]{4,}$', 'placeholder' => 'A-Z,a-z,0-9 ไม่น้อยกว่า4ตัว', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'ต้องเป็นอักษรภาษาอังกฤษ หรือ ตัวเลข ไม่น้อยกว่า 4 ตัว')); ?>
                </div> 
            <?php } ?>
        </div><br>


        <?php if (!empty($model->id) || !empty($id)) { ?>

        <?php } else { ?>
            <div class="row">
                <div class="col-md-2 " align="right">
                    <?php echo $form->labelEx($model, 'user_type'); ?>
                </div>
                <div class="col-md-3 ">
                    <?php echo $form->dropDownList($model, 'user_type', array('MEMBER' => 'สมาชิก', 'ADMINISTRATOR' => 'ผู้ดูแลระบบ')); ?>
                </div>
            </div><br>
        <?php } ?>  
        <?php if ((!empty($model->id)) || (!empty($id))) { ?> 
            <div class="row">
                <div class="col-md-4 col-md-offset-2" align="center">
                    <?php echo CHtml::submitButton("แก้ไข", array('class' => 'btn')); ?>
                </div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col-md-4 col-md-offset-2" align="center">
                    <?php echo CHtml::submitButton("เพิ่ม", array('class' => 'btn')); ?>
                </div>
            </div>
        <?php } ?>
        <?php $this->endWidget(); ?><br>
    </div>
</div>







<br><br>