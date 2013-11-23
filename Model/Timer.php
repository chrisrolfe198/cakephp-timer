<?php

class Timer extends AppModel
{

	/**
	 * Function called before a timer is saved
	 * @param  array  $options array of parameters to save to the database
	 * @return boolean
	 */
	public function beforeSave($options = array())
	{
		// If the user id is empty
		if (empty($this->data[$this->alias]['userId'])) {
			// Set the user id to the current logged in user
			$this->data[$this->alias]['userId'] = $this->_getUser('id');
		}
		
		// If the user id is empty
		if (empty($this->data[$this->alias]['createdTimestamp'])) {
			// Set the user id to the current logged in user
			$this->data[$this->alias]['createdTimestamp'] = strtotime("now");
		}
		return true;
	}

	/**
	 * Retrieves all the timers that a user has created
	 * @param  integer $userId The user id of the timers to return
	 * @return array           Contains the details of all the timers     
	 */
	public function getUsersTimers($userId)
	{
		// Get the timers from the database
		$timers = $this->find('all', array('conditions' => array('Timer.userId' => $userId, 'stoppedTimestamp' => null)));
		// Loop over each record
		foreach ($timers as &$timer) {
			$startedTimestamp = $timer['Timer']['startedTimestamp'];
			if ($startedTimestamp !== null) {
				$timer['Timer']['timeRunningFor'] = strtotime("now") - $startedTimestamp;
			}
		}
		return $timers;
	}

	/**
	 * Gets the total time of all the timers a user has
	 * @param  integer $userId User Id of the timers to calculate
	 * @return integer         Total of all the times relating to a user
	 */
	public function getUsersTotalTime($userId)
	{
		$totalTime = 0;
		$timers = $this->find('all', array('conditions' => array('Timer.userId' => $userId)));
		foreach ($timers as $timer) {
			// Set the start and stop times in variables for readability
			$startTime = $timer['Timer']['startedTimestamp'];
			$finishTime = $timer['Timer']['stoppedTimestamp'];
			if ($finishTime > $startTime) {
				// Add to the total times
				$totalTime += $finishTime - $startTime;
			}
		}
		return $totalTime;
	}

	/**
	 * Sets the start time for a timer in the database
	 * @param  integer $timerId Timer to start
	 * @return boolean
	 */
	public function startTimer($timerId)
	{
		$this->id = $timerId;
		if ($this->saveField('startedTimestamp', strtotime("now"))) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Sets a stopped time for a timer in the database
	 * @param  integer $timerId Timer to stop
	 * @return boolean
	 */
	public function stopTimer($timerId)
	{
		$this->id = $timerId;
		if ($this->saveField('stoppedTimestamp', strtotime("now"))) {
			return true;
		} else {
			return false;
		}
	}
}