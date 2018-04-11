<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  CLogin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->helper(array('form','url'));
        $this->load->library(array('form_validation', 'email'));

	}

	public function index()
	{


	}

	public function session_active(){
		if(isset($this->session->userdata['tipo'])){
			redirect("cSistemaA");
		}else{
			redirect("welcome/?login=1");
		}

	}

	public function autenticar(){
		/*
		Pasamos las variables tipo POST
		de usuario y password a variables
		locales
		*/

		$usuario = $this->input->post('emailLogin');
		$password = $this->input->post('passwordLogin');


		/*Invocamos la metodo existeUsuario de 
		user_model para reviar si el usuario existe*/

		$datosUsuario = $this->usuario_model->login($usuario);

		/*Si datosUsuario es NULL sifnifica entonces 
		que el usuario no existe,  entonces 
		redireccionamos al metodo 'index' con una 
		variable temporal*/

		if(is_null($datosUsuario)) {
			redirect("welcome/?error=1");
		}
		/*Si la variable $datosUsuario
		NO ES NULA*/
		else if(!is_null($datosUsuario)) {

			
			/*Checamos que el password sea correcto
			con respecto a la base de datos
		
			Cuando usamos tres signos de igualdad
			indicamos que buscamos un valor indentico*/
			if($datosUsuario->password == md5($password)) {
				/*Si el password es identico creamos 
				variables de sesión

				Para crear variables de sesion necesitamos
				generar un arreglo con los datos 
				de sesión que queramos crear

				https://ellislab.com/codeigniter/user-guide/libraries/sessions.html
				*/
				$sesiones = array();
				$sesiones["idUser"] = $datosUsuario->idUser;
				$sesiones["email"] = $datosUsuario->email;
				$sesiones["nombre"] = $datosUsuario->nombre;
				$sesiones["apellido"] = $datosUsuario->apellido1;
				$sesiones["tipo"] = $datosUsuario->tipoUser;

				/*Usamos el metodo set_userdata para crear las 
				sesiones en base a los datos del arreglo*/
				$this->session->set_userdata($sesiones);

				/*Una vez que hemos creado las sesiones 
				redireccionamos a una sección del sition donde 
				unicamente puedas accesar si cuentas con una sesiòn 
				iniciada*/
				redirect("cSistemaA");
				

			}
			/*Si el password no coincide*/
			else {
				redirect("welcome/?error=1");
			}

		}

		
	}

	 public function logout() {
		 $this->session->sess_destroy();
		 redirect("welcome");
	 }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */