<?php if ( !defined('ABSPATH') ) exit; // Shhh ?>
<?php do_tp_action( 'tp_admin_editor_footer', $options); ?>

<script type="text/template" class="choice-template" id="choice-text">
    <div class="choice choice-text">
        <input type="hidden" name="tp_options[choices][{{index}}][type]" value="text">
        <input type="text" placeholder="<?php _e( 'Votes', TP_TD ); ?>" name="tp_options[choices][{{index}}][votes]" class="votes-counter widefat">
        <input type="text" placeholder="<?php _e( 'Text', TP_TD ); ?>" name="tp_options[choices][{{index}}][text]" class="widefat">
	<?php do_tp_action("tp_admin_editor_text_choice_fields_template"); ?>
        <ul class="choice-controllers">
                <li><button type="button" class="move">&equiv;</button></li>
                <li><button type="button" class="delete">&#10006;</button></li>
		<?php do_tp_action("tp_admin_editor_text_choice_buttons_template"); ?>
        </ul>
    </div>
</script>

<script type="text/template" class="choice-template" id="choice-image">
    <div class="choice choice-image">
        <input type="hidden" name="tp_options[choices][{{index}}][type]" value="image">
        <input type="text" placeholder="<?php _e( 'Votes', TP_TD ); ?>" name="tp_options[choices][{{index}}][votes]" class="votes-counter widefat">
        <input type="text" placeholder="<?php _e( 'Image', TP_TD ); ?>" name="tp_options[choices][{{index}}][image]" class="widefat upload-holder">
        <input type="text" placeholder="<?php _e( 'Full Size URL', TP_TD ); ?>" name="tp_options[choices][{{index}}][full]" class="widefat">
        <input type="text" placeholder="<?php _e( 'Label', TP_TD ); ?>" name="tp_options[choices][{{index}}][label]" class="widefat">
	<?php do_tp_action("tp_admin_editor_image_choice_fields_template"); ?>
        <ul class="choice-controllers">
                <li><button type="button" class="upload"><?php _e( 'upload', TP_TD ); ?></button></li>
                <li><button type="button" class="move">&equiv;</button></li>
                <li><button type="button" class="delete">&#10006;</button></li>
		<?php do_tp_action("tp_admin_editor_image_choice_buttons_template"); ?>
        </ul>
    </div>
</script>

<?php do_tp_action('tp_admin_editor_choice_types_templates', $options); ?>

</div>
<!-- /.tp-wrapper -->