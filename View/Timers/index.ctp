<h2>Home</h2>
<?php foreach ($timers as $timer): ?>
	<div class="timer">
		<h3><?=$timer['Timer']['name'];?></h3>
		<?php if ($timer['Timer']['startedTimestamp'] > 0): ?>
			<p>This timer has been running for <?=$timer['Timer']['timeRunningFor'];?> seconds</p>
			<?=$this->Html->link('Stop this timer', array('action' => 'stop', $timer['Timer']['id']), array('class' => 'btn btn-danger'));?>
		<?php else: ?>
			<p>This timer is not yet running</p>
			<?=$this->Html->link('Start this timer', array('action' => 'start', $timer['Timer']['id']), array('class' => 'btn btn-info'));?>
		<?php endif; ?>
	</div>
<?php endforeach; ?>
<p>
	The total time accumulated on the timers is <?=$totalTime;?> seconds.
</p>