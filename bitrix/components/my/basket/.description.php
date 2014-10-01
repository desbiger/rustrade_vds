<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "корзина",
	"DESCRIPTION" => "выводит список товаров",
	"ICON" => "/images/icon.gif",
	"SORT" => 10,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "hit-media", // for example "my_project"
		"CHILD" => array(
			"ID" => "my_shop", // for example "my_project:services"
			"NAME" => "Магазин",  // for example "Services"
		),
	),
	"COMPLEX" => "N",
);


?>