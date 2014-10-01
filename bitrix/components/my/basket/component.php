<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

	$IBLOCK_ID        = 7;
	$ORDERS_IBLOCK_ID = 8;


	$POPERTY_SESSION_ID = 30;
	$session            = $_SESSION['fixed_session_id'];
	$basket_URL         = '/basket/';

	if (isset($_REQUEST['itemdel'])) { //удаляем товар из корзины
		$id = $_REQUEST['itemdel'];
		if (CIBlockElement::Delete($id)) {
			LocalRedirect($basket_URL);
		};
	}
	if (isset($_REQUEST['del'])) { //очистка корзины
		$sql = "
    	SELECT
    	  el.*
    	FROM
    	  `b_iblock_element` AS el
    	WHERE el.`IBLOCK_ID` =  {$IBLOCK_ID}
    	AND el.`ID` IN
    	  (SELECT
    	    prop.`IBLOCK_ELEMENT_ID`
    	  FROM
    	    `b_iblock_element_property` AS prop
    	  WHERE prop.`IBLOCK_PROPERTY_ID` =  {$POPERTY_SESSION_ID}
    	    AND prop.`VALUE` = '{$session}')
    	";
		global $DB;
		$res = $DB->Query($sql);
		while ($t = $res->GetNext()) {
			CIBlockElement::Delete($t['ID']);
		}
		LocalRedirect($basket_URL);

	}
	if ($_POST && !isset($_POST['finish'])) {
		foreach ($_POST as $key => $vol) { //обновление корзины
			if (preg_match("/count_[0-9]+/", $key)) {
				$id = str_replace("count_", "", $key);
				CIBlockElement::SetPropertyValueCode($id, 'QUANTITY', $vol);
			}
		}
		$basket_URL = $_REQUEST['update'] == 'Оформить заказ' ? $basket_URL .= "?step=2" : $basket_URL;
		LocalRedirect($basket_URL);
	}


	//////////////////////////////////////получение корзины////////////////////////////////


	$sql = "
	SELECT
	  el.*,COUNT(el.`ID`) AS `COUNT`
	FROM
	  `b_iblock_element` AS el
	WHERE el.`IBLOCK_ID` =  {$IBLOCK_ID}
	AND el.`ID` IN
	  (SELECT
	    prop.`IBLOCK_ELEMENT_ID`
	  FROM
	    `b_iblock_element_property` AS prop
	  WHERE prop.`IBLOCK_PROPERTY_ID` =  {$POPERTY_SESSION_ID}
	    AND prop.`VALUE` = '{$session}')
	    GROUP BY el.NAME
	";
	global $DB;
	$res = $DB->Query($sql);
	while ($t = $res->GetNext()) {
		$property               = CIBlockElement::GetByID($t['ID'])
				->GetNextElement()
				->GetProperties();
		$t['PROPERTY']          = $property;
		$t['PROPERTY']['TOVAR'] = CIBlockElement::GetByID($t['PROPERTY']['TOVAR']['VALUE'])
				->GetNext();
		$arResult[]             = $t;
	};

	if (isset($_POST['finish'])) {

		$email          = $_POST['email'];
		$name           = $_POST['name'];
		$phone          = $_POST['phone'];
		$text           = $_POST['text'];
		$html           = "

		<style>
		.basket_table tr td{
		    border: 1px solid black;
		    padding: 5px;

		}
		.basket_table{
		    border-collapse: collapse;
		}
		</style>


		$name = <h2>Заказ от {$name}</h2>";
		$phone          = "Телефон: {$phone}<br>";
		$email          = "Email: {$email}<br>";
		$discription    = "Примечание: {$text}<br>";
		$table_for_mail = "
		<table class='basket_table'>
					<tr>
						<td>Картинка</td>
						<td>Название</td>
						<td>Количество</td>
					</tr>";

		foreach ($arResult as $vol) {

			$property['TOVARS'][] = array(
					'VALUE' => $vol['PROPERTY']['TOVAR']['ID'],
					'DESCRIPTION' => $vol['PROPERTY']['QUANTITY']['VALUE']
			);

			$img      = CFile::ResizeImageGet($vol['PROPERTY']['TOVAR']['DETAIL_PICTURE'], array(
					'width' => 100,
					'height' => 100
			));
			$real_img = CFile::GetPath($vol['PROPERTY']['TOVAR']['DETAIL_PICTURE']);

			$table_for_mail .= "<tr>
						<td style = 'text-align: center' >
								<img src = 'http://rustrade.su" . $img['src'] . "' alt = '' />
						</td >
						<td>
							<a href = 'http://rustrade.su" . $vol['PROPERTY']['TOVAR']['DETAIL_PAGE_URL'] . " '>" . $vol['NAME'] . "</a>
						</td>
						<td style = 'text-align: center'>
						 " . $vol['PROPERTY']['QUANTITY']['VALUE'] . "</td>

						</tr>";
		}
		$t = CIBlockElement::GetList(null,array('NAME' => 'Новый'))->Fetch();
		$property['STATUS'] = $t['ID'];

		$element = new CIblockElement();
		$oder_id = $element->add(array(
				'IBLOCK_ID' => $ORDERS_IBLOCK_ID,
				'NAME' => 'Заказ от ' . $name,
				'PROPERTY_VALUES' => $property
		));


		$fields = array(
				'NAME' => $name,
				'ORDER_ID' => $oder_id,
				'PHONE' => $phone,
				'EMAIL_FROM' => $email,
				'DESCRIPTION' => $discription,
				'TABLE' => $table_for_mail
		);
		CEvent::Send('NEW_ORDER', 's1', $fields);

		$sql = "
    	SELECT
    	  el.*
    	FROM
    	  `b_iblock_element` AS el
    	WHERE el.`IBLOCK_ID` =  {$IBLOCK_ID}
    	AND el.`ID` IN
    	  (SELECT
    	    prop.`IBLOCK_ELEMENT_ID`
    	  FROM
    	    `b_iblock_element_property` AS prop
    	  WHERE prop.`IBLOCK_PROPERTY_ID` =  {$POPERTY_SESSION_ID}
    	    AND prop.`VALUE` = '{$session}')
    	";
		global $DB;
		$res = $DB->Query($sql);
		while ($t = $res->GetNext()) {
			$deletes[] = $t['ID'];
		}
		foreach ($deletes as $value) {
			CIBlockElement::Delete($value);
		}
		LocalRedirect($basket_URL . '?ready=y');
	}


	$this->IncludeComponentTemplate();

?>