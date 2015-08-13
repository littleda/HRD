<center><h4><?php
        if (!empty($dateS) && !empty($dateE)) {
            echo 'ตั้งแต่วันที่ ' . DateTime::createFromFormat('Y-m-d', $dateS)->format('d/m/Y') . ' ถึงวันที่ ' . DateTime::createFromFormat('Y-m-d', $dateE)->format('d/m/Y');
        }
        ?>
    </h4></center>
<table class="table table-hover" border="1">
    <tr bgColor="#d9edf7">        
        <th style="text-align: center;" width="3%">วันที่</th>
        <th style="text-align: center;" width="4%">ถึงวันที่</th>
        <th style="text-align: center;" width="7%">ผู้เข้าอบรม</th>
        <th style="text-align: center;" width="18%">ประชุม/อบรม/สัมมนาเรื่อง</th>
        <th style="text-align: center;" width="7%">ประเภท</th>
        <th style="text-align: center;" width="8%">สถานที่</th>
        <th style="text-align: center;" width="4%">ค่าใช้จ่ายประมาณการ</th>
        <th style="text-align: center;" width="4%">ค่าใช้จ่ายจริง</th>
    </tr>
    <?php
    // $count = 0;
    $sumtrue = 0;
    $sumapporx = 0;
    $rw = Yii::app()->db->createCommand("SELECT t.dateStart AS dateStart,
                   t.dateEnd AS dateEnd, 
                    CONCAT(e.empName,'  ',e.empLname) AS NAME, t.trainName,
                    (CASE t.trainType WHEN '1' THEN 'ตามแผน training need' 
                    WHEN '2' THEN 'ตามนโยบายกระทรวง' 
                    WHEN '3' THEN 'ตามมาตรฐานวิชาชีพ' 
                    WHEN '4' THEN 'ไม่อยู่ในแผนพัฒนาบุคลากร' 
                    WHEN '5' THEN 'เป็นตัวแทนวิชาชีพและวิทยากร' END) AS trainType ,
                    t.place,t.extrapolateCost,t.trueCost
                    from training t join employee e ON t.ID=e.ID 
                    where date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') >= '$dateS' AND date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') <= '$dateE'
                    order by date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') ")->query();
    //where (t.dateStart BETWEEN '$dateS' AND '$dateE') OR (t.dateEnd BETWEEN '$dateS' AND '$dateE')")->query();
    foreach ($rw as $ds) { // foreach เป็นการวน loop ให้แสดงค่าออกมา
        ?> 
        <tr> <td><?php echo $ds['dateStart'] ?></td>
            <td><?php echo $ds['dateEnd'] ?></td>
            <td><?php echo $ds['NAME'] ?></td>
            <td><?php echo $ds['trainName'] ?></td>
            <td><?php echo $ds['trainType'] ?></td>
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
        <td style="text-align: center;" colspan="6">รวมค่าใช้จ่าย</td>                       
        <td style="text-align: center;"><?php echo number_format($sumapporx, 2, '.', ','); ?></td>
        <td style="text-align: center;"><?php echo number_format($sumtrue, 2, '.', ','); ?></td>
    </tr> 
</table>
<!--<p align="right"><strong>ค่าใช้จ่ายรวม:</strong> <?php //echo $count;     ?> บาท</p> -->