$(function(){
	
	$("#form").validate({
		rules: {
			
                        package: {
				required: true,
				minlength: 8
			},
                        description: {
				required: true,
				minlength: 10
			},
                        description_type: {
				required: true,

			},
                        duration: {
				required: true,
				minlength: 1
			},
			price: {
				required: true,
                                number: true
			},
                        original_price: {
				required: true,
                                number: true
			},
                        remark: {
				required: true,
				minlength: 10

			}
		},
		messages: {
			package: {
				required: 'This field is required',
				minlength: 'Minimum length: 8'
			},
                        description: {
				required: 'This field is required',
				minlength: 'Minimum length: 10'
			},
			description_type: {
				required: 'This field is required',

			},
                        duration: {
				required: 'This field is required'
                                
			},
                        price: {
				required: 'No gender? you gay? ',
                                  number: 'numbers only'
			},
                        original_price: {
				required: 'This field is required',
                                number: 'numbers only'
			},
                        remark: {
				required: 'This field is required',
                                 minlength: 'Minimum length: 10'
                        }
       
			
                      
			
			
		},
		success: function(label) {
			label.html('OK').removeClass('error').addClass('ok');
			setTimeout(function(){
				label.fadeOut(500);
			}, 2000)
		}
	});
	
});