<?php
echo CHtml::scriptFile('js/jquery-1.11.1.js');
?>
<script type="text/javascript">
    $(document).ready(function () {
        var check;
        $("#EmpModels_workgroup").click(function () {
            check = 0;
        });

        $("#EmpModels_work").mousedown(function () {
            check = check + 1
            if (check == 1) {
                if ($("#EmpModels_workgroup").val() == 'อำนวยการ') {
                    $(".st,.nd,.dv,.ns").remove();                    
                    $("#EmpModels_work").append("<option class=\"gn\" value=\"บริหารทั่วไป\">บริหารทั่วไป</option>");
                    $("#EmpModels_work").append("<option class=\"gn\" value=\"บำบัดน้ำเสีย\">บำบัดน้ำเสีย</option>");
                    $("#EmpModels_work").append("<option class=\"gn\" value=\"งานสนาม\">งานสนาม</option>");
                    $("#EmpModels_work").append("<option class=\"gn\" value=\"ฝ่ายการเจ้าหน้าที่\">ฝ่ายการเจ้าหน้าที่</option>");
                    $("#EmpModels_work").append("<option class=\"gn\" value=\"งานยานพาหนะ\">งานยานพาหนะ</option>");
                    $("#EmpModels_work").append("<option class=\"gn\" value=\"กลุ่มงานการเงินและบัญชี\">กลุ่มงานการเงินและบัญชี</option>");
                    $("#EmpModels_work").append("<option class=\"gn\" value=\"ศูนย์คอมพิวเตอร์\">ศูนย์คอมพิวเตอร์</option>");
                    $("#EmpModels_work").append("<option class=\"gn\" value=\"โภชนาการ\">โภชนาการ</option>");
                    $("#EmpModels_work").append("<option class=\"gn\" value=\"ซ่อมบำรุง\">ซ่อมบำรุง</option>");
                    $("#EmpModels_work").append("<option class=\"gn\" value=\"พัสดุ\">พัสดุ</option>");
                    $("#EmpModels_work").append("<option class=\"gn\" value=\"ประชาสัมพันธ์\">ประชาสัมพันธ์</option>");
                }
                if ($("#EmpModels_workgroup").val() == 'ปฐมภูมิ') {
                    $(".gn,.nd,.dv,.ns").remove();
                    $("#EmpModels_work").append("<option class=\"st\" value=\"เวชกรรมสังคม\">เวชกรรมสังคม</option>");
                    $("#EmpModels_work").append("<option class=\"st\" value=\"บริการสุขภาพชุมชน\">บริการสุขภาพชุมชน</option>");
                    $("#EmpModels_work").append("<option class=\"st\" value=\"สุขศึกษา/ประชาสัมพันธ์\">สุขศึกษา/ประชาสัมพันธ์</option>");
                    $("#EmpModels_work").append("<option class=\"st\" value=\"อาชีวเวชกรรม\">อาชีวเวชกรรม</option>");
                    $("#EmpModels_work").append("<option class=\"st\" value=\"แพทย์แผนไทย\">แพทย์แผนไทย</option>");
                }

                if ($("#EmpModels_workgroup").val() == 'ตติยภูมิ') {
                    $(".st,.gn,.dv,.ns").remove();
                    $("#EmpModels_work").append("<option class=\"nd\" value=\"องค์กรแพทย์\">องค์กรแพทย์</option>");
                    $("#EmpModels_work").append("<option class=\"nd\" value=\"เวชกรรมฟื้นฟู\">เวชกรรมฟื้นฟู</option>");
                    $("#EmpModels_work").append("<option class=\"nd\" value=\"ทันตกรรม\">ทันตกรรม</option>");
                    $("#EmpModels_work").append("<option class=\"nd\" value=\"เภสัชกรรม\">เภสัชกรรม</option>");
                    $("#EmpModels_work").append("<option class=\"nd\" value=\"รังสีวิทยา\">รังสีวิทยา</option>");
                    $("#EmpModels_work").append("<option class=\"nd\" value=\"ธนาคารเลือด\">ธนาคารเลือด</option>");
                    $("#EmpModels_work").append("<option class=\"nd\" value=\"พยาธิวิทยา\">พยาธิวิทยา</option>");
                    $("#EmpModels_work").append("<option class=\"nd\" value=\"จิตเวช\">จิตเวช</option>");
                }

                if ($("#EmpModels_workgroup").val() == 'พัฒนาระบบ') {
                    $(".st,.gn,.nd,.ns").remove();
                    $("#EmpModels_work").append("<option class=\"dv\" value=\"งานโสต\">งานโสต</option>");
                    $("#EmpModels_work").append("<option class=\"dv\" value=\"งานประกันสุขภาพ\">งานประกันสุขภาพ</option>");
                    $("#EmpModels_work").append("<option class=\"dv\" value=\"งานเวชสารสนเทศ\">งานเวชสารสนเทศ</option>");
                    $("#EmpModels_work").append("<option class=\"dv\" value=\"ศูนย์เครื่องมือแพทย์\">ศูนย์เครื่องมือแพทย์</option>");
                    $("#EmpModels_work").append("<option class=\"dv\" value=\"แผนงานและยุทธศาสตร์\">แผนงานและยุทธศาสตร์</option>");
                    $("#EmpModels_work").append("<option class=\"dv\" value=\"งานพัฒนาบุคลากร\">งานพัฒนาบุคลากร</option>");
                    $("#EmpModels_work").append("<option class=\"dv\" value=\"งานพัฒนาคุณภาพ\">งานพัฒนาคุณภาพ</option>");
                }

                if ($("#EmpModels_workgroup").val() == 'การพยาบาล') {
                    $(".st,.gn,.nd,.dv").remove();
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"กลุ่มการพยาบาล\">กลุ่มการพยาบาล</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"งานห้องผ่าตัด\">งานห้องผ่าตัด</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"วิสัญญีวิทยา\">วิสัญญีวิทยา</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"งานไตเทียม\">งานไตเทียม</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"วัสดุการแพทย์\">วัสดุการแพทย์</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"ศูนย์เลี้ยงเด็ก\">ศูนย์เลี้ยงเด็ก</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"งานผู้ป่วยนอก\">งานผู้ป่วยนอก</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"อายุรกรรมหญิง\">อายุรกรรมหญิง</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"อายุรกรรมชาย\">อายุรกรรมชาย</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"พิเศษบน\">พิเศษบน</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"พิเศษล่าง\">พิเศษล่าง</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"สูตินรีเวชกรรม\">สูตินรีเวชกรรม</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"งานห้องคลอด\">งานห้องคลอด</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"งานห้องผู้ป่วยหนัก\">งานห้องผู้ป่วยหนัก</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"ศัลยกรรม 1 (ศัลยกรรมชาย)\">ศัลยกรรม 1 (ศัลยกรรมชาย)</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"ศัลยกรรม 2 (ศัลยกรรมหญิง)\">ศัลยกรรม 2 (ศัลยกรรมหญิง)</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"กุมารเวชกรรม\">กุมารเวชกรรม</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"งานผู้ป่วยอุบัติเหตุและฉุกเฉิน\">อุบัติเหตุและฉุกเฉิน</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"ฉลองสิริราชครบ 60 ปี\">ฉลองสิริราชครบ 60 ปี</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"งานซักฟอก\">งานซักฟอก</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"งานหน่วยจ่ายกลาง\">งานหน่วยจ่ายกลาง</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"ศูนย์เปล\">ศูนย์เปล</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"พิเศษสูติ\">พิเศษสูติ</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"พิเศษกุมารเวชกรรม\">พิเศษกุมาร</option>");
                    $("#EmpModels_work").append("<option class=\"ns\" value=\"พยาบาลใหม่\">พยาบาลใหม่</option>");
                    $("#EmpModels_work").append("<option class=\"ns\"value=\"สำนักบริหารกลาง\">สำนักบริหารกลาง</option>");
                }
                if ($("#EmpModels_workgroup").val() == 'prompt') {
                    $(".st,.gn,.nd,.dv,.ns").remove();
                }
            }
        });
    });
</script>
<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo CHtml::image('images/person.png'); ?>  เพิ่มบุคลากร    </h3>
    </div>
    <div class="panel_body">
        <br>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'Post-form',
            'enableAjaxValidation' => false,
        ));
        ?> 
        
        <div class="row">
            <div class="form-group has-error col-lg-12 col-md-offset-1">
                <?php echo $form->labelEx($model, "รหัสบัตรประชาชน"); ?>
                <font size="3" color="red">*</font>
                <?php echo $form->textField($model, "CID"); ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group has-error col-lg-12 col-md-offset-1">
                <?php echo $form->labelEx($model, 'titleName'); ?>
                <?php echo $form->textField($model, 'titleName'); ?>
                <?php //echo $form->dropDownList($model, 'titleName',array('นาย'=>'นาย',)); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group has-error col-lg-12 col-md-offset-1">
                <?php echo $form->labelEx($model, 'empName'); ?>
                <font size="3" color="red">*</font>
                <?php echo $form->textField($model, 'empName'); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group has-error col-lg-12 col-md-offset-1">
                <?php echo $form->labelEx($model, 'empLname'); ?>
                <font size="3" color="red">*</font>
                <?php echo $form->textField($model, 'empLname'); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group has-error col-lg-12 col-md-offset-1">
                <?php echo $form->labelEx($model, 'position'); ?>
                <font size="3" color="red">*</font>
                <?php echo $form->textField($model, 'position'); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group has-error col-lg-12 col-md-offset-1">
                <?php echo $form->labelEx($model, 'levels'); ?>
                <?php echo $form->textField($model, 'levels'); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group has-error col-lg-12 col-md-offset-1">
                <?php echo $form->labelEx($model, 'employeeType'); ?>        
                <?php echo $form->dropDownList($model, 'employeeType', array('prompt' => '----เลือก---', 'ข้าราชการ' => 'ข้าราชการ', 'พนักงานราชการ' => 'พนักงานราชการ', 'พกส.' => 'พกส.', 'ลูกจ้างประจำ' => 'ลูกจ้างประจำ', 'ลูกจ้างชั่วคราว' => 'ลูกจ้างชั่วคราว')); ?>
                <?php //echo $form->textField($model, 'employeeType'); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group has-error col-lg-12 col-md-offset-1">
                <?php echo $form->labelEx($model, 'กลุ่มงาน'); ?>
                <font size="3" color="red">*</font>
                <?php echo $form->dropDownList($model, 'workgroup', array('prompt' => '----เลือก---', 'อำนวยการ' => 'อำนวยการ', 'ปฐมภูมิ' => 'ปฐมภูมิ', 'ตติยภูมิ' => 'ตติยภูมิ', 'พัฒนาระบบ' => 'พัฒนาระบบ', 'การพยาบาล' => 'การพยาบาล')); ?>
                <?php //echo $form->textField($model, 'workgroup'); ?>
            </div>
        </div>
        
        <div class="row">
            <div class="form-group has-error col-lg-12 col-md-offset-1">
                <?php echo $form->labelEx($model, 'งาน'); ?>
                <font size="3" color="red">*</font>
                <?php
                if ($model->work != 'prompt') {
                    if ($model->workgroup == 'อำนวยการ') {
                        //echo "<p>".$model->work."</p>";
                        echo $form->dropDownList($model, 'work', array('บริหารทั่วไป' => 'บริหารทั่วไป', 'บำบัดน้ำเสีย' => 'บำบัดน้ำเสีย', 'งานสนาม' => 'งานสนาม', 'ฝ่ายการเจ้าหน้าที่' => 'ฝ่ายการเจ้าหน้าที่', 'งานยานพาหนะ' => 'งานยานพาหนะ', 'กลุ่มงานการเงินและบัญชี' => 'กลุ่มงานการเงินและบัญชี', 'ศูนย์คอมพิวเตอร์' => 'ศูนย์คอมพิวเตอร์', 'โภชนาการ' => 'โภชนาการ', 'ซ่อมบำรุง' => 'ซ่อมบำรุง', 'พัสดุ' => 'พัสดุ', 'ประชาสัมพันธ์' => 'ประชาสัมพันธ์'), array('width' => '80'));
                    }
                    if ($model->workgroup == 'ปฐมภูมิ') {
                        echo $form->dropDownList($model, 'work', array('เวชกรรมสังคม' => 'เวชกรรมสังคม', 'บริการสุขภาพชุมชน' => 'บริการสุขภาพชุมชน', 'สุขศึกษา/ประชาสัมพันธ์' => 'สุขศึกษา/ประชาสัมพันธ์', 'อาชีวเวชกรรม' => 'อาชีวเวชกรรม', 'แพทย์แผนไทย' => 'แพทย์แผนไทย'), array('width' => '80'));
                    }
                    if ($model->workgroup == 'ตติยภูมิ') {
                        echo $form->dropDownList($model, 'work', array('องค์กรแพทย์' => 'องค์กรแพทย์', 'เวชกรรมฟื้นฟู' => 'เวชกรรมฟื้นฟู', 'ทันตกรรม' => 'ทันตกรรม', 'เภสัชกรรม' => 'เภสัชกรรม', 'รังสีวิทยา' => 'รังสีวิทยา', 'ธนาคารเลือด' => 'ธนาคารเลือด', 'พยาธิวิทยา' => 'พยาธิวิทยา', 'จิตเวช' => 'จิตเวช'), array('width' => '80'));
                    }
                    if ($model->workgroup == 'พัฒนาระบบ') {
                        echo $form->dropDownList($model, 'work', array('งานโสต' => 'งานโสต', 'งานประกันสุขภาพ' => 'งานประกันสุขภาพ', 'งานเวชสารสนเทศ' => 'งานเวชสารสนเทศ', 'ศูนย์เครื่องมือแพทย์' => 'ศูนย์เครื่องมือแพทย์', 'แผนงานและยุทธศาสตร์' => 'แผนงานและยุทธศาสตร์', 'งานพัฒนาบุคลากร' => 'งานพัฒนาบุคลากร', 'งานพัฒนาคุณภาพ' => 'งานพัฒนาคุณภาพ'), array('width' => '80'));
                    }
                    if ($model->workgroup == 'การพยาบาล') {
                        echo $form->dropDownList($model, 'work', array('กลุ่มการพยาบาล' => 'กลุ่มการพยาบาล', 'งานห้องผ่าตัด' => 'งานห้องผ่าตัด', 'วิสัญญีวิทยา' => 'วิสัญญีวิทยา', 'งานไตเทียม' => 'งานไตเทียม', 'วัสดุการแพทย์' => 'วัสดุการแพทย์', 'ศูนย์เลี้ยงเด็ก' => 'ศูนย์เลี้ยงเด็ก', 'งานผู้ป่วยนอก' => 'งานผู้ป่วยนอก', 'อายุรกรรมหญิง' => 'อายุรกรรมหญิง', 'อายุรกรรมชาย' => 'อายุรกรรมชาย', 'พิเศษบน' => 'พิเศษบน', 'พิเศษล่าง' => 'พิเศษล่าง', 'สูตินรีเวชกรรม' => 'สูตินรีเวชกรรม', 'งานห้องคลอด' => 'งานห้องคลอด', 'งานห้องผู้ป่วยหนัก' => 'งานห้องผู้ป่วยหนัก', 'ศัลยกรรม 1 (ศัลยกรรมชาย)' => 'ศัลยกรรม 1 (ศัลยกรรมชาย)', 'ศัลยกรรม 2 (ศัลยกรรมหญิง)' => 'ศัลยกรรม 2 (ศัลยกรรมหญิง)', 'กุมารเวชกรรม' => 'กุมารเวชกรรม', 'งานผู้ป่วยอุบัติเหตุและฉุกเฉิน' => 'งานผู้ป่วยอุบัติเหตุและฉุกเฉิน', 'ฉลองสิริราชครบ 60 ปี' => 'ฉลองสิริราชครบ 60 ปี', 'งานซักฟอก' => 'งานซักฟอก', 'งานหน่วยจ่ายกลาง' => 'งานหน่วยจ่ายกลาง', 'ศูนย์เปล' => 'ศูนย์เปล', 'พิเศษสูติ' => 'พิเศษสูติ', 'พิเศษกุมารเวชกรรม' => 'พิเศษกุมารเวชกรรม', 'พยาบาลใหม่' => 'พยาบาลใหม่', 'สำนักบริหารกลาง' => 'สำนักบริหารกลาง'), array('width' => '80'));
                    }
                }
                if ($model->work == 'prompt') {
                    echo $form->dropDownList($model, 'work', array('prompt' => '----เลือก---'), array('width' => '80'));
                }
                if (empty($model->work)) {
                    echo $form->dropDownList($model, 'work', array('prompt' => '----เลือก---'), array('width' => '80'));
                }
                ?>
            </div>
        </div>
       
        <div class="row">
            <div class="form-group has-success col-lg-2 col-md-offset-1" align="center">
                
                <?php
                if (!empty($model->ID)) {
                    echo CHtml::submitButton("แก้ไข", array('class' => 'btn'));
                } else {
                    echo CHtml::submitButton("เพิ่ม", array('class' => 'btn'));
                }
                ?>
            </div>
            <?php $this->endWidget(); ?>
        </div> 
    </div>
</div>
<br><br>