<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>

<a href = "/basket/">
	<img style = "float: left; margin-right: 7px" src = "/bitrix/templates/Productions/img/cart_4211.png">
	Корзина (<span id = "basket_count"><?= $arResult['COUNT'] ?></span>)
</a>
