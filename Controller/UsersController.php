<?php
/**
 * Controller used to log users in, register users and log users out
 */

App::uses('AppController', 'Controller');

class UsersController extends AppController
{
	/**
	 * Allowing non-logged in users to access the register action
	 */
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('register');
	}

	/**
	 * Logs a user in to access their timers
	 */
	public function login()
	{

	}

	/**
	 * Registers a user to the system
	 */
	public function register()
	{

	}

	/**
	 * Deletes the users session, logging them out
	 */
	public function logout()
	{

	}

}