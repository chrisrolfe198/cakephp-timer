<h2>Log in</h2>
<?php
echo $this->Form->create();
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->end('Log In');
?>
<p>Not got an account? You can <?=$this->Html->link('register', array('controller' => 'users', 'action' => 'register'));?></p>