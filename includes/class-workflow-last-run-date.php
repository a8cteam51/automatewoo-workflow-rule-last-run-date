<?php

namespace AutomateWoo\Rules;

defined( 'ABSPATH' ) || exit;

/**
 * Rule to check when workflow last ran.
 */
class Workflow_Last_Run_Date extends Abstract_Date {

    /**
     * What data we're using to validate.
     *
     * @var string
     */
    public $data_item = 'shop';

    /**
     * Constructor.
     */
    public function __construct() {
        $this->has_is_past_comparision = true;
        parent::__construct();
    }

    /**
     * Init.
     */
    public function init() {
        $this->title = __( 'Workflow - Last Run Date', 'automatewoo' );
    }

    /**
     * Validates rule.
     *
     * @param mixed  $data_item The data item passed by the trigger (unused).
     * @param string $compare   The type of comparison.
     * @param mixed  $value     The values we have to compare. Null is allowed when $compare is is_not_set.
     *
     * @return bool
     */
    public function validate( $data_item, $compare, $value = null ) {
        $workflow = $this->get_workflow();
        if ( ! $workflow ) {
            return false;
        }

        // Query the most recent log entry
        $query = new \AutomateWoo\Log_Query();
        $query->where_workflow( $workflow->get_id() );
        $query->set_limit( 1 );
        $query->set_ordering( 'date', 'DESC' );
        $logs = $query->get_results();
        if ( empty( $logs ) ) {
            return $compare === 'is_not_set' || $compare === 'is_not_in_the_last';
        }

        return $this->validate_date( $compare, $value, $logs[0]->get_date() );
    }
}

return new Workflow_Last_Run_Date(); 