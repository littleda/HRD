<?php

class TrainingModels extends CActiveRecord {

    static function model($className = __CLASS__) {
        return parent::model($className);
    }

    function tableName() {
        return 'training';
    }

    function relations() { /* การจอยตาราง */
        return array(
            'emp' => array(self::BELONGS_TO, 'EmpModels', 'ID')
        );
    }

    public function rules() {
        return array(
                //array('dateStart', 'date', 'format' => 'dd-mm-yy'),
                // array('dateEnd', 'date', 'format' => 'dd-MM-yyyy'),
        );
    }

    function attributeLabels() {
        return array(
            'IDemp' => 'รหัสบุคลากร',
            'trainName' => 'ขออนุญาตเข้าร่วมประชุม/อบรม/สัมมนา เรื่อง',
            'dateStart' => 'ระหว่างวันที่',
            'dateEnd' => 'ถึงวันที่',
            'place' => 'สถานที่ประชุม/อบรม/สัมมนา',
            'letterRef' => 'อ้างอิงหนังสือ',
            'letterDef' => 'เลขที่หนังสือ',
            'trainType' => 'ประเภทการประชุม/อบรม/สัมมนา',
            'hotel' => 'ค่าที่พัก',
            'fare' => 'ค่าเดินทาง',
            'allowances' => 'ค่าเบี้ยงเลี้ยง',
            'signup' => 'ค่าลงทะเบียน',
            'other' => 'อื่นๆ',
            'extrapolateCost' => 'ค่าใช้จ่ายประมาณการ',
            'trueCost' => 'ค่าใช้จ่ายจริง',
        );
    }
    
    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

