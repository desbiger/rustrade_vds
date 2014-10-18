<?

	class TovarGroups
	{
		function GetUserTypeDescription()
		{
			return array(
					'PROPERTY_TYPE' => 'S',
					'USER_TYPE' => 'TOVAR',
					'DESCRIPTION' => 'Набор товаров',
					'GetAdminListViewHTML' => array(
							'TovarGroups',
							'GetAdminListViewHTML'
					),
					'GetPropertyFieldHtml' => array(
							'TovarGroups',
							'GetPropertyFieldHtml'
					),
					'ConvertToDB' => array(
							'TovarGroups',
							'ConvertToDB'
					),
					'ConvertFromDB' => array(
							'TovarGroups',
							'ConvertFromDB'
					),
			);
		}

		function GetAdminListViewHTML($arProperty, $value, $strHTMLControlName)
		{
			return 'Список групп товаров';
		}

		function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
		{
			$ID = intval($_REQUEST['ID']);
			echo 'Товар <br><input type="text" name = "' . $strHTMLControlName['VALUE'] . '"/>';
			$path = "/bitrix/admin/iblock_element_search.php?lang=ru&IBLOCK_ID=2&n=PROP[35]&k=n0";
			echo '<input type="button" value="..." onclick="jsUtils.OpenWindow(' . $path . ', 600, 500);">';
			echo '<br>Количество <br><input value="' . $value['DESCRIPTION'] . '" type = "text" name="' . $strHTMLControlName['DESCRIPTION'] . '"/>';
			echo '<br>';
		}

		function ConvertToDB($arProperty, $value)
		{
			return $value;
		}

		function ConvertFromDB($arProperty, $value)
		{
			return $value;
		}

	}
 