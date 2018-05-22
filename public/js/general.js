//Axiost Csrf Token
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//Ajax csrf token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function money_per() {
    $(".money").keypress(function (e) {
//if the varter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 44 && e.which != 46 && (e.which < 48 || e.which > 57)) {
//display error message
            return false;
        }
    });

}

// Para Maskeleri
function money(data) {
    var _money = data;
//İnputa değer girilmemiş ise input değerini 0,00 yap
    if (_money.length === 0) {
        return "0,00";
    }
//İnputa değer doğru girilmişse mask uygula
    else {
        var data = _money.replace(/\./g, '').replace(",", ".");
        var money = parseFloat(data);
        var yeni = money.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 4});
        return yeni;
    }
}

//Full screen delay
function fullLoading(text = "Please waiting.") {
    $('body').loadingModal({text: text});
    $('body').loadingModal('animation', 'fadingCircle');
}

function fullLoadingClose() {
    $('body').loadingModal('destroy');
}

// Notification SmallBox Process

function notification(title, message, type, icon, time) {

    switch (type) {
        case "success":
            var color = "#739e73";
            var icons = "check";
            var times = 4000;
            break;
        case "danger":
            var color = "#c46a69";
            var icons = "exclamation-triangle";
            var times = 4000;
            break;
        case "warning":
            var color = "#c79121";
            var icons = "exclamation-triangle";
            var times = 4000;
            break;
        case "info":
            var color = "#3276b1";
            var icons = "info-circle";
            var times = 4000;
            break;
    }

    if (icon != null) {
        var icons = icon;
    }


    if (time != null) {
        var times = time;
    }

    $.smallBox({
        title: title,
        content: message,
        color: color,
        iconSmall: "fa fa-" + icons + " fa-2x animated",
        timeout: times + 000
    });
}

function table_search(name) {
    $('#search-fld').on('keyup', function () {
        name.search(this.value).draw();

    });

}


function HarfleriBuyut() {
    (function ($) {
        $("input[type=text],input[type=search], textarea").on('input', function (evt) {

            let input = $(this);

            let start = input[0].selectionStart;

            $(this).val(function (_, val) {
                return val.replace(new RegExp('i', 'g'), 'İ').toUpperCase();
            });
            input[0].selectionStart = input[0].selectionEnd = start;
        });
    })(jQuery);
}

HarfleriBuyut();

// Tarih Formatları
function datePicker() {
    $('.datepicker').datepicker({
        monthNames: ["OCAK", "ŞUBAT", "MART", "NİSAN", "MAYIS", "HAZİRAN", "TEMMUZ", "AĞUSTOS", "EYLÜL", "EKİM", "KASIM", "ARALIK"],
        monthNamesShort: ["OCAK", "ŞUBAT", "MART", "NİSAN", "MAYIS", "HAZİRAN", "TEMMUZ", "AĞUSTOS", "EYLÜL", "EKİM", "KASIM", "ARALIK"],
        dayNamesMin: ["PZ", "PT", "SA", "ÇA", "PE", "CU", "CT"],
        firstDay: 1,
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd.mm.yy'

    });
}
