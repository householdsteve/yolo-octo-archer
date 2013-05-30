<?php $this->load->helper('url');?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php $this->view->metas(); ?>
    <?php $this->view->title(); ?>
    <?php $this->view->asset('css'); ?>
    <?php echo link_tag( base_url().'assets/img/favicon.ico', 'shortcut icon', 'image/ico'); ?>
    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.6.2.min.js"></script>
    
    <?php if (ENVIRONMENT == 'development'): ?>
    <link rel="stylesheet/less" type="text/css" href="<?php echo base_url(); ?>assets/css/main.less">
    <script type="text/javascript" charset="utf-8" src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.3.3/less.min.js"></script>
    <?php endif; ?>
    
    <?php if (ENVIRONMENT == 'production' || ENVIRONMENT == 'testing'): ?>

    <?php endif; ?>
    <script type="text/javascript" charset="utf-8">
      var PageAttr = {baseUrl:"<?php echo base_url();?>"};
    </script>
  </head>
  <body>

    <div class="wrapper">
      <?php $this->view->partial('common/_nav'); ?>

      <section id="main">
        <section class="principal">
        <?php echo $yield; ?>
        </section>
      </section>
    <?php $this->view->asset('js'); ?>
    
    <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-2086908-9']);
    _gaq.push(['_trackPageview']);
    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    </script>
  </body>
</html>
