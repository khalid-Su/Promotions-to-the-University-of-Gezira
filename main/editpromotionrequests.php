<?php
	include('../connect.php');
	$id = $_GET['id'];
	$result = $db->prepare("SELECT * FROM promotionrequests WHERE Id = :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for ($i = 0; $row = $result->fetch(); $i++) {
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditcustomer.php" method="post" enctype="multipart/form-data"> <!-- ÅÖÇÝÉ enctype -->
    <center><h4><i class="icon-edit icon-large"></i> Edit Customer</h4></center>
    <hr>
    <div id="ac">
        <input type="hidden" name="memi" value="<?php echo $id; ?>" />

        <span>Target Rank : </span>
        <input type="text" style="width:265px; height:30px;" name="TargetRank" value="<?php echo $row['TargetRank']; ?>" required /><br>

        <span>Target Specialization : </span>
        <input type="text" style="width:265px; height:30px;" name="TargetSpecialization" value="<?php echo $row['TargetSpecialization']; ?>" /><br>

        
        <!-- ÚÑÖ ÇáÓíÑÉ ÇáÐÇÊíÉ ÇáÍÇáíÉ ãÚ ÅãßÇäíÉ ÊÍãíá ÌÏíÏÉ -->
     

       



         <span>Current MasterSummaryArabic: </span>
        <?php if (!empty($row['MasterSummaryArabic'])) { ?>
            <a href="downloadMsA.php?id=<?php echo $row['Id']; ?>" class="btn btn-info btn-mini">
                <i class="icon-download"></i> Download Current MasterSummaryArabic
            </a>
        <?php } else { ?>
            <span>No MasterSummaryArabic Uploaded</span>
        <?php } ?>
        <br><br>

        <span>Upload New MasterSummaryArabic: </span>
        <input type="file" style="width:265px; height:30px;" name="MasterSummaryArabic" accept=".pdf,.doc,.docx" /><br>


         <span>Current MasterSummaryEnglish: </span>
        <?php if (!empty($row['MasterSummaryEnglish'])) { ?>
            <a href="downloadMsE.php?id=<?php echo $row['Id']; ?>" class="btn btn-info btn-mini">
                <i class="icon-download"></i> Download Current MasterSummaryEnglish
            </a>
        <?php } else { ?>
            <span>No MasterSummaryEnglish Uploaded</span>
        <?php } ?>
        <br><br>

        <span>Upload New MasterSummaryEnglish: </span>
        <input type="file" style="width:265px; height:30px;" name="MasterSummaryEnglish" accept=".pdf,.doc,.docx" /><br>

        <div style="float:right; margin-right:10px;">
            <button class="btn btn-success btn-block btn-large" style="width:267px;">
                <i class="icon icon-save icon-large"></i> Save Changes
            </button>
        </div>
    </div>
</form>
<?php
	}
?>
