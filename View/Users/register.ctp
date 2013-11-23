<h2>Register</h2>
<?php
echo $this->Form->create();
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->end('Log In');
?>
<p>Got an account? You can <?=$this->Html->link('log in', array('controller' => 'users', 'action' => 'login'));?></p>