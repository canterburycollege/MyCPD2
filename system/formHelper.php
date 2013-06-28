<?php

/**
 * Function to wrap an array of options in html tags, to be used inside of html
 * select. A parameter can be used to select a default option.
 * 
 * @param array $options
 * @param string $selected_id Default selected option
 * @return string html option list
 */
function html_select_options($options, $selected_id = NULL) {
    $html = '';
    foreach ($options as $option) {
        if ($option->id == $selected_id) {
            $html .= '<option value="' . $option->id . '" selected>';
        } else {
            $html .= '<option value="' . $option->id . '">';
        }
        $html .= $option->description . '</option>';
    }
    return $html;
}

?>
