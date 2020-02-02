$(document).ready(function(){
	$('#entrance').validate({
		rules:{
			entrance_voucher_no:{
				pattern: /^[0-9]*$/,
				required:true,
			},
			student_first_name:{
				pattern: /^[A-Z]{1}[a-z]{2,100}$/,
				required:true,
			},
			student_middle_name:{
				pattern: /^[A-Z]{1}[a-z]{2,100}$/,
				required:false,
			},
			student_last_name:{
				pattern: /^[A-Z]{1}[a-z]{2,100}$/,
				required:true,
			},
			contact_no:{
				pattern: /([+]?\d{1,3}[.-\s]?)?(\d{3}[.-]?){2}\d{4}$/,
				required:true,
			},
			dob:{
				pattern:/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/,
				required:true,
			},
			email:{
				email:true,
				required:true,
			},
			citizenship_no:{
				pattern:/^[0-9\-\/]+$/,
				required: true,  
			},
			nationality:{
				pattern:/^[A-Z]{1}[a-z]{2,20}$/,
				required: true,
			},
			counrty:{
				pattern:/^[A-Z]{1}[a-z]{2,20}$/,
				required: true,
			},
			ward_no:{
				pattern:/^[0-9]{2}$/,
				required: true,
			},
			school_name:{
				pattern:/^[a-zA-Z ]+[ '&()]?[ a-zA-Z!()]+$/,
				required: true,
			},
			school_sybmol:{
				pattern:/^[0-9A-Za-z]{2,10}$/,
				required: true,
			},
			spassed_year:{
				pattern:/^[0-9]{4}$/,
				required:true,
			},
			spercentage_cgpa:{
				pattern:/^([0-4]{1,2}\.[0-9]{1,2})$/,
				required:true,
			},
			equivalent:{
				pattern:/^[a-zA-Z ]+[ '&()]?[ a-zA-Z!()]+$/,
				required:true,
			},
			sboard:{
				pattern:/^[a-zA-Z ]+[ '&()]?[ a-zA-Z!()]+$/,
				required:true,
			},
			college:{
				pattern:/^[a-zA-Z ]+[ '&()]?[ a-zA-Z!()]+$/,
				required:true,
			},
			college_symbol:{
				pattern:/^[0-9A-Za-z]{2,10}$/,
				required:true,
			},
			cpassed_year:{
				pattern:/^[0-9]{4}$/,
				required:true,
			},
			cpercentage_cgpa:{
				pattern:/^([0-4]{1,2}\.[0-9]{1,2})$/,
				required:true,
			},
			cboard:{
				pattern:/^[a-zA-Z ]+[ '&()]?[ a-zA-Z!()]+$/,
				required:true,
			},
			father_first_name:{
				pattern: /^[A-Z]{1}[a-z]{2,100}$/,
				required:true,
			},
			father_middle_name:{
				pattern: /^[A-Z]{1}[a-z]{2,100}$/,
				required:false,
			},
			father_last_name:{
				pattern: /^[A-Z]{1}[a-z]{2,100}$/,
				required:true,
			},
			mother_first_name:{
				pattern: /^[A-Z]{1}[a-z]{2,100}$/,
				required:true,
			},
			mother_middle_name:{
				pattern: /^[A-Z]{1}[a-z]{2,100}$/,
				required:false,
			},
			mother_last_name:{
				pattern: /^[A-Z]{1}[a-z]{2,100}$/,
				required:true,
			},
		},
		messages:{
			entrance_voucher_no:{
				pattern: '<small>Must contain only number</small>'
			},
			student_first_name:{
				pattern: '<small>What is your name?</small>'
			},
			student_middle_name:{
				pattern: '<small>What is your middle name?</small>'
			},
			student_last_name:{
				pattern: '<small>What is your family name?</small>'
			},
			contact_no:{
				pattern: '<small>Must contain only number</small>'
			},
			email:{
				pattern: '<small>Please enter a valid email</small>'
			},
			dob:{
				pattern: '<small>The correct format for date is mm/dd/yyy</small>'
			},
			citizenship_no:{
				pattern: '<small>Must contains only \'-\' and numbers.</small>'
			},
			nationality:{
				pattern: '<small>Should contain only alphabets.</small>'
			},
			ward_no:{
				pattern: '<small>Should contain only numbers.</small>'
			},
			school_name:{
				pattern:'<small>Should contain only alphabets and space.</small>'
			},
			school_sybmol:{
				pattern:'<small>Should contain only numbers and alphabets.</small>',
			},
			spassed_year:{
				pattern:'<small>Should contain only numbers.</small>',
			},
			spercentage_cgpa:{
				pattern:'<small>Should contain only numbers and .</small>',
			},
			equivalent:{
				pattern:'<small>Should contain only alphabets and space.</small>',
			},
			sboard:{
				pattern:'<small>Board name only contains space and alphabets.</small>',
			},
			college:{
				pattern:'<small>Should contain only alphabets and space.</small>',
			},
			college_symbol:{
				pattern:'<small>Should contain only numbers and alphabets.</small>',
			},
			cpassed_year:{
				pattern:'<small>Should contain only numbers.</small>',
			},
			cpercentage_cgpa:{
				pattern:'<small>Should contain only numbers and .</small>',
			},
			cboard:{
				pattern:'<small>Board name only contains space and alphabets.</small>',
			},
			father_first_name:{
				pattern: '<small>What is your Father\'s first name?</small>',
			},
			father_middle_name:{
				pattern: '<small>What is your Father\'s middle name?.</small>',
			},
			father_last_name:{
				pattern: '<small>What is your Father\'s last name?</small>',
			},
			mother_first_name:{
				pattern: '<small>What is your Mother\'s first name?</small>',
			},
			mother_middle_name:{
				pattern: '<small>What is your Mother\'s middle name?</small>',
			},
			mother_last_name:{
				pattern: '<small>What is your Mother\'s last name?</small>',
			},
			
		},
	});
});


