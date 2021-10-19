$('#tel--login').intlTelInput({
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});

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
        },
        error: function() {
            console.log( 'ajax_generateCode_error' );
        }
    });
});