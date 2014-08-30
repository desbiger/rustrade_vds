<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/import.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/entero.php"); ?>
<?
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
$sections = entero::GetRazdels();
$i = 0;
foreach ($sections as $l1) {
	if (count($l1['SUBSECTIONS']) > 0) {
		foreach ($l1['SUBSECTIONS'] as $l2) {
			if (count($l2['TOVARS']) > 0) {
				$log = '';

				foreach ($l2['TOVARS'] as $tovars) {
					set_time_limit(50);
					if (import::CheckExistProduct($tovars['ID'])) {

					}
					else {
						$filename = $l2['ID'] . "_" . $tovars['ID'] . ".php";
						$array = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT']. "/import/tovars/{$filename}"));
						$id = import::TovarAdd($array, $filename);
						$i++;
						file_put_contents($_SERVER['DOCUMENT_ROOT']."/add_tovar.log", "id = {$id}, number - {$i}\n");
					}
					//					$item     = entero::GetItemReg($tovars['lINK']);
					//					$file_name = $l2['ID'] . "_" . $tovars['ID'] . ".php";
					//					$log .= $file_name."\n";
					//					file_put_contents(ROOT . "/import/tovars/" . $file_name, serialize($item));
					//					file_put_contents(ROOT . "/add_item.log", $log);
				}
			}
		}
	}
}
echo $i;
?>
<!--<pre>--><?//print_r($sections)?><!--</pre>-->
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php"); ?>