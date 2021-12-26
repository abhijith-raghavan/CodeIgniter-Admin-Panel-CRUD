<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filesimport extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url','array'));
		$this->load->model('files_model');
		 $this->load->library('session');
	}

	public function index()
	{
		$data["fetch_data"] = $this->files_model->fetch_data();  
		$this->load->view('files_list', $data);
	}
	/**
	 *
	 * Loading insertion page
	 * 
	 */
	public function add_new_file(){
		$this->load->view('files_insert');
	}
	public function save_file()
	{
		$this->form_validation->set_rules('inputTitle', 'Title', 'required|alpha_numeric_spaces');
		if (empty($_FILES['inputUpload']['name']))
		{
    		$this->form_validation->set_rules('inputUpload', 'Image', 'required');
		}
		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('files_insert');
        }
		else{
			$x=$_FILES['inputUpload']['name'];
			if($x != "")
			{
				$config['upload_path']          = './files/';
				$config['allowed_types']        = 'txt|doc|docx|pdf|png|jpeg|jpg|gif';
				$config['max_size']             = 2000;

				$this->load->library('upload', $config);
				if(!is_dir($config['upload_path']))
				{
					mkdir($config['upload_path'], 0755, TRUE);
				}
				if ( ! $this->upload->do_upload('inputUpload'))
				{
					$error= array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error',$error['error']);
    				redirect(base_url().'filesimport/add_new_file','refresh');
					//$this->load->view('', $error);
				}
				else
				{
					$extname 	= explode(".", $_FILES['inputUpload']['name']);
					$ext 		= end($extname);
					$upload_data 	=   $this->upload->data();
					$file 			=	$upload_data['file_name'];

					$parameters = array(
				        'inputTitle' => $this->input->post('inputTitle'),
				        'filetype' => '.'.$ext,
						'filename' => $file

				    );
					$this->files_model->save_file($parameters);
					redirect(base_url().'filesimport');
				}
			}
			else{
				$this->load->view('files_insert');
			}
		}
	}
	public function delete_file()
	{
		$id = $this->uri->segment(3);
		$this->files_model->delete_file($id);
		redirect(base_url().'filesimport');
	}
	public function trash()
	{
		$data["fetch_data"] = $this->files_model->fetch_trash_data();  
		$this->load->view('files_list_trash', $data);
	}

	public function view_file()
	{
		$id = $this->uri->segment(3);
		$data['file_data'] = $this->files_model->fetch_single_item($id);
	    $this->load->view('files_view', $data);
	}
}
