<?

	class TovarsGroup
	{
		public $groupId;
		public $tovarsList = array();
		protected $property_tovars_id = 35;

		static function factory($groupId)
		{
			return new TovarsGroup($groupId);
		}

		function TovarsGroup($id)
		{
			$this->groupId = $id;
			global $DB;
			$q = "
				SELECT *
			    FROM b_iblock_element_property
			    WHERE
			    IBLOCK_PROPERTY_ID = {$this->property_tovars_id}
			    AND IBLOCK_ELEMENT_ID = {$this->groupId}";
			$t = $DB->Query($q);
			while ($r = $t->Fetch()) {
				$this->tovarsList[] = $r;
			}
		}

		function GetTovarsAndQuantity($as_object = false)
		{
			$result = array();
			if (count($this->tovarsList)) {
				$summa = 0;
				foreach ($this->tovarsList as $vol) {
					$tovar_id          = preg_replace("|([0-9]+)\(([0-9]+)\)|isU", "$1", $vol['VALUE']);
					$tovar_quantity    = preg_replace("|([0-9]+)\(([0-9]+)\)|isU", "$2", $vol['VALUE']);
					$price             = Tovar::factory($tovar_id)
							->GetPrice();
					$tovar_name        = Tovar::factory($tovar_id)
							->GetName();
					$loc_summa         = str_replace(" ", '', $price) * $tovar_quantity;
					$summa += $loc_summa;
					$result['ITEMS'][$tovar_id] = array(
							'QUANTITY' => $tovar_quantity,
							'PRICE' => $price,
							'NAME' => $tovar_name,
							'SUMMA' => $loc_summa,
					);
				}
				$result['SUMMA'] = $summa;
			}
			return $as_object ? (object)$result : $result ;
		}


	}
 