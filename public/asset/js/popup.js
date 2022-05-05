/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
    $('#myBtn').click(
        function() {
            $('#myModal').show();
        }
    );
    $('#closeBtn').click(function() {
        $('#myModal').hide();
    });
    $(window).click(
        function(event) {
            if (event.target.className.includes('modal-unrequired')) {
                $('#myModal').hide();
            }
        }
    );
    $(window).click(
        function(event) {
            if (event.target.className.includes('btn-close')) {
                $('#myModal').hide();
            }
        }
    );
    $('#login-now').hover(
        function() {
            $(this).css('text-decoration', 'underline');
        }
    );
    $('#login-now').mouseout(
        function() {
            $(this).css('text-decoration', 'none');
        }
    );
});