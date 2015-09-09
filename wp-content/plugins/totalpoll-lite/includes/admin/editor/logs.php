<?php if ( !defined('ABSPATH') ) exit; // Shhh  ?>
<!-- .logs -->
<div class="logs section <?php echo!isset($last_opened_tabs['logs']) ? 'collapsed' : '' ?>">
    <input type="checkbox" name="tp_opened_tabs[logs]" class="tab-state" <?php checked(isset($last_opened_tabs['logs']), true); ?>>
    <h3 class="title"><?php _e('Logs', TP_TD); ?></h3>
    <div class="content">
        <?php do_tp_action('tp_admin_editor_before_logs_content', $options); ?>
        <p>
            <label>
                <input type="checkbox" disabled=""> <?php _e('Save logs', TP_TD) ?> <?php _e('(Pro version only)', TP_TD); ?>
            </label>
        </p>

        <hr>

        <p>
            <button class="button" type="submit" disabled=""><?php _e('Download logs', TP_TD); ?></button>
            <button class="button" type="submit" disabled=""><?php _e('Reset logs', TP_TD); ?></button>
        </p>

        <?php do_tp_action('tp_admin_editor_after_logs_content', $options); ?>
    </div>
</div>
<!-- /.logs -->