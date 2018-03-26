<h1>Результаты поиска</h1>

<form method="post" name="medicine_search" action="/medicine/search">
	<div class="form-row">
		<div class = "input-group col-12">
			<input type="text" class="form-control" placeholder="Поиск" name="search_request" value="<?php echo (!empty($data['request'])) ? $data['request'] : ''?>">
			<div class="input-group-append">
				<button type="submit" class="btn btn-outline-secondary" name="go">Поиск</button>
			</div>
		</div>
	</div>
</form>

<br />

<?php if (is_array($data['response'])) { ?>

<div class="table-responsive">
	<table class = "table table-striped">

		<thead class="thead-dark">
			<tr>
				<th>#</th>
				<th>Название</th>
				<th>Производитель</th>
				<th>Страна</th>
				<th>Цена</th>
				<th>Дата</th>
				<th>Действия</th>
			</tr>
		</thead>
		
	<?php foreach ($data['response'] as $obj): ?>
		<tr>
			<td><a href = "/medicine/edit/<?php echo $obj->getId()?>"><?php echo $obj->getId() ?></a></td>
			<td><?php echo $obj->getName() ?></td>
			<td><?php echo $obj->getManufacturer() ?></td>
			<td><?php echo $obj->getCountry() ?></td>
			<td><?php echo $obj->getPrice() ?></td>
			<td><?php echo date('d.m.Y', strtotime($obj->getDate())) ?></td>
			<td>
				<a href = "/medicine/view/<?php echo $obj->getId()?>"><img class = "icon" src="/images/svg/browser.svg" alt="Редактировать"></a>
				<a href = "/medicine/delete/<?php echo $obj->getId()?>"><img class = "icon" src="/images/svg/trash.svg" alt="Удалить"></a>
			</td>
		</tr>
	<? endforeach; ?>

	</table>
</div>

<a class = "btn btn-success" href = "/medicine/new">Добавить</a>

<?php } else { ?>

<p>
	<?php echo $data['response']; ?>
</p>

<?php } ?>

