<?php

class Model_medicine extends Model
{
	
	private $id = null;				// int (autoincrement)
	private $name = null;			// text not null
	private $manufacturer = null;	// text
	private $country = null;		// text
	private $price = null;			// float not null
	private $date = null;			// date
	
	public function bind($request)
	{
		
		if (!empty($request['id']))
			$this->id = $request['id'];
		
		$this->name = $request['name'];
		$this->manufacturer = $request['manufacturer'];
		$this->country = $request['country'];
		$this->price = $request['price'];
		$this->date = $request['date'];
		
	}
	
	public function validate()
	{
		$errors = array();
		
		if ($this->name == '') $errors['name'] = "Поле должно быть заполнено";
		if ($this->price == '') $errors['price'] = "Поле должно быть заполнено";
		if (!is_numeric($this->price)) $errors['price'] = "Цена должна быть числом";
			
		if (count($errors ) > 0) return $errors;
			
		return true;
	}
	
	public function isValid()
	{
		if (is_array($this->validate())) return false;
		else return true;
	}
	
	public function save()
	{
		if ($this->isValid())
		{
			if (is_null($this->id))
			{
				$result = Db::query('
				INSERT into `medicine` (name, manufacturer, country, price, date)
				VALUES ("'.$this->name.'", "'.$this->manufacturer.'", "'.$this->country.'", "'.$this->price.'", "'.date('Y-m-d', strtotime($this->date)).'")
				');
			}
			else
			{
				$result = Db::query('
				UPDATE `medicine` SET 
					name = "'.$this->name.'", 
					manufacturer = "'.$this->manufacturer.'", 
					country = "'.$this->country.'", 
					price = "'.$this->price.'", 
					date = "'.date('Y-m-d', strtotime($this->date)).'" 
				WHERE id =  "'.$this->id.'"
				');
			}
			
			return $result;
		}
		else return false;
	}
	
	function __toString()
	{
		return $this->name;
	}
	
	public static function getById($id)
	{
		$result = Db::query('SELECT * FROM medicine WHERE id = '.$id);
		
		if (mysql_num_rows($result) > 0)
		{
			$result = mysql_fetch_array($result);
			
			$medicine = new Model_medicine;
			
			$medicine->id = $result['id'];
			$medicine->name = $result['name'];
			$medicine->manufacturer = $result['manufacturer'];
			$medicine->country = $result['country'];
			$medicine->price = $result['price'];
			$medicine->date = $result['date'];
			
			return $medicine;
		}
		else 
			return null;
	}
	
	public static function getList()
	{
		$result = Db::query('SELECT * FROM medicine');
		
		if (mysql_num_rows($result) > 0)
		{
			$medicines = array();
			
			while ($row = mysql_fetch_array($result)) 
			{
				$medicine = new Model_medicine;
			
				$medicine->id = $row['id'];
				$medicine->name = $row['name'];
				$medicine->manufacturer = $row['manufacturer'];
				$medicine->country = $row['country'];
				$medicine->price = $row['price'];
				$medicine->date = $row['date'];
				
				array_push($medicines, $medicine);
			}
			
			return $medicines;
		}
		else 
			return null;
	}
	
	
	
	public static function search($request)
	{
		$result = Db::query('SELECT m.id, m.name FROM medicine m');
		
		$string = $request['search_request'];
		
		$words = explode(' ', preg_replace('/^ +| +$|( ) +/m', '$1', trim($request['search_request'])));
			
		$possibleWord = array();
		
		if (mysql_num_rows($result) > 0)
		{
			while ($row = mysql_fetch_array($result))
			{
				$possibleWord[$row['id']] = Model_medicine::getById($row['id']);
			}
		}
		
		if (mb_strlen($string) > 0)
		{
			foreach ($possibleWord as $k => $v)
			{
				foreach ($words as $word)
				{
					if (mb_strpos(mb_strtolower($v->getName()), mb_strtolower($word)) === FALSE)
						unset($possibleWord[$k]);
				}
			}
		}	
			
		$result = array();
		$result['request'] = $request['search_request'];
		
		if (count($possibleWord) == 0)
			$result['response'] = 'По вашему запросу ничего не найдено';
		else
			$result['response'] = $possibleWord;
		
		return $result;
	}
	
	public function delete()
	{
		$result = Db::query('DELETE FROM medicine WHERE id = '.$this->id);
		
		return $result;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getManufacturer()
	{
		return $this->manufacturer;
	}
	
	public function getCountry()
	{
		return $this->country;
	}
	
	public function getPrice()
	{
		return $this->price;
	}
	
	public function getDate()
	{
		return $this->date;
	}
	
}

?>