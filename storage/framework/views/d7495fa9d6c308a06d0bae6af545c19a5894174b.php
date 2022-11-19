<?php
  
  $description = htmlspecialchars_decode($description);

  $shortcode = new Gornymedia\Shortcodes\Shortcode;

  if($description !=''){
    $shortcode->add('slider', function($atts, $id, $items=3, $mobile="")
    {
      $data = Shortcode::atts([
          'id' => $id,
          'items' => $items,
          'mobile' => $mobile??'',
      ], $atts);

      $agent = new Jenssegers\Agent\Agent;
      $check_show = 1;
      if($agent->isMobile() && $data['mobile'] == 'false')
      {
        $check_show = 0;
      }
      if($check_show)
      {
        $file = 'partials/shortcode/banner-ads';
        if (view()->exists($file)) {
            return view($file, compact('data'));
        };
      }
    });
  }
?>
<?php if(isset($data)): ?>
  <?php echo $data; ?>

<?php endif; ?><?php /**PATH C:\wamp64\www\expro\Laravel\oppenworld\resources\views/theme/block/sidebar-banner-ads.blade.php ENDPATH**/ ?>