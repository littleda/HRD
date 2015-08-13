
<?php if (!empty($workgroup)) { ?><center><h4><strong>กลุ่มงาน </strong>
            <?php
            echo $workgroup;
        }
        if (!empty($work)) {
            ?>
            <strong> - งาน/ฝ่าย </strong>
            <?php
            echo $work;
        }
        if (!empty($traintype)) {
            ?></h4></center> <center> ประเภทการประชุม/อบรม/สัมมนา
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
    }
    ?></center>
        <?php
        if (!empty($date1) && !empty($date2)) {
            echo '<center> ตั้งแต่วันที่ ' . DateTime::createFromFormat('Y-m-d', $date1)->format('d/m/Y') . ' ถึงวันที่ ' . DateTime::createFromFormat('Y-m-d', $date2)->format('d/m/Y') . '</center>';
        }
        ?><br>

<table class="table table-hover" border="1">
    <tr bgColor="#d9edf7">
        <th>ประชุม/อบรม/สัมมนาเรื่อง</th>
        <th>ประเภท</th>
        <th>จากวันที่</th>
        <th>ถึงวันที่</th>
        <th>สถานที่</th>                    
        <th>ผู้เข้าอบรม</th>
        <th>ค่าใช้จ่ายประมาณการ</th>
        <th>ค่าใช้จ่ายจริง</th>
    </tr>
    <?php
    //$count = 0;
    $sumtrue = 0;
    $sumapporx = 0;

    if (!empty($date1) && !empty($date2)) {
        if (!empty($traintype)) {
            if (!empty($work)) {
                $rw = Yii::app()->db->createCommand("SELECT t.*,CONCAT(e.titleName,e.empName,'  ',e.empLname) AS fullname,
                            (CASE t.trainType WHEN '1' THEN 'ตามแผน training need' 
                            WHEN '2' THEN 'ตามนโยบายกระทรวง' 
                            WHEN '3' THEN 'ตามมาตรฐานวิชาชีพ' 
                            WHEN '4' THEN 'ไม่อยู่ในแผนพัฒนาบุคลากร' 
                            WHEN '5' THEN 'เป็นตัวแทนวิชาชีพและวิทยากร' END) AS train                     
                            from training t join employee e ON t.ID=e.ID 
                            where  e.workgroup = '$workgroup' and e.work = '$work' and  t.trainType = '$traintype' and date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') >= '$date1' AND date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') <= '$date2'
                            order by date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') ")->query();
            } else {
                $rw = Yii::app()->db->createCommand("SELECT t.*,CONCAT(e.titleName,e.empName,'  ',e.empLname) AS fullname,
                            (CASE t.trainType WHEN '1' THEN 'ตามแผน training need' 
                            WHEN '2' THEN 'ตามนโยบายกระทรวง' 
                            WHEN '3' THEN 'ตามมาตรฐานวิชาชีพ' 
                            WHEN '4' THEN 'ไม่อยู่ในแผนพัฒนาบุคลากร' 
                            WHEN '5' THEN 'เป็นตัวแทนวิชาชีพและวิทยากร' END) AS train                     
                            from training t join employee e ON t.ID=e.ID 
                            where  e.workgroup = '$workgroup'  and  t.trainType = '$traintype' and date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') >= '$date1' AND date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') <= '$date2'
                            order by date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') ")->query();
            }
        } else {
            if (!empty($work)) {
                $rw = Yii::app()->db->createCommand("SELECT t.*,CONCAT(e.titleName,e.empName,'  ',e.empLname) AS fullname,
                            (CASE t.trainType WHEN '1' THEN 'ตามแผน training need' 
                            WHEN '2' THEN 'ตามนโยบายกระทรวง' 
                            WHEN '3' THEN 'ตามมาตรฐานวิชาชีพ' 
                            WHEN '4' THEN 'ไม่อยู่ในแผนพัฒนาบุคลากร' 
                            WHEN '5' THEN 'เป็นตัวแทนวิชาชีพและวิทยากร' END) AS train                     
                            from training t join employee e ON t.ID=e.ID 
                            where  e.workgroup = '$workgroup' and e.work = '$work'  and date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') >= '$date1' AND date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') <= '$date2'
                            order by date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') ")->query();
            } else {
                $rw = Yii::app()->db->createCommand("SELECT t.*,CONCAT(e.titleName,e.empName,'  ',e.empLname) AS fullname,
                            (CASE t.trainType WHEN '1' THEN 'ตามแผน training need' 
                            WHEN '2' THEN 'ตามนโยบายกระทรวง' 
                            WHEN '3' THEN 'ตามมาตรฐานวิชาชีพ' 
                            WHEN '4' THEN 'ไม่อยู่ในแผนพัฒนาบุคลากร' 
                            WHEN '5' THEN 'เป็นตัวแทนวิชาชีพและวิทยากร' END) AS train                     
                            from training t join employee e ON t.ID=e.ID 
                            where  e.workgroup = '$workgroup'  and date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') >= '$date1' AND date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') <= '$date2'
                            order by date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') ")->query();
            }
        }
    } else {
        if (!empty($traintype)) {
            if (!empty($work)) {
                $rw = Yii::app()->db->createCommand()
                        ->select('t.*,CONCAT(e.titleName,e.empName,\'  \',e.empLname) AS fullname,
                            (CASE t.trainType WHEN \'1\' THEN \'ตามแผน training need\' 
                                              WHEN \'2\' THEN \'ตามนโยบายกระทรวง\' 
                                              WHEN \'3\' THEN \'ตามมาตรฐานวิชาชีพ\' 
                                              WHEN \'4\' THEN \'ไม่อยู่ในแผนพัฒนาบุคลากร\' 
                                              WHEN \'5\' THEN \'เป็นตัวแทนวิชาชีพและวิทยากร\' END) AS train ')
                        ->from('training t')
                        ->join('employee e', 't.ID=e.ID')
                        ->where('e.workgroup=:wg and e.work=:w and  t.trainType =:t', array(':wg' => $workgroup, ':w' => $work, ':t' => $traintype))
                        ->order('date_format(str_to_date(t.dateStart, \'%d/%m/%Y\'), \'%Y-%m-%d\')')
                        ->query();
            } else {
                $rw = Yii::app()->db->createCommand()
                        ->select('t.*,CONCAT(e.titleName,e.empName,\'  \',e.empLname) AS fullname,
                            (CASE t.trainType WHEN \'1\' THEN \'ตามแผน training need\' 
                                              WHEN \'2\' THEN \'ตามนโยบายกระทรวง\' 
                                              WHEN \'3\' THEN \'ตามมาตรฐานวิชาชีพ\' 
                                              WHEN \'4\' THEN \'ไม่อยู่ในแผนพัฒนาบุคลากร\' 
                                              WHEN \'5\' THEN \'เป็นตัวแทนวิชาชีพและวิทยากร\' END) AS train ')
                        ->from('training t')
                        ->join('employee e', 't.ID=e.ID')
                        ->where('e.workgroup=:wg and  t.trainType =:t', array(':wg' => $workgroup, ':t' => $traintype))
                        ->order('date_format(str_to_date(t.dateStart, \'%d/%m/%Y\'), \'%Y-%m-%d\')')
                        ->query();
            }
        } else {
            if (!empty($work)) {
                $rw = Yii::app()->db->createCommand()
                        ->select('t.*,CONCAT(e.titleName,e.empName,\'  \',e.empLname) AS fullname,
                            (CASE t.trainType WHEN \'1\' THEN \'ตามแผน training need\' 
                                              WHEN \'2\' THEN \'ตามนโยบายกระทรวง\' 
                                              WHEN \'3\' THEN \'ตามมาตรฐานวิชาชีพ\' 
                                              WHEN \'4\' THEN \'ไม่อยู่ในแผนพัฒนาบุคลากร\' 
                                              WHEN \'5\' THEN \'เป็นตัวแทนวิชาชีพและวิทยากร\' END) AS train ')
                        ->from('training t')
                        ->join('employee e', 't.ID=e.ID')
                        ->where('e.workgroup=:wg and e.work=:w', array(':wg' => $workgroup, ':w' => $work))
                        ->order('date_format(str_to_date(t.dateStart, \'%d/%m/%Y\'), \'%Y-%m-%d\')')
                        ->query();
            } else {
                $rw = Yii::app()->db->createCommand()
                        ->select('t.*,CONCAT(e.titleName,e.empName,\'  \',e.empLname) AS fullname,
                            (CASE t.trainType WHEN \'1\' THEN \'ตามแผน training need\' 
                                              WHEN \'2\' THEN \'ตามนโยบายกระทรวง\' 
                                              WHEN \'3\' THEN \'ตามมาตรฐานวิชาชีพ\' 
                                              WHEN \'4\' THEN \'ไม่อยู่ในแผนพัฒนาบุคลากร\' 
                                              WHEN \'5\' THEN \'เป็นตัวแทนวิชาชีพและวิทยากร\' END) AS train ')
                        ->from('training t')
                        ->join('employee e', 't.ID=e.ID')
                        ->where('e.workgroup=:wg ', array(':wg' => $workgroup))
                        ->order('date_format(str_to_date(t.dateStart, \'%d/%m/%Y\'), \'%Y-%m-%d\')')
                        ->query();
            }
        }
    }



//    if (!empty($t)) {
//        $rw = Yii::app()->db->createCommand()
//                ->select('t.*,CONCAT(e.titleName,e.empName,\'  \',e.empLname) AS fullname,
//                            (CASE t.trainType WHEN \'1\' THEN \'ตามแผน training need\' 
//                                              WHEN \'2\' THEN \'ตามนโยบายกระทรวง\' 
//                                              WHEN \'3\' THEN \'ตามมาตรฐานวิชาชีพ\' 
//                                              WHEN \'4\' THEN \'ไม่อยู่ในแผนพัฒนาบุคลากร\' 
//                                              WHEN \'5\' THEN \'เป็นตัวแทนวิชาชีพและวิทยากร\' END) AS train ')
//                ->from('training t')
//                ->join('employee e', 't.ID=e.ID')
//                ->where('e.workgroup=:wg and e.work=:w and  t.trainType =:t', array(':wg' => $wg, ':w' => $w, ':t' => $t))
//                ->query();
//    } else {
//        $rw = Yii::app()->db->createCommand()
//                ->select('t.*,CONCAT(e.titleName,e.empName,\'  \',e.empLname) AS fullname,
//                            (CASE t.trainType WHEN \'1\' THEN \'ตามแผน training need\' 
//                                              WHEN \'2\' THEN \'ตามนโยบายกระทรวง\' 
//                                              WHEN \'3\' THEN \'ตามมาตรฐานวิชาชีพ\' 
//                                              WHEN \'4\' THEN \'ไม่อยู่ในแผนพัฒนาบุคลากร\' 
//                                              WHEN \'5\' THEN \'เป็นตัวแทนวิชาชีพและวิทยากร\' END) AS train ')
//                ->from('training t')
//                ->join('employee e', 't.ID=e.ID')
//                ->where('e.workgroup=:wg and e.work=:w', array(':wg' => $wg, ':w' => $w))
//                ->query();
//    }
    foreach ($rw as $ds) { // foreach เป็นการวน loop ให้แสดงค่าออกมา
        ?> 
        <tr> 
            <td><?php echo $ds['trainName'] ?></td>
            <td><?php echo $ds['train'] ?></td>
            <td><?php echo $ds['dateStart'] ?></td>
            <td><?php echo $ds['dateEnd'] ?></td>                 
            <td><?php echo $ds['place'] ?></td>                         
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
    <td style="text-align: center;" colspan="6">รวมค่าใช้จ่าย</td>     
    <td style="text-align: center;"><?php echo number_format($sumapporx, 2, '.', ','); ?></td>
    <td style="text-align: center;"><?php echo number_format($sumtrue, 2, '.', ','); ?></td> 
</table>
<!--<p align="right"><strong>ค่าใช้จ่ายรวม:</strong> <?php //echo $count;                  ?> บาท</p> -->