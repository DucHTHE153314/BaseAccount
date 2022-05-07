/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $('.btn-tg-infor').click(function () {
        // var h = ($(window).outerHeight() - $('#user-infor').outerHeight()) / 2;
        // $('#user-infor').css('padding-top', h + 'px');
        $('#user-infor').show();
    });
    $('#clos-infor').click(function () {
        $('#user-infor').hide();
    });
    $('#myBtn').click(
        function () {
            $('#myModal').show();
        }
    );
    $('.btn-close').click(function () {
        $('.modal').hide();
    });
    $(window).click(
        function (event) {
            if (event.target.className.includes('modal-unrequired')) {
                $('.modal').hide();
            }
        }
    );
    $(window).click(
        function (event) {
            if (event.target.className.includes('btn-close')) {
                $('#myModal').hide();
            }
        }
    );
    $('#login-now').hover(
        function () {
            $(this).css('text-decoration', 'underline');
        }
    );
    $('#login-now').mouseout(
        function () {
            $(this).css('text-decoration', 'none');
        }
    );
});