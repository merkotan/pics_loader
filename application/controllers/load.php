<?php 

class Load extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		//$this->load->library('session');
		$this->load->model('Loadmodel');
	}

	function index()
	{
		$this->load->view('MenuView');
		$this->load->view('Hello');	
	}

//если нажата кнопка sub(==submit), візіваем стандартную фуекцию загрузки файла с заданной конфигурацией

	function file_upload(){
		$this->load->view('header');
		$this->load->view('navbar');

		$sub = $this->input->post('sub');
		if (!$sub) 
			$this->load->view('loadform');
		else{
			$path='./images/';
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|png|jpeg|bmp';
			$this->load->library('upload', $config);
			//$thisfile = $path.$_FILES['picfile']['name'];
			$success=$this->upload->do_upload('picfile');
			if (!$success){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('loadform',$error);
				echo 'ERROR'.$error;
			}
			else{
				$filedata=array('upload_data'=>$this->upload->data());
				$thisfile = $this->upload->data(); // получаем информацию о загруженном файле
        		$this->Loadmodel->loadPicsByPath($thisfile);
				$this->load->view('upload_success',$filedata);
			}
		}
		$this->load->view('footer');
	}

	function viewpath(){
			$this->load->view('header');
			$this->load->view('navbar');
			$this->load->view('view_filter');
			$sub = $this->input->post('sub');
			if ($sub) {
				$size=$this->input->post('filesize');
				$size2=$this->input->post('filesize2');
				$pictures=$this->Loadmodel->viewPicsBySize($size,$size2);
				$data['pictures']=$pictures;
				$data['title']='TITLE';
    	//	var_dump($pictures)	;
				$this->load->view('view_success',$data);	
			}
			else{
				$pictures=$this->Loadmodel->viewPicsByPath();
				$data['pictures']=$pictures;
				$data['title']='TITLE';
    	//	var_dump($pictures)	;
				$this->load->view('view_success',$data);
			}
			$this->load->view('footer');
	}

	function blob_upload(){
		$this->load->view('header');
		$this->load->view('navbar');
		$sub = $this->input->post('sub');
			$path='./images/';
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|png|jpeg|bmp';
			$this->load->library('upload', $config);

		if (!$sub) 
			$this->load->view('loadform2');
		else{
			$success=$this->upload->do_upload('picfile');
			$filedata=array('upload_data'=>$this->upload->data());
			$thisfile = $this->upload->data(); // получаем информацию о загруженном файле
			$filename=$path.$_FILES['picfile']['name'];
			$this->Loadmodel->loadPicsByBlob($filename, $thisfile);
			
			$this->load->view('upload_success',$filedata);
			}
		$this->load->view('footer');
	}

	function viewBlob(){
			$this->load->view('header');
			$this->load->view('navbar');
			//$this->load->view('view_filter');
			//$sub = $this->input->post('sub');
			$pictures=$this->Loadmodel->viewPicsByblob();
				$data['pictures']=$pictures;
				$data['title']='TITLE';
				$this->load->view('view_successb',$data);
			
			$this->load->view('footer');
	}

}
?>