<h1>Модуль Интернет магазина</h1>
<p>Страница настроект модуля</p>
<?
	$mid = 'internetshop';
	if($_POST){
		COption::SetOptionString($mid,'basket_id',$_POST['basket_id']);
		COption::SetOptionString($mid,'order_id',$_POST['order_id']);
		COption::SetOptionString($mid,'oder_status_id',$_POST['oder_status_id']);
		LocalRedirect($APPLICATION->GetCurPage().'?mid='.$mid);
	}
?>
<?
	$aTabs = array(
			array(
					"DIV" => "edit1",
					"TAB" => 'Основные настройки',
					"ICON" => "ib_settings",
					"TITLE" => 'настройки модуля'
			),
	);
?>
<? CModule::IncludeModule('iblock') ?>
<? $tabControl = new CAdminTabControl("tabControl", $aTabs); ?>
<? $tabControl->Begin(); ?>

<?$tabControl->BeginNextTab();?>
<form action = "<?echo $APPLICATION->GetCurPage()."?mid=".urlencode($mid)?>" method="post">
		Инофоблок корзины <input type = "text" name="basket_id" value="<?=COption::GetOptionString('internetshop','basket_id')?>"/><br/>
		Инофоблок заказов <input type = "text" name="order_id" value="<?=COption::GetOptionString('internetshop','order_id')?>"/><br/>
		Инофоблок статусво заказов <input type = "text" name="oder_status_id" value="<?=COption::GetOptionString('internetshop','oder_status_id')?>"/><br/>
<? $tabControl->Buttons(); ?>
<input type = "submit" name = "sub" id = "" value="Сохранить"/>
</form>
<? $tabControl->End(); ?>