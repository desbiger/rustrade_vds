<?

	class Tovar
	{
		public $tovar_id;
		protected $property_price_id = 2;

		static function factory($id)
		{
			return new Tovar($id);
		}

		function __construct($id)
		{
			$this->tovar_id = $id;
		}

		function GetPrice()
		{
			if ($this->tovar_id) {
				global $DB;
				$q     = "SELECT `VALUE` FROM b_iblock_element_property WHERE IBLOCK_ELEMENT_ID = {$this->tovar_id} AND IBLOCK_PROPERTY_ID =
				{$this->property_price_id}";
				$price = $DB->Query($q)
						->Fetch();
				return $price['VALUE'];
			}
			else {
				return false;
			}
		}
	}
 