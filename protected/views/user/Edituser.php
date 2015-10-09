<?php

if (Yii::app()->session["user_type_login"] == 'ADMINISTRATOR') {
    $model = new CActiveDataProvider('UserModels');
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'user-grid',
        'dataProvider' => $model,
        'columns' => array(
            array(
                'header' => 'รหัส',
                'value' => '($data->id)',
                'htmlOptions' => array(
                    'style' => 'text-align:center',
                    'width' => '2%',
                )
            ),
            array(
                'header' => 'ชื่อล็อคอิน',
                'value' => '($data->usernames)',
                'htmlOptions' => array(
                    'style' => 'text-align:center',
                    'width' => '30%',
                )
            ),
            array(
                'header' => 'ชื่อผู้ใช้',
                'value' => '($data->fullname)',
                'htmlOptions' => array(
                    'style' => 'text-align:center',
                    'width' => '30%',
                )
            ),
            array(
                'header' => 'วันที่เพิ่มข้อมูล',
                'value' => '($data->date_create)',
                'htmlOptions' => array(
                    'style' => 'text-align:center',
                    'width' => '18%',
                )
            ),
            array(
                'header' => 'สถานะการใช้งาน',
                'class' => 'CLinkColumn',
                'labelExpression' => function($data) {
                    if ($data->active == 'True') {
                        return 'เปิดการใช้งาน';
                        //return CHtml::link('รอดำเนินการ',array('Request/View', array("id" =>$data->reqNo)));
                    } else {
                        return 'ยกเลิกการใชังาน';
                    }
                },
                'urlExpression' => 'Yii::app()->createUrl("/user/Edit",array("id" => $data->id))',
                'htmlOptions' => array(
                    'width' => '10%',
                    'align' => 'center',
                    'onclick' => 'return confirm("ยืนยันการแก้ไขสถานะการใช้งาน")'
                )
            ),
            array(
                'header' => 'เคลียร์รหัสผ่าน',
                'class' => 'CLinkColumn',
                'imageUrl' => 'images/clear.png',
                'urlExpression' => 'Yii::app()->createUrl("/user/clear",array("id" => $data->id))',
                'htmlOptions' => array(
                    'width' => '10%',
                    'align' => 'center',
                    'onclick' => 'return confirm("ยืนยันการเคลียร์รหัสผ่าน")'
                )
            ),
        ),
    ));
} else {
    $this->redirect('index.php');
}
?>

