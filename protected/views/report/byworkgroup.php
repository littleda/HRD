<div class="panel panel-danger">
    <div class="panel-heading" align="center">
        <h3 class="panel-title">รายงานการประชุม/อบรม/สัมมนา ตามกลุ่มงาน</h3>
    </div>
</div>
<?php
echo CHtml::scriptFile('js/jquery-1.11.1.js');
echo CHtml::scriptFile('js/selectwork.js');
echo CHtml::scriptFile('js/changeyear.js');
//echo CHtml::form($action='?workgroup='$workgroup);
echo CHtml::form('');
$workgroup = '';
$work = '';
$traintype = '';
$SDate = '';
$EDate = '';
$date1 = '';
$date2 = '';
if (!empty($_POST)) {
    if (empty($_POST['SDate']) && !empty($_POST['EDate'])) {
        echo "<script type=\"text/javascript\"> alert(\"ใส่วันที่เริ่มต้นด้วยนะจ๊ะ\");</script>";
    }
    if (!empty($_POST['SDate']) && empty($_POST['EDate'])) {
        echo "<script type=\"text/javascript\"> alert(\"ใส่วันที่สิ้นสุดด้วยนะจ๊ะ\");</script>";
    }
    if (!empty($_POST['workgroup'])) {
        $workgroup = $_POST['workgroup'];
        if (!empty($_POST['work'])) {
            $work = $_POST['work'];
        }
        if (!empty($_POST['traintype'])) {
            $traintype = $_POST['traintype'];
        }
        if (!empty($_POST['SDate']) && !empty($_POST['EDate'])) {
            $SDate = $_POST['SDate'];
            $EDate = $_POST['EDate'];
            $date1 = DateTime::createFromFormat('d/m/Y', $SDate)->format('Y-m-d');
            $date2 = DateTime::createFromFormat('d/m/Y', $EDate)->format('Y-m-d');
        }
        //echo "<script type=\"text/javascript\"> alert($traintype);</script>";
    } else {
        echo "<script type=\"text/javascript\"> alert(\"เลือกกลุ่มงานก่อนนะจ๊ะ\");</script>";
    }
}
?>
<div class="panel panel-primary ">
    <div class="panel-heading">ระบุเงื่อนไข</div>
    <div class="panel-body"> 

        <div class="form-group">
            <label >1. เลือกกลุ่มงาน</label>
            <select class="form-control" name="workgroup" id="workgroup" >
                <option value="0"> - - - เลือก - - - </option>
                <?php if ($workgroup == "อำนวยการ"): ?>
                    <option value="อำนวยการ" selected="selected" > อำนวยการ </option>
                <?php else: ?>
                    <option value="อำนวยการ"> อำนวยการ </option>
                <?php endif; ?>	
                <?php if ($workgroup == "ปฐมภูมิ"): ?>
                    <option value="ปฐมภูมิ" selected="selected" > ปฐมภูมิ </option>
                <?php else: ?>
                    <option value="ปฐมภูมิ"> ปฐมภูมิ</option>
                <?php endif; ?>
                <?php if ($workgroup == "ตติยภูมิ"): ?>
                    <option value="ตติยภูมิ" selected="selected" > ตติยภูมิ </option>
                <?php else: ?>
                    <option value="ตติยภูมิ"> ตติยภูมิ</option>
                <?php endif; ?>
                <?php if ($workgroup == "พัฒนาระบบ"): ?>
                    <option value="พัฒนาระบบ" selected="selected" > พัฒนาระบบ </option>
                <?php else: ?>
                    <option value="พัฒนาระบบ"> พัฒนาระบบ</option>
                <?php endif; ?>
                <?php if ($workgroup == "การพยาบาล"): ?>
                    <option value="การพยาบาล" selected="selected" > การพยาบาล </option>
                <?php else: ?>
                    <option value="การพยาบาล"> การพยาบาล</option>
                <?php endif; ?>
            </select>

<!--            <select class="form-control" name="workgroup" id="workgroup" >
    <option value="0"> - - - เลือก - - - </option>
    <option value="อำนวยการ"> อำนวยการ </option>
    <option value="ปฐมภูมิ"> ปฐมภูมิ </option>
    <option value="ตติยภูมิ"> ตติยภูมิ </option>
    <option value="พัฒนาระบบ"> พัฒนาระบบ </option>
    <option value="การพยาบาล"> การพยาบาล </option>
</select>-->
            <br>
            <label >2. เลือกงาน/ฝ่าย</label>
            <select class="form-control" name="work" id="work">
                <?php if (!empty($work)): ?> 
                    <option value="<?php echo $work; ?>" selected="selected" > <?php echo $work; ?> </option>
                <?php else: ?>
                    <option value="0"> - - - เลือก - - - </option>          
                <?php endif; ?>
            </select>
            <br>
            <label >3. เลือกประเภทการประชุม/อบรม/สัมมนา</label>

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
            <p><label>4. เลือกวันที่</label></p>
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
                    echo '<center> ตั้งแต่วันที่ ' . $SDate . ' ถึงวันที่ ' . $EDate.'</center>';
                }
                ?>
        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center;" width="1%" >#</th>
                    <th style="text-align: center;" width="30%" >ประชุม/อบรม/สัมมนาเรื่อง</th>
                    <th style="text-align: center;" width="15%" >ประเภท</th>
                    <th style="text-align: center;" width="5%" >จากวันที่</th>
                    <th style="text-align: center;" width="5%" >ถึงวันที่</th>
                    <th style="text-align: center;" width="14%" >สถานที่</th>                    
                    <th style="text-align: center;" width="14%" >ผู้เข้าอบรม</th>
                    <th style="text-align: center;" width="8%" >ค่าใช้จ่ายประมาณการ</th>
                    <th style="text-align: center;" width="8%" >ค่าใช้จ่ายจริง</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //$count = 0;
                $sumtrue = 0;
                $sumapporx = 0;
                if (!empty($date1) && !empty($date2)) {
                    if (!empty($traintype)) {
                        if (!empty($work)) {
                            $list = Yii::app()->db->createCommand("SELECT t.*,CONCAT(e.titleName,e.empName,'  ',e.empLname) AS fullname,
                            (CASE t.trainType WHEN '1' THEN 'ตามแผน training need' 
                            WHEN '2' THEN 'ตามนโยบายกระทรวง' 
                            WHEN '3' THEN 'ตามมาตรฐานวิชาชีพ' 
                            WHEN '4' THEN 'ไม่อยู่ในแผนพัฒนาบุคลากร' 
                            WHEN '5' THEN 'เป็นตัวแทนวิชาชีพและวิทยากร' END) AS train                     
                            from training t join employee e ON t.ID=e.ID 
                            where  e.workgroup = '$workgroup' and e.work = '$work' and  t.trainType = '$traintype' and date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') >= '$date1' AND date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') <= '$date2'
                            order by date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') ")->query();
                        } else {
                            $list = Yii::app()->db->createCommand("SELECT t.*,CONCAT(e.titleName,e.empName,'  ',e.empLname) AS fullname,
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
                            $list = Yii::app()->db->createCommand("SELECT t.*,CONCAT(e.titleName,e.empName,'  ',e.empLname) AS fullname,
                            (CASE t.trainType WHEN '1' THEN 'ตามแผน training need' 
                            WHEN '2' THEN 'ตามนโยบายกระทรวง' 
                            WHEN '3' THEN 'ตามมาตรฐานวิชาชีพ' 
                            WHEN '4' THEN 'ไม่อยู่ในแผนพัฒนาบุคลากร' 
                            WHEN '5' THEN 'เป็นตัวแทนวิชาชีพและวิทยากร' END) AS train                     
                            from training t join employee e ON t.ID=e.ID 
                            where  e.workgroup = '$workgroup' and e.work = '$work'  and date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') >= '$date1' AND date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') <= '$date2'
                            order by date_format(str_to_date(t.dateStart, '%d/%m/%Y'), '%Y-%m-%d') ")->query();
                        } else {
                            $list = Yii::app()->db->createCommand("SELECT t.*,CONCAT(e.titleName,e.empName,'  ',e.empLname) AS fullname,
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
                            $list = Yii::app()->db->createCommand()
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
                            $list = Yii::app()->db->createCommand()
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
                            $list = Yii::app()->db->createCommand()
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
                            $list = Yii::app()->db->createCommand()
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
                $row = 1;

                foreach ($list as $ds) {
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $row ?></td>
                        <td><?php echo $ds['trainName'] ?></td>
                        <td><?php echo $ds['train'] ?></td>
                        <td style="text-align: center;"><?php echo $ds['dateStart'] ?></td>
                        <td style="text-align: center;"><?php echo $ds['dateEnd'] ?></td>                 
                        <td><?php echo $ds['place'] ?></td>                         
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
        if (($row < 2) && (!empty($workgroup) && !empty($work))) {
            echo "<script type=\"text/javascript\"> alert(\"ไม่มีข้อมูลนะจ๊ะ\");</script>";
        }
        ?>
    </div>    
<!--    <p align="right"><strong>ค่าใช้จ่ายรวม:</strong> <?php //echo $count;                 ?> บาท</p> -->

    <br>
    <?php
    if (!empty($workgroup)) {
//        if(empty($traintype)){
//            $traintype='0';
//        }
        ?>
        <center><span class="btn btn-success btn-sm">              
                <?php echo CHtml::link('Export Excel', array('report/showworkgroupexcel', 'wg' => $workgroup, 'w' => $work, 't' => $traintype, 'date1' => $date1, 'date2' => $date2)); ?>                    
            </span></center>  
    <?php } ?>
    <br>
</div>
