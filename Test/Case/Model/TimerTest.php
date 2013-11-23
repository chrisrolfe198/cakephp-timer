<?php
App::uses('Timer', 'Model');

/**
 * Timer Test Case
 *
 */
class TimerTest extends CakeTestCase
{

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = array(
		'app.timer'
		);

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->Timer = ClassRegistry::init('Timer');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->Timer);

		parent::tearDown();
	}

	/**
	 * testGetUsersTimes method
	 */
	public function testGetUsersTimers()
	{
		// Setting up variables
		$userId = 1;
		// Running the function
		$timersForUser = $this->Timer->getUsersTimers($userId);
		// Setting up some expected results
		$expected = array(
			0 => array(
				'Timer' => array(
					'id' 			   => '1',
					'name' 			   => 'My first timer',
					'createdTimestamp' => '1385164800',
					'startedTimestamp' => '0',
					'stoppedTimestamp' => '0',
					'userId' 		   => '1'
					)
				)
			);
		// Testing the results
		$this->assertEquals($expected, $timersForUser);
	}

	/**
	 * testGetUsersTotalTime method
	 *
	 * @return void
	 */
	public function testGetUsersTotalTime()
	{
		// Setting up variables
		$userId = 1;
		// Running the function
		$totalTimeForUser = $this->Timer->getUsersTotalTime($userId);
		// Setting up some expected results
		$expected = 0;
		// Testing the results
		$this->assertEquals($expected, $totalTimeForUser);
	}

	/**
	 * testStartTimer method
	 *
	 * @return void
	 */
	public function testStartTimer()
	{
		// Setting up variables
		$timerId = 1;
		// Mocking the user id
		$this->Timer = $this->getMockForModel('Timer', array('_getUser'));
		$this->Timer->expects($this->once())->method('_getUser')->will($this->returnValue(1));
		// Running the function
		$startedTimer = $this->Timer->startTimer($timerId);
		// Retrieving some data to test against
		$timerData = $this->Timer->find( 'first', array( 'conditions' => array('Timer.id' => $timerId)));
		// Testing the results
		$this->assertEquals(true, $startedTimer);
		$this->assertEquals($timerData['Timer']['startedTimestamp'], strtotime("now"));
	}

	/**
	 * testStopTimer method
	 *
	 * @return void
	 */
	public function testStopTimer()
	{
		// Setting up variables
		$timerId = 3;
		// Mocking the user id
		$this->Timer = $this->getMockForModel('Timer', array('_getUser'));
		$this->Timer->expects($this->once())->method('_getUser')->will($this->returnValue(2));
		// Running the function
		$stoppedTimer = $this->Timer->stopTimer($timerId);
		// Retrieving some data to test against
		$timerData = $this->Timer->find( 'first', array( 'conditions' => array('Timer.id' => $timerId)));
		// Testing the results
		$this->assertEquals(true, $stoppedTimer);
		$this->assertEquals($timerData['Timer']['stoppedTimestamp'], strtotime("now"));
	}

}
