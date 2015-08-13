<div class="panel panel-danger">
    <div class="panel-heading" align="center">
        <h3 class="panel-title">รายงานการประชุม/อบรม/สัมมนา ตามช่วงเวลา</h3>
    </div>

</div>

<link href="<?php echo Yii::app()->theme->baseUrl; ?>/datepicker/css/jquery-ui.min.css" rel="stylesheet">
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/datepicker/js/jquery.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/datepicker/js/jquery-ui.min.js"></script>


<?php
echo CHtml::form('');

if (!empty($_POST['datepicker1'])) {
    $strDate1 = $_POST['datepicker1'];
    $dateStart = DateTime::createFromFormat('d/m/Y', $strDate1)->format('Y-m-d');

    // echo "<script type=\"text/javascript\"> alert($strDate1);</script>";
}

if (!empty($_POST['datepicker2'])) {
    $strDate2 = $_POST['datepicker2'];
    $dateEnd = DateTime::createFromFormat('d/m/Y', $strDate2)->format('Y-m-d');
    //$strDate2 = date_format($strDate2,"Y-m-d");
    //$strDate2 =date("Y-m-d", strtotime($strDate2));
}

if (empty($strDate1)) {
    if (!empty($_POST['date1'])) {
        $strDate1 = $_GET['date1'];
        //   echo "<script type=\"text/javascript\"> alert($strDate1.'kkkf');</script>";
    } else {
        $strDate1 = '';
        $dateStart = '';
        //  echo "<script type=\"text/javascript\"> alert($strDate1.'kkkf2');</script>";
    }
}

if (empty($strDate2)) {
    if (!empty($_POST['date2'])) {
        $strDate2 = $_GET['date2'];

        //$strDate2 = date_format($strDate2,"Y-m-d");
    } else {
        $strDate2 = '';
        $dateEnd = '';
    }
}
?>

<div class="panel panel-primary ">
    <div class="panel-heading">ระบุเงื่อนไข</div>
    <div class="panel-body">

        <div class="form-group">
            <label >จากวันที่</label>
            <div class="input-group">                
                <input type="text" class="form-control" name="datepicker1" id="datepicker1" value="<?php echo $strDate1; ?>" readonly="" />
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
            <label >ถึงวันที่</label>
            <div class="input-group"> 
                <input type="text" class="form-control" name="datepicker2" id="datepicker2" value="<?php echo $strDate2; ?>" readonly="" />
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

<script>
    $("#datepicker1").datepicker({dateFormat: 'dd/mm/yy',
        //language: 'TH'
        //changeMonth: true,
        //changeYear: true
    });

    $("#datepicker2").datepicker({dateFormat: 'dd/mm/yy',
        //language: 'TH'
        //changeMonth: true,
        //changeYear: true
    });

    $("#datepicker1").change(function () {
        var cutdate = $("#datepicker1").val().split("/");
        if (parseInt(cutdate[2]) < "2500") {
            var year = parseInt(cutdate[2]) + 543;
            $("#datepicker1").val(cutdate[0] + "/" + cutdate[1] + "/" + year);
            //alert(year);
        }
    });
    $("#datepicker2").change(function () {
        var cutdate = $("#datepicker2").val().split("/");
        if (parseInt(cutdate[2]) < "2500") {
            var year = parseInt(cutdate[2]) + 543;
            $("#datepicker2").val(cutdate[0] + "/" + cutdate[1] + "/" + year);
            //alert(year);
        }
    });
</script>

<div class="form-group has-success col-lg-12"> 
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><font color="drak blue">รายละเอียด</font></div>
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
                    where date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') >= '$dateStart' AND date_format(str_to_date(t.dateEnd, '%d/%m/%Y'), '%Y-%m-%d') <= '$dateEnd'
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
                        <td style="text-align: center;"><?php  echo number_format( $ds['extrapolateCost'],2, '.', ',');  ?></td>     
                        <td style="text-align: center;"> <?php echo number_format( $ds['trueCost'],2, '.', ','); ?></span></td>                                 
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
                    <td style="text-align: center;"><span class="label label-warning"><?php echo number_format( $sumapporx,2, '.', ','); ?></span></td>
                    <td style="text-align: center;"><span class="label label-success"><?php echo number_format( $sumtrue,2, '.', ','); ?></span></td>
                </tr> 
            </tbody>
        </table>
        <?php
        if (($row < 2) && (!empty($dateStart) && !empty($dateEnd))) {
            echo "<script type=\"text/javascript\"> alert(\"ไม่มีข้อมูลนะจ๊ะ\");</script>";
        }
        ?>
    </div>
<!--    <p align="right"><strong>ค่าใช้จ่ายรวม:</strong> <?php //echo $count; ?> บาท</p> -->
    <br>
    <?php if (!empty($dateStart) && !empty($dateEnd)) { ?>
        <center><span class="btn btn-success btn-sm">              
                <?php echo CHtml::link('Export Excel', array('report/showdateexcel', 'dateS' => $dateStart, 'dateE' => $dateEnd)); ?>                    
            </span></center>
    <?php } ?>
    <br>
</div>




