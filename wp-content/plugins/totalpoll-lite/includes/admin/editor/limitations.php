<?php if ( !defined('ABSPATH') ) exit; // Shhh  ?>
<!-- .limirations -->
<div class="limitations section <?php echo!isset($last_opened_tabs['limitations']) ? 'collapsed' : '' ?>">
    <input type="checkbox" name="tp_opened_tabs[limitations]" class="tab-state" <?php checked(isset($last_opened_tabs['limitations']), true); ?>>
    <h3 class="title"><?php _e('Limitations', TP_TD); ?></h3>
    <div class="content">
        
        <?php do_tp_action('tp_admin_editor_before_limitations_content', $options); ?>
        <p><?php _e('Prevent re-vote using', TP_TD); ?></p>
        <p>
            <label>
                <input type="checkbox" name="tp_options[limitations][revote][session]" value="1" <?php checked(true, isset($options->limitations->revote->session)); ?>> <?php _e('Sessions', TP_TD) ?>
            </label>
            <label>
                <input type="checkbox" name="tp_options[limitations][revote][cookies]" value="1" <?php checked(true, isset($options->limitations->revote->cookies)); ?> data-toggler="cookies-limitation"> <?php _e('Cookies', TP_TD) ?>
            </label>
            <label>
                <input type="checkbox" disabled=""> <?php _e('IP', TP_TD) ?> <?php _e('(Pro version only)', TP_TD); ?>
            </label>
            <label>
                <input type="checkbox" disabled=""> <?php _e('IP Range', TP_TD) ?> <?php _e('(Pro version only)', TP_TD); ?>
            </label>
        </p>

        <p data-toggle="cookies-limitation" class="<?php echo isset($options->limitations->revote->cookies) ? '' : 'hide'; ?>">
            <label>
                <span><?php _e('Cookies timeout (minutes)', TP_TD); ?></span>
                <input type="text" name="tp_options[limitations][cookies][timeout]" value="<?php echo isset($options->limitations->cookies->timeout) ? $options->limitations->cookies->timeout : 1440; ?>">
            </label>
        </p>

        <hr>

        <p>
            <label>
                <input type="checkbox" name="tp_options[limitations][vote_for_results]" value="1" <?php checked(true, isset($options->limitations->vote_for_results)); ?>> <?php _e('User must vote to see results', TP_TD) ?>
            </label>
        </p>

        <hr>

        <p>
            <label>
                <input type="checkbox" name="tp_options[limitations][multiselection]" value="1" <?php checked(true, isset($options->limitations->multiselection)); ?>> <?php _e('User can give multiple answers', TP_TD) ?>
            </label>
        </p>

        <hr>

        <p>
            <label>
                <input type="checkbox" value="1" disabled=""> <?php _e('Close poll when votes quota exceed', TP_TD) ?> <?php _e('(Pro version only)', TP_TD); ?>
            </label>
        </p>

        <hr>

        <p>
            <label>
                <input type="checkbox" value="1" disabled=""> <?php _e('Date limited', TP_TD) ?> <?php _e('(Pro version only)', TP_TD); ?>
            </label>
        </p>
	
<hr>

<p>
    <label>
        <input type="checkbox" disabled=""> <?php _e('Captcha', TP_TD); ?> <?php _e('(Pro version only)', TP_TD); ?>
    </label>
</p>

<hr>

<p>
    <label>
        <input type="checkbox" disabled=""> <?php _e('Restrict vote by ip', TP_TD); ?> <?php _e('(Pro version only)', TP_TD); ?>
    </label>
</p>

<hr>

<p>
    <label>
        <input type="checkbox" disabled=""> <?php _e('Limit multiple anwsers', TP_TD); ?> <?php _e('(Pro version only)', TP_TD); ?>
    </label>
</p>

<hr>

<p>
    <label>
        <input type="checkbox" disabled=""> <?php _e('Keep results private', TP_TD); ?> <?php _e('(Pro version only)', TP_TD); ?>
    </label>
</p>

<hr>

<p>
    <label>
        <input type="checkbox" disabled=""> <?php _e('Only logged in users can vote', TP_TD); ?> <?php _e('(Pro version only)', TP_TD); ?>
    </label>
</p>



        <?php do_tp_action('tp_admin_editor_after_limitations_content', $options); ?>
    </div>
</div>
<!-- /.limitations -->