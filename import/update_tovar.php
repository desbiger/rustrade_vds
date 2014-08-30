<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/import.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/entero.php"); ?>
<?
ini_set('allow_url_fopen', '1');
$sections = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/import/sections.php"));
?>
<!--<pre>--><?//print_r($sections)?><!--</pre>-->
<?
foreach ($sections as $vol) {
	if (count($vol['SUBSECTIONS']) > 0) {
		foreach ($vol['SUBSECTIONS'] as $razdel) {
			set_time_limit(0);
			echo $razdel_id = preg_replace("/\/list\/([0-9]+)/", "$1", $razdel['LINK']);
			$result = entero::GetItemsReg($razdel_id);
			if (count($result) > 0
			) {
				$i = 0;
				foreach ($result as $key => $item) {
					$i++;
					if ($i) {
						set_time_limit(0);
						$item_id     = preg_replace("/\/item\/([0-9]+)/", "$1", $item['lINK']);
						$tovar_array = entero::GetItemReg($item['lINK']);
						?>
						<pre><?print_r($tovar_array)?></pre>
						<?
						file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/import/tovars/{$razdel_id}_{$item_id}.php", serialize($tovar_array));
					}
				}
			}

		}
	}
}


?>
