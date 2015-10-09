<?php

date_default_timezone_set("Asia/Bangkok");

//session_start();
//ob_start();
class UserController extends Controller {

    function actionLogin() {
        $this->render('Login');
    }

    function actionCheck() {
        $attributes = array();
        $attributes["usernames"] = $_POST["txt_username"];
        $attributes["passwords"] = md5($_POST["txt_password"]);

        $models = UserModels::model()->findByAttributes($attributes);
        if (!empty($models) && $models->active == 'True') {
            Yii::app()->session["member_user_login"] = $models->usernames;
            Yii::app()->session["member_fullname"] = $models->fullname;
            Yii::app()->session["user_type_login"] = $models->user_type;

            $this->redirect(Yii::app()->homeUrl);
        } else {
            //print_r($models);
            // echo "<script type=\"text/javascript\"> alert(\"ใส่ข้อมูลไม่ถูกต้องนะจ๊ะ\");</script>"; 
            $this->redirect('index.php?r=/user/Login');
        }
    }

    function actionLogout() {
        unset(Yii::app()->session["member_user_login"]);
        unset(Yii::app()->session["member_fullname"]);
        unset(Yii::app()->session["user_type_login"]);

        $this->redirect(array('Login'));
    }

    function actionUpdate($id = NULL) {
        if (!empty($id)) {
            $model = UserModels::model()->findByPk($id);

            if (!empty($_POST['UserModels'])) {
                $model->_attributes = $_POST['UserModels'];
                if (empty($model->fullname)) {
                    echo "<script type=\"text/javascript\"> alert(\"ยังใส่ข้อมูลไม่ครบนะจ๊ะ\");</script>";
                    $this->render('User', array(
                        'model' => $model,
                        'id' => $id
                    ));
                    exit(0);
                }
                $ufind = UserModels::model()->findByPk($id);
                if ((empty($model->passwords)) || (md5($ufind->passwords) == md5($model->passwords))) {
                    $model->passwords = $ufind->passwords;
                } else {
                    $model->passwords = md5($model->passwords);
                }

                if ($model->save()) {
                    //echo "<script type=\"text/javascript\"> alert(\"แก้ไขข้อมูลสำเร็จ\");</script>";
                    $this->redirect('index.php');
                    exit(0);
                }
            }
            $this->render('User', array(
                'model' => $model
            ));
        }
    }

    function actionAdduser() {
        $model = new UserModels;
        if (!empty($_POST['UserModels'])) {
            //       $character = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
            $model = new UserModels();
            $model->_attributes = $_POST['UserModels'];
            $pass[] = str_split($model->passwords);
            // echo "<script type=\"text/javascript\"> alert($pass[]);</script>";
            if (empty($model->usernames) || empty($model->passwords) || empty($model->fullname)) {
                echo "<script type=\"text/javascript\"> alert(\"ยังใส่ข้อมูลไม่ครบนะจ๊ะ\");</script>";
                $this->render('User', array(
                    'model' => $model
                ));
                exit(0);
            }
//           
//            if (in_array( array($pass), $character)) {
//                $model->passwords = md5($model->passwords); //เข้ารหัส passwords ด้วย md5
//            } else {
//                echo "<script type=\"text/javascript\"> alert(\"รหัสผ่านต้องเป็นอักษรภาษาอังกฤษหรือตัวเลข0-9\");</script>";
//                $this->render('User', array(
//                'model' => $model
//                ));
//                exit(0);
//            }

            $sql = "SELECT usernames FROM user WHERE usernames ='$model->usernames'";
            $drFind = UserModels::model()->findBySql($sql);
            if (!empty($drFind)) {
                if ($model->usernames == $drFind->usernames) {
                    echo "<script type=\"text/javascript\"> alert(\"ชื่อผู้เข้าใช้มีผู้นำไปใช้งานแล้วนะจ้ะ\");</script>";
                }
            } else {
                $model->date_create = date('Y-m-d H:i:s'); //บันทึกเวลาลงทะเบียน

                if ($model->save()) {
                    $this->redirect('index.php?r=user/View&id=' . $model->id);
                }
            }
        }
        if (Yii::app()->session["user_type_login"] == 'ADMINISTRATOR') {
            $this->render('User', array(
                'model' => $model,
            ));
        } else {
            $this->redirect('index.php');
        }
    }

    function actionView($id = null) {
        $model = new CActiveDataProvider('UserModels');
        $this->render('UserView', array(
            'model' => $model,
            'id' => $id,
        ));
    }

    function actionEdit($id = null) {
        if (!empty($id)) {
            $check = UserModels::model()->findByPk($id);
            if ($check->active == 'False') {
                $check->active = 'True';
            } else {
                $check->active = 'False';
            }
            if ($check->save()) {
                $this->redirect('index.php?r=user/Edit');
            }
        }
        //$model = new CActiveDataProvider('UserModels');
        $this->render('Edituser');
        // $this->redirect(array('View'));
    }

    function actionclear($id = NULL) {
        if (!empty($id)&&Yii::app()->session["user_type_login"] == 'ADMINISTRATOR') {
            UserModels::model()->updateByPk($id, array('passwords' => md5('1234')));
            echo "<script type=\"text/javascript\"> alert(\"เคลียร์รหัสผ่านสำเร็จ\");</script>";
        }
        
        // $model = new CActiveDataProvider('UserModels');
        $this->render('Edituser');
    }
}

?>