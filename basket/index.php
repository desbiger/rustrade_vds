<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("корзина");
?><?$APPLICATION->IncludeComponent(
	"my:basket", 
	".default", 
	array(
		"EMAIL" => "desbiger@gmail.com",
		"FROM" => "info@rustrade.su"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>