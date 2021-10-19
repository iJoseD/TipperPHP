$('#btn--generateCode').click(function() {
    var phone = '+57' + $('#tel--login').val();

    $.ajax({
        url: '/app/controller/sendSms.php',
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

    $.ajax({
        url: '/app/controller/checkCode.php',
        type: 'POST',
        data: {
            caso    : 'checkCode',
            code    : code,
            phone   : phone
        },
        success: function(data) {
            console.log( data );
        },
        error: function() {
            console.log( 'ajax_generateCode_error' );
        }
    });
});