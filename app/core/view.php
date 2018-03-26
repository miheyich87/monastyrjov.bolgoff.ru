<?php

class View
{
	//public $template_view; // здесь можно указать общий вид по умолчанию.
	
	function generate($controller_action, $title = null, $template_view = 'layout.php', $data = null)
	{
		/*
		if(is_array($data)) {
			// преобразуем элементы массива в переменные
			extract($data);
		}
		*/
		
		$content_view = explode('/', $controller_action);
		
		if (!empty($content_view[1]))
			$content_view = $content_view[0].'/'.$content_view[1].'.php';
		else
			$content_view = $content_view[0].'.php';
		
		include 'app/views/'.$template_view;
	}
}

?>