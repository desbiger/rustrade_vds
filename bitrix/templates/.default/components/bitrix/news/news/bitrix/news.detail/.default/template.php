<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="news-detail">
    <!--    <pre style="text-align: left">--><?//print_r($arResult)?><!--</pre>-->
    <h2><?=$arResult['NAME']?></h2>
    <hr>
    <div class="pre_pricture">
        <?
        $te = CIBlockElement::GetById($arResult['ID']);
        $element = $te->getNext();
        $img = CFile::ResizeImageGet($element['DETAIL_PICTURE'], array("width" => 300, "height" => 300))?>
        <!--        <pre>--><?//print_r($element)?><!--</pre>-->
        <a class="fancy" href="<?=$arResult['DETAIL_PICTURE']['SRC']?>"><img src="<?=$img['src']?>"/></a>
    </div>
    <div class="text">
        <?=$arResult['DETAIL_TEXT']?>
    </div>
    <?if (count($arResult['PROPERTIES']['PHOTOS']['VALUE']) > 1): ?>

    <div class="gallery">
        <hr>
        <h3>Галлерея фото:</h3>
        <hr>
        <? foreach ($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $vol): ?>
        <? $pre = CFile::ResizeImageGet($vol, array("width" => 100, "height" => 100)) ?>
        <a class="fancy" rel="group1" href="<?=CFile::GetPath($vol)?>"><img src="<?=$pre['src']?>"></a>
        <? endforeach ?>
        <hr>
    </div>
    <? endif?>
</div>
