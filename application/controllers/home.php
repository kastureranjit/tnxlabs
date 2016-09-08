<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	//session_start();
	/**
	* 
	*/
	class Home extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index()
		{
			$this->load->helper('form');
			if($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				$this->load->view('home_view',$data); 
			}
			else
			{
				redirect('login','refresh');
			}
		}

		function logout()
		{
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('home','refresh');
		}

		function url()
		{
			if(isset($_POST["url"]))
			{
			    $get_url = $_POST["url"]; 
			        
			        //Include PHP HTML DOM parser (requires PHP 5 +)
			        include_once("simple_html_dom.inc.php");
			        
			        //get URL content
			        $get_content = file_get_html($get_url); 
			        
			        //Get Page Title 
			        foreach($get_content->find('title') as $element) 
			        {
			            $page_title = $element->plaintext;
			        }
			        
			        //Get Body Text
			        foreach($get_content->find('body') as $element) 
			        {
			            $page_body = trim($element->plaintext);
			            $pos=strpos($page_body, ' ', 200); //Find the numeric position to substract
			            $page_body = substr($page_body,0,$pos ); //shorten text to 200 chars
			        }
			    
			        $image_urls = array();
			        
			        //get all images URLs in the content
			        foreach($get_content->find('img') as $element) 
			        {
			                /* check image URL is valid and name isn't blank.gif/blank.png etc..
			                you can also use other methods to check if image really exist */
			                if(!preg_match('/blank.(.*)/i', $element->src) && filter_var($element->src, FILTER_VALIDATE_URL))
			                {
			                    $image_urls[] =  $element->src;
			                }
			        }
			        
			        //prepare for JSON 
			        $output = array('title'=>$page_title, 'images'=>$image_urls, 'content'=> $page_body);
			        echo json_encode($output); //output JSON data
			}
		}
	}
?>