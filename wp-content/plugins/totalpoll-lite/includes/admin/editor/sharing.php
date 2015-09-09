<?php if ( !defined('ABSPATH') ) exit; // Shhh ?>
<!-- .sharing -->
<div class="sharing section <?php echo !isset($last_opened_tabs['sharing']) ? 'collapsed' : '' ?>">
        <input type="checkbox" name="tp_opened_tabs[sharing]" class="tab-state" <?php checked(isset($last_opened_tabs['sharing']), true); ?>>
	<h3 class="title"><?php _e('Sharing', TP_TD); ?></h3>
	<div class="content">
                <?php do_tp_action('tp_admin_editor_before_sharing_content', $options); ?>
		<p>
                    <label>
                        <input type="checkbox" disabled=""> <?php _e( 'Show share icons', TP_TD ) ?> <?php _e('(Pro version only)', TP_TD); ?>
                    </label>
		</p>
    
		<?php do_tp_action('tp_admin_editor_after_sharing_content', $options); ?>
	</div>
</div>
<!-- /.sharing -->