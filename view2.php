<?php
require_once('/../../config.php');
require_once($CFG->libdir.'/adminlib.php' ) ;

$PAGE->set_context(context_system::instance());
$title = get_string('view_title', 'block_gamification');
$pagetitle = $title;
$PAGE->set_pagelayout('standard');
$url = new moodle_url('/blocks/gamification/view.php');
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$ouput = $PAGE->get_renderer('block_gamification');
echo $output->header();

echo $output->heading($pagetitle);
$data = new stdClass();
$data->heading = 'View Page';
$data->descriptive = 'Descripción de la pagina View';
$renderable = new view_page($data);
echo $output->render($renderable);
echo $output->footer();
?>