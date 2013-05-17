<?php

class MandatoryModel extends BaseModel {

    //data passed to the home index view
    public function index() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Mandatory & Contractual Training");
        return $this->viewModel;
    }

    public function view() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Mandatory & Contractual Training");
        return $this->viewModel;
    }

}

/* End of file mandatory.php */
/* Location: ./models/mandatory.php */
