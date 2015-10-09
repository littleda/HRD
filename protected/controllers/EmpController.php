<?php

class EmpController extends Controller {

    function actionAddemp() {
        if (!empty($_POST['EmpModels'])) {
            $model = new EmpModels();
            //if (!empty($id)) {
            //$model = EmpModels::model()->findByPk($id);
            // }
            $model->_attributes = $_POST['EmpModels'];
            if ($model->save()) {
                $this->redirect(array('View'));
            }
        }
        $model = new EmpModels;
        if (Yii::app()->session["user_type_login"] == 'ADMINISTRATOR') {
            $this->render('Employee', array(
                'model' => $model,
            ));
        } else {
            $this->redirect('index.php');
        }
    }

    function actionView() {

        $criteria = new CDbCriteria(array('condition' => 'active = True',
                //'order' => "workgroup DESC,work",
        ));
        $criteria->order = "workgroup DESC,work";
        if (!empty($_POST)) {
            $mysearch = $_POST['mysearch'];
            $criteria->addSearchCondition('empName', $mysearch, true);
            //$criteria->addSearchCondition('IDemp', $mysearch, true, 'OR');
            $criteria->addSearchCondition('empLname', $mysearch, true, 'OR');
            $criteria->addSearchCondition('workgroup', $mysearch, true, 'OR');
            $criteria->addSearchCondition('work', $mysearch, true, 'OR');
            $criteria->addSearchCondition('active', 'True', true, 'AND');
        }
        $model = new CActiveDataProvider('EmpModels', array(
            'criteria' => $criteria,
            //'condition' => 'active = True',
            //'order' => 'ID DESC',
            //'with' => array('author'),
            //),
            'pagination' => array(
                'pagesize' => 20
            )
        ));
        //$model->criteria = $criteria;
        if (Yii::app()->session["user_type_login"] == 'ADMINISTRATOR') {
            $this->render('EmployeeView', array(
                'model' => $model
            ));
        } else {
            $this->redirect('index.php');
        }
    }

    function actionInsertUpdate($id = NULL) {
        $getModel = new EmpModels();
        if (!empty($id)) {
            $getModel = EmpModels::model()->findByPk($id);
        }

        if (!empty($_POST['EmpModels'])) {
            $getModel->_attributes = $_POST['EmpModels'];

            if (empty($getModel->CID) || empty($getModel->empName) || empty($getModel->empLname) || empty($getModel->position) || $getModel->workgroup == 'prompt' || $getModel->work == 'prompt') {
                //echo $getModel->work; 
                echo "<script type=\"text/javascript\"> alert(\"ยังใส่ข้อมูลไม่ครบนะจ๊ะ\");</script>";
                $this->render('Employee', array(
                    'model' => $getModel
                ));
                exit(0);
            }
            $getModel->CID = ereg_replace('[[:space:]]+', '', $getModel->CID);
            $sql = "select CID from employee where CID=" . $getModel->CID;
            $drFind = EmpModels::model()->findBySql($sql);
            if (empty($id)) {
                //$getModel = new EmpModels();          
                if (!empty($drFind)) {
                    if ($getModel->CID == $drFind->CID) {
                        echo "<script type=\"text/javascript\"> alert(\"ใส่รหัสประชาชนซ้ำนะจ๊ะ\");</script>";
                        $this->render('Employee', array(
                            'model' => $getModel
                        ));
                        exit(0);
                    }
                }
            }
            if (!empty($id)) {
                $cidFind = EmpModels::model()->findByPk($id);
                if (!empty($drFind)) {
                    if ($getModel->CID != $cidFind->CID) {
                        echo "<script type=\"text/javascript\"> alert(\"ใส่รหัสประชาชนซ้ำนะจ๊ะ\");</script>";
                        //echo $getModel->workgroup.$getModel->work;
                        $this->render('Employee', array(
                            'model' => $getModel
                        ));
                        exit(0);
                    }
                }
            }
            if ($getModel->employeeType == 'prompt') {
                $getModel->employeeType = '';
            }
            // if (!empty($id)) {
            // $getModel = EmpModels::model()->findByPk($id);
//                if ($getModel->ID != $id) {
//                    if ($getModel->ID == $drFind->ID) {
//                        echo "<script type=\"text/javascript\"> alert(\"รหัสพนักงานนี้มีอยู่แล้วนะจ้ะ\");</script>";
//                        $this->render('Employee', array(
//                            'model' => $getModel
//                        ));
//                        exit(0);
//                    }
//                }
//            } else {
//                if (!empty($drFind)) {
//                    if ($getModel->ID == $drFind->ID) {
//                        echo "<script type=\"text/javascript\"> alert(\"รหัสพนักงานนี้มีอยู่แล้วนะจ้ะ\");</script>";
//                        $this->render('Employee', array(
//                            'model' => $getModel
//                        ));
//                        exit(0);
//                    }
//                }
            // }
            //$getModel->_attributes = $_POST['EmpModels'];
            if ($getModel->save()) {
                $this->redirect(array('View'));
            }
        }
        if (Yii::app()->session["user_type_login"] == 'ADMINISTRATOR') {
            $this->render('Employee', array(
                'model' => $getModel
            ));
        } else {
            $this->redirect('index.php');
        }
    }

    function actioncancle($id = NULL) {
        if (!empty($id)&&Yii::app()->session["user_type_login"] == 'ADMINISTRATOR') {
//            $getModel = EmpModels::model()->findByPk($id);
//            $getModel->active = 'False';
            EmpModels::model()->updateByPk($id, array('active' => 'False'));
        }

        $this->redirect(array('View'));
    }

    function actiondelete($id = NULL) {
        if (!empty($id)&&Yii::app()->session["user_type_login"] == 'ADMINISTRATOR') {
            EmpModels::model()->deleteByPk($id);
        }
        $this->redirect(array('View'));
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

