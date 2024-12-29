<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savepromotionrequests.php" method="post" enctype="multipart/form-data">
    <center><h4><i class="icon-plus-sign icon-large"></i> إضافة طلب ترقية</h4></center>
    <hr>
    <div id="ac">
        <table style="width:90%; border-collapse:collapse;">
            <!-- الرتبة المستهدفة -->
            <tr>
                <td><span>الرتبة المستهدفة: </span></td>
                <td>
                    <input type="text" style="width:100%; height:30px;" name="TargetRank" placeholder="الرتبة المستهدفة"/>
                </td>
            </tr>
            
            <!-- التخصص المستهدف -->
            <tr>
                <td><span>التخصص المستهدف: </span></td>
                <td>
                    <input type="text" style="width:100%; height:30px;" name="TargetSpecialization" placeholder="التخصص المستهدف"/>
                </td>
            </tr>
            
            <!-- ملخص الماجستير (عربي) -->
            <tr>
                <td><span>ملخص الماجستير (باللغة العربية): </span></td>
                <td>
                    <input type="file" style="width:100%; height:30px;" name="MasterSummaryArabic" accept=".pdf,.doc,.docx,.txt"/>
                </td>
            </tr>
            
            <!-- ملخص الماجستير (إنجليزي) -->
            <tr>
                <td><span>ملخص الماجستير (باللغة الإنجليزية): </span></td>
                <td>
                    <input type="file" style="width:100%; height:30px;" name="MasterSummaryEnglish" accept=".pdf,.doc,.docx,.txt"/>
                </td>
            </tr>
            
            <!-- ملخص الدكتوراه (عربي) -->
            <tr>
                <td><span>ملخص الدكتوراه (باللغة العربية): </span></td>
                <td>
                    <input type="file" style="width:100%; height:30px;" name="PhDStudySummaryArabic" accept=".pdf,.doc,.docx,.txt"/>
                </td>
            </tr>
            
            <!-- ملخص الدكتوراه (إنجليزي) -->
            <tr>
                <td><span>ملخص الدكتوراه (باللغة الإنجليزية): </span></td>
                <td>
                    <input type="file" style="width:100%; height:30px;" name="PhDStudySummaryEnglish" accept=".pdf,.doc,.docx,.txt"/>
                </td>
            </tr>
        </table>
        
        <!-- زر الحفظ -->
        <div style="margin-top:20px; text-align:center;">
            <button class="btn btn-success btn-block btn-large" style="width:267px;">
                <i class="icon icon-save icon-large"></i> حفظ
            </button>
        </div>
    </div>
</form>
