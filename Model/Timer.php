<?php

class Timer extends AppModel
{

	/**
	 * Retrieves all the timers that a user has created
	 * @param  integer $userId The user id of the timers to return
	 * @return array           Contains the details of all the timers     
	 */
	public function getUsersTimes($userId)
	{

	}

	/**
	 * Gets the total time of all the timers a user has
	 * @param  integer $userId User Id of the timers to calculate
	 * @return integer         Total of all the times relating to a user
	 */
	public function getUsersTotalTime($userId)
	{

	}

	/**
	 * Sets the start time for a timer in the database
	 * @param  integer $timerId Timer to start
	 * @return boolean
	 */
	public function startTimer($timerId)
	{

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