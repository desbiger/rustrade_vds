<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<pre><?//print_r($arResult)?></pre>

<b> Новости </b>&nbsp;&nbsp; <a href="#">Все новости</a> <img src="/bitrix/templates/Productions/img/marker2.png" alt="m2">
<?foreach($arResult['ITEMS'] as $item):?>
<span class="data"><?=$item['ACTIVE_FROM']?></span>
<br>
<span class="n_link"><a href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a></span>

<?endforeach?>