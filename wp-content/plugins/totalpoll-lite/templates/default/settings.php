<?php

if ( !defined('ABSPATH') )
    exit; // Shhh

$settings = array(
    'sections' => array(
	'general' => array(
	    'label' => __('General settings', TP_TD),
	    'fields' => array(
		'containerBorder' => array(
		    'type' => 'color',
		    'label' => __('Container border', TP_TD),
		    'default' => '#DDDDDD',
		),
		'containerBackground' => array(
		    'type' => 'color',
		    'label' => __('Container background', TP_TD),
		    'default' => '#FFFFFF',
		),
		'warningBackground' => array(
		    'type' => 'color',
		    'label' => __('Warning messages background', TP_TD),
		    'default' => '#FFF9E8',
		),
		'warningBorder' => array(
		    'type' => 'color',
		    'label' => __('Warning messages border', TP_TD),
		    'default' => '#E8D599',
		),
		'warningColor' => array(
		    'type' => 'color',
		    'label' => __('Warning messages text color', TP_TD),
		    'default' => '#333333',
		),
		'questionBackground' => array(
		    'type' => 'color',
		    'label' => __('Question background', TP_TD),
		    'default' => '#EEEEEE',
		),
		'questionColor' => array(
		    'type' => 'color',
		    'label' => __('Question color', TP_TD),
		    'default' => '#333333',
		),
		'choiceColor' => array(
		    'type' => 'color',
		    'label' => __('Choice color', TP_TD),
		    'default' => '#333333',
		),
		'choiceInputBackground' => array(
		    'type' => 'color',
		    'label' => __('Checkbox background', TP_TD),
		    'default' => '#EEEEEE',
		),
		'animationDuration' => array(
		    'type' => 'text',
		    'label' => __('Animation duration (ms)', TP_TD),
		    'default' => '1000',
		),
		'borderRadius' => array(
		    'type' => 'text',
		    'label' => __('Border radius (px)', TP_TD),
		    'default' => '2',
		)
	    )
	),
	'buttons' => array(
	    'label' => __('Buttons', TP_TD),
	    'fields' => array(
		'background' => array(
		    'type' => 'color',
		    'label' => __('Background', TP_TD),
		    'default' => '#EEEEEE',
		    'states' => array( 'hover' => array( 'label' => 'Hover', 'default' => '#E5E5E5' ) ),
		),
		'primaryBackground' => array(
		    'type' => 'color',
		    'label' => __('Primary background', TP_TD),
		    'default' => '#1E73BE',
		    'states' => array( 'hover' => array( 'label' => 'Hover', 'default' => '#308DDF' ) ),
		),
		'color' => array(
		    'type' => 'color',
		    'label' => __('Default color', TP_TD),
		    'default' => '#333333',
		    'states' => array( 'hover' => array( 'label' => 'Hover', 'default' => '#333333' ) ),
		),
		'primaryColor' => array(
		    'type' => 'color',
		    'label' => __('Primary color', TP_TD),
		    'default' => '#FFFFFF',
		    'states' => array( 'hover' => array( 'label' => 'Hover', 'default' => '#FFFFFF' ) ),
		),
		'borderColor' => array(
		    'type' => 'color',
		    'label' => __('Border color', TP_TD),
		    'default' => '#CCCCCC',
		    'states' => array( 'hover' => array( 'label' => 'Hover', 'default' => '#CCCCCC' ) ),
		),
		'primaryBorderColor' => array(
		    'type' => 'color',
		    'label' => __('Border color', TP_TD),
		    'default' => '#1B66A8',
		    'states' => array( 'hover' => array( 'label' => 'Hover', 'default' => '#1E73BE' ) ),
		),
	    )
	),
	'votesbar' => array(
	    'label' => __('Votes bar', TP_TD),
	    'fields' => array(
		'background' => array(
		    'type' => 'color',
		    'label' => __('Background', TP_TD),
		    'default' => '#EEEEEE',
		    'states' => array( 'hover' => array( 'label' => 'Hover', 'default' => '#E5E5E5' ) ),
		),
		'color' => array(
		    'type' => 'color',
		    'label' => __('Bar color', TP_TD),
		    'default' => '#5CA5E5',
		    'states' => array(
			'start' => array( 'label' => 'Start color', 'default' => '#5CA5E5' ),
			'end' => array( 'label' => 'End color', 'default' => '#5CA5E5' )
		    ),
		),
	    )
	),
    )
);
