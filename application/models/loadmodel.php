<?php 
	class Loadmodel extends CI_Model{

		function __construct(){
		 parent::__construct();
		}
//Загружаем путь к картике  и размер в БД 
		function loadPicsByPath($thisfile){
			$add['path'] = "../../images/".$thisfile['file_name'];
			$add['size'] = $thisfile['file_size'];
			$this->db->insert('pictures',$add);
		}

		function viewPicsByPath(){
			$res=$this->db->get('pictures');
			$items=$res->result_array();
			return $items;
		}

		function viewPicsBySize($size,$size2){
			if (!$size) $size=0;
			if (!$size2) $size2=10000;
			$this->db->select('*');
			$this->db->from('pictures');
			$this->db->where('size > '.$size.' and size <'.$size2);
			$res=$this->db->get();
			//$res=$this->db->get_where('pictures', array('size >' =>$size));
			$items=$res->result_array();
			return $items;	
		}
	
		function loadPicsByBlob($filename, $thisfile){
			$filesize=$_FILES['picfile']['size'];
			$file=fopen($filename,'rb');
			$img=fread($file,$filesize);// прочитали файл-картинку
			$add['pic'] = $img;
			$add['size'] = $thisfile['file_size'];
			$this->db->insert('picturesb',$add);
		}

		function viewPicsByblob(){
			$res=$this->db->get('picturesb');
			$items=$res->result_array();
			return $items;
		}
}
 ?>