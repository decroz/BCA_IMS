<?php 
require_once "connection.php";
include 'header_nav.php';
?>

<form id="examination" role="form" method="POST"  action="save_admission.php"  enctype="multipart/form-data">
	<div class="container my-1 text-white" style="background-color: #070707;">
		<h2>Student Admission Form</h2>

		<small>Note all the fields are required</small>
		<h4 class="p-3 border-bottom">Basic Information</h4>

		<div class="form-group form-inline form-row">
			<label class="col-sm-2" for="voucher_no">Voucher No.</label>
			<div class="col-sm-2">
				<input type="text" class="form-control " name="voucher_no" id="voucher_no" required placeholder="Enter Voucher No">
			</div>
		</div>
		
		<div class="form-group form-inline form-row">
			<label class="col-sm-2" for="email">Email</label>
			<div class="col-sm-2">
				<input type="text" class="form-control " name="email" id="exam_voucher_no" required placeholder="Enter Voucher No">
			</div>
		</div>

		<div class="form-group form-inline form-row">
			<label class="col-sm-2" for="batch">Batch</label>
			<div class="col-sm-2">
				<select name="batch" id="batch"class="form-control"style="display:block;width:200px; height:38px;" >
					<option value="">Select Batch</option>
					<?php 
					$sql = "select * from batch";
					$res = $connect->query($sql);
					while ($row = mysqli_fetch_assoc($res)) {
						?>
						<option value="<?php echo $row["id"];?>"><?php echo $row['years'];?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="form-group form-inline form-row">
			<label class="col-sm-2" for="semester">Semester</label>
			<div class="col-sm-2">
				<select name="semester" id="semester"class="form-control"style="display:block;width:200px; height:38px;" >
					<option value="">Select Semester</option>
					<?php 
					$sql = "select * from semester";
					$res = $connect->query($sql);
					while ($row = mysqli_fetch_assoc($res)) {
						?>
						<option value="<?php echo $row["id"];?>"><?php echo $row['sem_name'];?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="form-group mb-0 pb-3"> 
			<div class="col-sm-2">
				<button type="submit" name="submit" class="btn btn-primary" >Submit</button>
			</div>
		</div>

	</div>    
</form>
<?php include 'footer.php';?>
