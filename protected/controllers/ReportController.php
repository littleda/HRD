<?php

class ReportController extends Controller {

    function actionPersonView() {
        $this->render('byperson');
    }

    function actionWorkgroupView() {
        $this->render('byworkgroup');
    }

    function actionTraintypeView() {
        $this->render('bytraintype');
    }

    function actionDateView() {
        $this->render('bydate');
    }

    function actionshowpersonexcel($PID = null,$date1=null,$date2=null) {
        if (!empty($PID)) {
            Yii::app()->request->sendFile('Report_byperson_' . $PID . '.xls', $this->renderPartial('ExcelPersonViews', array("PID" => $PID,"date1" => $date1, "date2" => $date2), TRUE));
        }
    }

    function actionshowdateexcel($date1 = null, $date2 = null) {
        if (!empty($date1) & !empty($date2)) {
            Yii::app()->request->sendFile('Report_bydate_' . $date1 . '_' . $date2 . '.xls', $this->renderPartial('ExcelDateViews', array("dateS" => $date1, "dateE" => $date2), TRUE));
        }
    }

    function actionshowworkgroupexcel($wg = null, $w = null, $t = null,$date1=null,$date2=null) {
        if (!empty($wg)) {
            //if (!empty($t)) {
               Yii::app()->request->sendFile('Report_byworkgroup_'.$wg.$w.$t.'_'. date('d/m/y') . '.xls', $this->renderPartial('ExcelWorkgroupViews', array("workgroup" => $wg, "work" => $w,"traintype" => $t,"date1" => $date1, "date2" => $date2), TRUE));
           // } else {
           //     Yii::app()->request->sendFile('Report_byworkgroup_' .$wg.$w. date() . '.xls', $this->renderPartial('ExcelWorkgroupViews', array("wg" => $wg, "w" => $w), TRUE));
          //  }
        }
    }

    function actionshowtraintypeexcel($traintype = null,$date1=null,$date2=null) {
        if (!empty($traintype)) {
            Yii::app()->request->sendFile('Report_bytraintype' . $traintype . '_' . date('d/m/y') . '.xls', $this->renderPartial('ExcelTraintypeViews', array("traintype" => $traintype,"date1" => $date1, "date2" => $date2), TRUE));
        }
    }

    function actiontest() {
        $this->render('testajax');
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

