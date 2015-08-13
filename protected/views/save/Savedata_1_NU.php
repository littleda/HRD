
<div class="container">

    <div class="panel panel-info">
        <div class="panel-heading">
            <?php
            echo CHtml::form();
            echo CHtml::label("ชื่อ &nbsp;&nbsp; ", '$for');
            echo CHtml::textField('mysearch', '', array('id' => 'mysearch',
                'width' => 100,
                'placeholder' => "ค้นหาบุคลากร",
                'class' => 'span3',
                'maxlength' => 100));
            echo CHtml::label('', '');
            echo CHtml::submitButton('ค้นหา', '', array('class' => 'btn'));
            echo CHtml::endForm();
            ?>
        </div>
        <div class="panel-body">
<?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'user-grid',
                'dataProvider' => $provider,
               // 'selectableRows' => 2, //เลือกได้หลายรายการพร้อมกัน
                'columns' => array(
                    array(
                        'header' => '####',
                        'class' => 'CLinkColumn',
                        'imageUrl' => 'images/students.png',
                        'htmlOptions' => array(
                            'style' => 'text-align:center;color:red',
                            'width' => '1%'
                        )
                    ),
                    array(
                        'header' => 'Name',
                        'value' => '($data->empName)',
                        'htmlOptions' => array(
                            'style' => 'text-align:center;color:blue',
                            'width' => '20%'
                        )
                    ),
                       array(
                        'header' => 'LastName',
                        'value' => '($data->empLname)',
                        'htmlOptions' => array(
                            'style' => 'text-align:center;color:blue',
                            'width' => '20%'
                        )
                    ),
                    
                ),
                    /* array('class' => 'CButtonColumn') */
            ));

?>

        </div>
    </div>
</div>
