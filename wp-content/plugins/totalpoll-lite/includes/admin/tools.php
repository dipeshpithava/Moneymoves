<div id="tp-tools">
    <div class="header">
        <a class="icon text-center">
            <img src="<?php echo TP_ASSETS_URL ?>/images/tools.svg">
        </a>
        <h3 class="text-center"><?php _e('TotalPoll Tools', TP_TD); ?></h3>
    </div>
    <div class="box">
        <div class="width-80">
            <p><?php _e('Backup current polls.', TP_TD); ?></p>
        </div>
        <div class="width-20 text-center">
            <a href="<?php echo admin_url('export.php?content=poll&download'); ?>" class="button button-primary"><?php _e('Download backup', TP_TD); ?></a>
        </div>        
    </div>
</div>