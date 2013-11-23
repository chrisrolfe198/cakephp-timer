<?php

class Timer extends AppModel
{

	/**
	 * Retrieves all the timers that a user has created
	 * @param  integer $userId The user id of the timers to return
	 * @return array           Contains the details of all the timers     
	 */
	public function getUsersTimers($userId)
	{
		$timers = $this->find('all', array('conditions' => array('Timer.userId' => $userId)));
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
		$timers = $this->getUsersTimers($userId);
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
		$this->saveField('startedTimestamp', strtotime("now"));
	}

	/**
	 * Sets a stopped time for a timer in the database
	 * @param  integer $timerId Timer to stop
	 * @return boolean
	 */
	public function stopTimer($timerId)
	{

	}
}