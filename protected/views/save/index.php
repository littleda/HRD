<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">เลือกบุคลากรเพื่อบันทึกข้อมูล</h3>
    </div>
    <div class="panel-collapse">
        <div class="form-group has-feedback col-lg-12">
            <?php
            echo CHtml::form();
            echo CHtml::textField('mysearch', '', array('id' => 'mysearch',
                'width' => 100,
                'placeholder' => "ค้นหาบุคลากร",
                'class' => 'form-control',
                'maxlength' => 100));
            echo CHtml::label('', '');
            ?>
            <div align='right'>
                <input type="submit" value="ค้นหา" class="btn btn-default" />
            </div>
            <?php echo CHtml::endForm(); ?>
        </div>
        <hr> 
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
//    'id' => 'user-grid',
//    'dataProvider' => $model,
//    'urlExpression' => 'Yii::app()->createUrl("/Save/Create", array("id" =>$data->IDemp ))',
            'id' => 'user-grid',
            'dataProvider' => $model,
            //'selectableRows' => 2, //เลือกได้หลายรายการพร้อมกัน
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
//                    'header' => 'รหัส',
//                    'value' => '($data->IDemp)',
//                    'htmlOptions' => array(
//                        'style' => 'text-align:center;color:blue',
//                        'width' => '5%'
//                    )
//                ),
                array(
                    'header' => 'คำนำหน้า',
                    'value' => '($data->titleName)',
                    'htmlOptions' => array(
                        'style' => 'text-align:left',
                        'width' => '7%',
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
                array(
                    'header' => 'เลือก',
                    'class' => 'CLinkColumn',
                    'imageUrl' => 'images/create.png',
                    'urlExpression' => 'Yii::app()->createUrl("/save/InsertUpdate", array("id" =>$data->ID ))',
                    'htmlOptions' => array(
                        'width' => '5%',
                        'align' => 'center'
                    )
                ),
//            array(
//                'header' => 'ลบ',
//                'class' => 'CLinkColumn',
//                'imageUrl' => 'images/delete.png',
//                'urlExpression' => 'Yii::app()->createUrl("/Save/delete",array("id" => $data->IDemp))',
//                'htmlOptions' => array(
//                    'width' => '5%',
//                    'align' => 'center',
//                    'onclick' => 'return confirm("ยืนยันการลบรายการ")'
//                )
//            )
            ),
                //'rowHtmlOptionsExpression'=>'Save/Create',
                //'itemView' => '_index',
                )
        );
        ?>
    </div>
</div>
