<?
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);
	include_once(ROOT . "/include/simple_html_dom.php");
	include_once(ROOT . "/import/class/entero.php");


	function serilize_file($path, $array)
	{
		file_put_contents(ROOT . $path, serialize($array));
	}


	function redirect($url)
	{
		?>
		<script type = "text/javascript">
			window.location.href = '<?=$url?>';
		</script>
	<?
	}

	$html = new simple_html_dom();

	error_reporting('E_ALL');

	if (!isset($_REQUEST['step'])) {
		$html->load_file('http://www.entero.ru/categories/192');
		$elements = $html->find('h2.navi a');

		foreach ($elements as $link) {
			$root_sections[$link->plaintext] = array(
					'LINK' => $link->href,
					'ID' => preg_replace("/\/[categories,list]+\/([0-9]+)/", "$1", $link->href),
					'TYPE' => 123
			);
		}
		file_put_contents(ROOT . "/import/root.php", serialize($root_sections));
		redirect("/import/load_from.php?step=2&element=1");
	}
	elseif ($_REQUEST['step'] == 2) {

		$array = unserialize(file_get_contents(ROOT . "/import/root.php"));

		$i = 0;
		foreach ($array as $vol) {
			$i++;
			if ($_REQUEST['element'] == $i) {
				$html->load_file("http://www.entero.ru" . $vol['LINK']);
				foreach ($html->find('h2.navi a') as $links) {
					$result[] = array(
							'NAME' => $links->plaintext,
							'LINK' => $links->href,
							'ID' => preg_replace("/\/[categories,list]+\/([0-9]+)/", "$1", $links->href)
					);
				}
				$filename = $vol['ID'] . ".php";
				file_put_contents(ROOT . "/import/{$filename}", serialize($result));
				if (count($array) > $i) {
					$i++;
					redirect("/import/load_from.php?step=2&element={$i}");
				}
				else {
					redirect("/import/load_from.php?step=3");
				}
			}
		}

		?>
		<pre><? print_r($result) ?></pre>
	<?
	}
	elseif ($_REQUEST['step'] == 3) {
		$root = unserialize(file_get_contents(ROOT . "/import/root.php"));
		foreach ($root as &$vol) {
			$id                 = $vol['ID'];
			$subsection = unserialize(file_get_contents(ROOT . "/import/{$id}.php"));
			$vol['SUBSECTIONS'] = $subsection;
//			if (count($subsection)) {
//				foreach ($subsection as $sub_value) {
//					entero::GetItems($sub_value['ID']);
//				}
//			}
		}
//		file_put_contents(ROOT . "/import/sections.php", serialize($root));
		?>
		<pre><? print_r($root) ?></pre>
	<?
	}
	elseif ($_REQUEST['step'] == 4) {
		$sections = unserialize(file_get_contents(ROOT . "/import/sections.php"));
		$next     = false;
		foreach ($sections as $section) {
			if (is_array($section['SUBSECTIONS'])) {
				foreach ($section['SUBSECTIONS'] as $cur_section) {
					if ($_REQUEST['ID'] == $cur_section['ID']) {
						echo $section_id = $cur_section['ID'];
						$items      = unserialize(file_get_contents(ROOT . "/import/items/{$section_id}.php"));
//						echo "<pre>" . print_r($items, true) . "</pre>";
						foreach ($items as $item) {
							$tovars[] = entero::GetItem($item['lINK']);
							print_r($tovars);
//							die();

						}
						file_put_contents(ROOT . "/import/tovars/{$section_id}.php", serialize($tovars));
						$next = true;
					}
					elseif ($next) {
						$id = $cur_section['ID'];
						redirect("/import/load_from.php?step=4&ID={$id}");
					}
				}
			}
		}
		?>

	<?
	}
	elseif ($_REQUEST['step'] == 5) {

		$list = unserialize(file_get_contents(ROOT . "/import/sections.php"));

		$_REQUEST['razdel']     = isset($_REQUEST['razdel']) ? $_REQUEST['razdel'] : "Тепловое";
		$_REQUEST['SUBSECTION'] = isset($_REQUEST['SUBSECTION']) ? $_REQUEST['SUBSECTION'] : 0;
		$_REQUEST['item']       = isset($_REQUEST['item']) ? $_REQUEST['item'] : 0;
		$next_razdel            = false;

		foreach ($list as $key => &$level1) {
			if ($key == $_REQUEST['razdel'] && !$next_razdel) {
				$razdel = $key;

				foreach ($level1['SUBSECTIONS'] as $section_number => &$level2) {
					if ($_REQUEST['SUBSECTION'] == $section_number) {
						$subsection = $section_number;
						$id         = $level2['ID'];
						$items      = unserialize(file_get_contents(ROOT . "/import/items/{$id}.php"));
						foreach ($items as $item_number => $item_value) {
							if ($_REQUEST['item'] == $item_number) {
								$item_array = GetItem($item_value['lINK']);
								echo $item_id = str_replace('/item/', "", $item_value['lINK']);
								file_put_contents(ROOT . "/import/tovars/{$item_id}.php", serialize($item_array));
								?>
								<pre><? print_r($item_array) ?></pre>
								<?
								if ($item_number < (count($items) - 1)) {
									$item_number++;
									redirect("/import/load_from.php?step=5&razdel={$razdel}&SUBSECTION={$subsection}&item={$item_number}");
								}
								elseif ($subsection < (count($level1['SUBSECTIONS']) - 1)) {
									$subsection++;
									$item_number = 0;
									redirect("/import/load_from.php?step=5&razdel={$razdel}&SUBSECTION={$subsection}&item={$item_number}");
								}
								elseif ($item_number == (count($items) - 1) && $subsection == (count($level1['SUBSECTIONS']) - 1)) {
									$next_razdel = true;
								}
							}
						}

					}
				}
			}
			elseif ($next_razdel) {
				$razdel      = $key;
				$subsection  = 0;
				$item_number = 0;
				redirect("/import/load_from.php?step=5&razdel={$razdel}&SUBSECTION={$subsection}&item={$item_number}");
			}
		}
		?>


	<?
	}
?>
