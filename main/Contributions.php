<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf8mb4">
    <title> التقديم لترقيات اعضاء هيئة التدريس</title>
   
       <link rel="shortcut icon" href="main/images/OIP.jpeg">
       <?php 
     session_start();
    require_once('auth.php'); ?>
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
</head>

<body>
    <?php include('navfixed.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="contentheader">
                <i class="icon-group"></i> مساهمات الباحث 
            </div>
            <ul class="breadcrumb">
                <li><a href="customer.php">لوحة التحكم</a></li> /
                <li class="active"> مساهمات الباحث </li>
            </ul>
            <div style="margin-top: -19px; margin-bottom: 21px;">
                <a href="wpepers.php">
                    <button class="btn btn-default btn-large" style="float: right;">
                        <i class="icon icon-circle-arrow-right icon-large"></i> العودة
                    </button>
                </a>
            </div>
            <div style="margin-top: -19px; margin-bottom: 21px;">
  
                <div style="text-align:center;">
                    يجب عليك ارفاق تقرير عن كل مساهمة: 
                </div>
            </div>
            <input type="text" name="filter" style="height:35px; color:#222;" id="filter" placeholder="بحث عن مستخدم..." autocomplete="off" />
            <a rel="facebox" href="addContributions.php">
                <button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;">
                    <i class="icon-plus-sign icon-large"></i> إضافة  مساهمة
                </button>
            </a>
            <br><br>
            <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: center; font-family: 'Arial', sans-serif;">
                <thead>
                    <tr>
                  
                        <th>نوع الإسهام</th>
                      
           
                        <th>الملف المرفق</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../connect.php');
                    if (isset($_SESSION['SESS_MEMBER_ID'])) {
                        $userId = $_SESSION['SESS_MEMBER_ID'];
                        $result = $db->prepare("SELECT * FROM contributions WHERE UserId = :id ORDER BY id DESC");
                        $result->bindParam(':id', $userId);
                        $result->execute();
                        for ($i = 0; $row = $result->fetch(); $i++) {
                    ?>
                            <tr class="record">
                             
                                <td><?php echo $row['ContributionsType']; ?></td>
                                
                             
                                <td>
                                    <a href="downloadcertification.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-mini">
                                        <i class="icon-download"></i> تحميل الملف المرفق
                                    </a>
                                </td>
                                <td>
                                    <a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="حذف الإسهام">
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
                if (confirm("هل أنت متأكد من حذف هذا الإسهام؟ لا يمكن التراجع عن هذا الإجراء!")) {
                    $.ajax({
                        type: "GET",
                        url: "deletecontribution.php",
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
