$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#registerForm').on('submit',function (event) {
        event.preventDefault();
        $.ajax({
            url: "send_otp",
            type:'POST',
            data : $('#registerForm').serialize(),
            dataType : "json",
        }).success(function (response) {
            // code sent successfully
            if(response.response.code_sent){
                $('#code_sent').text(response.response.code_sent);
                $('#code_invalid').text(null);
            }else {
                $('#code_sent').text(null);
            }
            $('#fp_verify').hide();
            $('#verify').show();
            $('#fp_resend').hide();
            $('#resend').show();
            $('#otp-modal').modal('show');

            $('#reg_name').removeClass('is-invalid');
            $('#reg_name_error').text(null);
            $('#reg_name_error').hide();
            $('#reg_phone').removeClass('is-invalid');
            $('#reg_phone_error').text(null);
            $('#reg_phone_error').hide();
            $('#reg_password').removeClass('is-invalid');
            $('#reg_password_error').text(null);
            $('#reg_password_error').hide();
            $('#sending_error').text(null);
            $('#sending_error').parent().hide();

            // disable resend btn
            $('#resend').prop("disabled",true);
            // enable resend btn
            setTimeout(function(){ $('#resend').prop("disabled",false); }, 60000);

        }).error(function (error) {
            console.log(error);
            // validation error
            if( error.responseJSON.error.name && error.responseJSON.error.name.length > 0){
                $('#reg_name').addClass('is-invalid');
                $('#reg_name').css({ 'margin-bottom' : '0' });
                $('#reg_name_error').text(error.responseJSON.error.name['0']);
                $('#reg_name_error').show();
            }
            else {
                $('#reg_name').removeClass('is-invalid');
                $('#reg_name_error').text(null);
                $('#reg_name_error').hide();
            }

            if(error.responseJSON.error.phone && error.responseJSON.error.phone.length > 0){

                $('#reg_phone').addClass('is-invalid');
                $('#reg_phone').css({ 'margin-bottom' : '0' });
                $('#reg_phone_error').text(error.responseJSON.error.phone['0']);
                $('#reg_phone_error').show();
            }
            else {
                $('#reg_phone').removeClass('is-invalid');
                $('#reg_phone_error').text(null);
                $('#reg_phone_error').hide();
            }

            if(error.responseJSON.error.password && error.responseJSON.error.password.length > 0){
                $('#reg_password').addClass('is-invalid');
                $('#reg_password').css({ 'margin-bottom' : '0' });
                $('#reg_password_error').text(error.responseJSON.error.password['0']);
                $('#reg_password_error').show();
            }
            else {
                $('#reg_password').removeClass('is-invalid');
                $('#reg_password_error').text(null);
                $('#reg_password_error').hide();
            }

            // verification code sending error
            if(error.responseJSON.error.sending_error){
                $('#sending_error').text(error.responseJSON.error.sending_error);
                $('#sending_error').parent().show();
            }
            else{
                $('#sending_error').text(null);
                $('#sending_error').parent().hide();
            }
        });
    });

    $('#verify').on('click', function (event) {
        $.ajax({
            url: "mobile_verification",
            type:'POST',
            dataType : "json",
            data: $('#code').serialize(),
        }).success(function (response) {
            console.log(response);
            // registration msg
            $('#reg_successful').text(response.response.reg_successful);
            $('#reg_successful').parent().show();
            $('#sending_error').text(null);
            $('#sending_error').parent().hide();
            $('#otp-modal').modal('hide');
            $('#login').click();

        }).error(function (error) {
            console.log(error);
            // if code invalid
            if(error.responseJSON.error.code_invalid){
                $('#code_invalid').text(error.responseJSON.error.code_invalid);
                $('#code_sent').text(null);
            }else {
                $('#code_invalid').text(null);
            }
            // registration error
            if(error.responseJSON.error.reg_error){
                $('#sending_error').text(error.responseJSON.error.reg_error);
                $('#sending_error').parent().show();
                $('#reg_successful').text(null);
                $('#reg_successful').parent().hide();
                $('#otp-modal').modal('hide');
            }
        });
    });

// ======================================================
    $('#fp').on('click', function(e){
        $('#fp-modal').modal('show');
    });

    $('#fp-form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'forgot_password/send_otp',
            type:'POST',
            data : $('#fp-form').serialize(),
            dataType : "json",

        }).success(function (response) {
            
            // code sent successfully
            if(response.response.code_sent){
                $('#code_sent').text(response.response.code_sent);
                $('#code_invalid').text(null);
            }else {
                $('#code_sent').text(null);
            }

            $('#fp-modal').modal('hide');
            $('#verify').hide();
            $('#fp_verify').show();
            $('#fp_resend').show();
            $('#resend').hide();
            $('#otp-modal').modal('show');

            $('#fp_phone').removeClass('is-invalid');
            $('#fp_phone_error').text(null);
            $('#fp_phone_error').hide();

            // disable resend btn
            $('#fp_resend').prop("disabled",true);
            // enable resend btn
            setTimeout(function(){ $('#fp_resend').prop("disabled",false); }, 60000);

        }).error(function (error) {
            console.log(error);
            if(error.responseJSON.error.phone && error.responseJSON.error.phone.length > 0){
                $('#fp_phone').addClass('is-invalid');
                $('#fp_phone').css({ 'margin-bottom' : '0' });
                $('#fp_phone_error').text(error.responseJSON.error.phone['0']);
                $('#fp_phone_error').show();
            }
            else {
                $('#fp_phone').removeClass('is-invalid');
                $('#fp_phone_error').text(null);
                $('#fp_phone_error').hide();
            }

            // verification code sending error
            if(error.responseJSON.error.sending_error){
                $('#fp_sending_error').text(error.responseJSON.error.sending_error);
                $('#fp_sending_error').parent().show();
            }
            else{
                $('#fp_sending_error').text(null);
                $('#fp_sending_error').parent().hide();
            }

            // mobile not found error
            if(error.responseJSON.error.phone_invalid){
                $('#fp_phone_invalid').text(error.responseJSON.error.phone_invalid);
                $('#fp_phone_invalid').parent().show();
            }
            else{
                $('#fp_phone_invalid').text(null);
                $('#fp_phone_invalid').parent().hide();
            }
        });
    });

    $('#fp_verify').on('click', function (event) {
        $.ajax({
            url: "forgot_password/verify",
            type:'POST',
            dataType : "json",
            data: $('#code').serialize()

        }).success(function (response) {
            console.log(response);
            $('#reset_uniqid').val(response.response.uniqid);
            $('#otp-modal').modal('hide');
            $('#reset-modal').modal('show');
        }).error(function (error) {
            console.log(error);
            // if code invalid
            if(error.responseJSON.error.code_invalid){
                $('#code_invalid').text(error.responseJSON.error.code_invalid);
                $('#code_sent').text(null);
            }else {
                $('#code_invalid').text(null);
            }
        });
    });

    $('#reset-form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'password_reset',
            type:'POST',
            data : $('#reset-form').serialize(),
            dataType : "json",

        }).success(function (response) {
            console.log(response);
            // registration msg
            $('#reset_successful').text(response.response.reset_successful);
            $('#reset_successful').parent().show();
            $('#reset-modal').modal('hide');
            $('#login').click();

        }).error(function (error) {
            console.log(error);
            if(error.responseJSON.error.password && error.responseJSON.error.password.length > 0){
                $('#reset_password').addClass('is-invalid');
                $('#reset_password').css({ 'margin-bottom' : '0' });
                $('#reset_password_error').text(error.responseJSON.error.password['0']);
                $('#reset_password_error').show();
            }
            else {
                $('#reset_password').removeClass('is-invalid');
                $('#reset_password_error').text(null);
                $('#reset_password_error').hide();
            }

            // mobile not found error
            if(error.responseJSON.error.phone_invalid){
                $('#reset_error').text(error.responseJSON.error.phone_invalid);
                $('#reset_error').parent().show();
            }
            else{
                $('#reset_error').text(null);
                $('#reset_error').parent().hide();
            }

        });
    });
    // ===============================================
    $('#resend').on('click', function () {
        $('#registerForm').submit();
    });
    $('#fp_resend').on('click', function () {
        $('#fp-form').submit();
    });
});