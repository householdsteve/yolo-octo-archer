<?php $this->load->helper('url');?>
<?php echo doctype('html5'); ?>
  <head>
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
  </body>
</html>
