<?php
/*
 * Plugin Name: AutomateWoo Workflow Rule - Last Run Date
 * Plugin URI:  https://github.com/a8cteam51/automatewoo-workflow-rule-last-run-date
 * Description: Extends the functionality of AutomateWoo with a custom rule which checks when a workflow last ran
 * Version:     1.0.0
 * Author:      WP Special Projects
 * Author URI:  https://wpspecialprojects.wordpress.com/
 * License:     GPL v2 or later
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

error_log( 'automatewoo-workflow-rule-last-run-date.php loaded' );
add_filter( 'automatewoo/rules/includes', 'to51_automatewoo_workflow_last_run_rules' );

/**
 * @param array $rules
 * @return array
 */
function to51_automatewoo_workflow_last_run_rules( $rules ) {
    error_log( 'to51_automatewoo_workflow_last_run_rules' );
	$rules['workflow_last_run_date'] = dirname( __FILE__ ) . '/includes/class-workflow-last-run-date.php';
	return $rules;
}
