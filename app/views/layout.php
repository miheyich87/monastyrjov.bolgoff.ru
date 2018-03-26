<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
	
	<title><?php echo ($title != '') ? $title : ''?></title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<link rel="stylesheet" href="../../css/styles.css">
	<link rel="stylesheet" href="../../css/bootstrap-datepicker.css">
</head>

<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="/">Меню</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php echo (Route::getCurrentController() == 'main') ? 'active' : ''?>">
            <a class="nav-link" href="/">Главная <span class="sr-only"></span></a>
          </li>
          <li class="nav-item <?php echo (Route::getCurrentController() == 'medicine') ? 'active' : ''?>">
            <a class="nav-link" href="/medicine">Препараты</a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
		<?php include 'app/views/'.$content_view; ?>
	  </div>
	  
	</main>
	
	<footer class="footer">
      <div class="container">
        <p class = "text-center">
			<span class="text-muted debug-span" data-toggle="popover" data-placement="top" data-content="controller: <?php echo Route::getCurrentController() ?>, action: <?php echo Route::getCurrentAction() ?>" >
				Тестовое задание
			</span>
		</p>
      </div>
    </footer>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<script src="../../js/bootstrap-datepicker.min.js"></script>
	<script src="../../js/bootstrap-datepicker.ru.min.js"></script>
	
	<script src="../../js/scripts.js"></script>
	
</body>
</html>