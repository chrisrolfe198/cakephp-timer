<?php
/**
 * Base layout file
 */

/**
 * Global CSS
 */
// Loading bootstrap's css
$this->Html->css('bootstrap.min.css', array( 'inline' => false ));

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	echo $this->Html->meta('icon');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>
</head>
<body>
	<div class="container">
		<header>
			<h1>Timer Application</h1>
		</header>
		<?php if ($this->Session->read('Auth.User')): ?>
			<nav>
				<ul class="nav nav-pills">
				<li><?=$this->Html->link('Add a timer', array('controller' => 'timers', 'action' => 'add'));?></li>
					<li><?=$this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout'));?></li>
				</ul>
			</nav>
		<?php endif; ?>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<footer>
		</footer>
	</div>
	<?php
	echo $this->element('sql_dump');
	echo $this->fetch('script');
	?>
</body>
</html>