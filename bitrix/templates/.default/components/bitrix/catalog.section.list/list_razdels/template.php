<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
    set_time_limit(0);
    CModule::IncludeModule('iblock');
    if (!file_exists("upload/" . $_FILES['array']['name']) && move_uploaded_file($_FILES['array']['tmp_name'], "upload/" . $_FILES['array']['name'])) {
        $array = unserialize(file_get_contents("upload/" . $_FILES['array']['name']));
        //        $array = unserialize(iconv("WIN1251","UTF-8",file_get_contents("upload/".$_FILES['array']['name'])));

        $obj = new CIblockElement();
        foreach ($array as $key => $vol) {
            $result = array(
                "IBLOCK_ID" => 2,
                "NAME" => iconv("windows-1251", "UTF-8", $key),
                "IBLOCK_SECTION_ID" => $_REQUEST['section'],
                "DETAIL_TEXT" => iconv("windows-1251", "UTF-8", $vol['detail_page'][0]),
                "DETAIL_PICTURE" => CFile::MakeFileArray($vol['img'][0]),
            );
            echo $obj->add($result) . " | ";
        }
        echo "<br><hr><h1>" . $_FILES['array']['name'] . "</h1>";
    } elseif (file_exists("upload/" . $_FILES['array']['name'])) {
        echo "<br><hr><h1>Файл уже загружен</h1>";
    }

    if (isset($_REQUEST['restor'])) {
        $obj = new CIblockElement();
        $res = $obj->GetList(null,
            array(
                "IBLOCK_ID" => 2,
                "INCLUDE_SUBSECTIONS" => "Y",
                "SECTION_ID" => $_REQUEST['section']
//                "ID" => 2696,
            ));
        $i = array();
        while ($result = $res->GetNext()) {
            preg_match("!<li>Производитель: (.*)</li>!isU", $result['~DETAIL_TEXT'], $brend);
            preg_match("!<li>Длина: (.*)</li>!isU", $result['~DETAIL_TEXT'], $lenght);
            preg_match("!<li>Ширина: (.*)</li>!isU", $result['~DETAIL_TEXT'], $width);
            preg_match("!<li>Высота: (.*)</li>!isU", $result['~DETAIL_TEXT'], $height);
            preg_match("!<li>Температурный режим - (.*)</li>!isU", $result['~DETAIL_TEXT'], $temperature);
            preg_match("!<li>Напряжение: (.*)</li>!isU", $result['~DETAIL_TEXT'], $volt);
            preg_match("!<li>Мощность: (.*)</li>!isU", $result['~DETAIL_TEXT'], $power);
            preg_match("!<li>Объем: (.*)</li>!isU", $result['~DETAIL_TEXT'], $objem);
            preg_match("!<li>Вес: (.*)</li>!isU", $result['~DETAIL_TEXT'], $ves);

            $finde = array("\n", "\r");
            $replace = array("", "");
            $properties = array(
                "BRAND" => $brend[1],
                "LENGTH" => str_replace($finde, $replace, $lenght[1]),
                "WIDTH" => str_replace($finde, $replace, $width[1]),
                "HEIGHT" => str_replace($finde, $replace, $height[1]),
                "TEMPERATURE" => str_replace($finde, $replace, $temperature[1]),
                "VOLT" => str_replace($finde, $replace, $volt[1]),
                "POWER" => str_replace($finde, $replace, $power[1]),
                "OBJEM" => str_replace($finde, $replace, $objem[1]),
                "WES" => str_replace($finde, $replace, $ves[1])
            );
            if ($obj->Update(
                $result['ID'],
                array(
                    "PROPERTY_VALUES" => $properties
                )
            )
            ) {
                $i[] = $result['ID'];

                file_put_contents("upload/result_of_update.php", print_r($i, true));
            }
            $array[] = $properties;
            //            $array[] = array(
            //                "DETAIL_TEXT" => $result['DETAIL_TEXT'],
            //                "ID" => $result['ID'],
            //            );
        }
        //        echo "<pre>".print_r($array)."</pre>";
    }
?>

<?$deepth = array(
    ". ",
    ". . ",
    ". . . ",
    ". . . . ",
    ". . . . . ",
    ". . . . . . ",
    ". . . . . . . ",
    ". . . . . . . . ",
    ". . . . . . . . . ",
);?>
<div style="width: 100%; text-align: left; overflow: hidden;">
    <?if(count($array)> 0):?>
        Успешно обработано <?=count($array)?> элементов
        <?endif?>
    <!--        <pre>--><?//print_r($arResult)?><!--</pre>-->
    <form method="post" enctype="multipart/form-data">
        <div class="catalog-section-list">
            Выбор раздела для загрузки:<br>
            <select size="15" name="section">
                <? foreach ($arResult["SECTIONS"] as $arSection): ?>
                <option <?=$arSection['ID'] == $_REQUEST['section'] ? 'selected="selected"' : '' ?>
                        value="<?=$arSection['ID']?>"><?=$deepth[$arSection['DEPTH_LEVEL']] .
                        $arSection['NAME'] . "(" . $arSection['ELEMENT_CNT'] . ")"?></option>
                <? endforeach?>
            </select>
        </div>
        <div>
            Файл с массивом данных<br>
            <input type="file" name="array"><br><br>
            <input type="submit" value="Загрузить">
        </div>
    </form>
    <hr>
    <form method="post">
        <div class="catalog-section-list">
            Выбор раздела для загрузки:<br>
            <select size="15" name="section">
                <? foreach ($arResult["SECTIONS"] as $arSection): ?>
                <option <?=$arSection['ID'] == $_REQUEST['section'] ? 'selected="selected"' : '' ?>
                        value="<?=$arSection['ID']?>"><?=$deepth[$arSection['DEPTH_LEVEL']] .
                        $arSection['NAME'] . "(" . $arSection['ELEMENT_CNT'] . ")"?></option>
                <? endforeach?>
            </select>
        </div>
        Провести рестаризацию данных по всем элементам<br>
        <input type="submit" value="Ok" name="restor">
    </form>
</div>

