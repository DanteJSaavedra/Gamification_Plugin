<?php
use renderable;                                                                                                                     
use renderer_base;                                                                                                                  
use templatable;                                                                                                                    
use stdClass;  

defined('MOODLE_INTERNAL') || die;

class block_gamification_renderer extends plugin_renderer_base{
    /**
     * Defer to template.
     *
     * @param index_page $page
     *
     * @return string html for the page
     */
    public function render_perfil_page($page){
        $data = $page->export_for_template($this);
        return parent::render_from_template('block_gamification/perfil_page', $data);
    }
}
trait renderer_page_trait{
    /** @var stdClass data to a template. */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @return stdClass
     */
    public function export_for_template(renderer_base $output){
        $data = new stdClass();
        return $this->data;
    } 
}
class perfil_page implements renderable, templatable{
    use renderer_page_trait;
}