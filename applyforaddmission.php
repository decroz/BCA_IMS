<?php 
require_once "connection.php";
include 'header_nav.php';
?>
<form id="applyadmission" role="form" method="POST"  action="saveapplyadmission.php"  enctype="multipart/form-data">
	<div class="container my-1 text-white" style="background-color: #070707;">
		<h2>Student Apply for Admission Form</h2>

		<small>Note all the fields are required</small>
		<h4 class="p-3 border-bottom">BCA Entrance Record</h4>

		<div class="form-group form-inline form-row">
			<label class="col-sm-2" for="entrance_symbol_no">Entrance Symbol No.</label>
			<div class="col-sm-2">
				<input type="text" class="form-control " name="entrance_symbol_no" id="entrance_symbol_no" required placeholder="Enter Entrance Symbol No">
			</div>
			<label class="col-sm-2" for="rank">Rank</label>
			<div class="col-sm-2">
				<input type="text" class="form-control " name="rank" id="rank" required placeholder="Enter Entrance Rank">
			</div>
		</div>

		<h4 class="p-3 border-bottom">Basic Information</h4>
		<div class="form-group form-inline form-row">
			<label class="control-label col-sm-2" for="transcript">Transcript</label>
			<div class="col-sm-2">
				<input type="hidden" name="MAX_FILE_SIZE" id="maxsize" value="2097152">
				<input type="button" class="btn-secondary" style="display:block;width:200px; height:38px;" onclick="document.getElementById('transcript').click()"value="Upload your transcript">
				<input type="file"  accept='.gif,.jpeg,.jpg,.bmp,.png,' onclick= "return.Validatetranscript();" style="display: none;"name="transcript" id="transcript" >	
			</div>
		</div>

		<h4 class="p-3 border-bottom">Incase of Emergency Contact</h4>
		<div class="form-group form-inline form-row">
			<label class="control-label col-sm-2" for="person_name">Contact Person's Name</label>
			<div class="col-sm-2">
				<input type="text" class="form-control " name="emergency_fname" id="emergency_fname" required placeholder="Enter first name">
			</div>
			<div class="col-sm-2 mx-3">
				<input type="text" class="form-control " name="emergency_mname" id="emergency_mname" placeholder="Enter middle name">
			</div>
			<div class="col-sm-2">
				<input type="text" class="form-control " name="emergency_lname" id="emergency_lsname" required placeholder="Enter last name">
			</div>
		</div>
		<div class="form-group form-inline form-row">
			<label class="control-label col-sm-2" for="relation_contact_no">Contact no</label>
			<div class="col-sm-2 ">
				<input type="tel" class="form-control " name="relation_contact_no" id="relation_contact_no" required placeholder="+977-0123456789">
			</div>
			<label class="control-label col-sm-2" for="relation">Relation</label>
			<div class="col-sm-2 ">
				<input type="tel" class="form-control " name="relation" id="relation" required placeholder="Enter relation">
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

	function Validatetranscript()
	{
		var image =document.getElementById("transcript").value;
		if(image=='')
		{
			alert("Upload your Transcript.");
		}else{
			var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.bmp|\.BMP)$/)){ // validation of file extension using regular expression before file upload
          	document.getElementById("transcript").focus();

          	alert("This image is not a valid image type. Please use a image of known types gif, jpg, jpeg, bmp or png.");
          }
          var img = document.getElementById("transcript"); 
            if(img.files[0].size >  2097152)  // validation according to file size
            {
            	alert("The image size should be less than 2 MB");
            	return false;
            }
            return true;
        }
    }
</script>
<?php include 'footer.php';?>

