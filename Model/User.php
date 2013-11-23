<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel
{
	public $hasMany = 'Timer';

	/**
	 * Performs a set of actions before it saves the data to the database
	 * @param  array  $options array of parameters to save to the database
	 * @return boolean
	 */
	public function beforeSave($options = array())
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