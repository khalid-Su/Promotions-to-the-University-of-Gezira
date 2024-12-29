<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveconferencepapers.php" method="post" enctype="multipart/form-data">
    <center><h4><i class="icon-plus-sign icon-large"></i> إضافة تفاصيل المؤتمر</h4></center>
    <hr>
    <div id="ac">

        <!-- إدخال العنوان -->
        <span>العنوان: </span>
        <input 
            type="text" 
            style="width:265px; height:30px;" 
            name="Title" 
            placeholder="أدخل عنوان المؤتمر" 
            required /><br>

        <!-- إدخال اسم المؤتمر -->
        <span>اسم المؤتمر: </span>
        <input 
            type="text" 
            style="width:265px; height:30px;" 
            name="ConferenceName" 
            placeholder="أدخل اسم المؤتمر" 
            required /><br>

        <!-- إدخال تاريخ المؤتمر -->
        <span>تاريخ المؤتمر: </span>
        <input 
            type="datetime-local" 
            style="width:265px; height:30px;" 
            name="ConferenceDate" 
            placeholder="اختر تاريخ المؤتمر" 
            required /><br>

        <!-- إدخال موقع المؤتمر -->
        <span>موقع المؤتمر: </span>
        <input 
            type="text" 
            style="width:265px; height:30px;" 
            name="ConferenceLocation" 
            placeholder="أدخل موقع المؤتمر" 
            required /><br>

        <!-- رفع ملف الشهادة -->
        <span>ملف الشهادة: </span>
        <input 
            type="file" 
            style="width:265px; height:30px;" 
            name="CertificateFile" 
            accept=".pdf,.doc,.docx,.txt" 
            required /><br>

        <!-- رفع ملف الورقة البحثية -->
        <span>ملف الورقة البحثية: </span>
        <input 
            type="file" 
            style="width:265px; height:30px;" 
            name="PaperFile" 
            accept=".pdf,.doc,.docx,.txt" 
            required /><br>

        <!-- زر الحفظ -->
        <div style="float:right; margin-right:10px;">
            <button 
                class="btn btn-success btn-block btn-large" 
                style="width:267px;" 
                type="submit">
                <i class="icon icon-save icon-large"></i> حفظ
            </button>
        </div>
    </div>
</form>
