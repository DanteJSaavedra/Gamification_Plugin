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
        $this->title = get_string('Gamificación Basada en Roles', 'block_gamification');
    }

    /**
     * Returns the block contents.
     *
     * @return stdClass The block contents.
     */
    public function get_content() {
        global $COURSE, $USER;
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
        // $url = new moodle_url('/blocks/gamification/view.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id));
        // $this->content->footer = html_writer::link($url, get_string('Más Información', 'block_gamification'));

        if (!empty($this->config->text)) {
            $this->content->text = $this->config->text;
        } else {
            $text = 'Bienvenido <em>'.$USER->firstname.
                                '</em><br> <div class="alert alert-primary" role="alert">
                                <strong>Id: </strong><em>'
                                . $USER->id.
                                '</em></div>';
                                
            $this->content->text = $text;
        }

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
