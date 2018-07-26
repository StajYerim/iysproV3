@if(auth()->user()->isAdmin() == false)
        {{--<script>--}}
        function city_and_county() {


        $('#city').devbridgeAutocomplete({
        serviceUrl: '{{route("city.search",aid())}}',
        minChars: 1,
        autoSelectFirst: true,
        triggerSelectOnValidInput: false,
        onInvalidateSelection: function () {
        $(this).val("");

        },
        onSelect: function (suggestion) {
        $city = $('#county').val("");
        },


        });

        $('#county').devbridgeAutocomplete({
        serviceUrl: '{{route("county.search",aid())}}',
        minChars: 1,
        autoSelectFirst: true,
        triggerSelectOnValidInput: false,
        onInvalidateSelection: function () {
        $(this).val("");
        },
        onSelect: function (suggestion) {
        $city = $('#city').val(suggestion.city);

        if($city == null){
        $(this).val("");
        }

        },
        formatResult: function (suggestion, currentValue) {
        return suggestion.value + ' (' + suggestion.city + ')';
        },

        });

        }



        function company2select(){
        $('.company').select2({
        minimumInputLength: 2,
        placeholder: "Choose company",
        language: {
        noResults: function () {
        return "<a class='btn btn-sm btn-warning' href='#!'  data-toggle='modal' data-target='#new_company'>Click for New Company </a>";
        }
        },
        escapeMarkup: function (markup) {
        return markup;
        },
        dataType: 'json',
        ajax: {
        url: '{{route("company.source",aid())}}',
        data: function (params) {
        Companies.form.company_name = params.term;
        return {
        q: $.trim(params.term)
        };
        },
        processResults: function (data) {
        return {
        results: data
        };
        },
        cache: true,
        },
        });

        }


@endif