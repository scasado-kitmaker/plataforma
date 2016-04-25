<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class plataforma extends CI_Controller {
 //Constructor del controlador
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Europe/Madrid');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('plataforma_model');
        $this->output->enable_profiler(false);        
	}
	public function index()
	{	
		$id_telefono = $this->session->userdata('username');
		$data['estado'] = $this->plataforma_model->getEstado($id_telefono); 
		$data['saldo'] = $this->plataforma_model->getSaldo($id_telefono); 
		$this->load->view('menu.php',$data);//Cambiar por login.php
	}
	public function alta()
	{
		
		$this->load->view('alta.php');
	}
	public function baja()
	{
		$this->load->view('baja.php');
	}
	public function aviso_saldo()
	{
		$this->load->view('aviso_saldo.php');
	}
	public function logs()
	{
		$this->load->view('logs.php');
	}
	public function about()
	{
		$this->load->view('about.php');
	}
	public function insert_servicio()
	{
		$id_telefono = $this->session->userdata('username');
		$this->load->library('form_validation');
		if($this->form_validation->run()===FALSE)
		{
			$data['servicio1']= $this->plataforma_model->getRegistradosServicio();
			$servicio=array(
				'telefono'=>$this->input->post('telefono'),
				);
			$test=array(
				'estado_alta'=>'1',
				);
			$log=array(
				'id_user'=>$this->input->post('telefono'),
				'date' => date('Y-m-d H:i:s'),
			);
			$this->plataforma_model->insert('servicio1',$servicio);
			$this->plataforma_model->insert('altaslogs',$log);
			$this->plataforma_model->updateEstado($id_telefono, $test);
			redirect(base_url());
		}
		{
			$this->load->view('baja');
		}

	}
	public function delete_servicio()
	{	
		$log=array(
			'id_user'=>$this->session->userdata('username'),
			'date' => date('Y-m-d H:i:s'),
			);
		
		$test=array(
			'estado_alta'=>'0',
			);
		$id_telefono = $this->session->userdata('username');

		$this->plataforma_model->deleteService($id_telefono);
		$this->plataforma_model->updateEstado($id_telefono, $test);
		$this->plataforma_model->insert('bajaslogs',$log);
		redirect(base_url());
	}
	public function update_saldo()
	{
		$id_telefono = $this->session->userdata('username');
		$saldo = array(
			'saldo'     => $this->input->post('quantity'),       
			);


		$this->plataforma_model->updateSaldo($id_telefono, $saldo);

		redirect(base_url());

	}



}
