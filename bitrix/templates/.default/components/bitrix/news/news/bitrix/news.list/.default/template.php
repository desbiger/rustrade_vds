<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!--    <pre>--><?//print_r($arResult['ITEMS'])?><!--</pre>-->
<div class="cat_tit">
    <a href="#">Новости</a> <img alt="m2" src="/bitrix/templates/Productions/img/marker2.png">
</div>
<div class="news">
    <?if ($arParams["DISPLAY_TOP_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?><br/>
    <? endif;?>
    <?foreach ($arResult["ITEMS"] as &$arItem): ?>
    <?
    $te = CIBlockElement::GetById($arItem['ID']);
    $element = $te->getNext();
    $arItem['DETAIL_PICTURE'] = CFile::ResizeImageGet($element['DETAIL_PICTURE'], array("width" => 200,
        "height" => 200));

    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
    <div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <h2><?=$arItem['ACTIVE_FROM']?></h2>

        <div class="photo_pre">
            <img src="<?=$arItem['DETAIL_PICTURE']['src']?>" alt="">
        </div>
        <div class="detail_text">
            <h2><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></h2>

            <?=$arItem['DETAIL_TEXT']?></div>
    </div>
    <hr>
    <? endforeach;?>
    <?if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br/><?= $arResult["NAV_STRING"] ?>
    <? endif;?>
</div>
