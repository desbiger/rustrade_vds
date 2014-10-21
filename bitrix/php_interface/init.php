<?

	require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/TovarGroups.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/classes/project/Tovar.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/php_interface/classes/project/TovarsGroup.php");
	AddEventHandler('iblock', 'OnIBlockPropertyBuildList', array('TovarGroups', 'GetUserTypeDescription'));


	function check_show_price($section_id)
	{
		global $DB;
		$q   = "
			SELECT
			  *
			FROM
			  b_uts_iblock_2_section AS can_show_section
			WHERE can_show_section.`VALUE_ID` = '{$section_id}'
			";
		$res = $DB->Query($q)
				->fetch();
		if ($res['UF_PRICE'] == 0) {
			return false;
		}
		else {
			return true;
		}

	}

	function GetPictureOfSection($section_id)
	{
		global $DB;
		$q   = "
		 SELECT *  FROM b_iblock_element as el
		 WHERE el.IBLOCK_SECTION_ID = {$section_id}
		 AND !ISNULL(el.DETAIL_PICTURE)
		";
		$res = $DB->Query($q)
				->Fetch();
		return $res['DETAIL_PICTURE'];
	}
 