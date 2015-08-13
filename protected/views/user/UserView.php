<div class="alert alert-success" role="alert">เพิ่มผู้ใช้สำเร็จ</div>

<?php
//$this->widget('zii.widgets.grid.CGridView', array(
//    'id' => 'user-grid',
//    'dataProvider' => $model,
//        )
//);
$data = UserModels::model()->findByPk($id);
//$data=UserModels::model()->findAll();
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name' => 'รหัส',
            //'type' => 'raw',
            'value' => $data->id,
        ),
        array(
            'name' => 'Username',
            'type' => 'raw',
            'value' => $data->usernames,
        ),
        array(
            'name' => 'Fullname',
            'type' => 'raw',
            'value' => $data->fullname,
        ),
        array(
            'name' => 'วันที่เพิ่มข้อมูล',
            'type' => 'raw',
            'value' => $data->date_create,
        ),
        array(
            'name' => 'User type',
            'type' => 'raw',
            'value' => $data->user_type,
        ),
    ),
))

?>

<br>
<div align='center'>
    <a class="btn btn-default" href="index.php?r=user/Adduser" role="button">กลับ</a>
</div>
<br><br>