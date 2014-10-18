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

		function GetTovarsAndQuantity()
		{
			$result = array();
			if (count($this->tovarsList)) {
				foreach ($this->tovarsList as $vol) {
					$tovar_id          = preg_replace("|([0-9]+)\(([0-9]+)\)|isU", "$1", $vol['VALUE']);
					$tovar_quantity    = preg_replace("|([0-9]+)\(([0-9]+)\)|isU", "$2", $vol['VALUE']);
					$result[$tovar_id] = array(
							'QUANTITY' => $tovar_quantity,
							'PRICE' => Tovar::factory($tovar_id)
									->GetPrice(),
							'NAME' => Tovar::factory($tovar_id)
									->GetName()
					);
				}
			}
			return $result;
		}


	}
 