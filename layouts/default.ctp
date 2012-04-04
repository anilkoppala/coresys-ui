<!DOCTYPE html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php print Configure::read('App.name') ?>
        <?php if (!empty($title_for_layout)) echo " - {$title_for_layout}"; ?>
    </title>
    <?php
        echo $this->Html->css('default');
        echo $this->Html->css('fonts');
        echo $this->Html->css('hashgrid.css');
        echo $this->Html->css('smoothness/jquery-ui-1.8.10.custom.css');
        echo $this->Html->css('gritter/jquery.gritter.css');
        echo $this->Html->css('menu/superfish.css');
        echo $this->Html->css('/bootstrap/docs/assets/css/bootstrap.css');
        echo $this->Html->css('/chosen/chosen/chosen.css');
        echo $this->Html->css('app.css');
        echo $this->Html->script('/jquery/dist/jquery.js');
        echo $this->Html->script('jquery-ui/js/jquery-ui-1.8.10.custom.min.js');
        echo $this->Html->script('jquery-ui/development-bundle/external/jquery.cookie.js');
        echo $this->Html->script('hashgrid/hashgrid.js');
        echo $this->Html->script('jquery.maskedinput-1.3.min.js');
        echo $this->Html->script('jquery.jeditable.min.js');
        echo $this->Html->script('jquery.form.js');
        echo $this->Html->script('gritter/js/jquery.gritter.min.js');
        echo $this->Html->script('phpjs.min.js');
        echo $this->Html->script('coresys-ui.js');
        echo $this->Html->script('menu/hoverIntent.js');
        echo $this->Html->script('menu/superfish.js');
        echo $this->Html->script('/chosen/chosen/chosen.jquery.min.js');
        echo $this->Html->script('/chosen/chosen/chosen.proto.min.js');
        echo $this->Html->script('app.js');
        echo $scripts_for_layout;
    ?>
</head>
<body>
    <div id="header">
        <div id="header-inner">
            <div id="header-title">
                <?php print $this->Html->image('minilogo.png', array('id' => 'logo', 'url' => 'http://iwww.broadinstitute.org')) ?>
                <div class="app-name"><?php print $this->Html->link(Configure::read('App.name'), '/') ?></div>
                <div class="app-by">an application created by Broad Institute Administrative Computing</div>
            </div>
            <?php if (class_exists('MenuHelper') && $menu = $this->Menu->render()): ?>
            <div id="menu">
                <?php echo $menu?>
            </div>
            <?php endif ?>
        </div>
    </div>
    <div id="container">
        <div id="content">

            <?php if ($msg = $this->Session->read('Message.flash.message')): ?>
                <div class="alert alert-info" data-dismiss="alert">
                    <a class="close">×</a><?php print $msg ?>
                </div>
            <?php unset($_SESSION['Message']['flash']); endif ?>

            <?php if ($msg = $this->Session->read('Message.error.message')): ?>
                <div class="alert alert-error" data-dismiss="alert">
                    <a class="close">×</a><?php print $msg ?>
                </div>
            <?php unset($_SESSION['Message']['error']); endif ?>

            <?php echo $content_for_layout; ?>
        </div>
        <div id="footer">
        </div>
    </div>
    <?php echo $this->element('sql_dump'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-transition.js') ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-alert.js') ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-modal.js') ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-dropdown.js') ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-scrollspy.js') ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-tab.js') ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-tooltip.js') ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-popover.js') ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-button.js') ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-collapse.js') ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-carousel.js') ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-typeahead.js') ?>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', '<?php print Configure::read('GoogleAnalytics.id') ?>']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
</body>
</html>
