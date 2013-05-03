<?php

/**
 * Controller for hub
 * 
 * Loads models and views required by hub
 * 
 */
class HubController extends BaseController
{

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object
        require("models/hub.php");
        $this->model = new HubModel();
    }
    
    //default method
    protected function index()
    {
        $this->view->output($this->model->index());
    }
    
    public function view(){
        echo "<p>urlValues:</p>";
        print_r( $this->urlValues);
    }
}
/* End of file hub.php */
/* Location: ./hub.php */
