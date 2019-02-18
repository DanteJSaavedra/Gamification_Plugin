<?php
require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php' ) ;

$PAGE->set_context(context_system::instance());
$PAGE->requires->css('/blocks/gamification/css/style.css',false);
$title = 'Mi Rol';
$pagetitle = $title;
$PAGE->set_pagelayout('standard');
$url = new moodle_url('/blocks/gamification/rol.php');
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$OUTPUT = $PAGE->get_renderer('block_gamification');
echo $OUTPUT->header();
// echo $OUTPUT->heading($pagetitle);
$data = new stdClass();
$data->rank1 = $OUTPUT->image_url('rank-1', 'block_gamification');
$data->rank2 = $OUTPUT->image_url('rank-2', 'block_gamification');
$data->rank3 = $OUTPUT->image_url('rank-3', 'block_gamification');
$data->rank4 = $OUTPUT->image_url('rank-4', 'block_gamification');
$data->rank5 = $OUTPUT->image_url('rank-5', 'block_gamification');
$data->rank6 = $OUTPUT->image_url('rank-6', 'block_gamification');
$data->rank7 = $OUTPUT->image_url('rank-7', 'block_gamification');
$data->rank8 = $OUTPUT->image_url('rank-8', 'block_gamification');
$data->rank9 = $OUTPUT->image_url('rank-9', 'block_gamification');
$data->rank10 = $OUTPUT->image_url('rank-10', 'block_gamification');

$data->koala = $OUTPUT->image_url('koala', 'block_gamification');
$data->lion = $OUTPUT->image_url('lion', 'block_gamification');
$data->eagle = $OUTPUT->image_url('eagle', 'block_gamification');
$data->owl = $OUTPUT->image_url('owl', 'block_gamification');
$data->wolf = $OUTPUT->image_url('wolf', 'block_gamification');
$renderable = new rol_page($data);
echo $OUTPUT->render($renderable);
echo $OUTPUT->footer();
?>