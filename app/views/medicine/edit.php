<h1>Редактировать препарат</h1>

<?php if (is_object($data) && (is_array($data->validate()))) { ?>

	<?php $errors = $data->validate(); ?>
	
	<form method="post" name="medicine_edit" action="/medicine/edit/<?php echo $data->getId()?>">

		<div class="form-group">
			<label>Название</label>
			<input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : '' ?>" placeholder="Название" name="name" value="<?php echo $data->getName() ?>">
			<?php if (isset($errors['name'])) { ?>
			<div class="invalid-feedback">
				<?php echo $errors['name'] ?>
			</div>
			<?php } ?>
		</div>
		
		<div class="form-group">
			<label>Производитель</label>
			<input type="text" class="form-control" placeholder="Производитель" name="manufacturer" value="<?php echo $data->getManufacturer() ?>">
		</div>
		
		<div class="form-group">
			<label>Страна</label>
			<select class="form-control" name="country">
				<option <?php echo ($data->getCountry() == "Индия") ? 'selected' : '' ?> value="Индия">Индия</option>
				<option <?php echo ($data->getCountry() == "Россия") ? 'selected' : '' ?> value="Россия">Россия</option>
			</select>
		</div>
		
		<div class="form-group">
			<label>Цена</label>
			<div class="input-group">
				<div class="input-group-prepend">
				  <span class="input-group-text">₽</span>
				</div>
				<input type="text" class="form-control <?php echo isset($errors['price']) ? 'is-invalid' : '' ?>" placeholder="Цена" name="price" value="<?php echo $data->getPrice() ?>">
				<?php if (isset($errors['price'])) { ?>
				<div class="invalid-feedback">
					<?php echo $errors['price'] ?>
				</div>
				<?php } ?>
			</div>
		</div>
		
		<div class="form-group">
			<label>Срок годности</label>
			<div class="input-group date">
				<input id = "datepicker" type="text" class="form-control" name="date" value="<?php echo $data->getDate() ?>" readonly>
			</div>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $data->getId() ?>">
		
		<button type="submit" class="btn btn-success" name="new">Сохранить</button>
		<a class = "btn btn-primary" href = "/medicine/view/<?php echo $data->getId() ?>">Просмотр</a>
		<a class = "btn btn-primary" href = "/medicine">К списку</a>

	</form>

<?php } else { ?>

	<form method="post" name="medicine_edit" action="/medicine/edit/<?php echo $data->getId()?>">

		<div class="form-group">
			<label>Название</label>
			<input type="text" class="form-control" placeholder="Название" name="name" value="<?php echo $data->getName() ?>">
		</div>
		
		<div class="form-group">
			<label>Производитель</label>
			<input type="text" class="form-control" placeholder="Производитель" name="manufacturer" value="<?php echo $data->getManufacturer() ?>">
		</div>
		
		<div class="form-group">
			<label>Страна</label>
			<select class="form-control" name="country">
				<option <?php echo ($data->getCountry() == "Индия") ? 'selected' : '' ?> value="Индия">Индия</option>
				<option <?php echo ($data->getCountry() == "Россия") ? 'selected' : '' ?> value="Россия">Россия</option>
			</select>
		</div>
		
		<div class="form-group">
			<label>Цена</label>
			<div class="input-group">
				<div class="input-group-prepend">
				  <span class="input-group-text" id="inputGroupPrepend3">₽</span>
				</div>
				<input type="text" class="form-control <?php echo isset($errors['price']) ? 'is-invalid' : '' ?>" placeholder="Цена" name="price" value="<?php echo $data->getPrice() ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label>Срок годности</label>
			<div class="input-group date">
				<input id = "datepicker" type="text" class="form-control" name="date" value="<?php echo $data->getDate() ?>" readonly>
			</div>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $data->getId() ?>">
		
		<button type="submit" class="btn btn-success" name="new">Сохранить</button>
		<a class = "btn btn-primary" href = "/medicine/view/<?php echo $data->getId() ?>">Просмотр</a>
		<a class = "btn btn-primary" href = "/medicine">К списку</a>

	</form>
	
	

<?php } ?>