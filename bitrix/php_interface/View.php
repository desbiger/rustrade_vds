<?

	class View
	{
		public $path_to_file;
		public $collector;

		static function Factory($path)
		{
			return new View($path);
		}

		function View($path)
		{
			$this->path_to_file = $path;
		}

		function __ToString()
		{
			$view = $this->Render();
			try {
				return (string)$view;
			} catch (Exception $e) {
//				$e->getMessage();
				return 'Это не строка';
			}
		}
		function bind($var,$vol){
			$this->collector[$var] = $vol;
			return $this;
		}

		function Render()
		{
			extract($this->collector);
			include($this->path_to_file);
		}
	}
 