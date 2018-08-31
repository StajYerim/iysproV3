<?php

$data =  array(
"sDecimal"=>       ",",
"sEmptyTable"=>    trans("sentence.no_data_available_in_table"),
"sInfo"=>          trans("sentence.showing_record"),
"sInfoEmpty"=>     trans("sentence.info_empty"),
"sInfoFiltered"=>  "(".trans("sentence.filtered_from").")",
"sInfoPostFix"=>   "",
"sInfoThousands"=> ".",
"sLoadingRecords"=>trans("sentence.loading"),
"sProcessing"=>    trans("sentence.processing"),
"sZeroRecords"=>   trans("sentence.no_matching_found"),
"oPaginate"=>array(
"sFirst"=>   trans("sentence.first"),
"sLast"=>  trans("sentence.last"),
"sNext"=>   trans("sentence.next"),
"sPrevious"=>trans("sentence.previous"),
)
);

echo json_encode($data);
?>