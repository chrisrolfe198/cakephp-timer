<?php
/**
 * TimerFixture
 *
 */
class TimerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
public $fields = array(
	'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
	'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
	'createdTimestamp' => array('type' => 'integer', 'null' => true, 'default' => null),
	'startedTimestamp' => array('type' => 'integer', 'null' => true, 'default' => null),
	'stoppedTimestamp' => array('type' => 'integer', 'null' => true, 'default' => null),
	'userId' => array('type' => 'integer', 'null' => true, 'default' => null),
	'indexes' => array(
		'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
	'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Creates an initial set of records
 */
public function init() {
	$this->records = array(
		array(
			'id' 			   => 1,
			'name' 			   => 'My first timer',
			'createdTimestamp' => 1385164800,
			'startedTimestamp' => null,
			'stoppedTimestamp' => null,
			'userId' 		   => 1
			),
		array(
			'id' 			   => 3,
			'name' 			   => 'Eggs',
			'createdTimestamp' => 1385164800,
			'startedTimestamp' => strtotime("now"),
			'stoppedTimestamp' => null,
			'userId' 		   => 2
			),
		);
	parent::init();
}

}
