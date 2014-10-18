<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>

<!--<pre>--><?//print_r($arResult)?><!--</pre>-->
<pre><?print_r(TovarsGroup::factory(44158)->GetTovarsAndQuantity())?></pre>