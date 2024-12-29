<html>
<head>
<title> التقديم لترقيات اعضاء هيئة التدريس</title>

    <link rel="shortcut icon" href="main/images/OIP.jpeg">
    <?php
 session_start();
	require_once('auth.php');
?>
 <link href="css/bootstrap.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
 <link rel="stylesheet" href="css/font-awesome.min.css">
 
 <style type="text/css">
      body {
        padding-top : 60px;
        padding-bottom : 40px;
        direction : rtl;
        text-align : right;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
 </style>
 <link href="css/bootstrap-responsive.css" rel="stylesheet">
 <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />

<!-- JavaScript & CSS Links -->
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
// الساعة
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
timeValue += (hours >= 12) ? " مساءً" : " صباحاً"
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
</script>	


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
			<i class="icon-group"></i> الأوراق البحثية المنشورة
			</div>
			<ul class="breadcrumb">
			<li><a href="customer.php">الصفحة الرئيسية</a></li> /
			<li class="active">الأوراق البحثية المنشورة</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="promotionrequests.php"><button class="btn btn-default btn-large" style="float: right;"><i class="icon icon-circle-arrow-right icon-large"></i> الرجوع</button></a>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="conferencepapers.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> التالي</button></a>
<div style="text-align:center;">
	الاوراق العلميه التي نشرها الباحث : 
			</div>
</div>
<input type="text" name="filter" style="height:35px; color:#222;" id="filter" placeholder="بحث..." autocomplete="off" />
<a rel="facebox" href="addpublishedpapers.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;"/><i class="icon-plus-sign icon-large"></i> إضافة ورقة</button></a><br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: right;">
    <thead>
        <tr>
            <th width="20%">العنوان</th>
            <th width="15%">DOI</th>
            <th width="15%">الرابط</th>
            <th width="15%">الناشر</th>
            <th width="10%">تاريخ النشر</th>
            <th width="10%">الملف</th>
            <th width="14%">الإجراءات</th>
        </tr>
    </thead>

    <tbody>
        <?php
            include('../connect.php');
             if (isset($_SESSION['SESS_MEMBER_ID'])) {
        $userId = $_SESSION['SESS_MEMBER_ID'];
            $result = $db->prepare("SELECT * FROM publishedpapers where UserId = :id ORDER BY id DESC");
             $result->bindParam(':id', $userId);
            $result->execute();
            for ($i = 0; $row = $result->fetch(); $i++) {
        ?>
        <tr class="record">
            <td><?php echo $row['Title']; ?></td>
            <td><?php echo $row['DOI']; ?></td>
            <td>
                <a href="<?php echo $row['Link']; ?>" target="_blank" class="btn btn-info btn-mini">عرض الرابط</a>
            </td>
            <td><?php echo $row['Publisher']; ?></td>
            <td><?php echo $row['PublishDate']; ?></td>
            <td>
                <?php if (!empty($row['PaperFile'])) { ?>
                    <a href="downloadpaper.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-mini">
                        <i class="icon-download"></i> تحميل الورقة
                    </a>
                <?php } else { ?>
                    <span>لم يتم رفع الملف</span>
                <?php } ?>
            </td>
            <td>
            
                <a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="حذف الورقة">
                    <button class="btn btn-danger btn-mini"><i class="icon-trash"></i> حذف</button>
                </a>
            </td>
        </tr>
        <?php
            }}
        ?>
    </tbody>
</table>
<div class="clearfix"></div>

</div>
</div>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {
$(".delbutton").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
 if(confirm("هل أنت متأكد من الحذف؟ لا يمكن التراجع!"))
		  {
 $.ajax({
   type: "GET",
   url: "deletepublishedpapers.php",
   data: info,
   success: function(){
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");
 }
return false;
});
});
</script>
</body>
<?php include('footer.php');?>
</html>
