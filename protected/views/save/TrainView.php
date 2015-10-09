<?php if (empty($id)) { ?>
    <div class="form-group has-feedback col-lg-12">
        <?php
        echo CHtml::form();
        echo CHtml::textField('mysearch', '', array('id' => 'mysearch',
            'width' => 100,
            'placeholder' => "ค้นหาตาม ชื่อผู้เข้าประชุม/เรื่องการประชุม/เลขที่หนังสือ",
            'class' => 'form-control',
            'maxlength' => 100));
        echo CHtml::label('', '');
        ?>
        <div align='right'>
            <input type="submit" value="ค้นหา" class="btn btn-default" />
        </div>
        <?php echo CHtml::endForm(); ?>
    </div>

<?php } ?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'train-grid',
    'dataProvider' => $model,
    'columns' => array(
        array(
            'header' => 'ชื่อ - สกุล',
            'value' => '($data->emp->titleName.$data->emp->empName."  ".$data->emp->empLname)',
            'htmlOptions' => array(
                'style' => 'text-align:center;color:blue',
                'width' => '18%'
            )
        ),
        array(
            'header' => 'เรื่องการประชุม',
            'value' => '($data->trainName)',
            'htmlOptions' => array(
                'style' => 'color:blue',
                'width' => '28%'
            )
        ),
        array(
            'header' => 'เลขที่หนังสือ',
            'value' => '($data->letterDef)',
            'htmlOptions' => array(
                'style' => 'text-align:center;color:blue',
                'width' => '15%'
            )
        ),
        array(
            'header' => 'ระหว่างวันที่',
            'value' => '($data->dateStart)',
            'htmlOptions' => array(
                'style' => 'text-align:center;color:blue',
                'width' => '7%'
            )
        ),
        array(
            'header' => 'ถึงวันที่',
            'value' => '($data->dateEnd)',
            'htmlOptions' => array(
                'style' => 'text-align:center;color:blue',
                'width' => '7%'
            )
        ),
        array(
            'header' => 'สถานที่ประชุม',
            'value' => '($data->place)',
            'htmlOptions' => array(
                'style' => 'text-align:center;color:blue',
                'width' => '15%'
            )
        ),
        array(
            'header' => 'ค่าใช้จ่าย',
            'value' => '($data->trueCost)',
            'htmlOptions' => array(
                'style' => 'text-align:center;color:blue',
                'width' => '6%'
            )
        ),
        array(
            'header' => 'แก้ไข',
            'class' => 'CLinkColumn',
            'imageUrl' => 'images/edit.png',
            'urlExpression' => 'Yii::app()->createUrl("/save/InsertUpdate", array("id" =>$data->ID,"letDef"=>$data->letterDef ))',
            'htmlOptions' => array(
                'width' => '2%',
                'align' => 'center'
            )
        ),
        array(
            'header' => 'ลบ',
            'class' => 'CLinkColumn',
            'imageUrl' => 'images/delete.png',
            'urlExpression' => 'Yii::app()->createUrl("/save/delete",array("id" => $data->ID,"letDef"=>$data->letterDef))',
            'htmlOptions' => array(
                'width' => '2%',
                'align' => 'center',
                'onclick' => 'return confirm("ยืนยันการลบรายการ")'
            )
        )
    )
));
?>
<br><br>

