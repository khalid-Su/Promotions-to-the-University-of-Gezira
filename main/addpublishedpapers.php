<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savepublishedpapers.php" method="post" enctype="multipart/form-data">
    <center><h4><i class="icon-plus-sign icon-large"></i> إضافة ورقة منشورة</h4></center>
    <hr>
    <div id="ac">
        <span>العنوان: </span>
        <input type="text" style="width:265px; height:30px;" name="Title" placeholder="العنوان" required/><br>

        <span>DOI: </span>
        <input type="text" style="width:265px; height:30px;" name="DOI" placeholder="معرّف الوثيقة الرقمية (DOI)"/><br>

        <span>الرابط: </span>
        <input type="url" style="width:265px; height:30px;" name="Link" placeholder="الرابط" required/><br>

        <span>الناشر: </span>
        <input type="text" style="width:265px; height:30px;" name="Publisher" placeholder="اسم الناشر"/><br>

        <span>تاريخ النشر: </span>
        <input type="date" style="width:265px; height:30px;" name="PublishDate" placeholder="تاريخ النشر"/><br>

        <span>إرفاق الورقة: </span>
        <input type="file" style="width:265px; height:30px;" name="PaperFile" accept=".pdf,.doc,.docx"/><br>

        <div style="float:right; margin-right:10px;">
            <button class="btn btn-success btn-block btn-large" style="width:267px;">
                <i class="icon icon-save icon-large"></i> حفظ
            </button>
        </div>
    </div>
</form>
