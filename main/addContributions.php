<?php




?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveContributions.php" method="post" enctype="multipart/form-data" dir="rtl">
    <center><h4><i class="icon-plus-sign icon-large"></i> إضافة إسهام</h4></center>
    <hr>
    <div id="ac">
        <table style="width:100%; border-collapse: collapse; font-family: Arial, sans-serif;">
        <td style="padding: 10px; text-align: left;"><label for="ContributionsType">المساهمات :</label></td>
        <td style="padding: 10px;">
        <select id="ContributionsType" name="ContributionsType" style="width:100%; height:30px;">
            <option value=" عضو هيئة تحرير مجلة  علميه "> عضو هيئة تحرير مجلة  علميه  </option>
            <option value=" محكم لكتاب "> محكم لكتاب  </option>
            <option value="محكم  لاوراق علميه في مجال تخصصك ">  محكم  لاوراق علميه في مجال تخصصك  </option>
            <option value="محكم  ترقيات "> محكم  ترقيات  </option>
            <option value=" مساهمات  اخري "> مساهمات  اخري </option>
            <option value=" عضو هيئة تحرير مجلة علميه "> عضو هيئة تحرير مجلة  علميه  </option>
            <option value=" مساهمات في خدمه المجتمع "> مساهمات في خدمه المجتمع </option>
            <option value="الا شراف علي طلاب الدراسات العليه ">  الا شراف علي طلاب الدراسات العليه </option>
            <option value="محكم  ترقيات "> وكيل جامعة </option>
            <option value=" مساهمات  اخري "> عميد كليه</option>
            <option value="محكم  ترقيات ">نائب عميد كلية </option>
            <option value=" مساهمات  اخري ">عميد مركز</option>
        </select>
   
            </tr>
         
            <tr>
                <td style="padding: 10px; text-align: left;"><label for="certificationfile">إرفاق الملف:</label></td>
                <td style="padding: 10px;">
                    <input type="file" id="certificationfile" name="certificationfile" style="width:100%; height:30px;" accept="application/pdf" required>
                </td>
            </tr>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            <button class="btn btn-success btn-large" style="width: 100%; padding: 10px;">
                <i class="icon icon-save icon-large"></i> حفظ
            </button>
        </div>
    </div>
</form>
