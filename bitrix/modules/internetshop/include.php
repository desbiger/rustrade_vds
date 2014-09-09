<?php
	CModule::IncludeModule("internetshop");
	global $DBType;
	$arClasses = array(
			'shop' => 'classes/general/shop.php',
			'basket' => 'classes/general/basket.php',
			'order' => 'classes/general/order.php',
	);
	CModule::AddAutoloadClasses("internetshop", $arClasses);