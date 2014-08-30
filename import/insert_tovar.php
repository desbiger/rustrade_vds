<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");?>

<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/import.php"); ?>
<? require_once($_SERVER["DOCUMENT_ROOT"] . "/import/class/entero.php"); ?>
<?


	$arResult = entero::ListTovars();
	if (count($arResult) > 2) {
		foreach ($arResult as $key => $vol) {
			set_time_limit(0);
			if ($key > 1) {
				echo $vol;
				$array = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/import/tovars/{$vol}"));
				foreach ($array as $tovar) {
					if($tovar['NAME']){
//						print_r($tovar);
						print_r(import::TovarAdd($tovar, $vol));
//						die();

					}
				}
			}
		}
	}

?>
	<pre><? print_r($array) ?></pre>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>