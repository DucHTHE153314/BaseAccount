/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('#logout-tg').click(function () {
    $('#myModal').show();
});

$('#logout').click(function () {
    $(location).attr('href', '/Account/logout');
});

$('div .non-active').mouseover(function () {
    $(this).children('.item-inner').children('.inner-icon').css('color', '#fff');
});

$('div .non-active').mouseout(function (event) {
    $(this).children('.item-inner').children('.inner-icon').css('color', 'rgba(255, 255, 255, 0.3)');
});

$('.box-act').mouseover(function () {
    $(this).css('background-color', 'white');
})

$('.box-act').mouseout(function () {
    $(this).css('background-color', '#f6f6f6');
});

$('.reload').click(function () {
    location.reload();
});
/**
 * 
 * @returns {undefined}
 */
async function recover() {
    var reg = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    $('.modal-body #icon').html(`<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
    </svg>`);
    $('#modal-title').html('Failed!');
    $('#modal-title').css('color', 'red');
    $('.modal-body #icon').css('color', 'red');

    if ($('#remail').val().trim() === '') {
        $('.modal-body #message').html('Please enter something!');
        $('#myModal').show();
        return;
    }

    if (!reg.test($('#remail').val())) {
        $('.modal-body #message').html('Wrong email format!');
        $('#myModal').show();
        return;
    }

    await $.ajax({
        url: '/Account/recovery',
        type: 'get',
        data: {
            remail: $('#remail').val()
        },
        success: function (data) {
            alert(data);
            $('.modal-body #icon').html(`<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
            </svg>`);
            $('#modal-title').html(data == '1' ? 'Success!' : 'Failed!');
            $('.modal-body #message').html(data == '1' ? 'Success, check your email!' : 'Email not found!');
            $('.modal-body #icon , #modal-title').css('color', data == '1' ? 'green' : 'red');
        },
        error: function (xhr) {
        }
    });

    $('#myModal').show();
}

$('#user-avatar').click(function () {
    $('#inf_avatar').trigger('click');
    $('#inf_avatar').change(function () {
        var avatar = $(this).prop('files');

        if (avatar[0]['type'].split('/')[0] !== 'image') {
            $('#myMessage #message').html($('#myMessage #message').html() + ' Only support image files!');
            return;
        }

        $('#frm-avatar').submit();
    });
});