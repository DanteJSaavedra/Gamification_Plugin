<?php

function block_gamification_print_page($gamification, $return = false) {
    global $OUTPUT, $COURSE;
    $display = $OUTPUT->heading($gamification->pagetitle);
    $display .= $OUTPUT->box_start();
    if($gamification->displaydate) {
        $display .= userdate($gamification->displaydate);
    }
    $display .= html_writer::start_tag('div', array('class' => 'gamification displaydate'));
    $display .= userdate($gamification->displaydate);
    $display .= html_writer::end_tag('div');
    $display .= clean_text($gamification->displaytext);

    $display .= $OUTPUT->box_end();

}





?>