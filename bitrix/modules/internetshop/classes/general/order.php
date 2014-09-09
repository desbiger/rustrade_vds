<?

	class Order extends Shop
	{
		protected $iblock_id;
		protected $mid = 'internetshop';

		static function factory()
		{
			return new Order();
		}

		function Order()
		{
			$this->iblock_id = COption::GetOptionString($this->mid, 'order_id');
			$this->session();
			CModule::IncludeModule('iblock');
		}
	}
 