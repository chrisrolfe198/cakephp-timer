<?php
/**
 * Controller used to manage the timers in the application
 */

App::uses('AppController', 'Controller');

class TimersController extends AppController
{

	/**
	 * Displays the timers the user currently has active
	 */
	public function index()
	{
		$timers = $this->Timer->getUsersTimers($this->Auth->user('id'));
		$totalTime = $this->Timer->getUsersTotalTime($this->Auth->user('id'));
		// Set some variables to display in the view
		$this->set('timers', $timers);
		$this->set('totalTime', $totalTime);
	}

	/**
	 * Adds a new timer to the system
	 */
	public function add()
	{
		if ($this->request->is('post')) {
			if ($this->Timer->save($this->request->data)) {
				$this->Session->setFlash('The timer has been added');
				$this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('An error occured, the timer has not been added');
		}
	}

	/**
	 * Starts a timer
	 * @param  integer $timerId The id of the timer to start
	 */
	public function start($timerId)
	{
		if ($this->Timer->startTimer($timerId)) {
			$this->Session->setFlash('Timer has been started');
		} else {
			$this->Session->setFlash('An error occured, we could not start that timer');
		}
		$this->redirect(array('action' => 'index'));
	}

	/**
	 * Stops a timer
	 * @param  integer $timerId The id of the timer to stop
	 */
	public function stop($timerId)
	{
		if ($this->Timer->stopTimer($timerId)) {
			$this->Session->setFlash('Timer has been stopped');
		} else {
			$this->Session->setFlash('An error occured, we could not stop that timer');
		}
		$this->redirect(array('action' => 'index'));
	}
}