<div class="clearfix"></div>
<h2>Example of <span><?php echo $day?></span></h2>

<h3>Code to produce this page</h3>
<pre>
class Page extends MY_Controller {

    public function index()
    {

        $this->title = "Pages view";
        $this->description = "A working module";
        $this->css = array("BP/homepage.css","BP/example.css");
        $this->GFont = array("Lobster","Puritan");
        $toView["day"] = strftime("%A",strtotime("today"));

        $this->build_content($toView);
        $this->render_page();
    }
}
</pre>

<img src="<?php echo base_url()?>assets/images/BP/logo.png" id="logo"/>
