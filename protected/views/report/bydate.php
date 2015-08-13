<div class="panel panel-danger">
    <div class="panel-heading" align="center">
        <h3 class="panel-title">รายงานการประชุม/อบรม/สัมมนา ตามช่วงเวลา</h3>
    </div>
</div>
<?php
echo CHtml::scriptFile('js/jquery-1.11.1.js');
echo CHtml::scriptFile('js/changeyear.js');
echo CHtml::form('');
$SDate = '';
$EDate = '';
$date1 = '';
$date2 = '';
if (!empty($_POST)) {
    if (empty($_POST['SDate'])) {
        echo "<script type=\"text/javascript\"> alert(\"ใส่วันที่เริ่มต้นด้วยนะจ๊ะ\");</script>";
    }
    if (empty($_POST['EDate'])) {
        echo "<script type=\"text/javascript\"> alert(\"ใส่วันที่สิ้นสุดด้วยนะจ๊ะ\");</script>";
    }
    if ((!empty($_POST['SDate'])) && (!empty($_POST['EDate']))) {
        $SDate = $_POST['SDate'];
        $EDate = $_POST['EDate'];
        $date1 = DateTime::createFromFormat('d/m/Y', $SDate)->format('Y-m-d');
        $date2 = DateTime::createFromFormat('d/m/Y', $EDate)->format('Y-m-d');
    }
}
?>

<div class="panel panel-primary ">
    <div class="panel-heading">ระบุเงื่อนไข</div>
    <div class="panel-body">

        <div class="form-group">
            <label >ตั้งแต่วันที่</label>
            <div class="input-group">               
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'attribute' => 'SDate',
                    'name' => 'SDate',
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
            <label >ถึงวันที่</label>
            <div class="input-group"> 
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'attribute' => 'EDate',
                    'name' => 'EDate',
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

        <div align='right'>                
            <input type="submit" value="แสดงรายงาน" class="btn btn-default" />                  
        </div>
        <?php
        //echo CHtml::submitButton('ค้นหา..', '', array('class' => 'btn btn-success'));
        echo CHtml::endForm();
        ?>

    </div>
</div>
<div class="form-group has-success col-lg-12"> 
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><font color="drak blue">รายละเอียด</font></div>
        <div class="panel-body">
            <center><h4><?php
                    if (!empty($date1) && !empty($date2)) {
                        echo 'ตั้งแต่วันที่ '.$SDate.' ถึงวันที่ '.$EDate;
                    }
                    ?>
                </h4></center>
        </div>
        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center;" width="1%">#</th>
                    <th style="text-align: center;" width="7%">วันที่</th>
                    <th style="text-align: center;" width="7%">ถึงวันที่</th>
                    <th style="text-align: center;" width="14%">ผู้เข้าอบรม</th>
                    <th style="text-align: center;" width="25%">ประชุม/อบรม/สัมมนาเรื่อง</th>
                    <th style="text-align: center;" width="15%">ประเภท</th>
                    <th style="text-align: center;" width="15%">สถานที่</th>
                    <th style="text-align: center;" width="8%">ค่าใช้จ่ายประมาณการ</th>
                    <th style="text-align: center;" width="8%">ค่าใช้จ่ายจริง</th>
                </tr>
            </thead>
            <tbody>

                <?php
                //$count = 0;
                $sumtrue = 0;
                $sumapporx = 0;
                $list = Yii::app()->db->createCommand("SELECT t.dateStart AS dateStart,
                   t.dateEnd AS dateEnd, 
                    CONCAT(e.empName,'  ',e.empLname) AS NAME, t.trainName,
                    (CASE t.trainType WHEN '1' THEN 'ตามแผน training need' 
                    WHEN '2' THEN 'ตามนโยบายกระทรวง' 
                    WHEN '3' THEN 'ตามมาตรฐานวิชาชีพ' 
                    WHEN '4' THEN 'ไม่อยู่ในแผนพัฒนาบุคลากร' 
                    WHEN '5' THEN 'เป็นตัวแทนวิชาชีพและวิทยากร' END) AS trainType ,
                    t.place,t.extrapolateCost,t.trueCost
                    from training t join employee e ON t.ID=e.ID 
                    where date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') >= '$date1' AND date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') <= '$date2'
                    order by date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') ")->query();

                $row = 1;
//  where (date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') BETWEEN '$dateStart' AND '$dateEnd')")->query();                
//                  where (t.dateStart BETWEEN '$strDate1' AND '$strDate2') OR (t.dateEnd BETWEEN '$strDate1' AND '$strDate2')")->query();
//            $list = Yii::app()->db->createCommand("select a.pdx,count(a.pdx) as pdx_count ,i.name as icdname
//            FROM vn_stat a 
//            left outer join icd101 i on i.code=a.main_pdx 
//            where (a.vstdate BETWEEN '$strDate1' AND '$strDate2')
//            and a.pdx<>'' and a.pdx is not null 
//            group by a.pdx,i.name 
//            order by pdx_count desc 
//            limit 10")->query();
//            $row = 1;
                foreach ($list as $ds) {
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $row ?></td>                       
                        <td style="text-align: center;"><?php echo $ds['dateStart'] ?></td>
                        <td style="text-align: center;"><?php echo $ds['dateEnd'] ?></td>
                        <td><?php echo $ds['NAME'] ?></td>
                        <td><?php echo $ds['trainName'] ?></td>
                        <td><?php echo $ds['trainType'] ?></td>
                        <td><?php echo $ds['place'] ?></td>
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
        if (($row < 2) && (!empty($date1) && !empty($date2))) {
            echo "<script type=\"text/javascript\"> alert(\"ไม่มีข้อมูลนะจ๊ะ\");</script>";
        }
        ?>
    </div>
<!--    <p align="right"><strong>ค่าใช้จ่ายรวม:</strong> <?php //echo $count;         ?> บาท</p> -->
    <br>
            <?php if (!empty($date1) && !empty($date2)) { ?>
        <center><span class="btn btn-success btn-sm">              
        <?php echo CHtml::link('Export Excel', array('report/showdateexcel', 'date1' => $date1, 'date2' => $date2)); ?>                    
            </span></center>
<?php } ?>
    <br>
</div>




