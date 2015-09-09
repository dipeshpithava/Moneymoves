<?php

if ( !defined('ABSPATH') )
    exit; // Shhh


/**
 * Process vote and results requests.
 * 
 * @since 2.0.0
 * @package TotalPoll\Request
 */

Class TP_Request {

    /**
     * Capture actions.
     * 
     * @since 2.0.0
     * @return void
     */
    public function __construct()
    {
	add_action('tp_capture_ajax_vote', array( $this, 'ajax_vote' ));
	add_action('tp_capture_ajax_back', array( $this, 'ajax_back' ));
	add_action('tp_capture_ajax_results', array( $this, 'ajax_results' ));

	add_action('tp_capture_post_results', array( $this, 'results' ));
	add_action('tp_capture_post_vote', array( $this, 'vote' ));
	add_action('tp_capture_get_preview', array( $this, 'preview' ));

    }

    /**
     * Preview.
     * 
     * @since 2.0.0
     * @return void
     */
    public function preview()
    {
	// Prevent preview from unpreviliged users
	if ( !current_user_can('edit_posts') )
	    wp_die(__('You cannot preview this poll. Login first.', TP_TD));

	TotalPoll()->poll->load();
	exit(include_once( TP_PATH . 'includes/admin/editor/preview.php' ));
    }

    /**
     * Vote.
     * 
     * @since 2.0.0
     * @return void
     */
    public function vote()
    {
	global $poll;

	if ( TotalPoll()->poll->load($_REQUEST['tp_poll_id']) ):

	    if ( TotalPoll()->security->has_ability_to_vote() && !empty($_POST['tp_choices']) ):

		$voted_for = (array) $_POST['tp_choices'];
		if ( !isset($poll->limitations->multiselection) && count($voted_for) > 1 ):
		    $voted_for = (array) current($voted_for);
		endif;

		// Save votes
		if ( tp_save_poll_votes($poll, $voted_for) ):
		    // Refresh choices
		    tp_prepare_poll_choices($poll);
		    // Lock vote ability
		    TotalPoll()->security->lock_vote_ability();
		endif;

	    endif;

	    $poll->skip_to_results = true;

	endif;
    }

    /**
     * Results.
     * 
     * @since 2.0.0
     * @return void
     */
    public function results()
    {
	global $poll;

	if ( TotalPoll()->poll->load($_POST['tp_poll_id']) ):

	    if ( !is_poll_results_locked() ):
		$poll->skip_to_results = true;
	    endif;

	endif;
    }

    /**
     * Ajax vote.
     * 
     * @since 2.0.0
     * @return void
     */
    public function ajax_vote()
    {
	$this->vote();
	exit(TotalPoll()->poll->get_render(true));
    }

    /**
     * Ajax results.
     * 
     * @since 2.0.0
     * @return void
     */
    public function ajax_results()
    {
	$this->results();
	exit(TotalPoll()->poll->get_render(true));
    }

    /**
     * Ajax back.
     * 
     * @since 2.0.0
     * @return void
     */
    public function ajax_back()
    {
	if ( TotalPoll()->poll->load($_REQUEST['tp_poll_id']) ):
	    exit(TotalPoll()->poll->get_render(true));
	endif;
    }

}
