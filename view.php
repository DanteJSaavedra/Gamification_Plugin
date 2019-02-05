<?php
 
require_once('../../config.php');
require_once('gamification_form.php');
 
global $DB, $OUTPUT, $PAGE, $USER;
 
// Check for all required variables.
$courseid = required_param('courseid', PARAM_INT);
$blockid = required_param('blockid', PARAM_INT);
$id = optional_param('id', 0, PARAM_INT);

if (!$course = $DB->get_record('course', array('id' => $courseid))) {
    print_error('Curso Invalido', 'block_gamification', $courseid);
}
 
require_login($course);
$PAGE->set_url('/blocks/gamification/view.php', array('id' => $courseid));
$PAGE->set_pagelayout('standard');
$PAGE->set_heading(get_string('Bienvenido '.$USER->firstname.' ', 'block_gamification'));


$gamification = new gamification_form();

echo $OUTPUT->header();
$gamification->display();
echo $OUTPUT->footer();
?>