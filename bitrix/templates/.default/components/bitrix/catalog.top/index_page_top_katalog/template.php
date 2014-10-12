<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?//print_r($arResult)?>
<div class="cat_tov">
<?foreach($arResult["ROWS"][0] as $items):?>
    <?if(is_array($items) && $items[PROPERTIES][POPULAR][VALUE] == "да"):?>

        <?$img = CFile::ResizeImageGet($items["PREVIEW_PICTURE"]["ID"],array("width"=>140, "height"=>125),BX_RESIZE_IMAGE_PROPORTIONAL_ALT,true)?>    
            
           <a href="<?=$items[DETAIL_PAGE_URL]?>">
            <div class="tovar">
                 <div class="img_border">
                   <img src="<?=$img["src"]?>" alt="1">
                 </div>
               <?=$items["NAME"]?>
               <br>
               <span class="rr"> 1990 .-</span>
            </div>
           </a>
            
        
<?endif?> 
<?endforeach?>    
</div>