<h2>Add a new timer</h2>
<?php
echo $this->Form->create();
echo $this->Form->input('name');
echo $this->Form->end('Add Timer');
echo $this->Html->link('Back', array('action' => 'index'));
?>