<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savecustomer.php" method="post" enctype="multipart/form-data">
    <center><h4><i class="icon-plus-sign icon-large"></i> المعلومات الاساسيه</h4></center>
    <hr>
    <div id="ac">
        <table style="width:100%; border-collapse: collapse; font-family: Arial, sans-serif;">
            <tr>
                <td style="padding: 10px; text-align: left;"><label for="FullName">الاسم الكامل:</label></td>
                <td style="padding: 10px;"><input type="text" id="FullName" name="FullName" style="width:100%; height:30px;" placeholder="الاسم الكامل" required></td>
            </tr>
            <tr>
                <td style="padding: 10px; text-align: left;"><label for="College">الكلية:</label></td>
                <td style="padding: 10px;"><input type="text" id="College" name="College" style="width:100%; height:30px;" placeholder="الكلية" required></td>
            </tr>
            <tr>
                <td style="padding: 10px; text-align: left;"><label for="GeneralSpecialization">التخصص العام:</label></td>
                <td style="padding: 10px;"><input type="text" id="GeneralSpecialization" name="GeneralSpecialization" style="width:100%; height:30px;" placeholder="التخصص العام"></td>
            </tr>
            <tr>
                <td style="padding: 10px; text-align: left;"><label for="DetailedSpecialization">التخصص الدقيق:</label></td>
                <td style="padding: 10px;"><input type="text" id="DetailedSpecialization" name="DetailedSpecialization" style="width:100%; height:30px;" placeholder="التخصص الدقيق"></td>
            </tr>
            <tr>
                <td style="padding: 10px; text-align: left;"><label for="AppointmentDate">تاريخ التعيين:</label></td>
                <td style="padding: 10px;"><input type="date" id="AppointmentDate" name="AppointmentDate" style="width:100%; height:30px;" required></td>
            </tr>
            <tr>
                <td style="padding: 10px; text-align: left;"><label for="InitialRank">الدرجة التي تم التعين بها:</label></td>
                <td style="padding: 10px;"><input type="text" id="InitialRank" name="InitialRank" style="width:100%; height:30px;" placeholder="الرتبة الأولية"></td>
            </tr>
            <tr>
                <td style="padding: 10px; text-align: left;"><label for="LastPromotionRank">الدرجة لاخر ترقية:</label></td>
                <td style="padding: 10px;"><input type="text" id="LastPromotionRank" name="LastPromotionRank" style="width:100%; height:30px;" placeholder="الرتبة بعد آخر ترقية"></td>
            </tr>
            <tr>
    <td style="padding: 10px; text-align: left;"><label for="PromotionReason">نوع الترقية:</label></td>
    <td style="padding: 10px;">
        <select id="PromotionReason" name="PromotionReason" style="width:100%; height:30px;">
            <option value="الجدمه الطويله">الخدمه الطويله</option>
            <option value="الاداء المتميز">الاداء المتميز</option>
            <option value="البحث العلمي المميز">البحث العلمي المميز </option>
             <option value="درجة الدكتوراه">درجة الدكتوراه </option>
        </select>
    </td>
</tr>

            <tr>
                <td style="padding: 10px; text-align: left;"><label for="LastPromotionDate">تاريخ آخر ترقية:</label></td>
                <td style="padding: 10px;"><input type="date" id="LastPromotionDate" name="LastPromotionDate" style="width:100%; height:30px;"></td>
            </tr>
  <tr>
    <td style="padding: 10px; text-align: left;">
        <label for="CV1">إرفاق السيرة الذاتية:</label>
    </td>
    <td style="padding: 10px;">
        <input type="file" id="CV1" name="CV1" style="width:100%; height:30px;" accept=".pdf">
    </td>
</tr>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <button class="btn btn-success btn-large" style="width: 100%; padding: 10px;" id="uploadButton" type="submit">
                <i class="icon icon-save icon-large"></i> حفظ
            </button>
        </div>
    </div>
</form>
