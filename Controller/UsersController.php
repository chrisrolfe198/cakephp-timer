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
		// If the request data is post
		if ($this->request->is('post')) {
			// Try and log in with it
			if ($this->Auth->login()) {
				// If we login, redirect the user
				$this->redirect($this->Auth->redirect());
			}
			// Otherwise flash an error message
			$this->Session->setFlash('Incorrect login details');
		}
	}

	/**
	 * Registers a user to the system
	 */
	public function register()
	{
		// If the request is post
		if ($this->request->is('post')) {
			// Try and save the data
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Thank you for registering!');
				// Add the new user id to the request data array so we can log the user in
				$this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
				// Log the new user in
				$this->Auth->login($this->request->data['User']);
				// and redirect them
				$this->redirect($this->Auth->redirect());
			}
		}
	}

	/**
	 * Deletes the users session, logging them out
	 */
	public function logout()
	{
		$this->redirect($this->Auth->logout());
	}

}