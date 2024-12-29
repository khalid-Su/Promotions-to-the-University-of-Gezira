<!DOCTYPE html>
<html lang="ar">
<head>
    
    <title> التقديم لترقيات اعضاء هيئة التدريس</title>
      <link rel="shortcut icon" href="main/images/OIP.jpeg">
    <?php
    session_start();
    require_once('auth.php');
    ?>
    <meta charset="utf8mb4">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
            direction: rtl;
    text-align: right;
        }

        .sidebar-nav {
            padding: 9px 0;
        }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="jeffartagame.js" type="text/javascript"></script>
    <script src="js/application.js" type="text/javascript"></script>
    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="lib/jquery.js" type="text/javascript"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
                loadingImage: 'src/loading.gif',
                closeImage: 'src/closelabel.png'
            });
        });
    </script>
    <script language="javascript" type="text/javascript">
        var timerID = null;
        var timerRunning = false;

        function stopclock() {
            if (timerRunning) clearTimeout(timerID);
            timerRunning = false;
        }

        function showtime() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var timeValue = "" + ((hours > 12) ? hours - 12 : hours);
            if (timeValue == "0") timeValue = 12;
            timeValue += ((minutes < 10) ? ":0" : ":") + minutes;
            timeValue += ((seconds < 10) ? ":0" : ":") + seconds;
            timeValue += (hours >= 12) ? " م" : " ص";
            document.clock.face.value = timeValue;
            timerID = setTimeout("showtime()", 1000);
            timerRunning = true;
        }

        function startclock() {
            stopclock();
            showtime();
        }
        window.onload = startclock;
    </script>
</head>
<body>
    <?php include('navfixed.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="contentheader">
                <i class="icon-group"></i> طلبات الترقية
            </div>
            <ul class="breadcrumb">
                <li><a href="customer.php">لوحة التحكم</a></li> /
                <li class="active">طلبات الترقية</li>
            </ul>
            <div style="margin-top: -19px; margin-bottom: 21px;">
                <a href="customer.php">
                    <button class="btn btn-default btn-large" style="float: right;">
                        <i class="icon icon-circle-arrow-right icon-large"></i> رجوع
                    </button>
                </a>
                <a href="publishedpapers.php">
                    <button class="btn btn-default btn-large" style="float: left;">
                        <i class="icon icon-circle-arrow-left icon-large"></i> التالي
                    </button>
                </a>
                <div style="text-align:center;">
	الدرجة العلميه المراد الترقي لها  : قم باضافة طلب واحد
			</div>
            </div>
     
            <input type="text" name="filter" style="height:35px; color:#222;" id="filter" placeholder="بحث عن عميل..." autocomplete="off">
            <a rel="facebox" href="addpromotionrequests.php">
                <button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;">
                    <i class="icon-plus-sign icon-large"></i> إضافة طلب
                </button>
            </a>
            <br><br>
            <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: right;">
                <thead>
                    <tr>
                        <th width="10%">الدرجة المستهدفة</th>
                        <th width="10%">التخصص المستهدف</th>
                        <th width="10%">ملخص الماجستير (عربي)</th>
                        <th width="10%">ملخص الماجستير (إنجليزي)</th>
                        <th width="10%">ملخص الدكتوراه (عربي)</th>
                        <th width="10%">ملخص الدكتوراه (إنجليزي)</th>
                        <th width="14%">الإجراء</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../connect.php');
                    if (isset($_SESSION['SESS_MEMBER_ID'])) {
                        $userId = $_SESSION['SESS_MEMBER_ID'];
                        $result = $db->prepare("SELECT * FROM promotionrequests WHERE UserId = :id ORDER BY Id DESC");
                        $result->bindParam(':id', $userId);
                        $result->execute();
                        for ($i = 0; $row = $result->fetch(); $i++) {
                    ?>
                    <tr class="record">
                        <td><?php echo $row['TargetRank']; ?></td>
                        <td><?php echo $row['TargetSpecialization']; ?></td>
                        <td><a href="downloadMsA.php?id=<?php echo $row['Id']; ?>" class="btn btn-success btn-mini">
                            <i class="icon-download"></i> تنزيل
                        </a></td>
                        <td><a href="downloadMsE.php?id=<?php echo $row['Id']; ?>" class="btn btn-success btn-mini">
                            <i class="icon-download"></i> تنزيل
                        </a></td>
                        <td><a href="downloadphDA.php?id=<?php echo $row['Id']; ?>" class="btn btn-success btn-mini">
                            <i class="icon-download"></i> تنزيل
                        </a></td>
                        <td><a href="downloadphDE.php?id=<?php echo $row['Id']; ?>" class="btn btn-success btn-mini">
                            <i class="icon-download"></i> تنزيل
                        </a></td>
                        <td>
                          
                            <a href="#" id="<?php echo $row['Id']; ?>" class="delbutton" title="حذف الطلب">
                                <button class="btn btn-danger btn-mini"><i class="icon-trash"></i> حذف</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                        }}
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".delbutton").click(function() {
                var element = $(this);
                var del_id = element.attr("id");
                var info = 'id=' + del_id;
                if (confirm("هل أنت متأكد من الحذف؟ لا يمكن التراجع!")) {
                    $.ajax({
                        type: "GET",
                        url: "deletepro.php",
                        data: info,
                        success: function() {}
                    });
                    $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
                        .animate({ opacity: "hide" }, "slow");
                }
                return false;
            });
        });
    </script>
    <?php include('footer.php'); ?>
</body>
</html>
