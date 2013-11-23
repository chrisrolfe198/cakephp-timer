<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel
{
	public $hasMany = 'Timer';

	public function beforeSave()
	{
		// Before we save a password field
		if (isset($this->data[$this->alias]['password'])) {
			// Hash the password
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		}
		return true;
	}
}