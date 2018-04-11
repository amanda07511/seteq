<?php class Baja_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}


	public function eliminaDocumento($idDocumento){
		//delete from TABLA where ID =?
		$this->db->where('idDoc', $idDocumento);
		$this->db->delete('documento');

		return TRUE;
	}

	public function eliminaUser($idUser){
		//delete from TABLA where ID =?
		$this->db->where('idUser', $idUser);
		$this->db->delete('user');

		return TRUE;
	}	

}