<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!--<pre style="text-align: left;">--><?//print_r($arResult['IBLOCKS']['RAZDELS'])?><!--</pre>-->
<!--<pre style="text-align: left;">--><?//print_r($arResult['NEW_ITEMS'])?><!--</pre>-->
<!--<pre style="text-align: left;">--><?//print_r($arResult['READY_SECTIONS'])?><!--</pre>-->
<? $res = $_REQUEST; ?>

<!--<pre style="text-align: left;">--><?//print_r($res)?><!--</pre>-->


<?
function select($arResult, $id)
{

    $str = '';
    foreach ($arResult['READY_SECTIONS'] as $RAZDELS) {
        $str .= '<option value="' . $RAZDELS['ID'] . '">' . putLevel($RAZDELS['DEPTH_LEVEL'], $RAZDELS['NAME']) . '</option>';
    }
    return $output = "<select name='sections[" . $id . "]'>" . $str . "</select>";
}

function selectClear($arResult, $id)
{

    foreach ($arResult['READY_SECTIONS'] as $RAZDELS) {
        $str[putLevel($RAZDELS['DEPTH_LEVEL'], $RAZDELS['NAME'])] = $RAZDELS['ID'];
    }
    return $str;
}

function putLevel($level, $name)
{
    $weigth = array(
        "1",
        "2",
        "3",
        "4",
        "4",
        "4",
    );
    $res = array(
        "",
        ". ",
        ". . ",
        ". . . ",
        ". . . . ",
        ". . . . . ",
        ". . . . . . ",
    );
    return "<h" . $weigth[$level] . ">" . $res[$level - 1] . $name . "</h" . $weigth[$level] . ">";
}

?>
<form method="POST">
    <table class="base_table" >
        <tr>
            <td>Назание товара</td>
            <td>Назание раздела старое</td>

        </tr>


        <?foreach ($arResult['IBLOCKS']['RAZDELS'] as $key => $vol): ?>

        <tr>

            <td><?=$vol?></td>
            <td><?=select($arResult, $key)?></td>
        </tr>

        <? endforeach ?>

    </table>
    <input type="submit" value="Применить">
    <input type="file" name="UpFile">

    <table class="base_table">
        <tr>
            <thead>
            <td>Добавить</td>
            <td>Название</td>
            <td>Фирма производитель</td>
            </thead>
        </tr>
        <?$i = 0;?>
        <? foreach ($arResult['NEW_ITEMS'] as $key => $vol): ?>
        <? $i++; ?>
        <tr>
            <td><input type="checkbox" name="tovar[<?=$key?>]"></td>
            <td><?=$vol['NAME']?></td>
            <td><?=$vol['BRAND']?></td>
        </tr>
        <? endforeach ?>
    </table>

</form>
