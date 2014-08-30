<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/import.php"); ?>
<?

//import::uploadSections();
?>
<pre><?print_r(import::loadSections())?></pre>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>