<?php
App::uses('Timer', 'Model');

/**
 * Timer Test Case
 *
 */
class TimerTest extends CakeTestCase {

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
 *
 * @return void
 */
	public function testGetUsersTimes() {
	}

/**
 * testGetUsersTotalTime method
 *
 * @return void
 */
	public function testGetUsersTotalTime() {
	}

/**
 * testStartTimer method
 *
 * @return void
 */
	public function testStartTimer() {
	}

/**
 * testStopTimer method
 *
 * @return void
 */
	public function testStopTimer() {
	}

}
