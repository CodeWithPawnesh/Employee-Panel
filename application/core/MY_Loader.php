<?php
class MY_Loader extends CI_Loader {

    public function __construct() {
        parent::__construct();
    }
    
    public function admin_temp($template_name,$data) {

        $content = $this->view('pages/includes/web_header'); // header
        $content = $this->view('pages/'.$template_name,$data); // view
        $content = $this->view('pages/includes/web_footer'); // footer
        return $content;
    }
}