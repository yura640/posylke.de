<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UserForm;
use app\models\Scores;


class SiteController extends Controller
{

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

	/**
     * Displays form page
	 * 
     *
     * @return string
     */
	public function actionForm(){
		
		$form = new UserForm; // object of Model
					$name= '';
			if ($form->load(Yii::$app->request->post()) && $form->validate()) // validate
				{				
					$name = Html::encode($form->name);						// get name from form
					$age = Html::encode($form->age);						// get age from form
					$gameCounter = 0;										// game counter for curent player
					$scoreSaver = 0;										// saver for scores
					$session = Yii::$app->session;							// open session
					$session->set('name', $name);							// set name
					$session->set('age', $age);								// set age
					$session->set('gameCounter', $gameCounter);				// set gameCounter
					$session->set('scoreSaver', $scoreSaver);				// set scoreSaver
			
					return $this->redirect('http://localhost/basic/web/index.php?r=site/game', 302); //redirect to another action
				}
			
	return $this->render('regForm', 										// render view 
		[
		'form'=>$form,														// send form to view
		
		]
	);
	}
	
	/**
	* Start the game
	*
	* @return string
	*/
	public function actionGame(){											
		
		
		$deck = new UserForm;												// object of Model
			
		$cardArray = $deck->getDeck();										// get card deck from Model->getDeck()
		
		$session = Yii::$app->session;		
	
		$gameCounter = $session->get('gameCounter');
		$gameCounter++;														// new game - counter +1
		$session->set('gameCounter', $gameCounter);
		$session->set('cardArray', $cardArray);
		$score = 0;															// new score for new game
		$session->set('score', $score);
		
		return $this->render('game',
			['name'=>Yii::$app->session->get('name')]						// render game view
		
		);
		
	}
	/*
	* Function for Ajax requests 
	*
	* @ response array to the client
	*/
	public function actionAjax(){
		
		$session = Yii::$app->session;
		$cardArray = $session->get('cardArray');							// get array of card ID 
		
		$randomKeyCard = array_rand($cardArray);							// select random key from array of card
		$currentCard = $cardArray[$randomKeyCard];							// select curent cart ID 
		
		$check = $this->checkCart($currentCard);							// get score & type for curent card from func. checkCart()
			$redirectUrl = '';
			$score = $session->get('score');	
			$score += $check['cardScore'];									// $score = $score + curent card.score
			
				
				if ($score == 21 || $score>21 ){							// check score for <>21
					$redirectUrl = 'http://localhost/basic/web/index.php?r=site/result';	// if true - redirect
					$session->set('score', $score);							// save score in session
				}

			$session->set('score', $score);									// save score in session
			
			unset($cardArray[$randomKeyCard]); 								// dell used cards from array
			$session->set('cardArray', $cardArray);							// save array of card in session
				
		$probabli = $this->winProbabliti(); 								// get probabliti win & loss from winProbabliti function
								
			$responceArray = [];											
			$responceArray['userScore'] = $score;							//save score in array
			$responceArray['redirect'] = $redirectUrl;						//save url in array
			$responceArray['cardType'] = $check['cardType'];					//save cardType in array
			$responceArray['vict'] = $probabli['win'];						//save probabli of win in array
			$responceArray['loss'] = $probabli['loss'];						//save probabli of loss in array
				
			echo json_encode($responceArray);								// response for AJAX request
					
	}
	
	/*
	* function for check probabliti
	*
	* @ return array
	*/
	public function winProbabliti(){										
		
		$goodCounter = 0;
		$badCounter = 0;
		
		$session = Yii::$app->session;
		$cardArray = $session->get('cardArray');
				
			$score = $session->get('score');
			$diff = 21 - $score;
			
			foreach ($cardArray as $item){
					$checkProb = $this->checkCart($item);
						if($checkProb['cardScore'] <= $diff){
							
							$goodCounter++;
														
						} else {
							
							$badCounter++;
							
						}
					}
				
			$vict = ($goodCounter / count($cardArray)) *100;	
			$loss = ($badCounter / count($cardArray)) *100;
		
		return ['win'=>round($vict), 'loss'=> round($loss)];
	}
	
	/*
	* function for check select card score & type
	*
	* @ return array
	*/
	public function checkCart($param){
		
		switch ($param) {
			case 1:
				$cardScore = 2;
				$cardType = 'two: + 2 score';
				break;
			case 2:
				$cardScore = 3;
				$cardType = 'three: + 3 score';
				break;
			case 3:
				$cardScore = 4;
				$cardType = 'four: + 4 score';
				break;
			case 4:
				$cardScore = 5;
				$cardType = 'five: + 5 score';
				break;
			case 5:
				$cardScore = 6;
				$cardType = 'six: + 6 score';
				break;
			case 6:
				$cardScore = 7;
				$cardType = 'seven: + 7 score';
				break;
			case 7:
				$cardScore = 8;
				$cardType = 'eight: + 8 score';
				break;
			case 8:
				$cardScore = 9;
				$cardType = 'nine: + 9 score';
				break;
			case 9:
				$cardScore = 10;
				$cardType = 'ten: + 10 score';
				break;
			case 10:
				$cardScore = 10;
				$cardType = 'Jack: + 10 score';
				break;
			case 11:
				$cardScore = 10;
				$cardType = 'Queen: + 10 score';
				break;
			case 12:
				$cardScore = 10;
				$cardType = 'King: + 10 score';
				break;
			case 13:
			// dobavit proverky tyza
				$cardScore = 11;
				$cardType = 'Ace: + 11 score';
				break;
			default: $cardScore = ''; $cardType = '';
		}
		
		return ['cardScore'=>$cardScore, 'cardType'=>$cardType];
	}
	
	/*
	* show result of curent game
	*
	* @ return string
	*/
	public function actionResult(){

		$session = Yii::$app->session;
		$score = $session->get('score');
		$scoreSaver = $session->get('scoreSaver');									//get user total user scores
		
			if ($score>21 ){														// check for more then 21
				$score = 0;
			
			}
			
		$scoreSaver += $score; //bag scores for reload								// total score += scores for last game
		$session->set('scoreSaver', $scoreSaver);
		$gameCounter = $session->get('gameCounter');
		
		return $this->render('gameOver', [
								'score' => $score,
								'total' => $scoreSaver,
								'games' => $gameCounter
							]);
		
	}
	
	/*
	* show result of curent game
	*
	* @ return string
	*/
	public function actionOver(){	
		
		$session = Yii::$app->session;
		$scoreSaver = $session->get('scoreSaver');
		$gameCounter = $session->get('gameCounter');
		
		
		$scoreTable = new Scores();													// get object of model ActiveRecord
		$scoreTable->name = $session->get('name');									// save data to dataBase
		$scoreTable->age = $session->get('age');									// save data to dataBase
		$scoreTable->score = ($scoreSaver/$gameCounter);							// save data to dataBase (scores/gamecounter)
		
		if ($scoreTable->save()){													
			
			$rows = $scoreTable::find()
					->select('name, age, score')
					->orderBy(['score' => SORT_DESC])
					->limit(3)
					->all();
			
				
    
			
			//$rows = $scoreTable::find()
				//	->select(['name', 'age', 'score'])
					//->orderBy(['id' => SORT_ASC])
					//->limit(3)
					//->all();
			//var_dump($rows -> name);
			//die();
			
			return $this->render('result', compact('rows'));
					
			
			
			
				
	 
			
		};
				
	}
	
}