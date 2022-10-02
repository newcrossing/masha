
$(document).ready(function () {

    $('.pickadate-months-year').pickadate({
        selectYears: true,
        selectMonths: true,
        min: new Date(1991,1,1),
        max: new Date(2025,7,14),
        selectYears:30,

        today: 'Сегодня',
        clear: 'Очистить',
        close: '',
        editable: true,
        format: 'dd/mm/yyyy',
        firstDay: 1,

        weekdaysShort: [
            "Вс",
            "Пн",
            "Вт",
            "Ср",
            "Чт",
            "Пт",
            "Сб"
        ],
        monthsFull: [
            "Январь",
            "Февраль",
            "Март",
            "Апрель",
            "Май",
            "Июнь",
            "Июль",
            "Август",
            "Сентябрь",
            "Октябрь",
            "Ноябрь",
            "Декабрь"
        ],

    });






});
