/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//===== Tooltips =====//
$(function() {
    $('.tipN').tipsy({
        gravity: 'n',
        fade: false,
        html: true
    });
    $('.tipS').tipsy({
        gravity: 's',
        fade: false,
        html: true
    });
    $('.tipSE').tipsy({
        gravity: 'se',
        fade: false,
        html: true
    });
    $('.tipSW').tipsy({
        gravity: 'sw',
        fade: false,
        html: true
    });
    $('.tipW').tipsy({
        gravity: 'w',
        fade: false,
        html: true
    });
    $('.tipE').tipsy({
        gravity: 'e',
        fade: false,
        html: true
    });

});


$(document).ready(function() {
    $(".outer .close").click(function() {
        $(this).parent().parent('.outer').fadeTo(200, 0.00, function() { //fade
            $(this).slideUp(200, function() { //slide up
                $(this).remove(); //then remove from the DOM
            });
        });
    });

})


var SAVE_OK = '<div class="successBlock"><div class="bg"><span>Сохранено</span></div></div>';
var SAVE_ERR = '<div class="errorBlock"><div class="bg"><span>Ошибка при сохранении</span></div></div>';
var SPAM_DUBL = "<center><img src='images/smile.png'  /> <br /><b>Распознано как спам!</b><br />Комментарий с таким текстом вы уже писали.<br />Сообщение будет рассмотрено администратором, если оно не нарушает правил форума оно будет опубликовано.</center>";
var SPAM_TIME = "<center><img src='images/smile.png'  /> <br /><b>Распознано как спам.</b><br />Интервал между отправкой комментариев должен составлять не менее 5-ти минут.<br />Сообщение будет рассмотрено администратором, если оно не нарушает правил форума оно будет опубликовано.</center>";
var ERR_AUTH = "<center><img src='images/lock.png'  /> <br /><b>Ай, нельзя Вам.</b><br />Зарегестрируйтесь</center>";
var ERR_NOTEXT = '<img src="images/updateWarning.png"  /> <b>Поле должен содержать текст</b>';
var ERR_NOINPUT = "<center>Ошибка вх. данныхcenter>";


