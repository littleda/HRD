$(document).ready(function () {
        var check;
        $("#workgroup").click(function () {
            check = 0;
        });

        $("#work").mousedown(function () {
            check = check + 1
            if (check == 1) {
                if ($("#workgroup").val() == 'อำนวยการ') {
                    $(".st,.nd,.dv,.ns").remove();
                    $("#work").append("<option class=\"gn\" value=\"บริหารทั่วไป\">บริหารทั่วไป</option>");
                    $("#work").append("<option class=\"gn\" value=\"บำบัดน้ำเสีย\">บำบัดน้ำเสีย</option>");
                    $("#work").append("<option class=\"gn\" value=\"งานสนาม\">งานสนาม</option>");
                    $("#work").append("<option class=\"gn\" value=\"ฝ่ายการเจ้าหน้าที่\">ฝ่ายการเจ้าหน้าที่</option>");
                    $("#work").append("<option class=\"gn\" value=\"งานยานพาหนะ\">งานยานพาหนะ</option>");
                    $("#work").append("<option class=\"gn\" value=\"กลุ่มงานการเงินและบัญชี\">กลุ่มงานการเงินและบัญชี</option>");
                    $("#work").append("<option class=\"gn\" value=\"ศูนย์คอมพิวเตอร์\">ศูนย์คอมพิวเตอร์</option>");
                    $("#work").append("<option class=\"gn\" value=\"โภชนาการ\">โภชนาการ</option>");
                    $("#work").append("<option class=\"gn\" value=\"ซ่อมบำรุง\">ซ่อมบำรุง</option>");
                    $("#work").append("<option class=\"gn\" value=\"พัสดุ\">พัสดุ</option>");
                    $("#work").append("<option class=\"gn\" value=\"ประชาสัมพันธ์\">ประชาสัมพันธ์</option>");
                }
                if ($("#workgroup").val() == 'ปฐมภูมิ') {
                    $(".gn,.nd,.dv,.ns").remove();
                    $("#work").append("<option class=\"st\" value=\"เวชกรรมสังคม\">เวชกรรมสังคม</option>");
                    $("#work").append("<option class=\"st\" value=\"บริการสุขภาพชุมชน\">บริการสุขภาพชุมชน</option>");
                    $("#work").append("<option class=\"st\" value=\"สุขศึกษา/ประชาสัมพันธ์\">สุขศึกษา/ประชาสัมพันธ์</option>");
                    $("#work").append("<option class=\"st\" value=\"อาชีวเวชกรรม\">อาชีวเวชกรรม</option>");
                    $("#work").append("<option class=\"st\" value=\"แพทย์แผนไทย\">แพทย์แผนไทย</option>");
                }

                if ($("#workgroup").val() == 'ตติยภูมิ') {
                    $(".st,.gn,.dv,.ns").remove();
                    $("#work").append("<option class=\"nd\" value=\"องค์กรแพทย์\">องค์กรแพทย์</option>");
                    $("#work").append("<option class=\"nd\" value=\"เวชกรรมฟื้นฟู\">เวชกรรมฟื้นฟู</option>");
                    $("#work").append("<option class=\"nd\" value=\"ทันตกรรม\">ทันตกรรม</option>");
                    $("#work").append("<option class=\"nd\" value=\"เภสัชกรรม\">เภสัชกรรม</option>");
                    $("#work").append("<option class=\"nd\" value=\"รังสีวิทยา\">รังสีวิทยา</option>");
                    $("#work").append("<option class=\"nd\" value=\"ธนาคารเลือด\">ธนาคารเลือด</option>");
                    $("#work").append("<option class=\"nd\" value=\"พยาธิวิทยา\">พยาธิวิทยา</option>");
                    $("#work").append("<option class=\"nd\" value=\"จิตเวช\">จิตเวช</option>");
                }

                if ($("#workgroup").val() == 'พัฒนาระบบ') {
                    $(".st,.gn,.nd,.ns").remove();
                    $("#work").append("<option class=\"dv\" value=\"งานโสต\">งานโสต</option>");
                    $("#work").append("<option class=\"dv\" value=\"งานประกันสุขภาพ\">งานประกันสุขภาพ</option>");
                    $("#work").append("<option class=\"dv\" value=\"งานเวชสารสนเทศ\">งานเวชสารสนเทศ</option>");
                    $("#work").append("<option class=\"dv\" value=\"ศูนย์เครื่องมือแพทย์\">ศูนย์เครื่องมือแพทย์</option>");
                    $("#work").append("<option class=\"dv\" value=\"แผนงานและยุทธศาสตร์\">แผนงานและยุทธศาสตร์</option>");
                    $("#work").append("<option class=\"dv\" value=\"งานพัฒนาบุคลากร\">งานพัฒนาบุคลากร</option>");
                    $("#work").append("<option class=\"dv\" value=\"งานพัฒนาคุณภาพ\">งานพัฒนาคุณภาพ</option>");
                }

                if ($("#workgroup").val() == 'การพยาบาล') {
                    $(".st,.gn,.nd,.dv").remove();
                    $("#work").append("<option class=\"ns\" value=\"กลุ่มการพยาบาล\">กลุ่มการพยาบาล</option>");
                    $("#work").append("<option class=\"ns\" value=\"งานห้องผ่าตัด\">งานห้องผ่าตัด</option>");
                    $("#work").append("<option class=\"ns\" value=\"วิสัญญีวิทยา\">วิสัญญีวิทยา</option>");
                    $("#work").append("<option class=\"ns\" value=\"งานไตเทียม\">งานไตเทียม</option>");
                    $("#work").append("<option class=\"ns\" value=\"วัสดุการแพทย์\">วัสดุการแพทย์</option>");
                    $("#work").append("<option class=\"ns\" value=\"ศูนย์เลี้ยงเด็ก\">ศูนย์เลี้ยงเด็ก</option>");
                    $("#work").append("<option class=\"ns\" value=\"งานผู้ป่วยนอก\">งานผู้ป่วยนอก</option>");
                    $("#work").append("<option class=\"ns\" value=\"อายุรกรรมหญิง\">อายุรกรรมหญิง</option>");
                    $("#work").append("<option class=\"ns\" value=\"อายุรกรรมชาย\">อายุรกรรมชาย</option>");
                    $("#work").append("<option class=\"ns\" value=\"พิเศษบน\">พิเศษบน</option>");
                    $("#work").append("<option class=\"ns\" value=\"พิเศษล่าง\">พิเศษล่าง</option>");
                    $("#work").append("<option class=\"ns\" value=\"สูตินรีเวชกรรม\">สูตินรีเวชกรรม</option>");
                    $("#work").append("<option class=\"ns\" value=\"งานห้องคลอด\">งานห้องคลอด</option>");
                    $("#work").append("<option class=\"ns\" value=\"งานห้องผู้ป่วยหนัก\">งานห้องผู้ป่วยหนัก</option>");
                    $("#work").append("<option class=\"ns\" value=\"ศัลยกรรม 1 (ศัลยกรรมชาย)\">ศัลยกรรม 1 (ศัลยกรรมชาย)</option>");
                    $("#work").append("<option class=\"ns\" value=\"ศัลยกรรม 2 (ศัลยกรรมหญิง)\">ศัลยกรรม 2 (ศัลยกรรมหญิง)</option>");
                    $("#work").append("<option class=\"ns\" value=\"กุมารเวชกรรม\">กุมารเวชกรรม</option>");
                    $("#work").append("<option class=\"ns\" value=\"งานผู้ป่วยอุบัติเหตุและฉุกเฉิน\">อุบัติเหตุและฉุกเฉิน</option>");
                    $("#work").append("<option class=\"ns\" value=\"ฉลองสิริราชครบ 60 ปี\">ฉลองสิริราชครบ 60 ปี</option>");
                    $("#work").append("<option class=\"ns\" value=\"งานซักฟอก\">งานซักฟอก</option>");
                    $("#work").append("<option class=\"ns\" value=\"งานหน่วยจ่ายกลาง\">งานหน่วยจ่ายกลาง</option>");
                    $("#work").append("<option class=\"ns\" value=\"ศูนย์เปล\">ศูนย์เปล</option>");
                    $("#work").append("<option class=\"ns\" value=\"พิเศษสูติ\">พิเศษสูติ</option>");
                    $("#work").append("<option class=\"ns\" value=\"พิเศษกุมารเวชกรรม\">พิเศษกุมาร</option>");
                    $("#work").append("<option class=\"ns\" value=\"พยาบาลใหม่\">พยาบาลใหม่</option>");
                    $("#work").append("<option class=\"ns\"value=\"สำนักบริหารกลาง\">สำนักบริหารกลาง</option>");
                }
                if ($("#workgroup").val() == '0') {
                    $(".st,.gn,.nd,.dv,.ns").remove();
                    $("#work").append("<option class=\"ns\"value=\"0\">- - - เลือก - - -</option>");
                }
            }
        });
    });