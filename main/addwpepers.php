<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savewpepers.php" method="post" enctype="multipart/form-data">
    <center><h4><i class="icon-plus-sign icon-large"></i> إضافة تفاصيل الورقة</h4></center>
    <hr>
    <table>
        <tr>
            <td><span>العنوان: </span></td>
            <td><input type="text" style="width:265px; height:30px;" name="Title" placeholder="أدخل عنوان الورقة" required/></td>
        </tr>
        <tr>
            <td><span>اسم الورشة: </span></td>
            <td><input type="text" style="width:265px; height:30px;" name="ConferenceName" placeholder="أدخل اسم المؤتمر" required/></td>
        </tr>
        <tr>
            <td><span>تاريخ الورقة: </span></td>
            <td><input type="datetime-local" style="width:265px; height:30px;" name="PaperDate" placeholder="اختر التاريخ" required/></td>
        </tr>
        <tr>
            <td><span>موقع الورشة: </span></td>
            <td><input type="text" style="width:265px; height:30px;" name="WorkchLocation" placeholder="أدخل موقع الورشة" required/></td>
        </tr>
        <tr>
            <td><span>إرفاق ملف الورقة: </span></td>
            <td><input type="file" style="width:265px; height:30px;" name="PaperFile" accept=".pdf,.doc,.docx" required/></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <button class="btn btn-success btn-block btn-large" style="width:267px;">
                    <i class="icon icon-save icon-large"></i> حفظ
                </button>
            </td>
        </tr>
    </table>
</form>
