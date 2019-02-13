<?php
 
require_once('../../config.php');
require_once('gamification_form.php');
 
global $DB;
 
// Check for all required variables.
$courseid = required_param('courseid', PARAM_INT);
$blockid = required_param('blockid', PARAM_INT);
$id = optional_param('id', 0, PARAM_INT);
 
 
if (!$course = $DB->get_record('course', array('id' => $courseid))) {
    print_error('invalidcourse', 'block_gamification', $courseid);
}
 
require_login($course);
$PAGE->set_url('/blocks/gamification/view.php', array('id' => $courseid));
$PAGE->set_pagelayout('standard');
$PAGE->set_heading(get_string('gform_edicion', 'block_gamification'));
$settingsnode = $PAGE->settingsnav->add(get_string('gform_configuracion', 'block_gamification'));
$editurl = new moodle_url('/blocks/gamification/view.php', array('id' => $id, 'courseid' => $courseid, 'blockid' => $blockid));
$editnode = $settingsnode->add(get_string('gform_editarpagina', 'block_gamification'), $editurl);
$editnode->make_active();




$gamification = new gamification_form();
echo $OUTPUT->header();
$gamification->display();
echo $OUTPUT->footer();
?>