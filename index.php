<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("Rustrade");
?><?$APPLICATION->IncludeComponent("my:catalog.random.items", "", Array(
		"FOLDER" => "",
		"SECT" => "163"
));

	CModule::IncludeModule('internetshop');
	Basket::factory()->Add('40390','2')


?><br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>