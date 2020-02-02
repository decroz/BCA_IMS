$(document).ready(function(){
	$('#applyadmission').validate({
		rules:{
            entrance_symbol_no:{
                pattern: /^[0-9A-Za-z]{2,10}$/,
				required:true,
            },
            rank:{
                pattern: /^[0-9]*$/,
				required:true,
            },
			apply_voucher_no:{
				pattern: /^[0-9]*$/,
				required:true,
			},
			
			emergency_fname:{
				pattern: /^[A-Z]{1}[a-z]{2,100}$/,
				required:true,
			},
			emergency_mname:{
				pattern: /^[A-Z]{1}[a-z]{2,100}$/,
				required:false,
			},
			emergency_lname:{
				pattern: /^[A-Z]{1}[a-z]{2,100}$/,
				required:true,
            },
            relation_contact_no:{
				pattern: /([+]?\d{1,3}[.-\s]?)?(\d{3}[.-]?){2}\d{4}$/,
				required:true,
            },
            relation:{
				pattern: /^[A-Z]{1}[a-z]{2,100}$/,
				required:true,
            },
		},
		messages:{
			entrance_symbol_no:{
				pattern: '<small>Should contain only numbers and alphabets.</small>'
			},
			rank:{
				pattern: '<small>Should contain only numbers.</small>'
			},
			apply_voucher_no:{
				pattern: '<small>Must contain only number</small>'
			},
			emergency_fname:{
				pattern: '<small>Enter your Emergency Contact First Name.</small>'
			},
			emergency_mname:{
				pattern: '<small>Enter your Emergency Contact Middle Name.</small>'
			},
			emergency_lname:{
				pattern: '<small>Enter your Emergency Contact Last Name.</small>'
			},
			relation_contact_no:{
				pattern: '<small>Must contain only number</small>'
			},
			relation:{
				pattern: '<small>What is your relation with him/her?</small>'
			},
			
		},
	});
});


