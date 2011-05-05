<!DOCTYPE html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php print Configure::read('App.name') ?>
		<?php //echo $title_for_layout; ?>
	</title>
	<?php
		//echo $this->Html->css('960/code/css/reset.css');
		echo $this->Html->css('960/code/css/960.css');
		echo $this->Html->css('formalize/assets/stylesheets/formalize.css');
		echo $this->Html->css('default');
		echo $this->Html->css('fonts');
		echo $this->Html->css('app');
		echo $this->Html->css('hashgrid.css');
		echo $this->Html->css('smoothness/jquery-ui-1.8.10.custom.css');
		echo $this->Html->script('jquery-ui/js/jquery-1.4.4.min.js');
		echo $this->Html->script('jquery-ui/js/jquery-ui-1.8.10.custom.min.js');
		echo $this->Html->script('jquery-ui/development-bundle/external/jquery.cookie.js');
		echo $this->Html->script('hashgrid/hashgrid.js');
		echo $this->Html->script('jquery.maskedinput-1.3.min.js');
		echo $this->Html->script('phpjs.min.js');
		echo $this->Html->script('coresys-ui.js');
		echo $this->Html->script('app.js');
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<div>
				<?php print $html->image('minilogo.png', array('id' => 'logo', 'url' => 'http://iwww.broadinstitute.org')) ?>
				<div class="app-name"><?php print $html->link(Configure::read('App.name'), '/') ?></div>
				<div class="app-by">an application created by Broad Institute Administrative Computing</div>
			</div>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('error'); ?>
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>