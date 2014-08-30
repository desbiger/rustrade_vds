<?
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);
	require_once(ROOT . "/include/simple_html_dom.php");

	class entero
	{
		static $main_url = "http://entero.ru";


		static function GetSections()
		{
			$result    = array();
			$base_url  = "/categories/192";
			$main_page = self::$main_url . $base_url;

			$html = file_get_html($main_page);
			//			var_dump($html);
			echo $html->find('title', 0)->innertext;
			foreach ($html->find('h2.navi') as $node) {
				$result[] = $node->find('a', 0)->innertext;
			}
			return $result;
		}

		/**
		 * @param bool $path_to_save
		 * @return mixed
		 * Получаем полный список всех разделов с 1го до 2 го уровня в виде массива
		 */
		static function GetRazdels($path_to_save = false)
		{
			if ($path_to_save) {
				$base_url  = "/categories/192";
				$main_page = self::$main_url . $base_url;
				$page      = file_get_contents($main_page);
				preg_match_all("|<h2[^>]+navi[^>]*><a[^>]+(/categories/([0-9]+))>(.*)</a>.*</h2>|mUu", $page, $h2);
				$count = 0;
				foreach ($h2[1] as $key => $vol) {
					$subsections = self::GetRadezls_level2(self::$main_url . $vol);
					$count += count($subsections) + 1;
					$final[$h2[3][$key]] = array(
							'ID' => $h2[2][$key],
							'SUBSECTIONS' => $subsections
					);
				}
				if ($path_to_save) {
					file_put_contents($path_to_save, serialize($final));
				}
			}
			else {
				$final = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/import/sections_w_tovars.php"));
			}
			//			echo $count;
			return $final;
		}


		/**
		 * @param $url
		 * @return array
		 * Получаем список разделов 2 го уровня
		 */
		static function GetRadezls_level2($url)
		{
			$page = file_get_contents($url);
			preg_match_all("|<h2[^>]+navi[^>]*><a[^>]+(/list/([0-9]+))>(.*)</a>.*</h2>|mUu", $page, $subrazdels);
			$result = array(
					"URL" => $subrazdels[1],
					"XML_ID" => $subrazdels[2],
					"NAME" => $subrazdels[3]
			);
			foreach ($result['NAME'] as $key => $vol) {
				set_time_limit(59);
				$final[] = array(
						'NAME' => $vol,
						'ID' => $result['XML_ID'][$key],
						'LINK' => $result['URL'][$key],
						'TOVARS' => self::GetItemsFromOnePage($result['URL'][$key])
				);
			}
			return $final;
		}


		static function ListSections()
		{
			$folder = scandir($_SERVER['DOCUMENT_ROOT'] . "/import/items/");
			return $folder;
		}

		static function ListTovars()
		{
			$folder = scandir($_SERVER['DOCUMENT_ROOT'] . "/import/tovars/");
			return $folder;
		}

		/**
		 * @param $id
		 * @return array
		 */
		static function GetItem($id)
		{
			$result = array();
			$url = "http://www.entero.ru{$id}";
			$htmldom = file_get_html($url);


			foreach ($htmldom->find('table.ch td.name') as $names) {
				$description            = explode("<span>", $names->innertext);
				$prop['DESCRIPTIONS'][] = $description[1];
			}
			foreach ($htmldom->find('table.ch tr td.value') as $values) {
				$prop['VALUES'][] = $values->plaintext;
			}


			$img      = $htmldom->find('div.nozoom img', 0);
			$name     = $htmldom->find('h1.navi', 0)->plaintext;
			$price    = $htmldom->find('div.num span', 0)->plaintext;
			$opisanie = $htmldom->find('div.htmlcontent', 0)->plaintext;

			$big_img = $htmldom->find("div.zoomable", 0);


			$photo  = array(
					'BASE_IMG' => $img->src,
					'IMG_ALT' => $img->alt
			);
			$result = array(
					'ID' => preg_replace("/\/item\/([0-9]+)/", "$1", $id),
					'OPISANIE' => str_replace("Описание", "", $opisanie),
					'NAME' => $name,
					'PHOTO' => $photo,
					'PHOTOS' => "http://www.entero.ru/photos/xxxl/" . $big_img->id,
					'PRICE' => $price,
					'PROPERTIES' => $prop,
			);

			//			unset($htmldom);
			return $result;
		}


		/**
		 * @param $id
		 * @return array
		 * Парсим страницу товара методом регулярок
		 */
		static function GetItemReg($id)
		{
			$start = microtime(true);
			$url   = "http://www.entero.ru{$id}";
			$id    = preg_replace("|/item/([0-9]+)|is", "$1", $id);
			$page  = str_replace(array(
					"\r",
					"\n",
					"&nbsp;"
			), array(
					"",
					"",
					" "
			), file_get_contents($url));

			preg_match_all("/<div[^>]+zoomable[^>]+id=([0-9]+)[^>]*>/isu", $page, $photos);
			preg_match_all("|<td[^>]+value[^>]*>([^>]+)<\/td>|isu", $page, $values);
			preg_match_all("|<[^>]+><span>([^>]+)<span><\/[^>]+>|isu", $page, $names);
			preg_match_all("|<h1[^>]+navi[^>]*>([^>]+)<\/h1>|isu", $page, $title);
			preg_match_all("|<img[^>]+(\/photos\/l\/[0-9]+)[^>]*>|isu", $page, $photo2);
			preg_match_all("|<span>([^>]+)<\/span>|isu", $page, $price);
			preg_match_all("|>Торговая марка ([^>]+)<|isu", $page, $brend);
			preg_match_all("|<div[^>]+htmlcontent[^>]*>(.*?)<div[^>]+width:234px[^>]*>|muUiS", $page, $opisanie);
			preg_match_all("|<p>(.*)<\/p>|U", $opisanie[0][0], $opisanie_text);
			preg_match_all("|[Характеристики:|Особенности:]+(.*)<ul>(.*)</ul>|msuU", $opisanie[0][0], $harakteristiki);
			preg_match_all("|<li>(.*): (.*)</li>|mUu", $opisanie[0][0], $items);

			preg_match_all("|<a[^>]+/item/([0-9]+) [^>]+Подробное описание[^>]+>.*</a>|Uum", $page, $akessuar);
			//			if (count($opisanie_text[1]) > 0) {
			//				$opisanie = '';
			//				foreach ($opisanie_text[1] as $p) {
			//					$opisanie .= $p != ' ' ? strip_tags($p) . "<br>" : '';
			//				}
			//			}
			//			$page = '';
			$properties                   = array(
					'DESCRIPTIONS' => $names[1] + self::DelDirt($items[1]),
					'VALUES' => $values[1] + $items[2],
			);
			$properties['DESCRIPTIONS'][] = 'Бренд';
			$properties['VALUES'][]       = $brend[1][0];

			//			return $opisanie;
			return array(
					'ID' => $id,
					'NAME' => $title[1][0],
					'PRICE' => $price[1][0],
					'BREND' => $brend[1][0],
					'PROPERTIES' => $properties,
					'PHOTO' => array(
							'BASE_IMG' => $photo2[1][0],
					),
					'PHOTOS' => "http://www.entero.ru/photos/xxxl/" . $photos[1][0],
					'OPISANIE' => "<div>" . $opisanie[1][0],
					'AKSESSUARY' => $akessuar[1]

			);

		}


		static function DelDirt($array)
		{
			foreach ($array as &$vol) {
				$vol = str_replace(array(
						"\n",
						"\r",
						"\t"
				), array(
						"",
						"",
						""
				), $vol);
			}
			return $array;
		}

		static function CheckIssetTovarInBitrix($xml_id)
		{
			global $DB;
			$q  = "SELECT * FROM b_iblock_element WHERE XML_ID = {$xml_id}";
			$el = $DB->Query($q)
					->Fetch();
			if ($el['NAME']) {
				return true;
			}
			else {
				return false;
			}

		}

		/**
		 * @param $section_id
		 * @return array
		 */
		static function GetItems($section_id)
		{
			$url     = "http://www.entero.ru/list/{$section_id}";
			$htmldom = file_get_html($url);
			$count   = 0;
			$result = array();
			foreach ($htmldom->find('div.numpages') as $pages) {

				$count = count($pages->children());
			}
			if ($count == 0) {
				foreach ($htmldom->find('div.slot div.m a') as $hrefs) {
					$result[] = array(
							'NAME' => $hrefs->plaintext,
							'lINK' => $hrefs->href
					);
				}

			}
			else {
				$i = 0;
				while ($i < $count) {
					$i++;
					$htmldom->clear();
					$page_url = $url . "?p={$i}";
					$htmldom  = file_get_html($page_url);
					foreach ($htmldom->find('div.m a') as $hrefs) {
						//						echo $hrefs->innertetxt;
						$result[] = array(
								'NAME' => $hrefs->plaintext,
								'lINK' => $hrefs->href
						);
					}
				}
			}
			if (count($result) > 0) {
				file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/import/items/{$section_id}.php", serialize($result));
			}
			unset($htmldom);
			return $result;
		}

		/**
		 * @param $url
		 * @return array
		 * Получаем ссылки на страницы детального
		 * просмотра товара для всех товаров раздела
		 */
		static function GetItemsFromOnePage($url)
		{
			$res    = '';
			$result = array();
			$html   = file_get_contents(self::$main_url . $url);
			preg_match_all("|<a[^>]+(/list/[0-9]+\?p=[0-9]+)[^>]*><span>[0-9]+</span></a>|muU", $html, $pages);
			if (count($pages[1]) > 0) {

				$cur_page = 0;

				while ($cur_page <= count($pages[1])) {
					$new_url = $url . "?p=" . ((int)$cur_page + 1);
					$html    = file_get_contents(self::$main_url . $new_url);
					preg_match_all("|<a[^>]*(/item/([0-9]+)) [^>]*title=\"Подробное описание\">(.*)</a>|muU", $html, $res);
					foreach ($res[1] as $key => $v) {
						$result[] = array(
								'lINK' => $v,
								'ID' => $res[2][$key],
								'NAME' => $res[3][$key]
						);
					}
					$cur_page++;
				}
			}
			else {
				preg_match_all("|<a[^>]*(/item/([0-9]+)) [^>]*title=\"Подробное описание\">|muU", $html, $res);
				foreach ($res[1] as $key => $v) {
					$result[] = array(
							'lINK' => $v,
							'ID' => $res[2][$key]
					);
				}
			}

			return $result;
		}

		static function add_to_array($array1, $array2)
		{
			foreach ($array2 as $vol) {
				$array1[] = $vol;
			}
			return $array1;

		}

		static function GetItemsReg($section_id)
		{
			$result  = array();
			$url     = "http://www.entero.ru/list/{$section_id}";
			$htmldom = str_replace(array(
					"\n",
					"&nbsp;",
					"\r"
			), array(
					'',
					' ',
					''
			), file_get_contents($url));

			preg_match_all("|<a[^>]+(\/list\/[0-9]+\?p\=[0-9]+)>|", $htmldom, $pages);
			$links  = self::GetItemsFromOnePage('/list/' . $section_id);
			$result = $links;
			if (count($pages[1]) > 0) {
				foreach ($pages[1] as $next_url) {
					$links  = self::GetItemsFromOnePage($next_url);
					$result = array_merge($result, $links);
				}
			}
			return $result;
		}

		/**
		 * @param $url
		 */
		static function redirect($url)
		{

			echo "	<script type = 'text/javascript'>
					document.location.href = '{$url}';
				</script>";
		}
	}
