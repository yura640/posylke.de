<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UserForm extends Model
{
	public $name;
	public $age;
	
	public function rules()
	{
		return [
			[['name','age'], 'required'],
			['age', 'integer', 'min'=>1, 'max'=>99],
			['name', 'string', 'min'=>2, 'max'=>10]
		];
		
	}
	public function getDeck(){
		
		$cardID = [1,2,3,4,5,6,7,8,9,10,11,12,13]; // array of cards ID
			
		$cardArray = array_merge($cardID, $cardID, $cardID, $cardID); // deck of card
		
		return $cardArray;
		
	}
	
	
}
?>