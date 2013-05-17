<?php

class TargetModel extends BaseModel {

    //data passed to the home index view
    public function index() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Targets");
        return $this->viewModel;
    }

    public function view() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Targets");
        return $this->viewModel;
    }

}

/* End of file target.php */
/* Location: ./models/target.php */
