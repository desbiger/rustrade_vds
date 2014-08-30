<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/import.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/entero.php"); ?>
<?
	//	ini_set('allow_url_fopen', '1');
	CModule::IncludeModule('iblock');

	$q = "
	SELECT * FROM b_iblock_section AS sec
		WHERE sec.iblock_id = 2
		AND sec.iblock_section_id != 'null'
	";
	if ($_REQUEST['section_id']) {
		global $DB;
		$id      = $_REQUEST['section_id'];
		$q       = "SELECT * from b_iblock_section where ID = {$id}";
		$section = $DB->Query($q)
				->Fetch();


		$q   = "SELECT * FROM b_iblock_element WHERE IBLOCK_SECTION_ID = {$id}";
		$res = $DB->Query($q);
		while ($el = $res->Fetch()) {
			$xml_ids[] = $el['XML_ID'];
		}
		$res = entero::GetItems($section['XML_ID']);
		?>
		<script type = "text/javascript" src = "/bitrix/templates/Productions/js/jquery-1.6.2.min.js"></script>
		<script type = "text/javascript">
			alert('123');
			var tovars = new Array();
			var section_id = <?=$id?>;
			<? foreach ($res as $vol) : ?>
			tovars[] = "<?=str_replace("/item/","",$vol['lINK'])?>";
			<? endforeach ?>
			$(tovars).each(function (key, vol) {
				console(key);
			})
		</script>
		<? //        LocalRedirect('/catalog/' . $_REQUEST['section_id'] . "/");
	}
?>
	<pre>
	<? print_r($res); ?>
	</pre>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php"); ?>