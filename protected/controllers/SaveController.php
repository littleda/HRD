<?php

date_default_timezone_set("Asia/Bangkok");

class SaveController extends Controller {
    function actionIndex() {
        $criteria = new CDbCriteria(array('condition' => 'active = True',));
        $criteria->order = "workgroup DESC,work";
        if (!empty($_POST)) {
            $mysearch = $_POST['mysearch'];
            $criteria->addSearchCondition('empName', $mysearch, true);
            $criteria->addSearchCondition('empLname', $mysearch, true, 'OR');
            $criteria->addSearchCondition('workgroup', $mysearch, true, 'OR');
            $criteria->addSearchCondition('work', $mysearch, true, 'OR');
            $criteria->addSearchCondition('active', 'True', true, 'AND');
        }
//===========
        $model = new CActiveDataProvider('EmpModels', array(
            'pagination' => array(
                'pagesize' => 20
            )
        ));
        $model->criteria = $criteria;
//===========ส่งค่าไปแสดงที่ View
        if (Yii::app()->session["user_type_login"] == 'ADMINISTRATOR') {
            $this->render('index', array(
                'model' => $model
            ));
        } else {
            $this->redirect('index.php');
        }



        //$model = new CActiveDataProvider('EmpModels');
        //$Empmodel = EmpModels::model()->findAll();
        // $this->render('index', array(
        // "model" => $model
        //));
    }

    //------ Don't use -----
//    public function actionCreate($id = NULL, $letDef = NULL) {
//        // $model = new EmpModels();
//        //    $model2 = new TrainingModels();
//
//        $model = new EmpModels();
//        $model2 = new TrainingModels();
//        if (!empty($id)) {
//            $model = EmpModels::model()->findByPk($id);
//        }
//        if (!empty($_POST['TrainingModels'])) {
//
////            if (!empty($id)) {
////                $model = EmpModels::model()->findByPk($id);
////            }
//
//            $model2->_attributes = $_POST['TrainingModels'];
//            $model2->ID = $model->ID;
//            //$model2->trainType = '3' ;
//            if ($model2->save()) {
//                $this->redirect(array('View'));
//            }
//        }
//
//        $this->render('_form', array(
//            'model' => $model,
//            'model2' => $model2
//        ));
//    }

    function actionInsertUpdate($id = NULL, $letDef = NULL) {
        if (Yii::app()->session["user_type_login"] == 'ADMINISTRATOR') {
            if (!empty($id) & !empty($letDef)) {
                $model = EmpModels::model()->findByPk($id);
                $sql = "select * from training WHERE ID ='$id' and letterDef='$letDef'";
                $model2 = TrainingModels::model()->findBySql($sql);
            } else {
                $model = EmpModels::model()->findByPk($id);
                $model2 = new TrainingModels();
            }

            if (!empty($_POST['TrainingModels'])) {
                $model2->_attributes = $_POST['TrainingModels'];
                $model2->ID = $model->ID;
                $model2->date_create = date('Y-m-d H:i:s');
                $model2->maker = Yii::app()->session["member_fullname"];
//-------------- check input value -------------
                $sql = "select ID,letterDef from training where ID='$model2->ID' and letterDef='$model2->letterDef'";
                $drFind = TrainingModels::model()->findBySql($sql);
                if (empty($letDef)) {
//                $sql = "select ID,letterDef from training where ID=" . $model2->ID . " and letterDef=" . $model2->letterDef;
//                $drFind = EmpModels::model()->findBySql($sql);
                    if (!empty($drFind)) {
                        if ($model2->ID == $drFind->ID && $model2->letterDef == $drFind->letterDef) {
                            echo "<script type=\"text/javascript\"> alert(\"มีการบันทึกข้อมูลนี้แล้วนะจ๊ะ\");</script>";
                            $this->render('_form', array(
                                'model' => $model,
                                'model2' => $model2
                            ));
                            exit(0);
                        }
                    }
                    //$model2 = new TrainingModels();
                }
                if (!empty($letDef)) {
                    if (!empty($drFind)) {
                        if ($model2->letterDef != $letDef) {
                            echo "<script type=\"text/javascript\"> alert(\"มีการบันทึกข้อมูลนี้แล้วนะจ๊ะ\");</script>";
                            $this->render('_form', array(
                                'model' => $model,
                                'model2' => $model2
                            ));
                            exit(0);
                        }
                    }
                }
//            $sql = "select ID,letterDef from Training where ID=" . $model2->ID . " and letterDef=" . $model2->letterDef;
//            $drFind = TrainingModels::model()->findBySql($sql);
//
//            if (!empty($drFind)) {
//                if ($model2->ID == $drFind->ID && $model2->letterDef == $drFind->letterDef) {
//                    echo "<script type=\"text/javascript\"> alert(\"มีการบันทึกข้อมูลนี้แล้วนะจ๊ะ\");</script>";
//                    $this->render('_form', array(
//                        'model' => $model,
//                        'model2' => $model2
//                    ));
//                    exit(0);
//                }
//            }

                if (empty($model2->trainName) || empty($model2->place) || empty($model2->letterDef) || empty($model2->trainType) || empty($model2->dateStart) || empty($model2->dateEnd)) {
                    echo "<script type=\"text/javascript\"> alert(\"ยังใส่ข้อมูลไม่ครบนะจ๊ะ\");</script>";
                    $this->render('_form', array(
                        'model' => $model,
                        'model2' => $model2
                    ));
                    exit(0);
                }
                $dateS = explode("/", $model2->dateStart);
                $dateE = explode("/", $model2->dateEnd);
                //echo $dateS[2];
                //echo $dateE[2];
                if (intval($dateS[2]) > intval($dateE[2])) {
                    echo "<script type=\"text/javascript\"> alert(\"เลือกช่วงวันที่ไม่ถูกต้องนะจ๊ะ\");</script>";
                    $this->render('_form', array(
                        'model' => $model,
                        'model2' => $model2
                    ));
                    exit(0);
                } else if (intval($dateS[2]) == intval($dateE[2])) {
                    if (intval($dateS[1]) > intval($dateE[1])) {
                        echo "<script type=\"text/javascript\"> alert(\"เลือกช่วงวันที่ไม่ถูกต้องนะจ๊ะ\");</script>";
                        $this->render('_form', array(
                            'model' => $model,
                            'model2' => $model2
                        ));
                        exit(0);
                    } else if (intval($dateS[1]) == intval($dateE[1])) {
                        if (intval($dateS[0]) > intval($dateE[0])) {
                            echo "<script type=\"text/javascript\"> alert(\"เลือกช่วงวันที่ไม่ถูกต้องนะจ๊ะ\");</script>";
                            $this->render('_form', array(
                                'model' => $model,
                                'model2' => $model2
                            ));
                            exit(0);
                        }
                    }
                }

                if ($model2->reqHospital == '1') {
                    if ($model2->DetailHotel != '1' && $model2->DetailFare != '1' && $model2->DetailAllowances != '1' && $model2->DetailSignup != '1' && $model2->DetailOther != '1') {
                        echo "<script type=\"text/javascript\"> alert(\"เลือกรายละเอียดการเบิกค่าใช้จ่ายจากโรงพยาบาลด้วยนะจ๊ะ\");</script>";
                        $this->render('_form', array(
                            'model' => $model,
                            'model2' => $model2
                        ));
                        exit(0);
                    }
                    if ($model2->DetailOther == '1') {
                        if (empty($model2->otherDetailHosp)) {
                            echo "<script type=\"text/javascript\"> alert(\"ระบุค่าใช้จ่ายอื่นๆด้วยนะจ๊ะ\");</script>";
                            $this->render('_form', array(
                                'model' => $model,
                                'model2' => $model2
                            ));
                            exit(0);
                        }
                    }
                }

//            if ($model2->reqOrganizer == '1') {
//                if ($model2->DetailHotel != '2' && $model2->DetailFare != '2' && $model2->DetailAllowances != '2' && $model2->DetailSignup != '2' && $model2->DetailOther != '2') {
//                    echo "<script type=\"text/javascript\"> alert(\"เลือกรายละเอียดการเบิกค่าใช้จ่ายจากผู้จัดด้วยนะจ๊ะ\");</script>";
//                    $this->render('_form', array(
//                        'model' => $model,
//                        'model2' => $model2
//                    ));
//                    exit(0);
//                }
//                if ($model2->DetailOther == '2') {
//                    if (empty($model2->otherDetailOrgaz)) {
//                        echo "<script type=\"text/javascript\"> alert(\"ระบุค่าใช้จ่ายอื่นๆด้วยนะจ๊ะ\");</script>";
//                        $this->render('_form', array(
//                            'model' => $model,
//                            'model2' => $model2
//                        ));
//                        exit(0);
//                    }
//                }
//            }

                if ($model2->DetailOther != '1') {
                    if (!empty($model2->otherDetailHosp)) {
                        echo "<script type=\"text/javascript\"> alert(\"ยังไม่เลือกเบิกค่าใช้จ่ายอื่นๆจากโรงพยาบาล ระบุค่าใช้จ่ายอื่นๆไม่ได้นะจ๊ะ\");</script>";
                        $this->render('_form', array(
                            'model' => $model,
                            'model2' => $model2
                        ));
                        exit(0);
                    }
                }
                if ($model2->DetailOther != '2') {
                    if (!empty($model2->otherDetailOrgaz)) {
                        echo "<script type=\"text/javascript\"> alert(\"ยังไม่เลือกเบิกค่าใช้จ่ายอื่นๆจากผู้จัด ระบุค่าใช้จ่ายอื่นๆไม่ได้นะจ๊ะ\");</script>";
                        $this->render('_form', array(
                            'model' => $model,
                            'model2' => $model2
                        ));
                        exit(0);
                    }
                }


                if ($model2->DetailHotel == '1' || $model2->DetailFare == '1' || $model2->DetailAllowances == '1' || $model2->DetailSignup == '1' || $model2->DetailOther == '1') {
                    if ($model2->reqHospital != '1') {
                        echo "<script type=\"text/javascript\"> alert(\"เลือกเบิกค่าใช้จ่ายจากโรงพพยาบาลด้วยนะจ๊ะ\");</script>";
                        $this->render('_form', array(
                            'model' => $model,
                            'model2' => $model2
                        ));
                        exit(0);
                    }
                }

                if ($model2->DetailHotel == '2' || $model2->DetailFare == '2' || $model2->DetailAllowances == '2' || $model2->DetailSignup == '2' || $model2->DetailOther == '2') {
                    if ($model2->reqOrganizer != '1') {
                        echo "<script type=\"text/javascript\"> alert(\"เลือกเบิกค่าใช้จ่ายจากผู้จัดด้วยนะจ๊ะ\");</script>";
                        $this->render('_form', array(
                            'model' => $model,
                            'model2' => $model2
                        ));
                        exit(0);
                    }
                }

                if ($model2->hotel == '0.00') {
                    if ($model2->DetailHotel == '1' || $model2->DetailHotel == '2') {
                        echo "<script type=\"text/javascript\"> alert(\"ไม่มีค่าที่พัก เลือกเบิกค่าใช้จ่ายไม่ได้\");</script>";
                        $this->render('_form', array(
                            'model' => $model,
                            'model2' => $model2
                        ));
                        exit(0);
                    }
                }

                if ($model2->fare == '0.00') {
                    if ($model2->DetailFare == '1' || $model2->DetailFare == '2') {
                        echo "<script type=\"text/javascript\"> alert(\"ไม่มีค่าเดินทาง เลือกเบิกค่าใช้จ่ายไม่ได้\");</script>";
                        $this->render('_form', array(
                            'model' => $model,
                            'model2' => $model2
                        ));
                        exit(0);
                    }
                }

                if ($model2->allowances == '0.00') {
                    if ($model2->DetailAllowances == '1' || $model2->DetailAllowances == '2') {
                        echo "<script type=\"text/javascript\"> alert(\"ไม่มีค่าเบี้ยเลี้ยง เลือกเบิกค่าใช้จ่ายไม่ได้\");</script>";
                        $this->render('_form', array(
                            'model' => $model,
                            'model2' => $model2
                        ));
                        exit(0);
                    }
                }

                if ($model2->signup == '0.00') {
                    if ($model2->DetailSignup == '1' || $model2->DetailSignup == '2') {
                        echo "<script type=\"text/javascript\"> alert(\"ไม่มีค่าลงทะเบียน เลือกเบิกค่าใช้จ่ายไม่ได้\");</script>";
                        $this->render('_form', array(
                            'model' => $model,
                            'model2' => $model2
                        ));
                        exit(0);
                    }
                }

                if ($model2->other == '0.00') {
                    if ($model2->DetailOther == '1' || $model2->DetailOther == '2') {
                        echo "<script type=\"text/javascript\"> alert(\"ไม่มีค่าใช้จ่ายอื่นๆ เลือกเบิกค่าใช้จ่ายไม่ได้\");</script>";
                        $this->render('_form', array(
                            'model' => $model,
                            'model2' => $model2
                        ));
                        exit(0);
                    }
                }
//----------------------Lock carNo ---------------------------------------------------
//            if ($model2->fareType == '3') {
//                if (empty($model2->carNo)) {
//                    echo "<script type=\"text/javascript\"> alert(\"ใส่หมายเลขทะเบียนรถด้วยนะจ๊ะ\");</script>";
//                    $this->render('_form', array(
//                        'model' => $model,
//                        'model2' => $model2
//                    ));
//                    exit(0);
//                }
//            }
//--------------The end check input value -------------
                // $model2->dateStart = ;
                if ($model2->save()) {
                    // $this->redirect(array('View'));
                    $this->redirect('index.php?r=save/View&id=' . $model2->ID . '&letDef=' . $model2->letterDef);
                }
            }

            $this->render('_form', array(
                'model' => $model,
                'model2' => $model2
            ));
        } else {
            $this->redirect('index.php');
        }
    }

    function actiondelete($id = NULL, $letDef = NULL) {
        //$model2 = new TrainingModels();
        if (Yii::app()->session["user_type_login"] == 'ADMINISTRATOR') {
            if (!empty($id)) {
                $sql = "SELECT * FROM training WHERE ID ='$id' and letterDef='$letDef'";

                $del = TrainingModels::model()->findBySql($sql);
                TrainingModels::model()->deleteAllByAttributes($del);

//            $model=TrainingModels::model()->findAllByAttributes(array(
//                'IDemp' => $id, 
//                'letterDef' => $letDef
//            ));
                // TrainingModels::model()->deleteByPk($id);
            }
            $this->redirect(array('View'));
        } else {
            $this->redirect('index.php');
        }
    }

    function actionView($id = NULL) {
        if (Yii::app()->session["user_type_login"] == 'ADMINISTRATOR') {
            if (!empty($id)) {
                //$criteria=new CDbCriteria;
                //$criteria->condition='id='.$id .' and letDef='.$letDef;
                // $criteria->condition=;
//    $model = new CActiveDataProvider('TrainingModels', array(            
//            'criteria' => $criteria,
//               
//                
//                //'order' => 'create_time DESC',
//                //'with' => array('author'),
//                        
//        )); 
                // $sql = "select * from training WHERE ID ='$id' and letterDef='$letDef'";
                // $criteria = TrainingModels::model()->findBySql($sql);
                $criteria = new CDbCriteria(array('condition' => 'ID=' . $id,
                    'limit' => 1,
                ));
                $criteria->order = "date_create DESC";

                //$criteria->condition='isActive = 1';
                $model = new CActiveDataProvider('TrainingModels', array(
                    'criteria' => $criteria,
                    'pagination' => false
                ));
            } else {
                $criteria = new CDbCriteria(array(
                    //'with'=>array('training'=>array('alias'=>'training','with'=>array('employee'=>array('alias'=>'employee')))),
                    //'with' => array('training','employee'),
                    //'condition' => 't.ID=:id',
                    // 'params' => array(':id' => $id),
                    'order' => 'date_create DESC',
                    'join' => 'INNER JOIN employee e ON e.ID=t.ID',
                ));
                if (!empty($_POST)) {
                    $mysearch = $_POST['mysearch'];
                    $criteria->addSearchCondition('trainName', $mysearch, true);
                    $criteria->addSearchCondition('letterDef', $mysearch, true, 'OR');
                    $criteria->addSearchCondition('e.empName', $mysearch, true, 'OR');
                    //$criteria->addSearchCondition('work', $mysearch, true, 'OR');
                }
                $model = new CActiveDataProvider('TrainingModels', array(
                    'criteria' => $criteria,
                ));
            }
            //$sql="select *  from training order by IDemp DESC";
            $model->criteria = $criteria;
            $this->render('TrainView', array(
                'model' => $model,
                'id' => $id
            ));
        } else {
            $this->redirect('index.php');
        }
    }

    //------ Don't use -----
//    function actionData() {
//        // $prov = new CActiveDataProvider('EmpModels');
//
//        $model = EmpModels::model()->findAll();
//        $this->render("Savedata", array(
//            "model" => $model
//        ));
//    }
//    function actionData() { 
// 
//        $criteria = new CDbCriteria();
//        $criteria->order = "IDemp DESC";
//        if (!empty($_POST)) {
//            $mysearch = $_POST['mysearch'];
//            $criteria->addSearchCondition('empName', $mysearch, true);
//        }
////===========
//        $prov = new CActiveDataProvider('EmpModels', array(
//            'pagination' => array(
//                'pagesize' => 5
//            )
//        ));
//        $prov->criteria = $criteria;
////===========ส่งค่าไปแสดงที่ View
//        $this->render('Savedata', array(
//            'provider' => $prov
//                 
//        ));
//    }
//    protected function performAjaxValidation($model) {
//        if (isset($_POST['ajax']) && $_POST['ajax'] === 'My-form') {
//            echo CActiveForm::validate($model);
//            Yii::app()->end();
//        }
//    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

