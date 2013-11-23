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
		$userId = 1;
		$timersForUser = $this->Timer->getUsersTimers($userId);
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

		$this->assertEquals($expected, $timersForUser);
	}

	/**
	 * testGetUsersTotalTime method
	 *
	 * @return void
	 */
	public function testGetUsersTotalTime()
	{
		$userId = 1;
		$totalTimeForUser = $this->Timer->getUsersTotalTime($userId);
		$expected = 0;
		$this->assertEquals($expected, $totalTimeForUser);
	}

	/**
	 * testStartTimer method
	 *
	 * @return void
	 */
	public function testStartTimer()
	{
		$timerId = 1;
		$this->Timer->startTimer($timerId);
		$timerData = $this->Timer->find( 'first', array( 'conditions' => array('Timer.id' => $timerId)));
		$this->assertEquals($timerData['Timer']['startedTimestamp'], strtotime("now"));
	}

	/**
	 * testStopTimer method
	 *
	 * @return void
	 */
	public function testStopTimer()
	{
		$timerId = 3;
		$this->Timer->startTimer($timerId);
		$timerData = $this->Timer->find( 'first', array( 'conditions' => array('Timer.id' => $timerId)));
		$this->assertEquals($timerData['Timer']['stoppedTimestamp'], strtotime("now"));
	}

}
