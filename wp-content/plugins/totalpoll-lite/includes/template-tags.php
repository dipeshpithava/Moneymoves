<?php

if ( !defined('ABSPATH') )
    exit; // Shhh

/**
 * Get poll id.
 * 
 * @package TotalPoll\TemplateTags
 * @since 2.0.0
 * @global object $poll
 * @return int
 */

function get_poll_id()
{
    global $poll;
    return $poll->id;
}

/**
 * Get poll question.
 * 
 * @package TotalPoll\TemplateTags
 * @since 2.0.0
 * @global object $poll
 * @return string
 */
function get_poll_question()
{
    global $poll;
    return $poll->question;
}

/**
 * Echo the poll question.
 * 
 * @package TotalPoll\TemplateTags
 * @since 2.0.0
 * @return void
 */
function the_poll_question()
{
    echo get_poll_question();
}

/**
 * Get poll choices.
 * 
 * @package TotalPoll\TemplateTags
 * @since 2.0.0
 * @global object $poll
 * @return array
 */
function get_poll_choices()
{
    global $poll;

    $choices = $poll->choices;
    if ( isset($poll->showing_results) ):
	if ( isset($poll->misc->orderby_votes) ):
	    usort($choices, 'tp_order_choices_by_votes');
	    if ( $poll->misc->orderby_votes_direction == 'desc' ):
		$choices = array_reverse($choices);
	    endif;
	endif;
    else:
	if ( isset($poll->misc->shuffle) ):
	    shuffle($choices);
	endif;
    endif;

    return $choices;
}

/**
 * Check if results are locked by vote.
 * 
 * @package TotalPoll\TemplateTags
 * @since 2.0.0
 * @global object $poll
 * @return bool
 */
function is_poll_results_locked()
{
    global $poll;
    return isset($poll->limitations->vote_for_results);
}
/**
 * Check vote ability.
 * 
 * @package TotalPoll\TemplateTags
 * @since 2.0.0
 * @return bool
 */
function user_can_vote()
{
    return TotalPoll()->security->has_ability_to_vote();
}

/**
 * Poll multianswer checker.
 * 
 * @package TotalPoll\TemplateTags
 * @since 2.0.0
 * @global object $poll
 * @return bool
 */
function is_poll_multianswer()
{
    global $poll;
    return isset($poll->limitations->multiselection);
}

/**
 * Display poll results as number or other options.
 * 
 * @package TotalPoll\TemplateTags
 * @since 2.0.0
 * @global object $poll
 * @return bool
 */
function diplay_poll_results_as($option)
{
    global $poll;
    return ($poll->misc->show_results == $option);
}

/**
 * Display buttons.
 * 
 * @package TotalPoll\TemplateTags
 * @since 2.0.0
 * @return bool
 */
function display_poll_buttons()
{
    return apply_tp_filters('tp_poll_display_buttons', true);
}

/**
 * Display other buttons (useful for addons).
 * 
 * @package TotalPoll\TemplateTags
 * @since 2.0.0
 * @return void
 */
function other_poll_buttons()
{
    do_tp_action('tp_poll_other_buttons');
}

/**
 * Used by addons to add extra content to choice vote content (eg. A hidden field).
 * 
 * @package TotalPoll\TemplateTags
 * @since 2.0.0
 * @param object $choice
 * @return void
 */
function poll_choice_vote_rendered($choice)
{
    do_tp_action("tp_render_{$choice->type}_choice_vote", $choice);
}

/**
 * Used by addons to add extra content to choice result content.
 * 
 * @package TotalPoll\TemplateTags
 * @since 2.0.0
 * @param object $choice
 * @return void
 */
function poll_choice_result_rendered($choice)
{
    do_tp_action("tp_render_{$choice->type}_choice_result", $choice);
}