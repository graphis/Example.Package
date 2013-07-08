<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<?php
    $this->scripts()->add('http://code.jquery.com/jquery-1.7.1.min.js');
    $this->scripts()->add('/asset/Example.Package/js/bootstrap.min.js');
    $this->scripts()->add('/asset/Example.Package/js/jquery.js');
    $this->scripts()->add('/asset/Example.Package/js/bootstrap-transition.js');
    $this->scripts()->add('/asset/Example.Package/js/bootstrap-alert.js');
    $this->scripts()->add('/asset/Example.Package/js/bootstrap-modal.js');
    $this->scripts()->add('/asset/Example.Package/js/bootstrap-dropdown.js');
    $this->scripts()->add('/asset/Example.Package/js/bootstrap-scrollspy.js');
    $this->scripts()->add('/asset/Example.Package/js/bootstrap-tab.js');
    $this->scripts()->add('/asset/Example.Package/js/bootstrap-tooltip.js');
    $this->scripts()->add('/asset/Example.Package/js/bootstrap-popover.js');
    $this->scripts()->add('/asset/Example.Package/js/bootstrap-button.js');
    $this->scripts()->add('/asset/Example.Package/js/bootstrap-collapse.js');
    $this->scripts()->add('/asset/Example.Package/js/bootstrap-carousel.js');
    $this->scripts()->add('/asset/Example.Package/js/bootstrap-typeahead.js');
    $this->scripts()->add('/asset/Example.Package/highlight/highlight.pack.js');

    $this->styles()->add('/asset/Example.Package/css/bootstrap-responsive.min.css');
    $this->styles()->add('/asset/Example.Package/css/bootstrap.css');
    $this->styles()->add('/asset/Example.Package/highlight/styles/github.css');

    $this->styles()->add('/asset/Example.Package/css/custom.css');
    echo $this->metas()->get();
    echo $this->title()->get();
    echo $this->styles()->get();
?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js');
    <![endif]-->

    <!-- Le styles -->

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>
    <?php include $this->find('top-nav'); ?>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
            <?php include $this->find('side-nav'); ?>
        </div><!--/span-->
        <div class="span9">
<?php
            if ( isset($this->error_msg) ) {
                foreach ($this->error_msg as $error_msg) {
            ?>
            <p class="text-error"><?= $error_msg; ?></p>
            <?php
                }
            }
?>
            <?php echo $this->__raw()->inner_view; ?>
            <p class="text-info">The Controller code that does this :) </p>
            <pre class="pre-scrollable"><code>{controller_code}</code></pre>
            <p class="text-info">The view </p>
            <pre class="pre-scrollable">
                <code>{view_code}</code>
            </pre>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <?php include $this->find('footer'); ?>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo $this->scripts()->get(); ?>
    <script>
        hljs.initHighlightingOnLoad();
    </script>
  </body>
</html>
