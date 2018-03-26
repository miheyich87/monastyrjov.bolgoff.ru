<h1>Просмотр препарата</h1>

<div class="table-responsive">
	<table class = "table">

	<tr>
		<td>Название</td>
		<td><?php echo $data->getName()?></td>
	</tr>

	<tr>
		<td>Производитель</td>
		<td><?php echo $data->getManufacturer()?></td>
	</tr>

	<tr>
		<td>Страна</td>
		<td><?php echo $data->getCountry()?></td>
	</tr>

	<tr>
		<td>Цена</td>
		<td><?php echo $data->getPrice()?></td>
	</tr>

	<tr>
		<td>Дата</td>
		<td><?php echo date('d.m.Y', strtotime($data->getDate())) ?></td>
	</tr>

	</table>
</div>

<a class = "btn btn-primary" href = "/medicine">К списку</a>
<a class = "btn btn-success" href = "/medicine/edit/<?php echo $data->getId() ?>">Редактировать</a>
<a class = "btn btn-danger" href = "/medicine/delete/<?php echo $data->getId() ?>">Удалить</a>