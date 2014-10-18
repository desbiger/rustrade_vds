<?

	class TovarsGroup
	{
		public $groupId;
		public $tovarsList;
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

	}
 