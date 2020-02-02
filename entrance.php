<?php 
require_once "connection.php";
include 'header_nav.php';
?>
<form id="entrance" role="form"  action="saveentrance.php" method="POST" enctype="multipart/form-data">
	<div class="container my-1 text-white" style="background-color: #070707;">
		<h2>Student Entrance Form</h2>
		<small>Note all the fields are required</small>
		<h4 class="p-3 border-bottom">Basic Information</h4>


		<div class="form-group form-inline form-row">
			<label class=" control-label col-sm-2" for="entrance_voucher_no">Voucher no</label>
			<div class="col-sm-2">
				<input type="text" class="form-control " name="entrance_voucher_no" id="entrance_voucher_no" placeholder=" Voucher no" required>
			</div>
		</div>

		<div class="form-group form-inline form-row">
			<label class="col-sm-2" for="student_name">Name</label>
			<div class="col-sm-2">
				<input type="text" class="form-control " name="student_first_name" id="student_first_name" placeholder="First name (Eg: Ram)" required>
			</div>
			<div class="col-sm-2 mx-3">
				<input type="text" class="form-control " name="student_middle_name" id="student_middle_name" placeholder="Middle name (Eg: Bahadur) ">
			</div>
			<div class="col-sm-2">
				<input type="text" class="form-control " name="student_last_name" id="student_last_name" placeholder="Last name (Eg: Khadka)" required>
			</div>
		</div>

		
		<div class="form-group form-inline form-row">
			<label class="col-sm-2">Gender</label>
			<div class="radio form-check-inline">
				<label class=" form-check-label" for="male">
					<input type="radio" class="form-check-input" name="gender" value="male" checked>Male
				</label>
			</div>
			<div class="radio form-check-inline">
				<label class="form-check-label" for="female">
					<input type="radio" class="form-check-input" name="gender" value="female">female
				</label>
			</div>
			<div class="radio form-check-inline">
				<label class="form-check-label" for="other">
					<input type="radio" class="form-check-input" name="gender" value="other">Other
				</label>
			</div>
		</div>

		<div class="form-group form-inline form-row">
			<label class="control-label col-sm-2" for="contact_no">Contact no</label>
			<div class="col-sm-3 ">
				<input type="tel" class="form-control " name="contact_no" id="contact_no" value="+977-" placeholder="0123456789" required>
			</div>
		</div>

		<div class="form-group form-inline form-row">
			<label class="control-label col-sm-2" for="dob">Date of Birth</label>
			<div class="col-sm-2 ">
				<input type="text" class="form-control " name="dob" id="dob" placeholder="mm/dd/yyyy" required>
			</div>
		</div>

		<div class="form-group form-inline form-row">
			<label class="control-label col-sm-2" for="email">Email</label>
			<div class="col-sm-2 ">
				<input type="email" class="form-control " name="email" id="email" required>
			</div>
		</div>

		<div class="form-group form-inline form-row">
			<label class="control-label col-sm-2" for="citizenship_no">Citizenship no</label>
			<div class="col-sm-2 ">
				<input type="text" class="form-control" name="citizenship_no" id="citizenship_no" required>
			</div>
		</div>

		<div class="form-group form-inline form-row">
			<label class="control-label col-sm-2" for="photo">Your photo</label>
			<div class="col-sm-2">
				<input type="hidden" name="MAX_FILE_SIZE" id="maxsize" value="800000">
				<input type="button" class="btn-secondary" style="display:block;width:200px; height:38px;" onclick="document.getElementById('photo').click()" value="Upload Photo"  onchange="return Validate()" required>
				<input type="file" style="display: none;" name="pp_photo" id="photo" value="Upload Photo" accept='.gif,.jpeg,.jpg,.bmp,.png,' onchange="return Validate()" required />
			</div>
		</div>

		<h4 class="p-3 border-bottom">Address Information</h4>

		<div class="form-group form-inline form-row">
			<label class="control-label col-sm-2" for="nationality">Nationality</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" name="nationality" id="nationality" required>
			</div>
			
			<label class="control-label col-sm-2" for="country">Country</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" name="country" id="country" required>
			</div>
		</div>

		<div class="form-group form-inline form-row">
			<label class="control-label col-sm-2">Zone</label>
			<div class="col-sm-2">
				
				<select name="zone" id="zone_id"class="form-control"style="display:block;width:200px; height:38px;" onChange="change_zone()" >
					<option value="">Select Zone</option>
					<?php 
					$sql = "select * from zones";
				//execute
					$res = $connect->query($sql);
					while ($row = mysqli_fetch_assoc($res)) {
						?>
						<option value="<?php echo $row["id"];?>"><?php echo $row['zname'];?></option>
					<?php } ?>

				</select>
			</div>
			<label class="control-label col-sm-2">District</label>
			<div class="col-sm-2" id="district" name="district">
				<select style="display:block;width:200px; height:38px;" class="form-control" >
					<option value="">Select District</option>
					<select>
					</div>
				</div>

				<div class="form-group form-inline form-row">
					<label class="control-label col-sm-2">VDC</label>
					<div class="col-sm-2">
						<select style="display:block;width:200px; height:38px;" class="form-control" name="vdc" id="vdc" >
							<option value="">Select VDC/Municipality</option>
							<select>
							</div>
							<label class="control-label col-sm-2" for="ward_no">Ward no</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="ward_no" id="ward_no" >
							</div>
						</div>

						<h4 class="p-3 border-bottom">Acdemic Information</h4>

						<h4 class="p-3 border-bottom-dotted">School Information</h4>

						<div class="form-group form-inline form-row">
							<label class="control-label col-sm-2" for="school_name">School Name</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="school_name" id="school_name" >
							</div>
							<label class="control-label col-sm-2" for="school_symbol">Symbol no</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="school_symbol" id="school_symbol" >
							</div>
						</div>

						<div class="form-group form-inline form-row">
							<label class="control-label col-sm-2" for="school_district">School district</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="school_district" id="school_district" >
							</div>
							<label class="control-label col-sm-2" for="spassed_year">Passed year</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="spassed_year" id="spassed_year" >
							</div>
						</div>

						<div class="form-group form-inline form-row">
							<label class="control-label col-sm-2" for="spercentage_cgpa">CGPA</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="spercentage_cgpa" id="spercentage_cgpa" >
							</div>
							<label class="control-label col-sm-2" for="sboard">Board</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="sboard" id="sboard" >
							</div>
						</div>

						<div class="form-group form-inline form-row">
							<label class="control-label col-sm-2" for="ccharacter_certificate">Character Certificate</label>
							<div class="col-sm-2">
								<input type="hidden" name="MAX_FILE_SIZE" id="maxsize" value="2097152">
								<input type="button" class="btn-secondary" style="display:block;width:200px; height:38px;" onclick="document.getElementById('scharacter_certificate').click()"value="Upload your certificate">
								<input type="file"  accept='.gif,.jpeg,.jpg,.bmp,.png,' style="display: none;"name="scharacter_certificate" id="scharacter_certificate" onchange="return ValidateScertificate()">
							</div>
							<label class="control-label col-sm-2" for="sgradesheet">Grade Sheet</label>
							<div class="col-sm-2">
								<input type="hidden" name="MAX_FILE_SIZE" id="maxsize" value="2097152">
								<input type="button" class="btn-secondary" style="display:block;width:200px; height:38px;" onclick="document.getElementById('sgradesheet').click()" value="Upload your grade sheet">
								<input type="file" accept='.gif,.jpeg,.jpg,.bmp,.png,' style="display: none;" name="sgradesheet" id="sgradesheet" onchange="return ValidateSgradesheet()">
							</div>
						</div>


						<h4 class="p-3 border-bottom-dotted">College Information</h4>

						<div class="form-group form-inline form-row">
							<label class="control-label col-sm-2" for="equivalent">Equivalent</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="equivalent" id="equivalent" >
							</div>
							<label class="control-label col-sm-2" for="cboard">Board</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="cboard" id="cboard" >
							</div>
						</div>

						<div class="form-group form-inline form-row">
							<label class="control-label col-sm-2" for="college">College name</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="college" id="college" >
							</div>
							<label class="control-label col-sm-2" for="college_symbol">Symbol no</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="college_symbol" id="college_symbol" >
							</div>
						</div>

						<div class="form-group form-inline form-row">
							<label class="control-label col-sm-2" for="c_district">College district</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="c_district" id="c_district" >
							</div>
							<label class="control-label col-sm-2" for="cpassed_year">Passed year</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="cpassed_year" id="cpassed_year" >
							</div>
						</div>

						

						<div class="form-group form-inline form-row">
							<label class="control-label col-sm-2" for="cpercentage_cgpa">CGPA</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="cpercentage_cgpa" id="cpercentage_cgpa" >
							</div>
							<label class="control-label col-sm-2" for="cgradesheet">Grade Sheet</label>
							<div class="col-sm-2">
								<input type="hidden" name="MAX_FILE_SIZE" id="maxsize" value="2097152">
								<input type="button"  class="btn-secondary" style="display:block;width:200px; height:38px;" onclick="document.getElementById('cgradesheet').click()"value="Upload your grade sheet">
								<input type="file" accept='.gif,.jpeg,.jpg,.bmp,.png,' style="display: none;"name="cgradesheet" id="cgradesheet" onchange="return ValidateCgradesheet()">
							</div>
						</div>

						<div class="form-group form-inline form-row">
							
							<label class="control-label col-sm-2" for="ccharacter_certificate">Character Certificate</label>
							<div class="col-sm-2">
								<input type="hidden" name="MAX_FILE_SIZE" id="maxsize" value="2097152">
								<input type="button" class="btn-secondary" style="display:block;width:200px; height:38px;" onclick="document.getElementById('ccharacter_certificate').click()"value="Upload your certificate">
								<input type="file"  accept='.gif,.jpeg,.jpg,.bmp,.png,' style="display: none;"name="ccharacter_certificate" id="ccharacter_certificate" onchange="return ValidateCcertificate()">
							</div>
							
						</div>


						<h4 class="p-3 border-bottom">Guardian's Information</h4>

						<div class="form-group form-inline form-row">
							<label class="control-label col-sm-2" for="father_name">Father's Name</label>
							<div class="col-sm-2">
								<input type="text" class="form-control " name="father_first_name" id="father_first_name" placeholder="Enter first name">
							</div>
							<div class="col-sm-2 mx-3">
								<input type="text" class="form-control " name="father_middle_name" id="father_middle_name" placeholder="Enter middle name">
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control " name="father_last_name" id="father_last_name" placeholder="Enter last name">
							</div>
						</div>

						<div class="form-group form-inline form-row">
							<label class="control-label col-sm-2" for="mother_name">Mother's Name</label>
							<div class="col-sm-2">
								<input type="text" class="form-control " name="mother_first_name" id="mother_first_name" placeholder="Enter first name">
							</div>
							<div class="col-sm-2 mx-3">
								<input type="text" class="form-control " name="mother_middle_name" id="mother_middle_name" placeholder="Enter middle name">
							</div>
							<div class="col-sm-2">
								<input type="text" class="form-control " name="mother_last_name" id="mother_last_name" placeholder="Enter last name">
							</div>
						</div>

						<h4 class="p-3 border-bottom">Inclusive Quotas</h4>

						<div class="form-group form-inline form-row">
							<label class="col-sm-2">Quotas</label>
							<div class="radio form-check-inline">
								<label class=" form-check-label">
									<input type="radio" class="form-check-input" name="quota" value="Janjati" >Janjati
								</label>
							</div>
							<div class="radio form-check-inline">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="quota" value="Deprived Sectuion">Deprived Sectuion
								</label>
							</div>
							<div class="radio form-check-inline">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="quota" value="Madhesi">Madhesi
								</label>
							</div>
							<div class="radio form-check-inline">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="quota" value="Handicaped">Handicaped
								</label>
							</div>
							<div class="radio form-check-inline">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="quota" value="Backward Areas">Backward Areas
								</label>
							</div>
							<div class="radio form-check-inline">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="quota" value="Jana Andolan Injured">Jana Andolan Injured
								</label>
							</div>
							<div class="radio form-check-inline">
								<label class="form-check-label" >
									<input type="radio" class="form-check-input" name="quota" value="Martyrs family">Martyrs family
								</label>
							</div>
							<input type="hidden" style="display:one;"class="form-check-input" name="quota" value="Non" checked>
						</div>

						<div class="form-group mb-0 pb-3"> 
							<div class="col-sm-2">
								<button type="submit" name="submit" class="btn btn-primary" >Submit</button>
							</div>
						</div>

					</div>
				</form>



				
				<script type="text/javascript">

					function change_zone()
					{
						var xmlhttp = new XMLHttpRequest();
						xmlhttp.open("GET","ajax/district.php?zone="+document.getElementById("zone_id").value,false);
						xmlhttp.send(null);
						
						document.getElementById("district").innerHTML=xmlhttp.responseText;
						if (document.getElementById("zone_id").value=="Select Zone")
						{
							document.getElementById("zone").innerHTML="<select ><option>Select District</option></select>";

						}
					}

					function change_district()
					{
						var xmlhttp = new XMLHttpRequest();
						xmlhttp.open("GET","ajax/vdc.php?district="+document.getElementById("district_id").value,false);
						xmlhttp.send(null);
						
						document.getElementById("vdc").innerHTML=xmlhttp.responseText;
					}
				</script>
				<script type="text/javascript">
					function Validate()
					{
						var image =document.getElementById("photo").value;
						if(image=='')
						{
							alert("Upload your pp sized photo.");
						}else{
							var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.bmp|\.BMP)$/)){ // validation of file extension using regular expression before file upload
          	document.getElementById("photo").focus();

          	alert("This image is not a valid image type. Please use a image of known types gif, jpg, jpeg, bmp or png.");
          }
          var img = document.getElementById("photo"); 
            if(img.files[0].size >  800000)  // validation according to file size
            {
            	alert("The image size should be less than 100 KB");
            	return false;
            }
            return true;
        }
    }

    function ValidateScertificate()
    {
    	var image =document.getElementById("scharacter_certificate").value;
    	if(image=='')
    	{
    		alert("Upload your  School Character Certificate.");
    	}else{
    		var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.bmp|\.BMP)$/)){ // validation of file extension using regular expression before file upload
          	document.getElementById("scharacter_certificate").focus();

          	alert("This image is not a valid image type. Please use a image of known types gif, jpg, jpeg, bmp or png.");
          }
          var img = document.getElementById("scharacter_certificate"); 
            if(img.files[0].size >  2097152)  // validation according to file size
            {
            	alert("The image size should be less than 2 MB");
            	return false;
            }
            return true;
        }
    }

    function ValidateCcertificate()
    {
    	var image =document.getElementById("ccharacter_certificate").value;
    	if(image=='')
    	{
    		alert("Upload your College Character Certificate.");
    	}else{
    		var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.bmp|\.BMP)$/)){ // validation of file extension using regular expression before file upload
          	document.getElementById("ccharacter_certificate").focus();

          	alert("This image is not a valid image type. Please use a image of known types gif, jpg, jpeg, bmp or png.");
          }
          var img = document.getElementById("ccharacter_certificate"); 
            if(img.files[0].size >  2097152)  // validation according to file size
            {
            	alert("The image size should be less than 2 MB");
            	return false;
            }
            return true;
        }
    }

    function ValidateSgradesheet()
    {
    	var image =document.getElementById("sgradesheet").value;
    	if(image=='')
    	{
    		alert("Upload your School Grade sheet.");
    	}else{
    		var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.bmp|\.BMP)$/)){ // validation of file extension using regular expression before file upload
          	document.getElementById("sgradesheet").focus();

          	alert("This image is not a valid image type. Please use a image of known types gif, jpg, jpeg, bmp or png.");
          }
          var img = document.getElementById("sgradesheet"); 
            if(img.files[0].size >  2097152)  // validation according to file size
            {
            	alert("The image size should be less than 2 MB");
            	return false;
            }
            return true;
        }
    }

    function ValidateCgradesheet()
    {
    	var image =document.getElementById("cgradesheet").value;
    	if(image=='')
    	{
    		alert("Upload your College Grade sheet.");
    	}else{
    		var checkimg = image.toLowerCase();
          if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG|\.bmp|\.BMP)$/)){ // validation of file extension using regular expression before file upload
          	document.getElementById("cgradesheet").focus();

          	alert("This image is not a valid image type. Please use a image of known types gif, jpg, jpeg, bmp or png.");
          }
          var img = document.getElementById("cgradesheet"); 
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

