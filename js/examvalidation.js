$(document).ready(function(){
	$('#examination').validate({
		rules:{
			exam_voucher_no:{
				pattern: /^[0-9]*$/,
				required:true,
			},
			exam_roll:{
                pattern:/^[0-9A-Za-z]{2,10}$/,
				required: true,
            },
			tu_reg_no:{
                pattern:/^[0-9-/]+$/,
				required: true, 
            },
		},
		messages:{
			exam_voucher_no:{
				pattern: '<small>Must contain only number</small>'
			},
			exam_roll:{
                pattern:'<small>Should contain only numbers and alphabets.</small>',
            },
			tu_reg_no:{
                pattern: '<small>Must contains only - and numbers.</small>'
            },
			
		},
	});
});


