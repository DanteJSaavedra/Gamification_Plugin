<?php
require_once("{$CFG->libdir}/formslib.php");
 
class gamification_form extends moodleform {
 
    function definition() {
 
        $mform =& $this->_form;
        $mform->addElement('header','displayinfo', get_string('Campos de Texto', 'block_gamification'));
    }
}