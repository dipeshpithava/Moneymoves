<?php

if ( !defined('ABSPATH') )
    exit; // Shhh

/**
 * Anti-cheating and limitations
 * 
 * @since 2.0.0
 * @package TotalPoll\Security
 */

Class TP_Security {

    /**
     * Current IP.
     * 
     * @since 2.0.0
     * @access public
     * @type string
     */
    public $ip;

    /**
     * Current IP Range (192.193.194.***).
     * 
     * @since 2.0.0
     * @access public
     * @type string
     */
    public $ip_range;

    /**
     * Type of current IP.
     * 
     * @since 2.0.0
     * @access public
     * @type bool
     */
    public $is_ipv6;

    /**
     * Assign IP.
     * 
     * @since 2.0.0
     * @return void
     */
    public function __construct()
    {
	
    }

    /**
     * Check vote ability.
     * 
     * @since 2.0.0
     * @global object $poll Poll object
     * @return bool
     */
    public function has_ability_to_vote()
    {
	global $poll;

	$session_layer = $this->is_layer_enabled('session') && $this->check_session_layer();
	$cookies_layer = $this->is_layer_enabled('cookies') && $this->check_cookies_layer();

	if ( $session_layer || $cookies_layer)
	    return (bool) apply_tp_filters('tp_security_vote_ability', false);
	/**
	 * Vote ability.
	 * 
	 * @since 2.0.0
	 * @filter tp_security_vote_ability
	 * @param Current ability
	 */
	return (bool) apply_tp_filters('tp_security_vote_ability', true);
    }

    /**
     * Lock vote ability using enabled layers.
     * 
     * @since 2.0.0
     * @return void
     */
    public function lock_vote_ability()
    {
	// Session
	if ( $this->is_layer_enabled('session') ):
	    $this->add_session_layer();
	endif;

	// Cookies
	if ( $this->is_layer_enabled('cookies') ):
	    $this->add_cookies_layer();
	endif;

	/**
	 * Lock vote ability.
	 * 
	 * @since 2.0.0
	 * @action tp_security_lock_vote_ability
	 */
	do_tp_action('tp_security_lock_vote_ability');
    }

    /**
     * Session layer.
     * 
     * @since 2.0.0
     * @global object $poll
     * @return void
     */
    public function add_session_layer()
    {
	global $poll;
	$_SESSION[$poll->special_id] = true;
	/**
	 * Session lock.
	 * 
	 * @since 2.0.0
	 * @action tp_security_lock_vote_by_session
	 * @param Special ID
	 */
	do_tp_action('tp_security_lock_vote_by_session', $poll->special_id);
    }

    /**
     * Cookies layer.
     * 
     * @since 2.0.0
     * @global object $poll
     * @return void
     */
    public function add_cookies_layer()
    {
	global $poll;
	setcookie('wp_' . md5($poll->special_id), true, time() + (MINUTE_IN_SECONDS * intval($poll->limitations->cookies->timeout)), COOKIEPATH, COOKIE_DOMAIN);
	/**
	 * Cookies lock
	 * 
	 * @since 2.0.0
	 * @action tp_security_lock_vote_by_cookies
	 * @param Special ID
	 * @param Timeout
	 */
	do_tp_action('tp_security_lock_vote_by_cookies', $poll->special_id, intval($poll->limitations->cookies->timeout));
    }

    /**
     * Check layer if enabled.
     * 
     * @since 2.0.0
     * @global object $poll
     * @param string $layer Layer name
     * @return bool
     */
    public function is_layer_enabled($layer)
    {
	global $poll;
	/**
	 * Security layer check.
	 * 
	 * @since 2.0.0
	 * @filter tp_security_layer_enabled
	 * @param State
	 * @param Layer name
	 */
	return apply_tp_filters('tp_security_layer_enabled', isset($poll->limitations->revote->{$layer}), $layer);
    }

    /**
     * Check session layer.
     * 
     * @since 2.0.0
     * @global object $poll
     * @return bool
     */
    public function check_session_layer()
    {
	global $poll;
	/**
	 * Session layer check.
	 * 
	 * @since 2.0.0
	 * @filter tp_security_check_session_layer
	 * @param State
	 * @param Special ID
	 */
	return apply_tp_filters('tp_security_check_session_layer', isset($_SESSION[$poll->special_id]), $poll->special_id);
    }

    /**
     * Check cookies layer.
     * 
     * @since 2.0.0
     * @global object $poll
     * @return boold
     */
    public function check_cookies_layer()
    {
	global $poll;
	/**
	 * Cookies layer check.
	 * 
	 * @since 2.0.0
	 * @filter tp_security_check_cookies_layer
	 * @param State
	 * @param Special ID
	 */
	return apply_tp_filters('tp_security_check_cookies_layer', isset($_COOKIE['wp_' . md5($poll->special_id)]), $poll->special_id);
    }

}
