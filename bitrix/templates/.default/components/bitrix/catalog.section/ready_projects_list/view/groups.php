<!--<pre>--><?//  print_r($tovars) ?><!--</pre>-->
<table>
	<thead>
	<tr>
		<td>№</td>
		<td>Наименование</td>
		<td>количество</td>
	</tr>
	</thead>
	<tbody>
	<?$i = 0?>
	<? foreach ($tovars->ITEMS as $tovar): ?>
		<tr>
			<td><?=++$i?></td>
			<td><?= $tovar['NAME'] ?></td>
			<td><?= $tovar['QUANTITY'] ?> шт.</td>
		</tr>
	<? endforeach ?>
	</tbody>
</table>

 