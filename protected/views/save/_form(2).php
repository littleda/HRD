<?php
echo CHtml::scriptFile('js/jquery-1.11.1.js');
//echo CHtml::scriptFile('themes/bootstrap3/js/ckeditor/ckeditor.js');
?>
<script type="text/javascript">
    $(document).ready(function () {

        var count = 0;
        var cost = 0;
        // var detail = "00000";
        $("#TrainingModels_hotel").keyup(function () {
            cost = parseFloat($("#TrainingModels_hotel").val()) + parseFloat($("#TrainingModels_fare").val()) + parseFloat($("#TrainingModels_allowances").val()) + parseFloat($("#TrainingModels_signup").val()) + parseFloat($("#TrainingModels_other").val());
            $("#TrainingModels_extrapolateCost").val(cost);
        });
        $("#TrainingModels_fare").keyup(function () {
            cost = parseFloat($("#TrainingModels_hotel").val()) + parseFloat($("#TrainingModels_fare").val()) + parseFloat($("#TrainingModels_allowances").val()) + parseFloat($("#TrainingModels_signup").val()) + parseFloat($("#TrainingModels_other").val());
            $("#TrainingModels_extrapolateCost").val(cost);
        });
        $("#TrainingModels_allowances").keyup(function () {
            cost = parseFloat($("#TrainingModels_hotel").val()) + parseFloat($("#TrainingModels_fare").val()) + parseFloat($("#TrainingModels_allowances").val()) + parseFloat($("#TrainingModels_signup").val()) + parseFloat($("#TrainingModels_other").val());
            $("#TrainingModels_extrapolateCost").val(cost);
        });
        $("#TrainingModels_signup").keyup(function () {
            cost = parseFloat($("#TrainingModels_hotel").val()) + parseFloat($("#TrainingModels_fare").val()) + parseFloat($("#TrainingModels_allowances").val()) + parseFloat($("#TrainingModels_signup").val()) + parseFloat($("#TrainingModels_other").val());
            $("#TrainingModels_extrapolateCost").val(cost);
        });
        $("#TrainingModels_other").keyup(function () {
            cost = parseFloat($("#TrainingModels_hotel").val()) + parseFloat($("#TrainingModels_fare").val()) + parseFloat($("#TrainingModels_allowances").val()) + parseFloat($("#TrainingModels_signup").val()) + parseFloat($("#TrainingModels_other").val());
            $("#TrainingModels_extrapolateCost").val(cost);
        });

        $(".rd_hos").click(function () {
            //TrainingModels_reqHospital
            var check = $(this).val();
            if (check == '1') {
                //alert("2");
                $(".cb_hos").attr("disabled", false);
            }
            else {
                $(".cb_hos").attr("checked", false);
                $(".cb_hos").attr("disabled", true);
            }
        });

        $("#TrainingModels_reqOrganizer").click(function () {
            count = count + 1;
            //alert(count);
            if (count % 2 == 0) {
                $("#TrainingModels_reqOrganizer").attr("checked", false);
                $(".cb_orgaz").attr("checked", false);
                $(".cb_orgaz").attr("disabled", true);
                count = 0;
            }
            else {
                $(".cb_orgaz").attr("disabled", false);
            }


        });
        $(".cb_hos").click(function () {
            if ($("#TrainingModels_DetailHotel.cb_hos").is(':checked')) {
                $("#TrainingModels_DetailHotel.cb_orgaz").attr("checked", false);
                //alert($("#TrainingModels_DetailHotel").val());
            }
            if ($("#TrainingModels_DetailFare.cb_hos").is(':checked')) {
                $("#TrainingModels_DetailFare.cb_orgaz").attr("checked", false);
                //$("#TrainingModels_DetailFare").val('1');
            }
            if ($("#TrainingModels_DetailAllowances.cb_hos").is(':checked')) {
                $("#TrainingModels_DetailAllowances.cb_orgaz").attr("checked", false);
                //$("#TrainingModels_DetailAllowances").val('1');
            }
            if ($("#TrainingModels_DetailSignup.cb_hos").is(':checked')) {
                $("#TrainingModels_DetailSignup.cb_orgaz").attr("checked", false);
                //$("#TrainingModels_DetailSignup").val('1');
            }
            if ($("#TrainingModels_DetailOther.cb_hos").is(':checked')) {
                $("#TrainingModels_DetailOther.cb_orgaz").attr("checked", false);
                //$("#TrainingModels_DetailOther").val('1');
            }
        });
        $(".cb_orgaz").click(function () {
            if ($("#TrainingModels_DetailHotel.cb_orgaz").is(':checked')) {
                $("#TrainingModels_DetailHotel.cb_hos").attr("checked", false);
                //alert($("#TrainingModels_DetailHotel.cb_orgaz").val());
                //alert($("#TrainingModels_DetailHotel.cb_hos").val());
            }
            if ($("#TrainingModels_DetailFare.cb_orgaz").is(':checked')) {
                $("#TrainingModels_DetailFare.cb_hos").attr("checked", false);
            }
            if ($("#TrainingModels_DetailAllowances.cb_orgaz").is(':checked')) {
                $("#TrainingModels_DetailAllowances.cb_hos").attr("checked", false);
            }
            if ($("#TrainingModels_DetailSignup.cb_orgaz").is(':checked')) {
                $("#TrainingModels_DetailSignup.cb_hos").attr("checked", false);
            }
            if ($("#TrainingModels_DetailOther.cb_orgaz").is(':checked')) {
                $("#TrainingModels_DetailOther.cb_hos").attr("checked", false);
            }
        });
        $("#dateStart").change(function () {
            var cutdate = $("#dateStart").val().split("/");
            if (parseInt(cutdate[2]) < "2500") {
                var year = parseInt(cutdate[2]) + 543;
                $("#dateStart").val(cutdate[0] + "/" + cutdate[1] + "/" + year);
                //alert(year);
            }

        });
        $("#dateEnd").change(function () {
            var cutdate = $("#dateEnd").val().split("/");
            if (parseInt(cutdate[2]) < "2500") {
                var year = parseInt(cutdate[2]) + 543;
                $("#dateEnd").val(cutdate[0] + "/" + cutdate[1] + "/" + year);
                //alert(year);
            }
        });
//        $("#save").click(function(){
//            alert($("#TrainingModels_DetailHotel").val());            
//        });
    });

</script>

<div class="alert alert-info">
    <center><h2>บันทึกข้อมูลการอบรม/ประชุม/สัมมนา</h2></center><br>
</div>

<div class="form">
    <div class="jumbotron"> 
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'My-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
        ?>
        <div class="row">
            <?php //echo $form->labelEx($model, 'IDemp'); ?>
            <?php //echo $form->textField($model, 'IDemp', array('size' => 10, 'maxlength' => 10, 'readonly' => true)); ?>

            <?php echo $form->labelEx($model, 'empName'); ?>
            <?php echo $form->textField($model, 'empName', array('size' => 15, 'maxlength' => 20, 'readonly' => true)); ?>

            <?php echo $form->labelEx($model, 'empLname'); ?>
            <?php echo $form->textField($model, 'empLname', array('size' => 15, 'maxlength' => 20, 'readonly' => true)); ?>

            <?php echo $form->labelEx($model, 'position'); ?>
            <?php echo $form->textField($model, 'position', array('size' => 20, 'maxlength' => 20, 'readonly' => true)); ?>

            <?php echo $form->labelEx($model, 'levels'); ?>
            <?php echo $form->textField($model, 'levels', array('size' => 13, 'maxlength' => 20, 'readonly' => true)); ?>
        </div>   

        <div class="row">
            <?php
            echo $form->radioButtonList($model, 'employeeType', array('ข้าราชการ' => 'ข้าราชการ', 'พนักงานราชการ' => 'พนักงานราชการ', 'พกส.' => 'พนักงานกระทรวงฯ', 'ลูกจ้างประจำ' => 'ลูกจ้างประจำ', 'ลูกจ้างชั่วคราว' => 'ลูกจ้างชั่วคราว')
                    , array('labelOptions' => array('style' => 'display:inline'), 'separator' => '  ', 'disabled' => true));
            ?>&nbsp;&nbsp;&nbsp;

            <?php echo $form->labelEx($model, 'workgroup'); ?>
            <?php echo $form->textField($model, 'workgroup', array('size' => 14, 'maxlength' => 14, 'readonly' => true)); ?>

            <?php echo $form->labelEx($model, 'work'); ?>
            <?php echo $form->textField($model, 'work', array('size' => 20, 'maxlength' => 15, 'readonly' => true)); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model2, 'trainName'); ?>
            <?php echo $form->textField($model2, 'trainName', array('size' => 85, 'maxlength' => 255)); ?>        
            <?php echo $form->labelEx($model2, 'ครั้งที่'); ?>

            <?php if (empty($model2->No)) {
                echo $form->numberField($model2, 'No', array('min' => 1, 'max' => 10, 'value' => 1));
            } else {
                echo $form->numberField($model2, 'No', array('min' => 1, 'max' => 10));
            }
            ?>     
        </div>
        <div class="row">
            <?php echo $form->labelEx($model2, 'dateStart'); ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model' => $model2,
                'attribute' => 'dateStart',
                'value' => $model2->dateStart,
                'name' => 'dateStart',
                'language' => 'th',
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fadeIn',
                    //'changeMonth' => true,
                    //'changeYear' => true,
                    //'autoSize' => true,
                    'altFormat' => 'dd-mm-yy',
                    'dateFormat' => 'dd/mm/yy',
                //'dateFormat' => 'yy-mm-dd',
//                    'ttonImageOnly' => false,
//                   'dayNamesMin' => array('อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'),
//                    'monthNamesShort' => array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม',
//                       'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'),
//                    'changeMonth' => true,
//                    'changeYear' => true,
//                    'beforeShow' => 'js:function(){  
//                      if($(this).val() != ""){
//                            var arrayDate = $(this).val().split("/");     
//                            arrayDate[2] = parseInt(arrayDate[2]) - 543;
//                            $(this).val(arrayDate[0] + "/" + arrayDate[1] + "/" + arrayDate[2]);
//                        }
//                       setTimeout(function(){
//                            $.each($(".ui-datepicker-year option"), function(j, k){
//                                var textYear = parseInt($(".ui-datepicker-year option").eq(j).val()) + 543;
//                                $(".ui-datepicker-year option").eq(j).text(textYear);
//                            });             
//                        },50);
//                    }',
//                    'onClose' => 'js:function(){                        
//                        if($(this).val() != "" && $(this).val() == dateBefore){         
//                            var arrayDate = dateBefore.split("/");
//                            arrayDate[2] = parseInt(arrayDate[2]) + 543;
//                            $(this).val(arrayDate[0] + "/" + arrayDate[1] + "/" + arrayDate[2]);    
//                        }       
//                    }',
//                    'onSelect' => 'js:function(dateText, inst){ 
//                        dateBefore = $(this).val();
//                        var arrayDate = dateText.split("/");
//                        arrayDate[2] = parseInt(arrayDate[2]) + 543;
//                        $(this).val(arrayDate[0] + "/" + arrayDate[1] + "/" + arrayDate[2]);
//                    }',
                ),
                'htmlOptions' => array(
                    'size' => 10,
                    'style' => 'height:20px;'
                ),
            ));
            ?>
            &nbsp;&nbsp;&nbsp;
            <?php echo $form->labelEx($model2, 'dateEnd'); ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'attribute' => 'dateEnd',
                'model' => $model2,
                'value' => $model2->dateEnd,
                'name' => 'dateEnd',
                'language' => 'th',
                // additional javascript options for the date picker plugin
                'options' => array(
                    'showAnim' => 'fadeIn',
                    //'autoSize' => true,
                    'dateFormat' => 'dd/mm/yy',
                //'dateFormat' => 'yy-mm-dd',
                ),
                'htmlOptions' => array(
                    'size' => 10,
                    'style' => 'height:20px;'
                ),
            ));
            ?>&nbsp;&nbsp;&nbsp;
<?php echo $form->labelEx($model2, 'place'); ?>
            <?php echo $form->textField($model2, 'place', array('size' => 50, 'maxlength' => 80)); ?>       


        </div>
        <div class="row">
<?php echo $form->labelEx($model2, 'letterRef'); ?>
<?php echo $form->textField($model2, 'letterRef', array('size' => 50, 'maxlength' => 50)); ?>  &nbsp;&nbsp;&nbsp;
            <?php echo $form->labelEx($model2, 'letterDef'); ?>
            <?php echo $form->textField($model2, 'letterDef', array('size' => 50, 'maxlength' => 50)); ?>
        </div>
        <div class="row">
            <label>ประเภทการประชุม/อบรม/สัมมนา</label>&nbsp;&nbsp;&nbsp;
<?php echo $form->radioButton($model2, 'trainType', array('value' => '1', 'uncheckValue' => null)); ?>
<?php echo $form->labelEx($model2, 'ตามแผน Training need'); ?> &nbsp;&nbsp; 
<?php echo $form->radioButton($model2, 'trainType', array('value' => '2', 'uncheckValue' => null)); ?>   
            <?php echo $form->labelEx($model2, 'ตามนโยบายกระทรวง'); ?>    
        </div>

        <div class="row">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $form->radioButton($model2, 'trainType', array('value' => '3', 'uncheckValue' => null)); ?>  
            <?php echo $form->labelEx($model2, 'ตามมาตรฐานวิชาชีพ'); ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
<?php echo $form->radioButton($model2, 'trainType', array('value' => '4', 'uncheckValue' => null)); ?>   
<?php echo $form->labelEx($model2, 'ไม่อยู่ในแผนพัฒนาบุคลากร'); ?>     &nbsp;&nbsp;
<?php echo $form->radioButton($model2, 'trainType', array('value' => '5', 'uncheckValue' => null)); ?>   
<?php echo $form->labelEx($model2, 'เป็นตัวแทนวิชาชีพหรือวิทยากร'); ?>  
        </div>
        <div class="row">
            <label>ประมาณการค่าใช้จ่าย</label>
        </div>
        <div class="row">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form->labelEx($model2, 'hotel'); ?>
            <?php echo $form->textField($model2, 'hotel', array('size' => 8, 'maxlength' => 10)); ?>  
            <label>บาท</label>

            <?php echo $form->labelEx($model2, 'fare'); ?>
            <?php echo $form->textField($model2, 'fare', array('size' => 8, 'maxlength' => 10)); ?>      
            <label>บาท</label>

            <?php echo $form->labelEx($model2, 'allowances'); ?>
            <?php echo $form->textField($model2, 'allowances', array('size' => 8, 'maxlength' => 10)); ?>     
            <label>บาท</label>

            <?php echo $form->labelEx($model2, 'signup'); ?>
            <?php echo $form->textField($model2, 'signup', array('size' => 8, 'maxlength' => 10)); ?>     
            <label>บาท</label>

<?php echo $form->labelEx($model2, 'other'); ?>
<?php echo $form->textField($model2, 'other', array('size' => 8, 'maxlength' => 10)); ?>     
            <label>บาท</label>
        </div>

        <div class="row">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form->labelEx($model2, 'extrapolateCost'); ?>
            <?php echo $form->textField($model2, 'extrapolateCost', array('size' => 10, 'maxlength' => 10)); ?>    
            <label>บาท</label>

<?php echo $form->labelEx($model2, 'trueCost'); ?>
<?php echo $form->textField($model2, 'trueCost', array('size' => 10, 'maxlength' => 10)); ?>    
            <label>บาท</label>

        </div>

        <div class="row">
            <label>การเบิกค่าใช้จ่ายจาก</label>
        </div>

        <div class="row">        
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form->radioButton($model2, 'reqHospital', array('class' => "rd_hos", 'value' => '1', 'uncheckValue' => null)); ?>
            <?php echo $form->labelEx($model2, 'เบิกจาก รพ'); ?> 
            <?php echo $form->checkBox($model2, 'DetailHotel', array('class' => "cb_hos", 'value' => '1', 'uncheckValue' => null)); ?>
            <?php echo $form->labelEx($model2, 'ค่าที่พัก'); ?>
            <?php echo $form->checkBox($model2, 'DetailFare', array('class' => "cb_hos", 'value' => '1', 'uncheckValue' => null)); ?>
            <?php echo $form->labelEx($model2, 'ค่าเดินทาง'); ?>
            <?php echo $form->checkBox($model2, 'DetailAllowances', array('class' => "cb_hos", 'value' => '1', 'uncheckValue' => null)); ?>
            <?php echo $form->labelEx($model2, 'ค่าเบี้ยเลี้ยง'); ?>
<?php echo $form->checkBox($model2, 'DetailSignup', array('class' => "cb_hos", 'value' => '1', 'uncheckValue' => null)); ?>
<?php echo $form->labelEx($model2, 'ค่าลงทะเบียน'); ?>
<?php echo $form->checkBox($model2, 'DetailOther', array('class' => "cb_hos", 'value' => '1', 'uncheckValue' => null)); ?>
<?php echo $form->labelEx($model2, 'อื่นๆ'); ?>
<!--        <input type="checkbox"  class="cb_req"  id="cb_hoshotel" value="1">ค่าที่พัก&nbsp;&nbsp;
<input type="checkbox"  class="cb_req"  id="cb_hosfare" value="1">ค่าเดินทาง&nbsp;&nbsp;
<input type="checkbox"  class="cb_req"  id="cb_hosallowances" value="1">ค่าเบี้ยเลี้ยง&nbsp;&nbsp;
<input type="checkbox"  class="cb_req"  id="cb_hossignup" value="1">ค่าลงทะเบียน&nbsp;&nbsp;
<input type="checkbox"  class="cb_req"  id="cb_hosother" value="1">อื่นๆ-->

<?php echo $form->labelEx($model2, 'ระบุ'); ?>
<?php echo $form->textField($model2, 'otherDetailHosp'); ?> 

        </div>

        <div class="row">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form->radioButton($model2, 'reqOrganizer', array('value' => '1', 'uncheckValue' => null)); ?>
            <?php echo $form->labelEx($model2, 'เบิกจากผู้จัด'); ?>  
            <?php echo $form->checkBox($model2, 'DetailHotel', array('class' => "cb_orgaz", 'value' => '2', 'uncheckValue' => null)); ?>
            <?php echo $form->labelEx($model2, 'ค่าที่พัก'); ?>
            <?php echo $form->checkBox($model2, 'DetailFare', array('class' => "cb_orgaz", 'value' => '2', 'uncheckValue' => null)); ?>
            <?php echo $form->labelEx($model2, 'ค่าเดินทาง'); ?>
            <?php echo $form->checkBox($model2, 'DetailAllowances', array('class' => "cb_orgaz", 'value' => '2', 'uncheckValue' => null)); ?>
            <?php echo $form->labelEx($model2, 'ค่าเบี้ยเลี้ยง'); ?>      
<?php echo $form->checkBox($model2, 'DetailSignup', array('class' => "cb_orgaz", 'value' => '2', 'uncheckValue' => null)); ?>
<?php echo $form->labelEx($model2, 'ค่าลงทะเบียน'); ?>
<?php echo $form->checkBox($model2, 'DetailOther', array('class' => "cb_orgaz", 'value' => '2', 'uncheckValue' => null)); ?>
<?php echo $form->labelEx($model2, 'อื่นๆ'); ?>
<!--         <input type="checkbox" class="cb_req" id="cb_orgazhotel" value="2">ค่าที่พัก&nbsp;&nbsp;
            <input type="checkbox"  class="cb_req"  id="cb_orgazfare" value="2">ค่าเดินทาง&nbsp;&nbsp;
            <input type="checkbox"  class="cb_req"  id="cb_orgazallowances" value="2">ค่าเบี้ยเลี้ยง&nbsp;&nbsp;
            <input type="checkbox"  class="cb_req"  id="cb_orgazsignup" value="2">ค่าลงทะเบียน&nbsp;&nbsp;
            <input type="checkbox"  class="cb_req"  id="cb_orgazother" value="2">อื่นๆ-->

            <?php echo $form->labelEx($model2, 'ระบุ'); ?>
            <?php echo $form->textField($model2, 'otherDetailOrgaz'); ?> 
        </div>
        <div class="row">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form->radioButton($model2, 'fareType', array('value' => '1', 'uncheckValue' => null)); ?>
            <?php echo $form->labelEx($model2, 'เดินทางโดยรถของรพ พังงาไม่เบิกค่าใช้จ่าย'); ?>  

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $form->radioButton($model2, 'reqHospital', array('class' => "rd_hos", 'value' => '0', 'uncheckValue' => null)); ?>
            <?php echo $form->labelEx($model2, 'ไม่มีค่าใช้จ่ายที่เบิกจากโรงพยาบาลพังงา'); ?>  
        </div>

        <div class="row">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form->radioButton($model2, 'fareType', array('value' => '2', 'uncheckValue' => null)); ?>
            <?php echo $form->labelEx($model2, 'เดินทางโดยเครื่องบิน'); ?>    
        </div>

        <div class="row">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $form->radioButton($model2, 'fareType', array('value' => '3', 'uncheckValue' => null)); ?>
            <?php echo $form->labelEx($model2, 'เดินทางโดยรถยนต์ส่วนราชการ/ส่วนตัว'); ?>    

            <?php echo $form->labelEx($model2, 'หมายเลขทะเบียน'); ?>
            <?php echo $form->textField($model2, 'carNo'); ?> 

            <?php //echo $form->hiddenField($model2, 'DetailHotel', array('type' => "hidden")); ?>  
<?php //echo $form->hiddenField($model2, 'DetailFare', array('type' => "hidden"));  ?>         
<?php //echo $form->hiddenField($model2, 'DetailAllowances', array('type' => "hidden"));  ?>         
<?php //echo $form->hiddenField($model2, 'DetailSignup', array('type' => "hidden"));  ?>         
<?php //echo $form->hiddenField($model2, 'DetailOther', array('type' => "hidden"));  ?>         
        </div>

        <br>
    </div>
    <div class="row buttons " ><center>
            <?php
            if (!empty($model2->ID)) {
                echo CHtml::submitButton("แก้ไข", array('class' => 'btn btn-primary', 'id' => 'save'));
            } else {
                echo CHtml::submitButton("บันทึก", array('class' => 'btn btn-primary', 'id' => 'save'));
            }
            ?>
<?php //echo CHtml::submitButton($model->isNewRecord ? 'save' : 'บันทึก', array('class' => 'btn btn-primary'));     ?>
        </center></div>
<?php $this->endWidget(); ?>
</div>
