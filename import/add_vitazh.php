<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/import.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/entero.php"); ?>
<?
define('ROOT', $_SERVER['DOCUMENT_ROOT']);?>

<?
$tovars = entero::GetItemsFromOnePage("/list/698");
foreach ($tovars as $tovar) {
	$propduct = entero::GetItemReg($tovar['lINK']);
	import::TovarAdd($propduct, "698_" . $propduct['ID'] . ".php");
}

?>
<pre><?print_r($tovars)?></pre>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php"); ?>
