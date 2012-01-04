<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome2 extends Front_Controller {

    public function index()
    {
        /* Remember you can change the main template if you need!
        $this->template = "example-template";
        */

        // Define Meta
        $this->title = "Example!";
        $this->description = "A Codeigniter-Boilerplate example";

        // Define custom CSS
        $this->css = array("BP/homepage.css","BP/example.css");

        // Import Google Font Lobster and Puritan
        $this->GFont = array("Lobster","Puritan");

        //Somedata for the page.
        $toView["day"] = 'Its friday everyday';
echo 'Inside of Modules/welcome2';
        /*short cut to load->view("pages/page_name",$content,true)*/
        $this->build_content($toView);

        $this->render_page();
    }
}
/*End of file example.php*/
/*Location .application/controllers/example.php*/
