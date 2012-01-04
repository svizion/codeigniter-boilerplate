<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 Base_Contoller
 Provides the basic extension of CI_Controller to implement general site setup
*/
class Base_Controller extends MX_Controller {

    /**
     * @desc build and setup basic info
     */
    public function __construct()
    {
        parent::__construct();
        $this->config->database();
        // Load additional libraries
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;    // Hack to make it work properly with HMVC        
    }

}

/**
 * Front_Controller
 * Setups the front end of the website extend Front_Controller for public pages
 *
 * Extend this class to create a page.
 *
 * @package		codeigniter-boilerplate
 * @author		Yari D'areglia yari@jumpzero.com
 */
class Front_Controller extends Base_Controller {
    
    //Page info
    protected $page_id = false;
    protected $view = false;
    protected $template = "main";
    protected $hasNav = true;
    //Page contents
    public $javascript = array();
    public $css = array();
    public $GFont = array();
    public $content = false;
    //Page Meta
    public $title = false;
    public $description = false;


    /**
     * @desc build and setup basic info
     */
    public function __construct(){
        parent::__construct();
        $this->page_id = strToLower(get_class($this));
        $this->view = "pages/".$this->page_id;

    }

    /**
     * @desc render the final page composed on template and page content
     */
    public function render_page(){
        //Setup template content
        $toTpl["javascript"] = $this->javascript;
        $toTpl["css"] = $this->css;
        $toTpl["content"] = $this->content;
        $toTpl["title"] = $this->title;
        $toTpl["description"] = $this->description;
        $toTpl["GFont"] = $this->GFont;
        
        /* Menu: to avoid use boilerplate menu set hasNav to false
         * and remove $menu reference from templates (i.e. from views/template/main.php)*/
        if($this->hasNav){
            $this->load->helper("nav");
            $toMenu["page_id"] = $this->page_id;
            $toTpl["nav"] = $this->load->view("template/nav",$toMenu,true);
        }
        /*eo menu*/

        //Finally render the page :)
        $this->load->view("template/".$this->template,$toTpl);
    }
    
    /**
     * @desc Create content for the current page
     */
    public function build_content($page_content=""){
        $this->content = $this->load->view($this->view,$page_content,true);
    }
      
    /**
     * @desc get function for page_id
     */
    public function get_page_id(){  
        return $this->page_id;
    }
    
    /**
     * @desc get function for view
     */
    public function get_view(){  
        return $this->view;
    }
    
    /**
     * @desc get function for template
     */
    public function get_template(){  
        return $this->template;
    }
    
}

/*End of file MY_Controller.php*/
/*Location .application/core/MY_Controller.php*/
