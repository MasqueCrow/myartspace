$(function(){
	
	$("#form").validate({
		rules: {
			
                        password: {
				required: true,
				minlength: 6
			},
                        first_name: {
				required: true,
				minlength: 3
			},
                        last_name: {
				required: true,
				minlength: 3
			},
                        gender: {
				required: true,
				minlength: 1
			},
			nationality: {
				required: true
			},
                        occupation: {
				required: true,
				minlength: 3
			},
                        address_line1: {
				required: true,
				minlength: 3
			},
                        address_line2: {
				required: true,
				minlength: 3
			},
                        address_line3: {
				required: true,
				minlength: 3
			},
                        email_address_1: {
				required: true,
				minlength: 3,
                                email: true
			},
                        email_address_2: {
				minlength: 3,
                                email: true
			},
			contact_no1: {
				required: true,
				number: true,
				minlength: 8
			},
                        contact_no2: {
				number: true,
				minlength: 8
			},
                        package: {
                            required: true,
                            minlength: 5
                        },
			date_of_birth: {
				required: true,
                              
			}
		},
		messages: {
			login_id: {
				required: 'This field is required',
				minlength: 'Minimum length: 6'
			},
                        password: {
				required: 'This field is required',
				minlength: 'Minimum length: 6'
			},
			first_name: {
				required: 'This field is required'
			},
                        last_name: {
				required: 'This field is required'
			},
                        gender: {
				required: 'No gender? you gay? '
			},
                        nationality: {
				required: 'No nationality? You Alien? OO'
			},
                        occupation: {
				required: 'This field is required'
			},
                        address_line1: {
				required: 'This field is required'
			},
                        address_line2: {
				required: 'This field is required'
			},
                        address_line3: {
				required: 'This field is required'
			},
                        email_address_1: {
				required: 'This field is required'
                                
			},
                        email: 'Invalid e-mail address',
                        email_address_2: {
				email: 'Invalid e-mail address'
			},
                        
			contact_no1: {
				required: 'This field is required',
				number: 'Invalid phone number',
				minlength: 'Minimum length: 8'
			},
                        contact_no2: {
				number: 'Invalid phone number',
				minlength: 'Minimum length: 8'
			},
                        package: {
                            required: 'This field is required',
                            minlength: 'Minimum length: 5'
                        },
			
			date_of_birth: {
				required: 'How can you not exist? 0_0'
                                
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