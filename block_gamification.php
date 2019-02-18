<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Block gamification is defined here.
 *
 * @package     block_gamification
 * @copyright   2019 Dante
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * gamification block.
 *
 * @package    block_gamification
 * @copyright  2019 Dante
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_gamification extends block_base {
    
    /**
     * Initializes class member variables.
     */

    public function init() {
        // Needed by Moodle to differentiate between blocks.
        $this->title = html_writer::start_tag('h4',array('class'=>'text-center')) . get_string('index_pluginname', 'block_gamification') . html_writer::end_tag('h4');
    }

    /**
     * Returns the block contents.
     *
     * @return stdClass The block contents.
     */
    public function get_content() {
        global $COURSE, $USER, $PAGE, $OUTPUT;
        $context = context_course::instance($COURSE->id);
        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->items = array();
        $this->content->icons = array();
        // $this->content->footer = html_writer::link($url, get_string('gform_title', 'block_gamification'));
        if (!empty($this->config->text)) {
            $this->content->text = $this->config->text;
        } else {
            $text = html_writer::div(
                        html_writer::div(
                            html_writer::div( 
                                html_writer::start_tag('h2') . 'Búho' . html_writer::end_tag('h2').
                                html_writer::empty_tag('img', array('src'=> $OUTPUT->image_url('owl', 'block_gamification'), 'class'=>'img-fluid')).
                                html_writer::start_tag('i',array('class'=>'text-primary fa fa-star-o')) . html_writer::end_tag('i') .
                                html_writer::start_tag('i',array('class'=>'text-success fa fa-star-half-o')) . html_writer::end_tag('i') .
                                html_writer::start_tag('i',array('class'=>'text-danger fa fa-star-half-o')) . html_writer::end_tag('i') .
                                html_writer::start_tag('i',array('class'=>'text-warning fa fa-star')) . html_writer::end_tag('i') .
                                html_writer::start_tag('i',array('class'=>'text-info fa fa-star-o')) . html_writer::end_tag('i') 
                                ,'col-4 text-center' ).
                            html_writer::div( 
                                html_writer::start_tag('h5',array('class'=>'text-right')) . 'Puntaje Total' . html_writer::end_tag('h5').
                                html_writer::start_tag('h4',array('class'=>'text-right font-weight-bold')) . '15050' . html_writer::end_tag('h4').
                                html_writer::start_tag('h5',array('class'=>'text-right')) . 'Puntaje Rol' . html_writer::end_tag('h5').
                                html_writer::start_tag('h4',array('class'=>'text-right font-weight-bold')) . '2550' . html_writer::end_tag('h4')
                            ,'col-8' ),                          
                        'row').
                        html_writer::div(
                            html_writer::div(
                                html_writer::start_tag('strong') .'Nivel 7'. html_writer::end_tag('strong').
                                html_writer::empty_tag('img', array('src'=> $OUTPUT->image_url('rank-7', 'block_gamification'), 'height' =>'50', 'width'=>'50')),
                            'col-4 text-center').
                            html_writer::div(
                                html_writer::empty_tag('img', array('src'=> $OUTPUT->image_url('rank-8', 'block_gamification'), 'height' =>'35', 'width'=>'35')).
                                html_writer::div(html_writer::div('','progress-bar progress-bar-striped progress-bar-animated',array('role'=>'progressbar','style'=>'width:50%','height'=>'30','aria-valuenow'=>'2550','aria-valuemin'=>'2201','aria-valuemax'=>'2900')),'progress mt-1',array('style'=>'height: 20px;')),
                            'col-8 text-right')
                        ,'row mt-3'),
                    'container'). 
                    html_writer::empty_tag('hr');
            $text .= html_writer::div(
                        html_writer::div(
                            html_writer::div(
                                    html_writer::start_tag('strong') . get_string('index_perfil', 'block_gamification') . html_writer::end_tag('strong').
                                    html_writer::start_tag('hr').
                                    html_writer::link(new moodle_url('/blocks/gamification/perfil.php'), html_writer::empty_tag('img', array('src'=> $OUTPUT->image_url('user', 'block_gamification'), 'class'=>'img-fluid')))
                                             
                                ,'col-4 alert alert-primary text-center').
                            html_writer::div(
                                    html_writer::start_tag('strong') . get_string('index_curso', 'block_gamification') . html_writer::end_tag('strong').
                                    html_writer::start_tag('hr').
                                    html_writer::link(new moodle_url('/blocks/gamification/curso.php'), html_writer::empty_tag('img', array('src'=> $OUTPUT->image_url('graduate', 'block_gamification'), 'class'=>'img-fluid')))
                                ,'col-4 alert alert-success text-center').
                            html_writer::div(
                                    html_writer::start_tag('strong') . get_string('index_companeros', 'block_gamification') . html_writer::end_tag('strong').
                                    html_writer::start_tag('hr').
                                    html_writer::link(new moodle_url('/blocks/gamification/rol.php'), html_writer::empty_tag('img', array('src'=> $OUTPUT->image_url('group-people', 'block_gamification'), 'class'=>'img-fluid')))
                                ,'col-4 alert alert-info text-center'),
                            'row'),
                        'container');
                                
            $this->content->text = $text;
        }
        $this->content->footer = html_writer::start_tag('footer', array('class'=>'text-center')).
                                    html_writer::empty_tag('hr').
                                    html_writer::link (new moodle_url('/blocks/gamification/information.php'),'Más Información sobre Gamificación Basada en Roles').
                                    html_writer::empty_tag('hr').
                                    html_writer::end_tag('footer');
         

        return $this->content;
    }

    /**
     * Defines configuration data.
     *
     * The function is called immediatly after init().
     */
    public function specialization() {
        if (isset($this->config)) {
            if (empty($this->config->title)) {
                $this->title = get_string('defaulttitle', 'block_gamification');            
            } else {
                $this->title = $this->config->title;
            }
     
            if (empty($this->config->text)) {
                $this->config->text = get_string('defaulttext', 'block_gamification');
            }    
        }
    }
    public function instance_allow_multiple() {
        return true;
      }
    /**
     * Enables global configuration of the block in settings.php.
     *
     * @return bool True if the global configuration is enabled.
     */
    function has_config() {
        return true;
    }

    /**
     * Sets the applicable formats for the block.
     *
     * @return string[] Array of pages and permissions.
     */
    public function applicable_formats() {
        return array(
                 'site-index' => true,
                'course-view' => true, 
         'course-view-social' => false,
                        'mod' => true, 
                   'mod-quiz' => false
        );
      }
    public function instance_config_save($data,$nolongerused =false) {
        if(get_config('gamification', 'Allow_HTML') == '1') {
          $data->text = strip_tags($data->text);
        }
       
        // And now forward to the default implementation defined in the parent class
        return parent::instance_config_save($data,$nolongerused);
      }
      public function html_attributes() {
        $attributes = parent::html_attributes(); // Get default values
        $attributes['class'] .= ' block_'. $this->name(); // Append our class to class attribute
        return $attributes;
    }
}
