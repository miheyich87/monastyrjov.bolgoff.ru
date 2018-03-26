<?php
class Controller_medicine extends Controller
{
	function action_index()
	{	
		$medicines = Model_medicine::getList();
		
		$this->view->generate('medicine/index', 'Медикаменты', 'layout.php', $medicines);
	}
	
	function action_new($request)
	{	
		if (is_array($request))
		{
			$medicine = new Model_medicine;
			
			$medicine->bind($request);
			
			$id = $medicine->save();
			
			if (!$id)
				$this->view->generate('medicine/new', 'Добавить препараты', 'layout.php', $medicine);
			else
				Route::redirect('medicine/view/'.$id);
		}
		else
			$this->view->generate('medicine/new', 'Добавить препараты', 'layout.php');
	}
	
	function action_edit($request)
	{	
		if (is_array($request))
		{
			$medicine = new Model_medicine;
			
			$medicine->bind($request);
			
			$result = $medicine->save();
			
			if (!$result)
				$this->view->generate('medicine/edit/'.$medicine->getId(), 'Редактировать препарат', 'layout.php', $medicine);
			else
				Route::redirect('medicine/view/'.$medicine->getId());
		} 
		else
			if (preg_match('/^\+?\d+$/', $request))
			{
				$medicine = Model_medicine::getById($request);
				
				if (is_object($medicine))
					$this->view->generate('medicine/edit/'.$request, 'Редактировать препарат', 'layout.php', $medicine);
			}
			else Route::ErrorPage404();
	}
	
	function action_delete($request)
	{
		$medicine = Model_medicine::getById($request);
		
		$medicine->delete();
		
		Route::redirect('medicine/index');
	}
	
	function action_view($request)
	{
		$medicine = Model_medicine::getById($request);
		
		if (!is_object($medicine)) Route::ErrorPage404();
		
		$this->view->generate('medicine/view/'.$request, $medicine, 'layout.php', $medicine);
	}
	
	function action_search($request)
	{
		$s = Model_medicine::search($request);
		
		$this->view->generate('medicine/search/', 'Результат поиска', 'layout.php', $s);
	}
}
?>