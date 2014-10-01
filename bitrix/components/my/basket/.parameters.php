<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}


	$arComponentParameters = array(
		'PARAMETERS' => array(
			'EMAIL' => array(
				'NAME' => 'Адрес куда отсылать письма',
				'TYPE' => 'STRING'
			),
			'FROM' => array(
				'NAME' => 'С какого адреса отсылать письма',
				'TYPE' => 'STRING'
			)
		)
	);
?>
