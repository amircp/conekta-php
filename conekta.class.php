<?php
/*************************************************
 *	
 *	@author: Amir Canto / http://www.twitter.com/amircp
 *	@date: September 19, 2013.
 *	@version: 1.1
 *	@class: 	Conekta
 *	@description: Conekta Class, get payments for your website! first version, very basic.
 *				  using Conekta 1.0 API
 *  

**/


class Conekta
{

	private $_apiKey = '';

	function __construct($key='')
	{

		$this->_apiKey = $key;  // Si no queremos usar setAccessToken...
	}


	public function setAccessToken($key)
	{
		$this->_apiKey = $key;
	}
	public function requestData($postData)
	{
		if(empty($this->_apiKey)) return 0;
		// Cabeceras HTTP extras para Conekta:
		$headers = array('Accept: application/vnd.conekta-v0.1.0+json',
						 'Content-type: application/json'
					);

		/*foreach($postData as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		$postData= substr($fields_string,0,strlen($fields_string) -1 );
		*/
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_USERPWD, $this->_apiKey.":");
		curl_setopt($ch,CURLOPT_URL, "https://api.conekta.io/charges");			 // URL API 
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  // Cabeceras API
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // No verificamos certificado SSL (no body cares).
		curl_setopt($ch, CURLOPT_POST, 1);				 // Peticiones POST
 		curl_setopt($ch, CURLOPT_POSTFIELDS,$postData);	 // Mandamos el Json
 		curl_setopt($ch, CURLOPT_HEADER,0);  			 //Retornar cabeceras 
 		curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);    //Retornar datos de llamada
		$respuesta = curl_exec($ch);					
		return $respuesta;
	}

	public function makePayment($data)
	{
		if(is_array($data))
		{	
			$data = json_encode($data);
			$response = $this->requestData($data);
			return json_decode($response);
		}
	}
	

}


?>
