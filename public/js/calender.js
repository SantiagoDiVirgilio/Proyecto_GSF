

document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');

    if (calendarEl) {
        var canchaId = calendarEl.dataset.canchaId;
        var eventsUrl = calendarEl.dataset.eventsUrl;


        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
            contentHeight: 'auto',
            dayHeaderFormat: { pseudo: 'true', weekday: 'long', month: 'numeric', day: 'numeric', omitCommas: true },
            initialView: 'customWeek',
            views: {
                customWeek: {
                    type: 'timeGrid',
                    duration: { days: 8 }
                }
            },
            slotDuration: '01:00:00', //duran del turno podria ser variable
            slotMinTime: '08:00:00', //horario minimo
            slotMaxTime: '24:00:00', //horario maximo
            slotLabelFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false,
                meridiem: false
            },
            slotLabelInterval: '01:00:00',
            allDaySlot: false,

            selectMirror: true,
            snapDuration: '01:00:00',
            selectAllow: function (selectInfo) {
                let duration = selectInfo.end - selectInfo.start;
                return duration === 3600000;
            },
            headerToolbar: {
                left: '',
                center: 'title',
                right: ''
            },
            locale: 'es',
            events: {
                url: eventsUrl,
                method: 'GET',
                extraParams: {
                    id: canchaId
                },
                failure: function () {
                    alert('Error al cargar los eventos');
                }
            },
            select: function (info) {
                alert('Horario Libre seleccionado: ' + info.startStr);
                // Aquí iría la lógica para reservar (abrir modal, guardar fecha, etc.)
            },
            eventClick: function (info) {
                // Verificamos si es un evento "Libre" (por título o className)
                if (info.event.title.includes('Libre')) {
                    alert('Evento Libre clickeado: ' + info.event.startStr);
                    // Lógica para abrir modal de reserva con la hora ya preseleccionada
                } else {
                    alert('Esta reserva ya está ocupada: ' + info.event.title);
                }
            },
            displayEventTime: false,
        });
        calendar.render();
    }
});

// SE PODRIA USAR PARA MODAL ESTA CONFIG
//document.addEventListener('DOMContentLoaded', function () {
/*
var calendarEl = document.getElementById('calendar');
if (calendarEl) {
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridDay',
        initialDate: '2025-12-01',
        slotDuration: '01:00:00',
        slotLabelFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false,
            meridiem: false
        },
        slotLabelInterval: '01:00:00',
        allDaySlot: false,
        selectable: true,
        selectMirror: true,
        snapDuration: '01:00:00',
        selectAllow: function (selectInfo) {
            let duration = selectInfo.end - selectInfo.start;
            return duration === 3600000;
        },
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
        },
        locale: 'es',
        events: [
            {
                title: 'Event 1',
                start: '2025-12-01T08:00:00',
                end: '2025-12-01T17:00:00'
            },
            {
                title: 'Event 2',
                start: '2025-12-02T08:00:00',
                end: '2025-12-02T17:00:00'
            }
        ]
    });
    calendar.render();
    */
// }
//});
