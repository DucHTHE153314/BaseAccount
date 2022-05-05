/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$('#logout-tg').click(function() {
    $('#myModal').show();
});
$('#logout').click(function() {
    $(location).attr('href', '/BaseAccount/Account/logout');
});
$('div .non-active').mouseover(function() {
    $(this).children('.item-inner').children('.inner-icon').css('color', '#fff');
});
$('div .non-active').mouseout(function(event) {
    $(this).children('.item-inner').children('.inner-icon').css('color', 'rgba(255, 255, 255, 0.3)');
});