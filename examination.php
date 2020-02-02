<?php 
require_once "connection.php";
include 'header_nav.php';
?>
<form id="examination" role="form" method="POST"  action="save_examination.php"  enctype="multipart/form-data">
	<div class="container my-1 text-white" style="background-color: #070707;">
		<h2>Student Examination Form</h2>

		<small>Note all the fields are required</small>
		<h4 class="p-3 border-bottom">Basic Information</h4>

		<div class="form-group form-inline form-row">
			<label class="col-sm-2" for="exam_voucher">Voucher No.</label>
			<div class="col-sm-2">
				<input type="text" class="form-control " name="exam_voucher" id="exam_voucher" required placeholder="Enter Voucher No">
			</div>
		</div>

		<div class="form-group form-inline form-row">
			<label class="col-sm-2" for="exam_roll">Exam Roll No.</label>
			<div class="col-sm-2">
				<input type="text" class="form-control " name="exam_roll" id="exam_roll" required placeholder="Enter Exam Roll Number">
			</div>
		</div>

		<div class="form-group form-inline form-row">
			<label class="col-sm-2" for="tu_reg_no">TU Registration No.</label>
			<div class="col-sm-2">
				<input type="text" class="form-control " name="tu_reg_no" id="tu_reg_no" required placeholder="Enter TU Registration Number">
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
						<option value="<?php echo $row["id"]; ?>"><?php echo $row['sem_name'];?></option>
					<?php } ?>
				</select>
				
			</div>
		</div>

		<div class="form-group form-inline form-row">
			<label class="col-sm-2" for="exam_type">Exam Type</label>
			<div class="col-sm-2">
				<select name="exam_type" id="exam_type"class="form-control"style="display:block;width:200px; height:38px;">
					<option value="">Select Exam Type</option>
					<option value="full">Full</option>
					<option id ="partial" value="partial">Partial</option>
				</select>
			</div>
		</div>

		<div class="form-group form-row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<input id="subject_list" >
			</div>
		</div>

		<div class="form-group mb-0 pb-3"> 
			<div class="col-sm-2">
				<button type="submit" name="submit" class="btn btn-primary" >Submit</button>
			</div>
		</div>

	</div>    
</form>

<script type="text/javascript">
		$(document).ready(function(){
			$('#semester').change(function(){
				var semester = $(this).val();
				$.ajax({
					url:'ajax/getsub.php',
					method:'post',
					data:{'semester':semester},
					dataType:'text',
					success:function(resp){
						$('#subject_list').empty();
						$('#subject_list').html(resp);
						$('#subject_list').hide();
					}
				});
			})
			$('#exam_type').change(function(){
				var exam = $(this).val();
				if(exam != 'partial'){
					$('#subject_list').hide();
				}
				else{
					$('#subject_list').show();
				}
			});
		});
	</script>
<?php include 'footer.php';?>

	
