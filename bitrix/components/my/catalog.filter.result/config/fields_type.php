<?php

	$types = array(
		//		'Вес (без упаковки)' => array(
		//			'TYPE' => 'interval',
		//			'ED_IZM' => 'кг',
		//			'CODE' => 'WES'
		//		),
		//		'Вес (с упаковкой)' => array(
		//			'TYPE' => 'interval',
		//			'ED_IZM' => 'кг',
		//			'CODE' => 'WES'
		//		),
		//		'Высота' => array(
		//			'TYPE' => 'interval',
		//			'ED_IZM' => 'см',
		//			'CODE' => 'HEIGHT'
		//		),
		//		'Глубина' => array(
		//			'TYPE' => 'interval',
		//			'ED_IZM' => 'см',
		//			'CODE' => 'DEEP'
		//		),
			'Количество уровней' => array(
					'TYPE' => 'select',
					'CODE' => 'LEVELS'
			),
			'Стоимость' => array(
					'ED_IZM' => 'р',
					'TYPE' => 'interval',
					'CODE' => 'PRICE',
					'PROPERTY_ID' => 26,
					'REAL_CODE' => 'Y'
			),
			'Мощность' => array(
					'TYPE' => 'interval',
					'ED_IZM' => 'Ват',
					'CODE' => 'POWER'
			),
			'Производительность' => array(
					'TYPE' => 'interval',
					'ED_IZM' => 'кг/ч',
					'CODE' => 'PROIZVOD'
			),
			'Частота вращения шнека' => array(
					'TYPE' => 'checkbox',
					'ED_IZM' => 'об/мин',
					'CODE' => 'CHASTOTA_VRASH'
			),
			'Количество зон нагрева' => array(
					'TYPE' => 'checkbox',
					'ED_IZM' => 'шт',
					'CODE' => 'HOT_ZONES'
			),
			'Структура нижней поверхности' => array(
					'TYPE' => 'checkbox',
					'ED_IZM' => '',
					'CODE' => 'NIZ_PVERH'
			),
			'Материал жарочной поверхности' => array(
					'TYPE' => 'checkbox',
					'ED_IZM' => '',
					'CODE' => 'MATERIAL_ZHAR_POV'
			),
			'Температурный режим' => array(
					'TYPE' => 'interval',
					'ED_IZM' => 'C',
					'CODE' => 'TEMP'
			),
			'Напряжение' => array(
					'TYPE' => 'checkbox',
					'CODE' => 'NAPR',
					'ED_IZM' => 'вольт',
			),
			'Страна-производитель' => array(
					'TYPE' => 'checkbox',
					'CODE' => 'COUNTRY'
			),
			'Бренд' => array(
					'TYPE' => 'checkbox',
					'CODE' => 'BREND'
			),
			'Предел взвешивания' => array(
					'TYPE' => 'checkbox',
					'CODE' => 'PREDEL_WESA'
			),
			'Формат ёмкостей' => array(
					'TYPE' => 'select',
					'CODE' => 'FOR_EMK'
			),

	);