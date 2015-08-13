<div class="alert alert-warning">
    <center><a href="<?php echo Yii::app()->createUrl("Emp/InsertUpdate"); ?>"> 
        <input type="button" value="เพิ่มข้อมูลบุคลากร"  class="btn btn-info"/>
        <!--                <button type="button" class="btn btn-sm btn-primary">เพิ่มข้อมูล</button>-->
    </a></center>
</div>
<!--<br>-->
<div class="panel panel-primary">
    <div class="panel-heading">        
        <h3 class="panel-title">เลือกบุคลากรเพื่อแก้ไขข้อมูล</h3>      
    </div>    
    <div class="panel-collapse">
        <div class="form-group has-feedback col-lg-10">
            <?php
            echo CHtml::form();
            //echo CHtml::label("รหัส/ชื่อ-สกุล/หน่วยงาน ", '');
            echo CHtml::textField('mysearch', '', array('id' => 'mysearch',
                'width' => 100,
                'placeholder' => "ค้นหาบุคลากรด้วย รหัส/ชื่อ-สกุล/หน่วยงาน ",
                'class' => 'form-control',
                'maxlength' => 100));
            echo CHtml::label('', '');
            //echo CHtml::submitButton('ค้นหา', '', array('class' => 'btn'));
            ?>
        </div>
        <div  class="col-lg-2" >
            <input type="submit" value="ค้นหา" class="btn btn-default" />            
        </div>
            <?php echo CHtml::endForm();?>
            
        <hr>
        <?php

        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'emp-grid',
            'dataProvider' => $model,
            'columns' => array(
                array(
                    'header' => '####',
                    'class' => 'CLinkColumn',
                    'imageUrl' => 'images/person.png',
                    'htmlOptions' => array(
                        'style' => 'text-align:center;color:red',
                        'width' => '1%'
                    )
                ),                
//                array(
//                    'header' => 'ปชช.',
//                    'value' => '($data->CID)',
//                    'htmlOptions' => array(
//                        'style' => 'text-align:center;color:blue',
//                        'width' => '4%'
//                    )
//                ),
                array(
                    'header' => 'คำนำหน้า',
                    'value' => '($data->titleName)',
                    'htmlOptions' => array(
                        'style' => 'text-align:center',
                        'width' => '6%',
                    )
                ),
                array(
                    'header' => 'ชื่อ',
                    'value' => '($data->empName)',
                    'htmlOptions' => array(
                        'width' => '12%'
                    )
                ),
                array(
                    'header' => 'สกุล',
                    'value' => '($data->empLname)',
                    'htmlOptions' => array(
                        'width' => '13%'
                    )
                ),
                array(
                    'header' => 'ตำแหน่ง',
                    'value' => '($data->position)',
                    'htmlOptions' => array(
                        'width' => '15%',
                        'style' => 'text-align:center',
                    )
                ),
                array(
                    'header' => 'ระดับ',
                    'value' => '($data->levels)',
                    'htmlOptions' => array(
                        'width' => '10%',
                        'style' => 'text-align:center',
                    )
                ),
                array(
                    'header' => 'ประเภทบุคลากร',
                    'value' => '($data->employeeType)',
                    'htmlOptions' => array(
                        'width' => '10%',
                        'style' => 'text-align:center',
                    )
                ),
                array(
                    'header' => 'กลุ่มงาน',
                    'value' => '($data->workgroup)',
                    'htmlOptions' => array(
                        'width' => '10%',
                        'style' => 'text-align:center',
                    )
                ),
                array(
                    'header' => 'งาน/ฝ่าย',
                    'value' => '($data->work)',
                    'htmlOptions' => array(
                        'width' => '15%',
                        'style' => 'text-align:center',
                    )
                ),
//                array(
//                    'header' => 'สถานะ',
//                    'value' => '($data->active)',
//                    'htmlOptions' => array(
//                        'width' => '5%',
//                        'style' => 'text-align:center',
//                    )
//                ),
                array(
                    'header' => 'แก้ไข',
                    'class' => 'CLinkColumn',
                    'imageUrl' => 'images/edit.png',
                    'urlExpression' => 'Yii::app()->createUrl("/emp/InsertUpdate", array("id" =>$data->ID))',
                    'htmlOptions' => array(
                        'width' => '2%',
                        'align' => 'center'
                    )
                ),
                array(
                    'header' => 'ยกเลิก',
                    'class' => 'CLinkColumn',
                    'imageUrl' => 'images/delete.png',
                    'urlExpression' => 'Yii::app()->createUrl("/emp/cancle",array("id" => $data->ID))',
                    'htmlOptions' => array(
                        'width' => '2%',
                        'align' => 'center',
                        'onclick' => 'return confirm("ยืนยันการยกเลิกบุคลากร")'
                    )
                )
//                array(
//                    'header' => 'ลบ',
//                    'class' => 'CLinkColumn',
//                    'imageUrl' => 'images/delete.png',
//                    'urlExpression' => 'Yii::app()->createUrl("/Emp/delete",array("id" => $data->ID))',
//                    'htmlOptions' => array(
//                        'width' => '2%',
//                        'align' => 'center',
//                        'onclick' => 'return confirm("ยืนยันการลบรายการ")'
//                    )
//                )
            )
                )
        );
        ?>
        
    </div>
</div>