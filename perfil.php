<?php
require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php' ) ;

$PAGE->set_context(context_system::instance());
$PAGE->requires->js('/blocks/gamification/js/d3.min.js', true);
$PAGE->requires->js('/blocks/gamification/js/perfil.js', false);
$PAGE->requires->css('/blocks/gamification/css/style.css',false);
$title = get_string('perfil_title', 'block_gamification');
$pagetitle = $title;
$PAGE->set_pagelayout('standard');
$url = new moodle_url('/blocks/gamification/perfil.php');
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$OUTPUT = $PAGE->get_renderer('block_gamification');
echo $OUTPUT->header();
// echo $OUTPUT->heading($pagetitle);
$data = new stdClass();
$data->titulo = get_string('perfil_title', 'block_gamification');   
$data->subtitulo = get_string('index_pluginname', 'block_gamification');
$data->rol = 'Búho';
$data->puntaje_text = 'Puntaje';
$data->puntaje_value = 15050;
$data->logo = $OUTPUT->image_url('owl', 'block_gamification');
$renderable = new perfil_page($data);
echo $OUTPUT->render($renderable);
echo $OUTPUT->footer();
?>