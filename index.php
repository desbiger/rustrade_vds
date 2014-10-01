<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("Rustrade");
?><?$APPLICATION->IncludeComponent(
	"my:catalog.random.items",
	"",
	Array(
		"FOLDER" => "",
		"SECT" => "163"
	)
);?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>