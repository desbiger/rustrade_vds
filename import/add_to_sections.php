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
		//		$res = entero::GetItems($section['XML_ID']);
		$res = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/import/items/" . $section['XML_ID'] . ".php"));
	}?>
	<html>
	<head>
		<script type = "text/javascript" src = "/bitrix/templates/Productions/js/jquery-1.4.3.min.js"></script>
		<script type = "text/javascript">
			$(function () {
				<?if(count($res)):?>
				var elements = [
					<?foreach($res as $key => $vol):?>
					<?=preg_replace("|/item/(.*)|","$1",$vol['lINK'])?><?=$key+1 < count($res)?",":''?>
					<?endforeach?>
				];
				<?endif?>


				$('#get').click(function () {
					post('348', 0, elements);
					return false;
				});
			});
			function post(section_id, index, elements) {

				$.ajax({
							url: '/import/tovar_add.php',
							data: "tovar_xml_id=" + elements[index] + "&section_id=" + section_id,
							success: function (data) {
								$('#result').html(data);
								index = index + 1;
								if (index < elements.length) {
									post(section_id, index, elements)
								} else {
									$('#result').html(data + ' - загрузка завершена');
								}
							}
						}
				);
			}

		</script>
	</head>
	<body>

	<a href = "#" id = "get">Запрос</a>
	<div id = "result"></div>
	<pre><? print_r($res) ?></pre>
	</body>
	</html>




<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php"); ?>