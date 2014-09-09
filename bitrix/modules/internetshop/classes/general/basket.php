<?

	class Basket extends Shop
	{
		var $iblock_id;
		protected $mid = 'internetshop';

		static function factory()
		{
			return new Basket();
		}

		function Basket()
		{
			CModule::IncludeModule('iblock');
			$this->iblock_id = COption::GetOptionString($this->mid, 'basket_id');
			$this->session();
		}

		function Add($tovar_id, $quantity, $user = null)
		{
			if (!$this->CheckTovarInBasket($tovar_id)) {
				$el         = new CIBlockElement();
				$tovar_name = $this->GetTovarNameByID($tovar_id);

				$prop['SESSION']  = $this->ses_id;
				$prop['QUANTITY'] = $quantity;
				$prop['TOVAR']    = $tovar_id;
				$prop['USER']     = $user ? $user : '';
				$fields           = array(
						'NAME' => $tovar_name['NAME'] . ' количество - ' . $quantity,
						'IBLOCK_ID' => $this->iblock_id,
						'PROPERTY_VALUES' => $prop
				);
				if (!$el->Add($fields)) {
					echo $el->LAST_ERROR;
				};

			}else{
				$el         = new CIBlockElement();
				$tovar_name = $this->GetTovarNameByID($tovar_id);

				$prop['SESSION']  = $this->ses_id;
				$prop['QUANTITY'] = $quantity;
				$prop['TOVAR']    = $tovar_id;
				$prop['USER']     = $user ? $user : '';

			}
		}

		function CheckTovarInBasket($tovar_id)
		{
			return (bool)CIBlockElement::GetList(null, array(
					'IBLOCK_ID' => $this->iblock_id,
					'PROPERTY_TOVAR' => $tovar_id,
					'PROPERTY_SESSION' => $this->ses_id,

			))
					->SelectedRowsCount();
		}

		function Del($rec_id)
		{
			CIBlockElement::Delete($rec_id);
		}

		function GetBySession()
		{
			$db     = CIBlockElement::GetList(null, array('PROPERTY_SESSION' => $this->ses_id));
			$result = $this->Fetch($db);
			return $result;
		}

	}
 