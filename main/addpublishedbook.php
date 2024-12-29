<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savepublishedbook.php" method="post" enctype="multipart/form-data">
    <center><h4><i class="icon-plus-sign icon-large"></i> إضافة تفاصيل الكتاب</h4></center>
    <hr>
    <table>
        <tr>
            <td><span>العنوان: </span></td>
            <td><input type="text" style="width:265px; height:30px;" name="Title" placeholder="العنوان" required/></td>
        </tr>
        <tr>
            <td><span>نوع الكتاب: </span></td>
            <td><input type="text" style="width:265px; height:30px;" name="BookType" placeholder="نوع الكتاب" required/></td>
        </tr>
        <tr>
            <td><span>تاريخ الكتاب: </span></td>
            <td><input type="datetime-local" style="width:265px; height:30px;" name="BookDate" placeholder="تاريخ الكتاب" required/></td>
        </tr>
        <tr>
            <td><span>الناشر: </span></td>
            <td><input type="text" style="width:265px; height:30px;" name="Publisher" placeholder="الناشر"/></td>
        </tr>
        <tr>
            <td><span>إرفاق ملف الكتاب: </span></td>
            <td><input type="file" style="width:265px; height:30px;" name="BookFile" accept=".pdf,.doc,.docx" required/></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <div style="float:right; margin-right:10px;">
                    <button class="btn btn-success btn-block btn-large" style="width:267px;">
                        <i class="icon icon-save icon-large"></i> حفظ
                    </button>
                </div>
            </td>
        </tr>
    </table>
</form>
