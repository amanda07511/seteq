<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  CDocumentos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("alta_model");

		if(!$this->session->userdata('idUser') || !$this->session->userdata('email')){
			redirect('/welcome', 'refresh');
		}
	}

	public function index()
	{
		$this->load->helper("url");
		$this->load->view('/head');
		$this->load->view('/header2');
		$this->load->view('/sectionMenuAdmin');
		$this->load->view('/sectionUsuarios');
	}

	public function download($name){
        if(!empty($name)){
            //load download helper
            $this->load->helper('download');
            $data = file_get_contents('./documentos/'.$name); 
       		force_download($name,$data); 
        }
    }

    public function subirDocumento(){
    	$status = "";
    	$msg = "";

		$config['upload_path'] = './documentos/';
        $config['allowed_types'] = '*';
        
        $this->load->library('upload',$config);

        if (!$this->upload->do_upload('userfile')) {
        	$status = 'error';
            $msg = $this->upload->display_errors('', '');
        } else {

            $file_info = $this->upload->data();
           
            $documento = array();
			$documento['titulo'] = $this->input->post('titleDoc');
			$documento['file'] = $file_info['file_name'];
			$documento['carpeta'] = $this->input->post('carpeta');
			$documento['created'] = date("Y-m-d H:i:s");
			$documento['modified'] = date("Y-m-d H:i:s");

           	$subir = $this->alta_model->insertaDoc($documento);
           	//print_r ($documento);
           	//print_r ($subir);
           //$status = "success";
           //$msg = "File successfully uploaded".$file_info['file_name'];
           if($subir == TRUE){
				$status = "success";
                $msg = "File successfully uploaded";
            }
            else{
                $status = "error";
                $msg = "Ops, something went wrong when saving the file, please try again. ";
            }
        }
         echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function eliminarDocumento(){
		$status = "";
    	$msg = "";

		$this->load->model("baja_model");

		//tomamos la variable que viene de la peticion Ajax
		$idAvaluo = $this->input->post('idDoc');
		$delete = $this->baja_model->eliminaDocumento($idAvaluo);
		//echo "Im here"; 
		if( $delete == TRUE){
			$status = "success";
            $msg = "File successfully deleted";
		} else {
			$status = "error";
            $msg = "Ops, something went wrong when saving the file, please try again. ";
		}
		echo json_encode(array('status' => $status, 'msg' => $msg));
		
	}//fin de eliminarDocumento

	public function getDoc(){
		$this->load->model("consulta_model");
		$data = array();
		$id = $this->input->post('idDoc');
		$result = $this->consulta_model->getDoc($id);
		
		
		$ext = pathinfo( $result->file, PATHINFO_EXTENSION );
		$data['doc'] = $result;
		$data['ext'] = $ext;
		echo json_encode(array('data' => $data));

	}

	public function modificarDocumento($id){
    	$status = "";
    	$msg = "";

		$config['upload_path'] = './documentos/';
        $config['allowed_types'] = '*';
        
        $this->load->library('upload',$config);

        if (!$this->upload->do_upload('file')) {
        	$status = 'error';
            $msg = $this->upload->display_errors('', '');
        } else {

            $file_info = $this->upload->data();
           
            $documento = array();
			$documento['titulo'] = $this->input->post('titleDoc');
			$documento['file'] = $file_info['file_name'];
			$documento['carpeta'] = $this->input->post('carpeta');
			$documento['modified'] = date("Y-m-d H:i:s");

            $status = "success";
            $msg = "File successfully uploaded";

           	$subir = $this->alta_model->modificaDocumento($documento,$id);

           if($subir == TRUE){
				$status = "success";
                $msg = "File successfully uploaded";
            }
            else{
                $status = "error";
                $msg = "Ops, something went wrong when saving the file, please try again. ";
            }
        }
         echo json_encode(array('status' => $status, 'msg' => $msg));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */