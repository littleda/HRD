<?php
class UserModels extends CActiveRecord{
    static function model($className = __CLASS__) {
        return parent::model($className);
    }
      function tableName() {
        return 'user';
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

