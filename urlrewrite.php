<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/catalog/brends/(.*)/.*#",
		"RULE" => "BREND=\$1",
		"ID" => "",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/(.*)/(.*)/(.*)#",
		"RULE" => "ELEMENT_ID=\$2&SECTION_ID=\$1",
		"ID" => "",
		"PATH" => "/catalog/detail_page.php",
	),
	array(
		"CONDITION" => "#^/ready_projects/(.*)/.*#",
		"RULE" => "SECTION_ID=\$1",
		"ID" => "",
		"PATH" => "/ready_projects/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/(.*)/(.*)#",
		"RULE" => "SECTION_ID=\$1",
		"ID" => "",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/products/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/products/index.php",
	),
	array(
		"CONDITION" => "#^/services/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/services/index.php",
	),
	array(
		"CONDITION" => "#^/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/news/index.php",
	),
);

?>