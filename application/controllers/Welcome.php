<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	//function __construct()
	//{
	//		parent::__construct();
	
	/* Standard Libraries of codeigniter are required */
	//$this->load->database();
	//$this->load->helper('url');
	/* ------------------ */ 
	
	//}

	public function index()
	{
		//echo'rere';
		//$this->load->helper('url');
		//exit;
		$this->load->model('queries');
		$posts = $this-> queries ->getPosts();
		//echo'<pre>';
		//print_r($posts);
		//exit;
		$this->load->view('index',['post'=>$posts]);
	}

	public function create()
	{
		//$this->load->helper('url');
		//echo "create";
		//$this->load->view('index/create');
		$this->load->view('create');
	}

	public function update($id)
	{
		//echo $id;
		//$this->load->helper('date');
		$this->load->model('queries');
		$posts = $this-> queries ->getSinglePosts($id);
		$this->load->view('update',['posts'=>$posts]);
	}

	public function change($id)
	{
		//echo $id;
		//exit;
		$this->form_validation->set_rules('crudName', 'Username', 'required');
		$this->form_validation->set_rules('crudEmail', 'Email', 'required');
		$this->form_validation->set_rules('crudUpdate', 'Date', 'required');
		if ($this->form_validation->run())
		{
			//echo "Success";
			$data = $this->input->post();
			//$OrderLines=$this->input->post('orderlines');
			//echo "<pre>";
			//print_r($data);
			//exit;
			unset($data['submit']);
			$this->load->model('queries');
			if($this->queries->updatePosts($data,$id))
			{
				$this->session->set_flashdata('msg','Post Update Successful');
			}
			else
			{
				$this->session->set_flashdata('msg','Fail to Update Data');
			}
			return redirect('welcome');

		}
		else
		{
			//echo validation_errors();
			$this->load->view('create');
		}
	}

	public function save()
	{
		$this->form_validation->set_rules('crudName', 'Username', 'required');
		$this->form_validation->set_rules('crudEmail', 'Email', 'required');
		$this->form_validation->set_rules('crudUpdate', 'Date', 'required');
		if ($this->form_validation->run())
		{
			//echo "Success";
			$data = $this->input->post();
			//$OrderLines=$this->input->post('orderlines');
			//echo "<pre>";
			//print_r($data);
			//exit;
			unset($data['submit']);
			$this->load->model('queries');
			if($this->queries->addPosts($data))
			{
				$this->session->set_flashdata('msg','Post save Successful');
			}
			else
			{
				$this->session->set_flashdata('msg','Fail to save Data');
			}
			return redirect('welcome');
		}
		else
		{
			//echo validation_errors();
			$this->load->view('create');
		}
	}

	public function view($id)
	{
		//echo $id;
		$this->load->model('queries');
		$posts = $this-> queries ->getSinglePosts($id);
		$this->load->view('view',['posts'=>$posts]);
	}

	public function delete($id)
	{
		//echo $id;
		//exit;
		$this->load->model('queries');
		if($this-> queries ->deletePosts($id))
		{
			$this->session->set_flashdata('msg','Post Delete Successful');
		}
		else
		{
			$this->session->set_flashdata('msg','Fail to Delete Data');
		}
		return redirect('welcome');
	}
}
