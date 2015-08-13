<?php

class EmpModels extends CActiveRecord {

    static function model($className = __CLASS__) {
        return parent::model($className);
    }

    function tableName() {
        return 'employee';
    }

    function relations() {
        return array();
    }

    function attributeLabels() {
        return array(
            'IDemp' => 'รหัสบุคลากร',
            'titleName' => 'คำนำหน้า',
            'empName' => 'ชื่อ',
            'empLname' => 'สกุล',
            'position' => 'ตำแหน่ง',
            'levels' => 'ระดับ',
            'employeeType' => 'ประเภทบุคลากร',
            'workgroup' => 'กลุ่มงาน',
            'work' => 'งาน/ฝ่าย'
        );
    }

    function getData($id) {
        $sql = "SELECT * from Employee";

        $data = Yii::app()->db
                ->createCommand($sql)
                ->where('ID=:id', array(':id'=>$id))
                ->queryAll();
        return $data;
    }

//    public static function getValue($employeeType){ // สร้าง "ฟังก์ชั่นที่ 1"
//        $arrType = array(
//            0=>'ป่วย',
//            1=>'ลากิจส่วนตัว',
//            2=>'ลาคลอดบุตร',
//            3=>'ลาพักร้อน',
//        );
//        return $arrType[$employeeType];
//    }
//    public static function setFilter(){ // สร้าง "ฟังก์ชั่นที่ 2"
//        return array(
//            ''=>'',
//            0=>'ป่วย',
//            1=>'ลากิจส่วนตัว',
//            2=>'ลาคลอดบุตร',
//            3=>'ลาพักร้อน',
//        );
//    }
}

/* 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

