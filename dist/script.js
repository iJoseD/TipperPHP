$(document).ready(function () {
    var session = $.cookie('session');

    // if ( session == undefined ) {
    //     if ( window.location.pathname != '/app/login/' ) {
    //         window.location.href = '/app/login/';
    //     }
    // } else {
    //     window.location.href = '/app/';
    // }
});

$('#btn--generateCode').click(function() {
    var phone = '+57' + $('#tel--login').val();

    $.ajax({
        url: '/controller/sendSms.php',
        type: 'POST',
        data: {
            caso    : 'codeActivation',
            phone   : phone
        },
        success: function(data) {
            console.log( data );

            if ( data == 'success_sms' ) {
                $('.number').html(phone);
                $('.login').addClass('hide');
                $('.check-code').removeClass('hide');
            }
        },
        error: function() {
            console.log( 'ajax_generateCode_error' );
        }
    });
});

$('#btn--checkCode').click(function() {
    var code = $('#check--code').val();
    var phone = '+57' + $('#tel--login').val();
    var cookie = $('#tel--login').val();

    $.ajax({
        url: '/controller/checkCode.php',
        type: 'POST',
        data: {
            caso    : 'checkCode',
            code    : code,
            phone   : phone
        },
        success: function(data) {
            console.log( data );

            if ( data == 'update_success' ) {
                $.cookie('session', cookie, { expires: 30, path: '/' });
                window.location.href = '/profile/edit.php';
            
            } else if ( data == 'login_successful' ) {
                window.location.href = '/';
            }
        },
        error: function() {
            console.log( 'ajax_generateCode_error' );
        }
    });
});