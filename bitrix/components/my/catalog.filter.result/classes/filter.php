<?

	class filter
	{
		static function GetValues($description)
		{

			$result = array();
			global $DB, $elements_id_list;

			$section_id = $_REQUEST['SECTION_ID'];

			if (count($elements_id_list) == 0) {
				$add = true;
				$sql = "SELECT
			  prop.VALUE , prop.IBLOCK_ELEMENT_ID
			FROM
			  `b_iblock_element_property` AS prop
			WHERE prop.`IBLOCK_ELEMENT_ID` IN
			  (SELECT
			    el.`ID`
			  FROM
			    `b_iblock_element` AS el
			  WHERE el.`IBLOCK_SECTION_ID` = '{$section_id}')
			  AND prop.`DESCRIPTION` = '{$description}'
			  GROUP BY prop.`VALUE`";
			}
			else {
				$list = implode(",", $elements_id_list);
				$sql  = "SELECT
			  prop.`VALUE`, prop.`IBLOCK_ELEMENT_ID`
			FROM
			  `b_iblock_element_property` AS prop
			WHERE prop.`IBLOCK_ELEMENT_ID` IN
			  ({$list})
			  AND prop.`DESCRIPTION` = '{$description}'
			  GROUP BY prop.`VALUE`";
			}

			$res              = $DB->Query($sql);
			$elements_id_list = array();


			while ($tep = $res->Fetch()) {
				$result[] = $tep['VALUE'];
				if ($add) {
					$elements_id_list[] = $tep['IBLOCK_ELEMENT_ID'];
				}
			}
			return $result;
		}

		//		static function GetValuesForProperty($property_id){
		//			global $DB;
		//						$sql = "SELECT
		//					  prop.VALUE
		//					FROM
		//					  `b_iblock_element_property` AS prop
		//					WHERE prop.`IBLOCK_ELEMENT_ID` IN
		//					  (SELECT
		//					    el.`ID`
		//					  FROM
		//					    `b_iblock_element` AS el
		//					  WHERE el.`IBLOCK_SECTION_ID` = 1398)
		//					  AND prop.`DESCRIPTION` = '{$description}'
		//					  GROUP BY prop.`VALUE`";
		//						$res = $DB->Query($sql);
		//						while ($tep = $res->Fetch()) {
		//							$result[] = $tep['VALUE'];
		//						}
		//						return $result;
		//		}

		static function GetHTMLForm($description, $values, $name, $types)
		{
			if (($config = $types[$description]['TYPE']) != '') {
				if (method_exists('forms', $config)) {
					return forms::$config($values, $types[$description]['CODE'], $description, $types[$description]['ED_IZM']);
				}
			}
			else {
				return null;
			};

		}

	}
