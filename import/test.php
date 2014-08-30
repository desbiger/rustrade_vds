<?// require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<?
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);
	include_once(ROOT . "/import/class/entero.php");
	include_once(ROOT . "/import/class/import.php");
//phpinfo();
	//	$result = entero::GetSections();
	//CModule::IncludeModule('iblock');
	//$result = unserialize(file_get_contents(ROOT."/import/sections.php"));
	//$result = entero::GetItemReg('/item/33699');
	//import::TovarUpdate(entero::GetItemReg("/item/33908"),5829);
//	echo 123;
	$result = entero::GetItems('698');
//	$result = entero::GetItem('/item/40768');
	//$result = entero::GetItemsReg('869');
	//$result = entero::GetItemsFromOnePage("/list/660");
	//$result = entero::GetRazdels($_SERVER['DOCUMENT_ROOT'] . "/import/sections_w_tovars.php");
	//$result = entero::GetRadezls_level2("http://www.entero.ru/categories/578");
?>
<pre><? print_r($result) ?></pre>

<?// require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php"); ?>