<html>
<head>
<title> التقديم لترقيات اعضاء هيئة التدريس</title>
<?php
 session_start();
	require_once('auth.php');
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
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>



 <script language="javascript" type="text/javascript">
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " م." : " ص."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
</SCRIPT>	


</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	
	<div class="contentheader">
			<i class="icon-group"></i> أوراق المؤتمرات
			</div>
			<ul class="breadcrumb">
			<li><a href="customer.php">لوحة التحكم</a></li> /
			<li class="active">أوراق المؤتمرات</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="publishedpapers.php"><button class="btn btn-default btn-large" style="float: right;"><i class="icon icon-circle-arrow-right icon-large"></i> رجوع</button></a>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="publishedbook.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> التالي</button></a>

			<div style="text-align:center;">
		الاوراق العلميه التي عرضة في مؤتمر
			</div>
</div>
<input type="text" name="filter" style="height:35px; color:#222;" id="filter" placeholder="بحث عن عميل..." autocomplete="off" />
<a rel="facebox" href="addconferencepapers.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> إضافة ورقة</button></a><br><br>


        <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: right;">
            <thead>
                <tr>
                    <th>العنوان</th>
                    <th>اسم المؤتمر</th>
                    <th>تاريخ المؤتمر</th>
                    <th>مكان المؤتمر</th>
                    <th>الشهادة</th>
                    <th>الورقة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('../connect.php');
                 if (isset($_SESSION['SESS_MEMBER_ID'])) {
        $userId = $_SESSION['SESS_MEMBER_ID'];
                $result = $db->prepare("SELECT * FROM conferencepapers where UserId = :id ORDER BY id DESC");
                 $result->bindParam(':id', $userId);
                $result->execute();
                for ($i = 0; $row = $result->fetch(); $i++) {
                    ?>
                    <tr class="record">
                        <td><?php echo $row['Title']; ?></td>
                        <td><?php echo $row['ConferenceName']; ?></td>
                        <td><?php echo $row['ConferenceDate']; ?></td>
                        <td><?php echo $row['ConferenceLocation']; ?></td>
                        <td>
                            <a href="downloadCerfile.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-mini">
                                <i class="icon-download"></i> تحميل الشهادة
                            </a>
                        </td>
                        <td>
                            <a href="downloadPefile.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-mini">
                                <i class="icon-download"></i> تحميل الورقة
                            </a>
                        </td>
                        <td>
                      
                            <a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="اضغط للحذف">
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
    $(function () {
        $(".delbutton").click(function () {
            var element = $(this);
            var del_id = element.attr("id");
            var info = 'id=' + del_id;
            if (confirm("هل أنت متأكد أنك تريد الحذف؟ لا يمكن التراجع عن هذا الإجراء!")) {
                $.ajax({
                    type: "GET",
                    url: "deleteconference.php",
                    data: info,
                    success: function () { }
                });
                $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
                    .animate({ opacity: "hide" }, "slow");
            }
            return false;
        });
    });
</script>
</body>
<?php include('footer.php'); ?>
</html>
