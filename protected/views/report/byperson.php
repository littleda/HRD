<?php
echo CHtml::scriptFile('js/jquery-1.11.1.js');
echo CHtml::scriptFile('js/autocomplete.js');
echo CHtml::cssFile('css/autocomplete.css');
echo CHtml::scriptFile('js/changeyear.js');
?>

<div class="panel panel-danger">
    <div class="panel-heading" align="center">
        <h3 class="panel-title">รายงานการประชุม/อบรม/สัมมนา ตามบุคคล</h3>
    </div>
</div>

<?php
echo CHtml::form('');
//
//$criteria = new CDbCriteria();
$personid = null;
$personname = null;
$SDate = '';
$EDate = '';
$date1 = '';
$date2 = '';
//$name = '';
//$count = '';
//$list = '';

if (!empty($_POST)) {

    $personid = $_POST['h_arti_id'];
    $personname = $_POST['show_arti_topic'];
    if (empty($personname)) {
        echo "<script type=\"text/javascript\"> alert(\"เลือกบุคคลก่อนนะจ๊ะ\");</script>";
    }
    if (empty($_POST['SDate']) && !empty($_POST['EDate'])) {
        echo "<script type=\"text/javascript\"> alert(\"ใส่วันที่เริ่มต้นด้วยนะจ๊ะ\");</script>";
    }
    if (!empty($_POST['SDate']) && empty($_POST['EDate'])) {
        echo "<script type=\"text/javascript\"> alert(\"ใส่วันที่สิ้นสุดด้วยนะจ๊ะ\");</script>";
    }
    if (!empty($_POST['SDate']) && !empty($_POST['EDate'])) {

        $SDate = $_POST['SDate'];
        $EDate = $_POST['EDate'];
        $date1 = DateTime::createFromFormat('d/m/Y', $SDate)->format('Y-m-d');
        $date2 = DateTime::createFromFormat('d/m/Y', $EDate)->format('Y-m-d');
    }
    // $name = split(" ", $person);
    // $count = count($name);
//echo $name[0].$name[1];
//$name[1];
// $mysearch = $_POST['person'];
//$criteria->addSearchCondition('empName', $mysearch, true, 'AND');
//$criteria->addSearchCondition('empLname', $mysearch, true, 'OR');   
}
?>
<div class="panel panel-primary ">
    <div class="panel-heading">ระบุเงื่อนไข</div>
    <div class="panel-body"> 
        <div class="form-group">
            <label >1. เลือกบุคคล</label>

            <div class="input-group">

                <?php if (empty($personid)): ?>
                    <input name="h_arti_id" type="hidden" id="h_arti_id" value="" />      
                    <input class="form-control" name="show_arti_topic" type="text" id="show_arti_topic"  />                                 
    <!--                    <input type="text" class="form-control" name="person" id="person" />-->
                <?php else: ?>
                    <input name="h_arti_id" type="hidden" id="h_arti_id" value="<?php echo $personid ?>" />      
                    <input class="form-control" name="show_arti_topic" type="text" id="show_arti_topic" value="<?php echo $personname ?>" /> 
    <!--                    <input type="text" class="form-control" name="person" id="person" value="<?php //echo $person                      ?>"/>-->
                <?php endif; ?>
                <span class="input-group-addon"><img src='images/find.png'></span>
            </div>
            <br>
            <p><label>2. เลือกวันที่</label></p>
            <div class="col-md-1" style="text-align:right">ตั้งแต่วันที่</div>
            <div class=" col-md-5">
                <div class="input-group">
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'SDate',
                        'attribute' => 'SDate',
                        'value' => $SDate,
                        'language' => 'th',
                        // additional javascript options for the date picker plugin
                        'options' => array(
                            'showAnim' => 'fadeIn',
                        ),
                        'htmlOptions' => array(
                            'class' => 'form-control'
                        ),
                    ));
                    ?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div> 
            </div>
            <div class="col-md-1" style="text-align:right">ถึงวันที่</div>
            <div class=" col-md-5">
                <div class="input-group">
                    <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'EDate',
                        'attribute' => 'EDate',
                        'value' => $EDate,
                        'language' => 'th',
                        // additional javascript options for the date picker plugin
                        'options' => array(
                            'showAnim' => 'fadeIn',
                        ),
                        'htmlOptions' => array(
                            'class' => 'form-control'
                        ),
                    ));
                    ?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>   
        </div> <br><br>
        <div align='right'>  
            <input type="submit" value="แสดงรายงาน" class="btn btn-default" />                  
        </div>   
    </div>


    <?php echo CHtml::endForm(); ?>      
</div>


<div class="form-group has-success col-lg-12"> 
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><font color="drak blue">รายละเอียด</font></div>
        <div class="panel-body">
            <?php
            if (!empty($personid)) {
                $sql = "select * from employee WHERE ID ='$personid'";
                $model = EmpModels::model()->findBySql($sql);
                ?>
                <center><p><h4><?php echo $model->titleName . $personname; ?></h4>
                    <b>ตำแหน่ง</b> <?php echo $model->position; ?> &nbsp;&nbsp;&nbsp;<b> กลุ่มงาน </b><?php echo $model->workgroup ?>&nbsp;&nbsp;&nbsp; <b> ฝ่าย/งาน </b> <?php echo $model->work; ?></p></center>
                <center><?php
                    if (!empty($date1) && !empty($date2)) {
                        echo 'ตั้งแต่วันที่ ' . $SDate . ' ถึงวันที่ ' . $EDate;
                    }
                }
                ?>
            </center>
        </div>

        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center;" width="1%">#</th>
                    <th style="text-align: center;" width="8%">จากวันที่</th>
                    <th style="text-align: center;" width="8%">ถึงวันที่</th>
                    <th style="text-align: center;" width="35%">ประชุม/อบรม/สัมมนาเรื่อง</th>
                    <th style="text-align: center;" width="16%">ประเภท</th>
                    <th style="text-align: center;" width="16%">สถานที่</th>
                    <th style="text-align: center;" width="8%">ค่าใช้จ่ายประมาณการ</th>
                    <th style="text-align: center;" width="8%">ค่าใช้จ่ายจริง</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //if ($count == 2) {
                $sumtrue = 0;
                $sumapporx = 0;
                if (!empty($personid) && !empty($date1) && !empty($date2)) {
                    $list = Yii::app()->db->createCommand("SELECT t.*,
                    (CASE t.trainType WHEN '1' THEN 'ตามแผน training need' 
                    WHEN '2' THEN 'ตามนโยบายกระทรวง' 
                    WHEN '3' THEN 'ตามมาตรฐานวิชาชีพ' 
                    WHEN '4' THEN 'ไม่อยู่ในแผนพัฒนาบุคลากร' 
                    WHEN '5' THEN 'เป็นตัวแทนวิชาชีพและวิทยากร' END) AS train                     
                    from training t join employee e ON t.ID=e.ID
                    where  t.ID = $personid and  date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') >= '$date1' AND date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') <= '$date2'
                    order by date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d')")->query();
//                   
//                  
//                    $list = Yii::app()->db->createCommand()
//                            ->select('t.*,
//                                (CASE t.trainType WHEN \'1\' THEN \'ตามแผน training need\' 
//                                              WHEN \'2\' THEN \'ตามนโยบายกระทรวง\' 
//                                              WHEN \'3\' THEN \'ตามมาตรฐานวิชาชีพ\' 
//                                              WHEN \'4\' THEN \'ไม่อยู่ในแผนพัฒนาบุคลากร\' 
//                                              WHEN \'5\' THEN \'เป็นตัวแทนวิชาชีพและวิทยากร\' END) AS train ')
//                            ->from('training t')
//                            ->join('employee e', 't.ID=e.ID')
//                            ->where('e.ID =:id and date_format(str_to_date(t.dateStart, \'%d/%m/%Y\'), \'%Y-%m-%d\') =:ds and date_format(str_to_date(t.dateEnd, \'%d/%m/%Y\'), \'%Y-%m-%d\') =:de', array(':id' => $personid, ':ds' => $date1, ':de' => $date2))
//                            ->query();
                } else {
                    $list = Yii::app()->db->createCommand()
                            ->select('t.*,
                                (CASE t.trainType WHEN \'1\' THEN \'ตามแผน training need\' 
                                              WHEN \'2\' THEN \'ตามนโยบายกระทรวง\' 
                                              WHEN \'3\' THEN \'ตามมาตรฐานวิชาชีพ\' 
                                              WHEN \'4\' THEN \'ไม่อยู่ในแผนพัฒนาบุคลากร\' 
                                              WHEN \'5\' THEN \'เป็นตัวแทนวิชาชีพและวิทยากร\' END) AS train ')
                            ->from('training t')
                            ->join('employee e', 't.ID=e.ID')
                            ->where('e.ID=:id', array(':id' => $personid))
                            ->order('date_format(str_to_date(t.dateStart, \'%d/%m/%Y\'), \'%Y-%m-%d\')')
                            //->where('e.empName=:n and e.empLname=:ln', array(':n' => $name[0], ':ln' => $name[1]))
                            ->query();
                }
                $row = 1;
                foreach ($list as $ds) {
                    //$row++;
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $row ?></td>            
                        <td style="text-align: center;"><?php echo $ds['dateStart'] ?></td>
                        <td style="text-align: center;"><?php echo $ds['dateEnd'] ?></td>
                        <td><?php echo $ds['trainName'] ?></td> 
                        <td><?php echo $ds['train'] ?></td> 
                        <td><?php echo $ds['place'] ?></td>
                        <td style="text-align: center;"><?php echo number_format($ds['extrapolateCost'], 2, '.', ','); ?></td>     
                        <td style="text-align: center;"> <?php echo number_format($ds['trueCost'], 2, '.', ','); ?></td>                               
                    </tr>
                    <?php
                    $row++;
                    $sumapporx = $sumapporx + (float) $ds['extrapolateCost'];
                    $sumtrue = $sumtrue + (float) $ds['trueCost'];
                }
                //}
                ?>
                <tr>
                    <td style="text-align: center;" colspan="6">รวมค่าใช้จ่าย</td>                       
                    <td style="text-align: center;"><span class="label label-warning"><?php echo number_format($sumapporx, 2, '.', ','); ?></span></td>
                    <td style="text-align: center;"><span class="label label-success"><?php echo number_format($sumtrue, 2, '.', ','); ?></span></td>

                </tr>
            </tbody>
        </table>
        <?php
        if (($row < 2) && !empty($personid)) {
            echo "<script type=\"text/javascript\"> alert(\"ไม่มีข้อมูลนะจ๊ะ\");</script>";
        }
        ?>
    </div> 

<!--    <p align="right"><strong>ค่าใช้จ่ายรวม:</strong> <?php //echo $count;                ?> บาท</p> -->
    <br><?php if (!empty($personid)) { ?>

        <center><span class="btn btn-success btn-sm"> 
                <?php
                //echo Yii::app()->request->sendFile('excel_export_byperson.xls', $this->render("ExcelPersonViews", array("PID" =>$personid ))
                //$this->renderPartial('ExcelPersonViews', [$rw], TRUE));
                ?>

        <?php echo CHtml::link('Export Excel', array('report/showpersonexcel', 'PID' => $personid, 'date1' => $date1, 'date2' => $date2)); ?>                    
            </span></center>
<?php } ?>
    <br>
</div>
<script type="text/javascript">
    function make_autocom(autoObj, showObj) {
        var mkAutoObj = autoObj;
        var mkSerValObj = showObj;
        new Autocomplete(mkAutoObj, function () {
            this.setValue = function (id) {
                document.getElementById(mkSerValObj).value = id;
            }
            if (this.isModified)
                this.setValue("");
            if (this.value.length < 1 && this.isNotClick)
                return;
            return "<?php echo Yii::app()->theme->baseUrl; ?>/a/gdata.php?q=" + encodeURIComponent(this.value);
        });
    }

// การใช้งาน  
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");  
    make_autocom("show_arti_topic", "h_arti_id");
//    $("#SDate").click(function () {
//        alert("test");
//    });
//    $(document).ready(function () {
//        $("#SDate").change(function () {
//            //alert("dskkd");
//            var cutdate = $("#SDate").val().split("/");
//            if (parseInt(cutdate[2]) < "2500") {
//                var year = parseInt(cutdate[2]) + 543;
//                $("#SDate").val(cutdate[0] + "/" + cutdate[1] + "/" + year);
//                //alert(year);
//            }
//
//        });
//        $("#EDate").change(function () {
//            var cutdate = $("#EDate").val().split("/");
//            if (parseInt(cutdate[2]) < "2500") {
//                var year = parseInt(cutdate[2]) + 543;
//                $("#EDate").val(cutdate[0] + "/" + cutdate[1] + "/" + year);
//                //alert(year);
//            }
//        });
//    });
</script> 