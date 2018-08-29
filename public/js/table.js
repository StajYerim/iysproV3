// jQuery.extend( jQuery.fn.dataTableExt.oSort, {
//     "turkish-pre": function ( a ) {
//         var special_letters = { "İ": "ib", "I": "ia", "Ş": "sa", "Ğ": "ga", "Ü": "ua", "Ö": "oa", "Ç": "ca", "i": "ia", "ı": "ia", "ş": "sa", "ğ": "ga", "ü": "ua", "ö": "oa", "ç": "ca" };
//         for (var val in special_letters)
//             a = a.split(val).join(special_letters[val]).toLowerCase();
//         return a;
//     },
//
//     "turkish-asc": function ( a, b ) {
//         return ((a < b) ? -1 : ((a > b) ? 1 : 0));
//     },
//
//     "turkish-desc": function ( a, b ) {
//         return ((a < b) ? 1 : ((a > b) ? -1 : 0));
//     }
// } );

// $('#search-fld').on( 'keyup', function () {
//     tableS.search( this.value ).draw();
// } );
//
// $('#datatable_tabletools').on( 'draw.dt', function () {
//     $("#datatable_tabletools_info > .dataTables_info").appendTo("div#self");
//     $("#datatable_tabletools_paginate > .dataTables_info").appendTo("div#pagiNate");
//
// } );
//
// $("#datatable_tabletools_info").appendTo("div#self");
// $("#datatable_tabletools_paginate").appendTo("div#pagiNate");
// $("#datatable_tabletools thead").appendTo("#tableHeader");
//
// $('#all').on( 'click', function () {
//     tableS.page.len( -1 ).draw();
// } );
//
// $('#_10').on( 'click', function () {
//     tableS.page.len( 10 ).draw();
// } );
// $('#padRight').on( 'click', function () {
//     tableS.page( 'next' ).draw( 'page' );
// } );
//
// $('#padLeft').on( 'click', function () {
//     tableS.page( 'previous' ).draw( 'page' );
// } );