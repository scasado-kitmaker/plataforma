<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Webservices_model extends CI_Model
{	
	//Insertar datos en la tabla indicada
	public function insert($table,$data)
	{
		return $this->db->insert($table , $data);
	}
	
	public function getTokenModel()
	{
		$random_transaction_token=rand();

		//Datos de autenticacion
		//$user="scasado";
		//$pass="BRskzyTE";
		$userpass="scasado:BRskzyTE";

		//URL para el request
		$token_url="http://52.30.94.95/token";

		//String con el request del token
		$token_request='<?xml version="1.0" encoding="UTF-8"?>'.
		'<request>'.
		'<transaction>'.$random_transaction_token.'</transaction>'.
		'</request>';

		// create curl resource 
		$ch = curl_init(); 

		// Pasamos los datos para autenticarse
		curl_setopt($ch, CURLOPT_USERPWD, $userpass);

        // set url 
		curl_setopt($ch, CURLOPT_URL, $token_url); 

		//xml que enviamos
		curl_setopt($ch, CURLOPT_POSTFIELDS, $token_request);

		//return the transfer as a string 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 

        // $output contains the output string 
		$output = curl_exec($ch); 

        // close curl resource to free up system resources 
		curl_close($ch);  
		return $output;   
	}
}
?>
