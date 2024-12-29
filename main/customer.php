<html lang="ar">

<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> التقديم لترقيات اعضاء هيئة التدريس</title>
       <link rel="shortcut icon" href="main/images/OIP.jpeg">
   
    <?php
  	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		header("location: ../index.php");
		exit();
	}
    ?>
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
                <i class="icon-group"></i> المعلومات الشخصية
            </div>
            <ul class="breadcrumb">
                <li><a href="customer.php">لوحة التحكم</a></li> /
                <li class="active">المعلومات الشخصية</li>
            </ul>
            <div style="margin-top: -19px; margin-bottom: 21px;">
            
            </div>
            <div style="margin-top: -19px; margin-bottom: 21px;">
                <a href="promotionrequests.php">
                    <button class="btn btn-default btn-large" style="float: left;">
                        <i class="icon icon-circle-arrow-left icon-large"></i> التالي
                    </button>
                </a>
                <div style="text-align:center;">
                اتبع التعليمات التي تظهر أثناء استخدام النظام لضمان سير العمل     بسلاسة(يجب عليك تحميل الملفات بصيغة     pdf)
			</div>
            </div>
            </div>
            <input type="text" name="filter" style="height:35px; color:#222;" id="filter" placeholder="بحث عن مستخدم..." autocomplete="off" />
            <a rel="facebox" href="addcustomer.php">
                <button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;">
                    <i class="icon-plus-sign icon-large"></i> إضافة البيانات الشخصية
                </button>
            </a>
            <br><br>
            <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: center; font-family: 'Arial', sans-serif;">
                <thead>
                    <tr>
                        <th>الاسم الكامل</th>
                        <th>الكلية</th>
                        <th>التخصص العام</th>
                        <th>التخصص الدقيق</th>
                        <th>تاريخ التعيين</th>
                        <th>الرتبة الأولى</th>
                        <th>آخر رتبة ترقية</th>
                        <th>سبب الترقية</th>
                        <th>تاريخ  آخر ترقية</th>
                        <th>السيرة الذاتية</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../connect.php');
                    if (isset($_SESSION['SESS_MEMBER_ID'])) {
                        $userId = $_SESSION['SESS_MEMBER_ID'];
                        $result = $db->prepare("SELECT * FROM customer WHERE UserId = :id ORDER BY customer_id DESC");
                        $result->bindParam(':id', $userId);
                        $result->execute();
                        for ($i = 0; $row = $result->fetch(); $i++) {
                    ?>
                            <tr class="record">
                                <td><?php echo $row['FullName']; ?></td>
                                <td><?php echo $row['College']; ?></td>
                                <td><?php echo $row['GeneralSpecialization']; ?></td>
                                <td><?php echo $row['DetailedSpecialization']; ?></td>
                                <td><?php echo $row['AppointmentDate']; ?></td>
                                <td><?php echo $row['InitialRank']; ?></td>
                                <td><?php echo $row['LastPromotionRank']; ?></td>
                                <td><?php echo $row['PromotionReason']; ?></td>
                                <td><?php echo $row['LastPromotionDate']; ?></td>
                                <td>
                                    <a href="downloadcv.php?id=<?php echo $row['customer_id']; ?>" class="btn btn-success btn-mini">
                                        <i class="icon-download"></i> تحميل السيرة الذاتية
                                    </a>
                                </td>
                                <td>
                                   
                                    <a href="#" id="<?php echo $row['customer_id']; ?>" class="delbutton" title="حذف المستخدم">
                                        <button class="btn btn-danger btn-mini"><i class="icon-trash"></i> حذف</button>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
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
                if (confirm("هل أنت متأكد من حذف هذا المستخدم؟ لا يمكن التراجع عن هذا الإجراء!")) {
                    $.ajax({
                        type: "GET",
                        url: "deletecustomer.php",
                        data: info,
                        success: function() {}
                    });
                    $(this).parents(".record").animate({
                        backgroundColor: "#fbc7c7"
                    }, "fast").animate({
                        opacity: "hide"
                    }, "slow");
                }
                return false;
            });
        });
    </script>
</body>
<?php include('footer.php'); ?>

</html>