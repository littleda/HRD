<div class="panel panel-danger">
    <div class="panel-heading" align="center">
        <h3 class="panel-title">รายงานการประชุม/อบรม/สัมมนา ตามประเภทการอบรม</h3>
    </div>
</div>
<?php
echo CHtml::scriptFile('js/jquery-1.11.1.js');
echo CHtml::scriptFile('js/changeyear.js');
echo CHtml::form('');
$traintype = '0';
$SDate = '';
$EDate = '';
$date1 = '';
$date2 = '';
if (!empty($_POST)) {
    $traintype = $_POST['traintype'];
    if ($traintype == '0') {
        echo "<script type=\"text/javascript\"> alert(\"เลือกประเภทการประชุม/อบรม/สัมมนาก่อนนะจ๊ะ\");</script>";
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
    //echo "<script type=\"text/javascript\"> ";
    //echo "$(document).ready(function () { alert($(\"#train\").val()); $(\"#train\").attr(\"selected\"); });" ;
    //echo "</script>";
}
?>
<div class="panel panel-primary ">
    <div class="panel-heading">ระบุเงื่อนไข</div>
    <div class="panel-body"> 
        <div class="form-group">            
            <label >1. เลือกประเภทการประชุม/อบรม/สัมมนา</label>
            <select class="form-control" name="traintype" id="train">
                <option value="0"> - - - เลือก - - - </option>
                <?php if ($traintype == "1"): ?>
                    <option value="1" selected="selected"> ตามแผน Training Need </option>
                <?php else: ?>
                    <option value="1" > ตามแผน Training Need </option>
                <?php endif; ?>	
                <?php if ($traintype == "2"): ?>
                    <option value="2" selected="selected"> ตามนโยบายกระทรวง </option>
                <?php else: ?>
                    <option value="2"> ตามนโยบายกระทรวง </option>
                <?php endif; ?>	
                <?php if ($traintype == "3"): ?>
                    <option value="3" selected="selected"> ตามมาตรฐานวิชาชีพ </option>    
                <?php else: ?>    
                    <option value="3"> ตามมาตรฐานวิชาชีพ </option>
                <?php endif; ?>
                <?php if ($traintype == "4"): ?>
                    <option value="4" selected="selected"> ไม่อยู่ในแผนพัฒนาบุคลากร </option>
                <?php else: ?>
                    <option value="4"> ไม่อยู่ในแผนพัฒนาบุคลากร </option>
                <?php endif; ?>
                <?php if ($traintype == "5"): ?>
                    <option value="5" selected="selected"> เป็นตัวแทนวิชาชีพหรือวิทยากร </option>
                <?php else: ?>
                    <option value="5"> เป็นตัวแทนวิชาชีพหรือวิทยากร </option>
                <?php endif; ?>
            </select>
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
        <div style="text-align:right">      
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
            <?php if (!empty($traintype)) { ?>           
                <center><h4><b>ประเภทการประชุม/อบรม/สัมมนา</b>
                        <?php
                        if ($traintype == '1') {
                            echo 'ตามแผน Training Need';
                        }
                        if ($traintype == '2') {
                            echo 'ตามนโยบายกระทรวง';
                        }
                        if ($traintype == '3') {
                            echo 'ตามมาตรฐานวิชาชีพ';
                        }
                        if ($traintype == '4') {
                            echo 'ไม่อยู่ในแผนพัฒนาบุคลากร';
                        }
                        if ($traintype == '5') {
                            echo 'เป็นตัวแทนวิชาชีพหรือวิทยากร';
                        }
                        ?>
                    </h4><br><b>
                <?php
                } if (!empty($date1) && !empty($date2)) {
                    echo 'ตั้งแต่วันที่ ' . $SDate . ' ถึงวันที่ ' . $EDate;
                }
                ?></b></center>
        </div>
        <!-- Table -->

        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center;" width="1%">#</th>
                    <th style="text-align: center;" width="26%">ประชุม/อบรม/สัมมนาเรื่อง</th>
                    <th style="text-align: center;" width="7%">จากวันที่</th>
                    <th style="text-align: center;" width="7%">ถึงวันที่</th>
                    <th style="text-align: center;" width="14%">สถานที่</th>
                    <th style="text-align: center;" width="15%">หน่วยงาน/กลุ่มงาน/งาน</th>
                    <th style="text-align: center;" width="14%">ผู้เข้าอบรม</th>
                    <th style="text-align: center;" width="8%">ค่าใช้จ่ายประมาณการ</th>
                    <th style="text-align: center;" width="8%">ค่าใช้จ่ายจริง</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //$count = 0;
                $sumtrue = 0;
                $sumapporx = 0;
                if (!empty($date1) && !empty($date2)) {
                    $list = Yii::app()->db->createCommand("SELECT t.*,CONCAT(e.workgroup,'-',e.work) as wgroup ,
                                                        CONCAT(e.titleName,e.empName,'  ',e.empLname) AS fullname                                         
                                                        from training t join employee e ON t.ID=e.ID 
                                                        where  t.trainType = $traintype and  date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') >= '$date1' AND date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') <= '$date2'
                                                        order by date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') ")->query();
                } else {
                    $list = Yii::app()->db->createCommand()
                            ->select('t.*,CONCAT(e.workgroup,\'-\',e.work) as wgroup ,CONCAT(e.titleName,e.empName,\'  \',e.empLname) AS fullname')
                            ->from('training t')
                            ->join('employee e', 't.ID=e.ID')
                            ->where('t.trainType=:id', array(':id' => $traintype))
                            ->order('date_format(str_to_date(t.dateStart, \'%d/%m/%Y\'), \'%Y-%m-%d\')')
                            ->query();
                }
//                        "select SELECT t.trainName,t.dateStart,t.dateEnd,t.place,
//                                                    CONCAT(e.workgroup,'-',e.work) AS workgroup,CONCAT(e.empName,'  ',e.empLname) AS NAME,
//                                                    t.trueCost from training t join employee e ON t.IDemp=e.IDemp ")->query();

                $row = 1;
                foreach ($list as $ds) {
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $row ?></td>
                        <td><?php echo $ds['trainName'] ?></td>
                        <td style="text-align: center;"><?php echo $ds['dateStart'] ?></td>
                        <td style="text-align: center;"><?php echo $ds['dateEnd'] ?></td>                 
                        <td><?php echo $ds['place'] ?></td> 
                        <td><?php echo $ds['wgroup'] ?></td> 
                        <td><?php echo $ds['fullname'] ?></td>
                        <td style="text-align: center;"><?php echo number_format($ds['extrapolateCost'], 2, '.', ','); ?></td>     
                        <td style="text-align: center;"> <?php echo number_format($ds['trueCost'], 2, '.', ','); ?></td>                                
                    </tr>
                    <?php
                    $row++;
                    $sumapporx = $sumapporx + (float) $ds['extrapolateCost'];
                    $sumtrue = $sumtrue + (float) $ds['trueCost'];
                    //$count = $count + (int) $ds['trueCost'];
                }
                ?>
                <tr>
                    <td style="text-align: center;" colspan="7">รวมค่าใช้จ่าย</td>                       
                    <td style="text-align: center;"><span class="label label-warning"><?php echo number_format($sumapporx, 2, '.', ','); ?></span></td>
                    <td style="text-align: center;"><span class="label label-success"><?php echo number_format($sumtrue, 2, '.', ','); ?></span></td>                        
                </tr>
            </tbody>
        </table>
        <?php
        if (($row < 2) && !empty($traintype)) {
            echo "<script type=\"text/javascript\"> alert(\"ไม่มีข้อมูลนะจ๊ะ\");</script>";
        }
        ?>
    </div>
<!--<p align="right"><strong>ค่าใช้จ่ายรวม:</strong> <?php //echo $count;                ?> บาท</p> -->
    <br>
            <?php if (!empty($traintype)) { ?>
        <center><span class="btn btn-success btn-sm">              
        <?php echo CHtml::link('Export Excel', array('report/showtraintypeexcel', 'traintype' => $traintype, 'date1' => $date1, 'date2' => $date2)); ?>                    
            </span></center>  
<?php } ?>
    <br>

</div>
