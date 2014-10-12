<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}
	CModule::IncludeModule('internetshop');
?>

<script type = "text/javascript">
	$(function () {
		$('#next_step').click(function () {
			var form = $('#basket_form');
			form.attr('action', "/basket/?step=2");
			form.submit();
		});
	});
</script>
<div class = "basket">
	<? if (($_REQUEST['step'] == 1 || !isset($_REQUEST['step'])) && count($arResult) > 0): ?>

		<h2>Корзина</h2>

		<!--	<pre>--><? //print_r($arResult)?><!--</pre>-->
		<form method = "post" id = "basket_form" action = "/basket/">
			<table class = "basket_table">
				<tr>
					<th>Модель</th>
					<th>Количество</th>
					<th>Стоимость</th>
					<th></th>
				</tr>

				<?$summ = 0;?>
				<? foreach ($arResult as $vol) : ?>
					<? $price = Basket::factory()
							->GetTovarPrice($vol['PROPERTY']['TOVAR']['ID']) ?>

					<? $img   = CFile::ResizeImageGet($vol['PROPERTY']['TOVAR']['DETAIL_PICTURE'], array(
							'width' => 100,
							'height' => 100
					));
					$real_img = CFile::GetPath($vol['PROPERTY']['TOVAR']['DETAIL_PICTURE']);
					?>
					<tr>
						<td width = "620"><a class = "fancy" href = "<?= $real_img ?>"><img src = "<?= $img['src'] ?>" alt = ""/></a>
							<a href = "<?= $vol['PROPERTY']['TOVAR']['DETAIL_PAGE_URL'] ?>" class = "mar_basket"><?= $vol['NAME'] ?></a>
						</td>

						<td style = "text-align: center">
							<input class = "inp_basket" type = "text" name = "count_<?= $vol['ID'] ?>" value = "<?= $vol['PROPERTY']['QUANTITY']['VALUE'] ?>"/>
						</td>
						<td>
							<?= $price ?> руб.
							<?$summ = $summ + ($vol['PROPERTY']['QUANTITY']['VALUE'] * str_replace(" ","",$price))?>
						</td>
						<td style = "text-align: center"><a href = "?itemdel=<?= $vol['ID'] ?>" class = "del_basket">Удалить</a></td>
					</tr>

				<? endforeach ?>
				<tr>
					<td style="text-align: right" colspan="2">Итого:</td>
					<td><?=preg_replace("|(.*)([0-9]{3})([0-9]{3})|s","$1 $2 $3",$summ)?> руб.</td>
				</tr>
			</table>
			<div class = "clear"></div>
			<div class = "right_basket">
				<input type = "submit" name = "update" value = "Обновить корзину">
				<input type = "submit" name = "del" value = "Очистить корзину">

				<input style = "float: right" type = "submit" id = "next_step" name = "update" value = "Оформить заказ">
			</div>
		</form>
		<div class = "clear"></div>

	<? elseif ($_REQUEST['step'] == 2): ?>

		<h3>Оформление заказа</h3>

		<form action = "" method = "post">
			<div class = "left_basket">

				<p>Контактное лицо<br>
					<input type = "text" class = "text_inp_basket" name = "name"/></p>

				<p>Телефон<br>
					<input type = "text" class = "text_inp_basket" name = "phone"/></p>

				<p>email<br>
					<input type = "text" class = "text_inp_basket" name = "email"/></p>


				<div class = "clear"></div>
				<br>
			</div>
			<div class = "right_basket_area">
				Примечание <br>
				<textarea name = "text" class = "area_basket"></textarea>
			</div>
			<div class = "clear"></div>
			<input name = "finish" class = "rig_bask" type = "submit" value = "Оформить заказ"/>
		</form>
	<?
	elseif ($_REQUEST['ready']): ?>
		<? ?>
		Ваш заказ оформлен. В ближайшее время с вами свяжется наш менеджер
	<?
	else: ?>
		Ваша корзину пуста
	<?
	endif ?>


</div>