<?php
	include('../connect.php');
	$id = $_GET['id'];
	$result = $db->prepare("SELECT * FROM customer WHERE customer_id = :userid");
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

        <span>Full Name : </span>
        <input type="text" style="width:265px; height:30px;" name="FullName" value="<?php echo $row['FullName']; ?>" required /><br>

        <span>College : </span>
        <input type="text" style="width:265px; height:30px;" name="College" value="<?php echo $row['College']; ?>" /><br>

        <span>General Specialization : </span>
        <input type="text" style="width:265px; height:30px;" name="GeneralSpecialization" value="<?php echo $row['GeneralSpecialization']; ?>" /><br>

        <span>Detailed Specialization : </span>
        <input type="text" style="width:265px; height:30px;" name="DetailedSpecialization" value="<?php echo $row['DetailedSpecialization']; ?>" /><br>

        <span>Appointment Date : </span>
        <input type="date" style="width:265px; height:30px;" name="AppointmentDate" value="<?php echo $row['AppointmentDate']; ?>" /><br>

        <span>Initial Rank : </span>
        <input type="text" style="width:265px; height:30px;" name="InitialRank" value="<?php echo $row['InitialRank']; ?>" /><br>

        <span>Last Promotion Rank : </span>
        <input type="text" style="width:265px; height:30px;" name="LastPromotionRank" value="<?php echo $row['LastPromotionRank']; ?>" /><br>

        <span>Promotion Reason : </span>
        <textarea style="width:265px; height:60px;" name="PromotionReason"><?php echo $row['PromotionReason']; ?></textarea><br>

        <span>Last Promotion Date : </span>
        <input type="date" style="width:265px; height:30px;" name="LastPromotionDate" value="<?php echo $row['LastPromotionDate']; ?>" /><br>

        <!-- ÚÑÖ ÇáÓíÑÉ ÇáÐÇÊíÉ ÇáÍÇáíÉ ãÚ ÅãßÇäíÉ ÊÍãíá ÌÏíÏÉ -->
        <span>Current CV: </span>
        <?php if (!empty($row['CV'])) { ?>
            <a href="downloadcv.php?id=<?php echo $row['customer_id']; ?>" class="btn btn-info btn-mini">
                <i class="icon-download"></i> Download Current CV
            </a>
        <?php } else { ?>
            <span>No CV Uploaded</span>
        <?php } ?>
        <br><br>

        <span>Upload New CV: </span>
        <input type="file" style="width:265px; height:30px;" name="CV" accept=".pdf,.doc,.docx" /><br>

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
