//Axiost Csrf Token
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//Ajax csrf token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("body").niceScroll({
    cursorcolor:"rgba(169, 34, 41, 0.88)",
    cursorwidth:"5px",
    background:"#3a3633",
    cursorborder:"0px solid ",
    cursorborderradius:0
});  // a world full of color!

function money_per() {
    $(".money").keypress(function (e) {
//if the varter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 44 && e.which != 46 && (e.which < 48 || e.which > 57)) {
//display error message
            return false;
        }
    });

}

$(".money").blur(function(){
    if($(this).val() == "" ){
        $(this).val("0,00")
    }
});

// Para Maskeleri
function money(para) {

                var _money = para;
                //Ä°nputa deÄŸer girilmemiÅŸ ise input deÄŸerini 0,00 yap
                if (_money == "")
                {
                  return  '0,00';
                }
                //Ä°nputa deÄŸer doÄŸru girilmiÅŸse mask uygula
                else
                {
                    var data = $(this).val().replace(/\./g, '').replace(",",".");
                    var money = parseFloat(data);
                    var yeni = money.toLocaleString('tr-TR', {  minimumFractionDigits: 2, maximumFractionDigits: 4 });
                    return yeni;
                }


}


function money_clear(val = "0,00") {

if(val == 0){
    val = "0,00";
}

  return  (val.replace(/\./g, '').replace(",",".")*1);

}

//Toplam Fiyat
function total_price(adet,kdv,birimfiyat) {

    let toplam = (birimfiyat*adet)*(1+(kdv/100));
    return toplam;
}

//Birim fiyatı kdvsiz
function birimFiyatKvdsiz(adet,kdv,toplam) {
    adet = money_clear(adet);
    toplam = money_clear(toplam);
    var birim = (toplam) / (1 + (kdv/100)) / adet;
    return birim;
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
        dateFormat: 'dd.mm.yy',
        onSelect: function(date,datePicker,index) {

                    data = datePicker.input[0].name;

                    if(data == "form.date"){
                        VueName.form.date = date;
                    }else  if(data == "form.payment_date"){
                        VueName.form.payment_date = date;
                    }else if(data == "form.expired_date"){
                        VueName.form.expired_date = date;
                    }else if(data == "form.effective_date"){
                        console.log(VueName.form.effective_date,date);
                        VueName.form.effective_date = date;
                    }else if(data == "form.due_date"){
                        console.log("Field"+data,"Eski Tarih :"+VueName.form.due_date,"Girilen Tarih:"+date);
                        VueName.form.due_date = date;
                    }else if(data == "collection.form.date"){
                        console.log(VueCollect.collection.form.date,date);
                        VueCollect.collection.form.date = date;
                    }else if(data == "cheque_collect.form.date"){
                        console.log(VueCollect.collection.form.date,date);
                        VueCollect.cheque_collect.form.date = date;
                    }else if(data == "cheque_collect.form.payment_date"){
                        console.log(VueCollect.collection.form.date,date);
                        VueCollect.cheque_collect.form.payment_date = date;
                    }else if(data == "money_form.date"){
                        console.log(date);
                        VueName.money_form.date = date;
                    }else if(data == "cheque_payment.form.date"){
                        console.log(VuePayment.cheque_payment.form.date,date);
                        VuePayment.cheque_payment.form.date = date;
                    }else if(data == "cheque_payment.form.payment_date"){
                        console.log(VuePayment.cheque_payment.form.date,date);
                        VuePayment.cheque_payment.form.payment_date = date;
                    }else if(data == "payment.form.date"){
                        console.log(VuePayment.payment.form.date,date);
                        VuePayment.payment.form.date = date;
                    }else if(data == "waybill.dispatch_date"){

                        VueName.waybill.dispatch_date = date;
                    }else if(data == "waybill.edit_date"){

                        VueName.waybill.edit_date = date;
                    }else if(data == "invoice.date"){

                        VueName.invoice.date = date;
                    }else if(data == "invoice.due_date"){

                        VueName.invoice.due_date = date;
                    }

console.log(data);


            console.log(datePicker);


        },
        beforeShow: function() {
            setTimeout(function(){
                $('.ui-datepicker').css('z-index', 99999999999999);
            }, 0);
        }
    });
}


function many(val,min=2,max=2){
    return val.toLocaleString('tr-TR', {
        minimumFractionDigits: min,
        maximumFractionDigits: max
    });
}

function redirect_company(id,type,aid){

    if(type==0){
        return  window.location.href = '/'+aid+'/sales/customer/' + id + '/show';
    }else if(type==1){
        return  window.location.href = '/'+aid+'/purchases/supplier/' + id + '/show';
    }


}

function product_update(id) {
    return window.location.href = '/{{aid()}}/sales/orders/' + id + '/show';
}

function vade_tarih(tarih,vade){

$("#day7").click(function () {

Vuen.form.expired_date = tariheGunEkle($("#"+tarih).val(), 7);
console.log($("#"+tarih).val())
});

$("#day14").click(function () {
    Vuen.form.expired_date = tariheGunEkle($("#"+tarih).val(), 14);
});

$("#day30").click(function () {
    Vuen.form.expired_date = tariheGunEkle($("#"+tarih).val(), 30);
});

$("#day60").click(function () {
    Vuen.form.expired_date = tariheGunEkle($("#"+tarih).val(), 60);
});

$("#today").click(function () {
    Vuen.form.expired_date = $("#"+tarih).val();
});

}

function tariheGunEkle(tarih,kacGun) {

    var new_date = moment(tarih, "DD-MM-YYYY").add('days', kacGun);
    var day = new_date.format('DD');
    var month = new_date.format('MM');
    var year = new_date.format('YYYY');

    return day + '.' + month + '.' + year;

}