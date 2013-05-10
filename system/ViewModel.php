<?php

/**
 * Class for the optional data object returned by model methods which the controller sends to the view.
 *
 * @author rhardy
 */
class ViewModel {    
    
    //dynamically adds a property or method to the ViewModel instance
    public function set($name,$val) {
        $this->$name = $val;
    }
    
    //returns the requested property value
    public function get($name) {
        if (isset($this->{$name})) {
            return $this->{$name};
        } else {
            return null;
        }
    }
}

/* End of file ViewModel.php */
/* Location: ./system/ViewModel.php */
