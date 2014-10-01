<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

function SaveFileManual($file, $Propertyes)
{

}

function strip_n($text)
{
    return str_replace("\r\n", "", $text);
}

$file_properties = array(
    "brand",
    "name",
    "brand_line",
    "width",
    "highe",
    "light",
    "power",
    "wes",
    "photo",
    "volt",
    "about",
    "diapazon",
    "base_razdel_name",
);
$site_properties = array(
    "BRAND",
    "NAME",
    "LINE_NAME",
    "WIDTH",
    "HEIGHT",
    "LENGTH",
    "POWER",
    "WES",
    "photo",
    "volt",
    "DETAIL_TEXT",
    "TEMPERATURE",
    "RAZDEL",
);

$arResult['ITEMS'] = scandir($_SERVER['DOCUMENT_ROOT'] . $arParams['FOLDER']);
$arResult['FOLDER'] = $_SERVER['DOCUMENT_ROOT'] . $arParams['FOLDER'];

if (count($arResult['ITEMS']) > 0) {

    $diapazon = array();
    foreach ($arResult['ITEMS'] as &$vol) {
        $folder = $vol;
        //        $folder_c = iconv("cp1251", "utf-8", $_SERVER['DOCUMENT_ROOT'] . $arParams['FOLDER'] . $vol . "/");
        $folder_c = $_SERVER['DOCUMENT_ROOT'] . $arParams['FOLDER'] . $vol . "/";
        $name = iconv("cp1251", "utf-8", "/" . $vol . "/");
        $vol = array();
        $vol['NAME'] = $name;
        $vol['FOLDER_NAME'] = $folder_c;
        $vol['FILES'] = scandir($_SERVER['DOCUMENT_ROOT'] . $arParams['FOLDER'] . "/" . $folder . "/");
        /**
         *
         */
        $file = $_SERVER['DOCUMENT_ROOT'] . $arParams['FOLDER'] . "/" . $folder . "/" . "tech_data.txt";

        //????????? ??????? ????? tech_data.txt ???? ?? ????
        if (file_exists($file)) {
            $file = file($file);
            $new_prop = array();

            //???????????? ?????? ?????? ?????? ???????
            foreach ($file as &$file_value) {
                $file_value = iconv("cp1251", "utf-8", $file_value);
                $file_value = str_replace(" = ", "[triger]", $file_value);

                if ($array = explode("[triger]", $file_value)) {
                    $array[1] = str_replace($file_properties, $site_properties, $array[1]);
                    $new_prop[$array[0]] = $array[1];
                }
                $diapazon[] = $new_prop['diapazon'];
                $razdels[] = $new_prop['base_razdel_name'];

            }
            $file = $new_prop;


            $vol['PROPERTIES'] = $file;
        }

        $diapazon = array_unique($diapazon);
        $razdels = array_unique($razdels);
        $arResult['IBLOCKS']['DIAPAZONS'] = $diapazon;
        $arResult['IBLOCKS']['RAZDELS'] = $razdels;


    }
}

//???????? ?????? ???????????? ????????

CModule::IncludeModule("iblock");

$sections = CIBlockSection::GetList(Array("left_margin" => "asc"), array("IBLOCK_ID" => "2"), null, array("ID", "NAME", "DEPTH_LEVEL"));
while ($list = $sections->GetNext()) {
    $sections_List[] = $list;
}
$arResult['READY_SECTIONS'] = $sections_List;


//---------------------------------????????? ???????????? ?????? ?? ???????? ????????????------------------------
$PostArray = $_REQUEST['sections'];
$Post = $_REQUEST;

//echo "<pre style='text-align: left;'>"; print_r($PostArray); echo "</pre>";

foreach ($arResult['ITEMS'] as &$vol) {
    if ($old_razdel_id = array_search($vol['PROPERTIES']['base_razdel_name'], $arResult['IBLOCKS']['RAZDELS'], null)) {
        $vol['PROPERTIES']['id'] = $old_razdel_id;
        if (count($PostArray) > 0) {
            $vol['PROPERTIES']['NewId'] = $PostArray[$old_razdel_id];
        }
    }

    foreach ($vol['PROPERTIES'] as $key => $values) {
        $key = str_replace($file_properties, $site_properties, $key);
        $properties[$key] = $values;
    }
    $properties['FULL_PATH'] = $vol['FOLDER_NAME'];
    $properties['SECTION_ID'] = $vol['PROPERTIES']['NewId'];
    $New_Items[] = $properties;

}


$arResult['NEW_ITEMS'] = $New_Items;

if (is_array($Post['tovar'])) {
    foreach ($Post['tovar'] as $key => $addItem) {

        $path = strip_n($arResult['NEW_ITEMS'][$key]['FULL_PATH'] . $arResult['NEW_ITEMS'][$key]['photo']);

        $arFile["MODULE_ID"] = "iblock";
        $arFile["del"] = "N";

        //$arResult['NEW_ITEMS'][$key]['photo_id'] = CFile::SaveFile($arFile, "/tovars/");
        /** Добавляем элемент */
        $curElement = $arResult['NEW_ITEMS'][$key];
        $newElementArray = array(
            "MODIFIED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
            "IBLOCK_SECTION_ID" => $curElement['SECTION_ID'], // элемент лежит в корне раздела
            "IBLOCK_ID" => 2,
            "ACTIVE" => "Y", // активен
            "NAME" => strip_n($curElement['NAME']),
            "DETAIL_PICTURE" => CFile::MakeFileArray($path),
            "DETAIL_TEXT" => strip_n($curElement['DETAIL_TEXT']),
            "PROPERTY_VALUES" => array(
                "BRAND_LINE" => strip_n($curElement['BRAND_line']),
                "HEIGHT" => strip_n($curElement['HEIGHT']),
                "LENGTH" => strip_n($curElement['LENGTH']),
                "POWER" => strip_n($curElement['POWER']),
                "WES" => strip_n($curElement['WES']),
                "TEMPERATURE" => strip_n($curElement['TEMPERATURE']),
            )
        );
        $el = new CIBlockElement();

        $result[] = $el->Add($newElementArray);

//        echo "<pre style='text-align: left;'>";
//        print_r($newElementArray);
//        echo "</pre>";



    }
    echo "<pre style='text-align: left;'>";
    print_r($result);
    echo "</pre>";

}


$this->IncludeComponentTemplate();


?>