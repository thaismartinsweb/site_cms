<?php

class HomeController extends Controller
{
	public $config;
	
	public function actionIndex()
	{
		$this->config = Config::model()->findByPk(1);
		
		$contactForm = new ContactForm();
		
		$this->layout = "main";
		$this->render('index', array('contactForm' => $contactForm));
	}
	

	public function actionSendContact()
	{
		if(Yii::app()->request->isAjaxRequest && isset($_POST['ContactForm'])) {
			
			$form = new ContactForm();
			$form->attributes = $_POST['ContactForm'];
			
			if($form->validate()){
				
				$contact = new Contact();
				$contact->attributes = $form->attributes;
				$contact->date_create = date('Y-m-d H:i:s');
				
				$contact->save();
				$this->sendMail($contact);
				
				$response = array('code' => '200',
								  'message' => Yii::t('home', 'Email enviado com sucesso!'));
				
			} else {
				$response = array('code' => '400',
								  'message' => $this->handlesErros($form->getErrors()));
			}
			
			echo json_encode($response);
		}
		
		Yii::app()->end();
	}
	
	private function sendMail($contact){
		$mailParams = array('from' => array($contact->email => $contact->name),
							'to' => 'contato@thaismartins.rocks',
							'subject' => 'Contato do Site',
							'view' => 'contact',
							'data' => array('obj' => $contact));
		
		Mail::send($mailParams);
	}
	
	public function actionInfo(){
		echo extension_loaded('openssl') ? 'sim' : 'não';
	}
	
	private function handlesErros($errors)
	{
		$response = '';
		
		foreach($errors as $error => $attribute) {
			foreach($attribute as $key => $value){
				$response .= '- ' . $value . '<br />';
			}
		}
		
		return $response;
	}
}