<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
              <div class="_news"> <b> Новости </b>&nbsp;&nbsp; <a href="#" >Все новости</a> <img src="<?=SITE_TEMPLATE_PATH?>/img/marker2.png" alt="m2"  /> 

        




	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>

<span class="data"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span> 
                <br />
   <span class="n_link"><a id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?echo $arItem["DETAIL_PAGE_URL"]?>" ><?echo $arItem["NAME"]?></a></span>     


		
	<?endforeach;?>
</div>
