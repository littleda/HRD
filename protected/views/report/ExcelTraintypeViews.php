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
                    </h4><b>
                <?php
                } if (!empty($date1) && !empty($date2)) {
                    echo 'ตั้งแต่วันที่ ' . DateTime::createFromFormat('Y-m-d', $date1)->format('d/m/Y').' ถึงวันที่ ' .  DateTime::createFromFormat('Y-m-d', $date2)->format('d/m/Y');
                }
                ?></b></center><br>
<table class="table table-hover" border="1">
    <tr bgColor="#d9edf7">
        <th>ประชุม/อบรม/สัมมนาเรื่อง</th>
        <th>จากวันที่</th>
        <th>ถึงวันที่</th>
        <th>สถานที่</th>
        <th>หน่วยงาน/กลุ่มงาน/งาน</th>
        <th>ผู้เข้าอบรม</th>
        <th>ค่าใช้จ่ายประมาณการ</th>
        <th>ค่าใช้จ่ายจริง</th>
    </tr>
    <?php
    //$count = 0;
    $sumtrue = 0;
    $sumapporx = 0;
    if (!empty($date1) && !empty($date2)) {
        $rw = Yii::app()->db->createCommand("SELECT t.*,CONCAT(e.workgroup,'-',e.work) as wgroup ,
                                                        CONCAT(e.titleName,e.empName,'  ',e.empLname) AS fullname                                         
                                                        from training t join employee e ON t.ID=e.ID 
                                                        where  t.trainType = $traintype and  date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') >= '$date1' AND date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') <= '$date2'
                                                        order by date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') ")->query();
    } else {
        $rw = Yii::app()->db->createCommand()
                ->select('t.*,CONCAT(e.workgroup,\'-\',e.work) as wgroup ,CONCAT(e.titleName,e.empName,\'  \',e.empLname) AS fullname')
                ->from('training t')
                ->join('employee e', 't.ID=e.ID')
                ->where('t.trainType=:id', array(':id' => $traintype))
                ->order('date_format(str_to_date(t.dateStart, \'%d/%m/%Y\'), \'%Y-%m-%d\')')
                ->query();
    }

    foreach ($rw as $ds) { // foreach เป็นการวน loop ให้แสดงค่าออกมา
        ?> 
        <tr> <td><?php echo $ds['trainName'] ?></td>
            <td><?php echo $ds['dateStart'] ?></td>
            <td><?php echo $ds['dateEnd'] ?></td>                 
            <td><?php echo $ds['place'] ?></td> 
            <td><?php echo $ds['wgroup'] ?></td> 
            <td><?php echo $ds['fullname'] ?></td> 
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
        <td style="text-align: center;" colspan="6">รวมค่าใช้จ่าย</td>                       
        <td style="text-align: center;"><?php echo number_format($sumapporx, 2, '.', ','); ?></td>
        <td style="text-align: center;"><?php echo number_format($sumtrue, 2, '.', ','); ?></td>                        
    </tr>
</table>
<!--<p align="right"><strong>ค่าใช้จ่ายรวม:</strong> <?php //echo $count; ?> บาท</p> -->