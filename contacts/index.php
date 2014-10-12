<?
    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
    $APPLICATION->SetTitle("Контакты");
?><span style="text-align: left; padding: 20px;">
<h2><span style="font-size: 0.75em; line-height: 1.5;">Вы можете обратиться к нам по телефону, по электронной почте или договориться о встрече в нашем офисе. Будем рады помочь вам и ответить на все ваши вопросы.</span><br>
 </h2>
<p>
 <br>
</p>
<h2>Телефоны</h2>
 +7(495) 790-01-27<br>
<ul>
	<li><br>
 </li>
</ul>
<h2>Email</h2>
<ul>
	<li><a href="mailto:sale@rustrade.su">sale@rustrade.su</a></li>
	<li><br>
 </li>
</ul>
<h2>Офис в Москве</h2>
 г. Москва, ул. Новослободская 3 стр.3.<br>
<h2><span style="font-size: 0.75em; line-height: 1.5;"><?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	"template1", 
	array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.77839827677147;s:10:\"yandex_lon\";d:37.600178994750934;s:12:\"yandex_scale\";i:14;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.599776288361;s:3:\"LAT\";d:55.779026906777;s:4:\"TEXT\";s:8:\"RUStrade\";}}}",
		"MAP_WIDTH" => "600",
		"MAP_HEIGHT" => "500",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "MINIMAP",
			2 => "TYPECONTROL",
			3 => "SCALELINE",
		),
		"OPTIONS" => array(
			0 => "ENABLE_SCROLL_ZOOM",
			1 => "ENABLE_DBLCLICK_ZOOM",
			2 => "ENABLE_DRAGGING",
		),
		"MAP_ID" => ""
	),
	false
);?></span></h2>
 <br>
<h2>Наши реквизиты</h2>
 <br>
 Наименование: ООО «РУСТРЕЙД»<br>
 Юридический адрес: 125466 г. Москва, ул. Родионовская д.12 к.1<br>
 ОГРН 1137746058405<br>
 ИНН/КПП 7733829666/773301001<br>
 ОКПО 17098612<br>
 ОКАТО 45283555000<br>
 р/счет 40702810138040031869<br>
 кор/счет 30101810400000000225<br>
 БИК 044525225<br>
 в ОАО «Сбербанк России» г. Москва<br>
 8(495) 790-01-27<br>
 <a href="mailto:sale@rustrade.su">sale@rustrade.su</a><br>
 <br>
 <br>
 <br>
 <br>
 <br>
<p>
 <br>
</p>
<p>
 <br>
</p>
<p>
</p>
<p>
</p>
<p>
</p>
<p>
</p>
 </span><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>