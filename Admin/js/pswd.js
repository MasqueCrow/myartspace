$(document).ready(function() {

    //code here
    $('#password').keyup(function() {
        // keyup event code here
       
        // set password variable
        var pswd = $(this).val();
        //validate the length
        if ( pswd.length < 8 ) {
            $('#length').removeClass('validity').addClass('invalidity');
        } else {
            
            $('#length').removeClass('invalidity').addClass('validity');
        }

        //validate letter
        if ( pswd.match(/[A-z]/) ) {
            $('#letter').removeClass('invalidity').addClass('validity');
        } else {
            $('#letter').removeClass('validity').addClass('invalidity');
        }

        //validate capital letter
        if ( pswd.match(/[A-Z]/) ) {
            $('#capital').removeClass('invalidity').addClass('validity');
        } else {
            $('#capital').removeClass('validity').addClass('invalidity');
        }   

        //validate number
        if ( pswd.match(/\d/) ) {
            $('#number').removeClass('invalidity').addClass('validity');
        } else {
            $('#number').removeClass('validity').addClass('invalidity');
        }


    });
    $('#password').focus(function() {
        // focus code here
        $('#pswd_info').show();
    });
    $('#password').blur(function() {
        // blur code here
        $('#pswd_info').hide();
    });

    });