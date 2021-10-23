$(document).ready(function () {
    // var session = $.cookie('session');

    // if ( session == undefined ) {
    //     $('body').hide();
    //     if ( window.location.pathname != '/login/' ) {
    //         window.location.href = '/login/';
    //     } else {
    //         $('body').show();
    //     }
    // } else {
    //     if ( window.location.pathname == '/login/' ) {
    //         window.location.href = '/';
    //     }
    // }
});

$('#btn--generateCode').click(function() {
    var dialCode = $('.iti__selected-dial-code').html();
    var phone = dialCode + $('#tel--login').val();

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
    var dialCode = $('.iti__selected-dial-code').html();
    var phone = dialCode + $('#tel--login').val();

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
                $.cookie('session', phone, { expires: 30, path: '/' });
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

$(".upload").on('click', function() {
    var formData = new FormData();
    var files = $('#img--profile')[0].files[0];
    formData.append('file', files);
    $.ajax({
        url: '/controller/uploadImgProfile.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if ( response == 'error_al_mover_archivo' ) {
                console.log( response );
            } else if ( response == 'error_formato_imagen' ) {
                console.log( response );
            } else if ( response == 'error_array_files' ) {
                console.log( response );
            } else {
                $(".card-img-top").attr("src", response);
            }
        }
    });
    return false;
});

$('.super-power').click(function() {
    var superPower = $(this).attr('data-superPower');

    $('.super-power').removeClass('active');
    $(this).addClass('active');

    $('#superPower').val(superPower);
});

$('#btn--updateProfile').click(function() {
    var dni = $('#dni').val();
    var firstName = $('#fitst--name').val();
    var lastName = $('#last--name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var address = $('#address').val();
    var superPower = $('#superPower').val();

    $.ajax({
        url: '/controller/updateProfile.php',
        type: 'POST',
        data: {
            caso        : 'updateProfile',
            dni         : dni,
            firstName   : firstName,
            lastName    : lastName,
            email       : email,
            phone       : phone,
            address     : address,
            superPower  : superPower
        },
        success: function(data) {
            console.log( data );

            if ( data == 'update_success' ) {
                $('#alert').removeClass('hide');
                window.setTimeout(function() {
                    window.location.href = '/';
                }, 2000);
            }
        },
        error: function() {
            console.log( 'ajax_generateCode_error' );
        }
    });
});

var phoneLogin = document.querySelector("#tel--login");
window.intlTelInput(phoneLogin, {
    // allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    // dropdownContainer: document.body,
    // excludeCountries: ["us"],
    // formatOnDisplay: false,
    // geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //     var countryCode = (resp && resp.country) ? resp.country : "";
    //     callback(countryCode);
    //   });
    // },
    // hiddenInput: "full_number",
    // initialCountry: "auto",
    // localizedCountries: { 'de': 'Deutschland' },
    // nationalMode: false,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    // placeholderNumberType: "MOBILE",
    // preferredCountries: ['cn', 'jp'],
    separateDialCode: true,
    utilsScript: "../dist/js/utils.js",
});