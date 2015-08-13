<?php
$sql = "select * from employee WHERE ID ='$PID'";
$model = EmpModels::model()->findBySql($sql);
?>
<center><p><?php echo $model->titleName . $model->empName . ' ' . $model->empLname; ?>
        <br><b>ตำแหน่ง</b> <?php echo $model->position; ?> &nbsp;&nbsp;&nbsp;<b> หน่วยงาน </b><?php echo $model->workgroup . ' - ' . $model->work; ?></p></center>
<center><?php
    if (!empty($date1) && !empty($date2)) {
        echo 'ตั้งแต่วันที่ ' . DateTime::createFromFormat('Y-m-d', $date1)->format('d/m/Y') . ' ถึงวันที่ ' . DateTime::createFromFormat('Y-m-d', $date2)->format('d/m/Y');
    }
    ?>
</center><br>
<table class="table table-hover" border="1">
    <tr bgColor="#d9edf7">
        <th width="10%">จากวันที่</th>
        <th width="10%">ถึงวันที่</th>  
        <th width="30%">ประชุม/อบรม/สัมมนาเรื่อง</th>             
        <th width="5%">ประเภท</th>
        <th width="10%">สถานที่</th>
        <th>ค่าใช้จ่ายประมาณการ</th>
        <th>ค่าใช้จ่ายจริง</th>
    </tr>
    <?php
    //$count = 0;
    $sumtrue = 0;
    $sumapporx = 0;
    if (!empty($PID) && !empty($date1) && !empty($date2)) {
        $rw = Yii::app()->db->createCommand("SELECT t.*,
                    (CASE t.trainType WHEN '1' THEN 'ตามแผน training need' 
                    WHEN '2' THEN 'ตามนโยบายกระทรวง' 
                    WHEN '3' THEN 'ตามมาตรฐานวิชาชีพ' 
                    WHEN '4' THEN 'ไม่อยู่ในแผนพัฒนาบุคลากร' 
                    WHEN '5' THEN 'เป็นตัวแทนวิชาชีพและวิทยากร' END) AS train                     
                    from training t join employee e ON t.ID=e.ID 
                    where  t.ID = $PID and  date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') >= '$date1' AND date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') <= '$date2'
                    order by date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d')")->query();
    } else {
        $rw = Yii::app()->db->createCommand()
                ->select('t.*,
                                (CASE t.trainType WHEN \'1\' THEN \'ตามแผน training need\' 
                                              WHEN \'2\' THEN \'ตามนโยบายกระทรวง\' 
                                              WHEN \'3\' THEN \'ตามมาตรฐานวิชาชีพ\' 
                                              WHEN \'4\' THEN \'ไม่อยู่ในแผนพัฒนาบุคลากร\' 
                                              WHEN \'5\' THEN \'เป็นตัวแทนวิชาชีพและวิทยากร\' END) AS train ')
                ->from('training t')
                ->join('employee e', 't.ID=e.ID')
                ->where('e.ID=:id', array(':id' => $PID))
                ->order('date_format(str_to_date(t.dateStart, \'%d/%m/%Y\'), \'%Y-%m-%d\')')
                ->query();
    }
//    $rw = Yii::app()->db->createCommand()
//            ->select('CONCAT(e.titleName,e.empName,\'  \',e.empLname) AS fullname,t.*,
//                                (CASE t.trainType WHEN \'1\' THEN \'ตามแผน training need\' 
//                                              WHEN \'2\' THEN \'ตามนโยบายกระทรวง\' 
//                                              WHEN \'3\' THEN \'ตามมาตรฐานวิชาชีพ\' 
//                                              WHEN \'4\' THEN \'ไม่อยู่ในแผนพัฒนาบุคลากร\' 
//                                              WHEN \'5\' THEN \'เป็นตัวแทนวิชาชีพและวิทยากร\' END) AS train ')
//            ->from('training t')
//            ->join('employee e', 't.ID=e.ID')
//            ->where('e.ID=:id', array(':id' => $PID))
//            ->query();
    foreach ($rw as $ds) { // foreach เป็นการวน loop ให้แสดงค่าออกมา
        ?> 
        <tr> 
            <td><?php echo $ds['dateStart'] ?></td>
            <td><?php echo $ds['dateEnd'] ?></td>
            <td><?php echo $ds['trainName'] ?></td>                         
            <td><?php echo $ds['train'] ?></td> 
            <td><?php echo $ds['place'] ?></td>
            <td style="text-align: center;"><?php echo number_format($ds['extrapolateCost'], 2, '.', ','); ?></td>     
            <td style="text-align: center;"> <?php echo number_format($ds['trueCost'], 2, '.', ','); ?></td>  
        </tr>
        <?php
        $sumapporx = $sumapporx + (float) $ds['extrapolateCost'];
        $sumtrue = $sumtrue + (float) $ds['trueCost'];
        //$count = $count + (int) $ds['trueCost'];
    }
    ?>
    <tr>
        <td style="text-align: center;" colspan="5">รวมค่าใช้จ่าย</td>                       
        <td style="text-align: center;"><?php echo number_format($sumapporx, 2, '.', ','); ?></td>
        <td style="text-align: center;"><?php echo number_format($sumtrue, 2, '.', ','); ?></td>

    </tr>
</table>
<!--<p align="right"><strong>ค่าใช้จ่ายรวม:</strong> <?php //echo $count;   ?> บาท</p> -->