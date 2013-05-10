<?php

/**
 * Controller for Targets
 * 
 * Loads models and views required by Targets
 *
 */
class Targets extends Controller {

    /**
     *
     * @var integer
     */
    protected $employee_id;

    public function __construct() {
        parent::__construct();
        
        $this->load->model(array(
            'target_model','news_model'));
        
    }


    /**
     * Loads page to view existing targets
     */
    public function view() {
        $err_msg = $this->controller . '/view()';

        $employee =
                $this->employee_model->get_employee($this->employee_id);
        if (empty($employee)) {
            show_error('cannot find employee_id ('
                    . $this->employee_id . ') in database');
        }

         $targets =
                $this->target_model->get_targets($this->employee_id);

        $data['employee'] = $employee;
        $data['activities'] = $activities;

        $this->load->view('templates/header', $data);
        $this->load->view('learning_plan/view', $data);
        $this->load->view('templates/footer');
    

}}

/* End of file targets.php */
/* Location: ./controllers/targets.php */