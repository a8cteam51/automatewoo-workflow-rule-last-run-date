<?php
/*
 * Plugin Name: AutomateWoo Workflow Rule - Last Run Date
 * Plugin URI:  https://github.com/a8cteam51/automatewoo-workflow-rule-last-run-date
 * Description: Extends the functionality of AutomateWoo with a custom rule which checks when a workflow last ran
 * Version:     1.0.0
 * Author:      Automattic Special Projects
 * Author URI:  https://specialprojects.automattic.com/
 * License:     GPL v2 or later
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_filter( 'automatewoo/rules/includes', 'to51_automatewoo_workflow_last_run_rules' );

/**
 * @param array $rules
 * @return array
 */
function to51_automatewoo_workflow_last_run_rules( $rules ) {
	$rules['workflow_last_run_date'] = dirname( __FILE__ ) . '/includes/class-workflow-last-run-date.php';
	return $rules;
}
