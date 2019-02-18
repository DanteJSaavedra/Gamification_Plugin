<?php
require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php' ) ;

$PAGE->set_context(context_system::instance());
$PAGE->requires->css('/blocks/gamification/css/style.css',false);
$title = 'Mi Curso';
$pagetitle = $title;
$PAGE->set_pagelayout('standard');
$url = new moodle_url('/blocks/gamification/curso.php');
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$OUTPUT = $PAGE->get_renderer('block_gamification');
echo $OUTPUT->header();
// echo $OUTPUT->heading($pagetitle);
$data = new stdClass();
$data->koala = $OUTPUT->image_url('koala', 'block_gamification');
$data->lion = $OUTPUT->image_url('lion', 'block_gamification');
$data->eagle = $OUTPUT->image_url('eagle', 'block_gamification');
$data->owl = $OUTPUT->image_url('owl', 'block_gamification');
$data->wolf = $OUTPUT->image_url('wolf', 'block_gamification');
$renderable = new curso_page($data);
echo $OUTPUT->render($renderable);
echo $OUTPUT->footer();
?>