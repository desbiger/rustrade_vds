<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/import.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/entero.php"); ?>
<?
	//	ini_set('allow_url_fopen', '1');
	CModule::IncludeModule('iblock');
	$res = array();
	$q = "
	SELECT * FROM b_iblock_section AS sec
		WHERE sec.iblock_id = 2
		AND sec.iblock_section_id != 'null'
	";
	if ($_REQUEST['section_id']) {

		$s = CIBlockSection::GetList(null, array('IBLOCK_ID' => import::$iblock_id));
		while ($t = $s->Fetch()) {
			$sections[] = $t;
		}

		foreach ($sections as $k => $sec) {
			if ($sec['ID'] == $_REQUEST['section_id']) {
				$string  = '
				<a href="/import/add_to_sections.php?section_id=' . $sections[$k - 1]['ID'] . '"> <---' . $sections[$k - 1]['NAME'] . '</a>
				<h4 style="display: inline-block;"> ' . $sections[$k]['NAME'] . '</h4>
				<a href="/import/add_to_sections.php?section_id=' . $sections[$k + 1]['ID'] . '">' . $sections[$k + 1]['NAME'] . '---></a>
				';
				$next_id = $sections[$k + 1]['ID'];
			}
		}


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

		if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/import/items/" . $section['XML_ID'] . ".php")) {
			$res = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/import/items/" . $section['XML_ID'] . ".php"));
		}
		elseif ($section['DEPTH_LEVEL'] == 2 || $_REQUEST['section_id'] == 348) {
			$res = entero::GetItems($section['XML_ID']);
		}
	}?>
	<html>
	<head>

		<?= $section['XML_ID']; ?>
		<script type = "text/javascript" src = "/bitrix/templates/Productions/js/jquery-1.4.3.min.js"></script>
		<script type = "text/javascript">
			$(function () {

				<?if(is_array($res)):?>
				setTimeout(function () {
					$('#get').trigger('click');
				}, 3000);
				var elements = [
					<?foreach($res as $key => $vol):?>
					<?=preg_replace("|/item/(.*)|","$1",$vol['lINK'])?><?=$key+1 < count($res)?",":''?>
					<?endforeach?>
				];
				<?else:?>
				setTimeout(function () {
					$('#result').html('Элементов нет, переходим на следующий каталог...');
				}, 2000);
				this.window.location.href = '/import/add_to_sections.php?section_id=' +
				<?=$next_id?>;
				<?endif?>


				$('#get').click(function () {
					post(<?=$_REQUEST['section_id']?>, 0, elements);
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
									window.location.href = '/import/add_to_sections.php?section_id=' +<?=$next_id?>;
								}
							}
						}
				);
			}

		</script>
	</head>
	<body>

	<a href = "#" id = "get">Запрос</a><br/>
	Всего элементов - <?= count($res) ?><br/>
	<?= $string ?>

	<div id = "result"></div>
	<pre><? print_r($res) ?></pre>
	</body>
	</html>




<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php"); ?>