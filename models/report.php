<?php

class ReportModel extends BaseModel {

    //data passed to the home index view
    public function index() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Reports");
        return $this->viewModel;
    }

    public function view() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Reports");
        return $this->viewModel;
    }

}

/* End of file report.php */
/* Location: ./models/report.php */
