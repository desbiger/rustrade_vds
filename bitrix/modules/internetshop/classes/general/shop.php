<?

	class Shop
	{
		public  $ses_id;

		function Fetch($CDBResult)
		{
			$t = array();
			while ($t = $CDBResult->Fetch()) {
				$result[] = $t;
			}
			return $t;
		}

		function GetTovarNameByID($tovar_id)
		{
			return CIBlockElement::GetByID($tovar_id)->Fetch();
		}
		function session(){
			$this->ses_id = $_SESSION['fixed_session_id'];
		}
	}
 