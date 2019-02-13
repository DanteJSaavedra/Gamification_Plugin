<?php
require_once("{$CFG->libdir}/formslib.php");
 
class gamification_form extends moodleform {
 
    function definition() {
        $mform=& $this->_form;
        $mform->addElement('header','displayinfo', get_string('gform_title', 'block_gamification'));
        
        // Añadir Entrada de Texto
        $mform->addElement('text', 'pagetitle', get_string('gform_titulopagina', 'block_gamification'));
        $mform->setType('pagetitle', PARAM_RAW);
        $mform->addRule('pagetitle', null, 'required', null, 'client');
        
        // Agregar Entrada de Caja de Texto
        $mform->addElement('htmleditor', 'displaytext', get_string('gform_displaytext', 'block_gamification'));
        $mform->setType('displaytext', PARAM_RAW);
        $mform->addRule('displaytext', null, 'required', null, 'client');
    }

}