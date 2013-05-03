<?php

class HubModel extends BaseModel
{
    //data passed to the home index view
    public function index()
    {   
        $this->viewModel->set("pageTitle","MyCPD Hub");
        return $this->viewModel;
    }
}

/* End of file hub.php */
/* Location: ./models/hub.php */
