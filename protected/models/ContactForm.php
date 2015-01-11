<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactForm extends CFormModel
{
	public $name;
	public $email;
	public $phone;
	public $content;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('name, email, content', 'required'),
			array('email', 'email'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'name' => 'Nome',
			'email' => 'Email',
			'phone' => 'Telefone',
			'content' => 'Mensagem',
		);
	}
}