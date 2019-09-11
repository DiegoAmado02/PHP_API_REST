<?php

class API{

	/**
	 * autenticación de acceso básica (Basic Auth)
	 * Ejemplo Authorization: Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==
	 *
	 * @param string $URL url para acceder y obtener un token
	 * @param string $usuario usuario
	 * @param string $password clave
	 * @return JSON
	 */
	static function Authentication($URL,$usuario,$password){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$URL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, "$usuario:$password");
		$result = curl_exec($ch);
		curl_close($ch);  
		return $result;
	}

	/**
	 * Enviar parámetros a un servidor a través del protocolo HTTP (POST).
	 * Se utiliza para agregar datos en una API REST
	 *
	 * @param string $URL URL recurso, ejemplo: http://website.com/recurso
	 * @param string $TOKEN token de autenticación
	 * @param array $ARRAY parámetros a envíar
	 * @return JSON
	 */
	static function POST($URL,$TOKEN,$ARRAY){
		$datapost = '';
		foreach($ARRAY as $key=>$value) {
		    $datapost .= $key . "=" . $value . "&";
		}

		$headers 	= array('Authorization: Bearer ' . $TOKEN);
		$ch 		= curl_init();
		curl_setopt($ch,CURLOPT_URL,$URL);
		curl_setopt($ch,CURLOPT_POST, 1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$datapost);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
		curl_setopt($ch,CURLOPT_TIMEOUT, 20);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch);
		curl_close ($ch);
		return $response;
	}

	/**
	 * Consultar a un servidor a través del protocolo HTTP (GET).
	 * Se utiliza para consultar recursos en una API REST
	 *
	 * @param string $URL URL recurso, ejemplo: http://website.com/recurso/(id) no obligatorio
	 * @param string $TOKEN token de autenticación
	 * @return JSON
	 */
	static function GET($URL,$TOKEN){
		$headers 	= array('Authorization: Bearer ' . $TOKEN);
		$ch 		= curl_init();
		curl_setopt($ch,CURLOPT_URL,$URL);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_TIMEOUT, 20);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch);
		curl_close ($ch);
		return $response;
	}

	/**
	 * Consultar a un servidor a través del protocolo HTTP (DELETE).
	 * Se utiliza para eliminar recursos en una API REST
	 *
	 * @param string $URL URL recurso, ejemplo: http://website.com/recurso/id
	 * @param string $TOKEN token de autenticación
	 * @return JSON
	 */
	static function DELETE($URL,$TOKEN){
		$headers 	= array('Authorization: Bearer ' . $TOKEN);
		$ch 		= curl_init();

		curl_setopt($ch,CURLOPT_URL,$URL);
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_TIMEOUT, 20);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch);
		curl_close ($ch);
		return $response;
	}

	/**
	 * Enviar parámetros a un servidor a través del protocolo HTTP (PUT).
	 * Se utiliza para editar un recurso en una API REST
	 *
	 * @param string $URL URL recurso, ejemplo: http://website.com/recurso/id
	 * @param string $TOKEN token de autenticación
	 * @param array $ARRAY parámetros a envíar
	 * @return JSON
	 */
	static function PUT($URL,$TOKEN,$ARRAY){
		$datapost = '';
		foreach($ARRAY as $key=>$value) {
		    $datapost .= $key . "=" . $value . "&";
		}

		$headers 	= array('Authorization: Bearer ' . $TOKEN);
		$ch 		= curl_init();
		curl_setopt($ch,CURLOPT_URL,$URL);
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch,CURLOPT_POST, 1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$datapost);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
		curl_setopt($ch,CURLOPT_TIMEOUT, 20);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch);
		curl_close ($ch);
		return $response;
	}

	/**
	 * Enviar parámetros a un servidor a través del protocolo HTTP (PATCH).
	 * Se utiliza para editar un atributo específico (recurso) en una API REST
	 *
	 * @param string $URL URL recurso, ejemplo: http://website.com/recurso/id
	 * @param string $TOKEN token de autenticación
	 * @param array $ARRAY parametros parámetros a envíar
	 * @return JSON
	 */
	static function PATCH($URL,$TOKEN,$ARRAY){
		$datapost = '';
		foreach($ARRAY as $key=>$value) {
		    $datapost .= $key . "=" . $value . "&";
		}

		$headers 	= array('Authorization: Bearer ' . $TOKEN);
		$ch 		= curl_init();
		curl_setopt($ch,CURLOPT_URL,$URL);
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($ch,CURLOPT_POST, 1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$datapost);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
		curl_setopt($ch,CURLOPT_TIMEOUT, 20);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch);
		curl_close ($ch);
		return $response;
	}

	/**
	 * Convertir JSON a un ARRAY
	 *
	 * @param json $json Formato JSON
	 * @return ARRAY
	 */
	static function JSON_TO_ARRAY($json){
		return json_decode($json,true);
	}
	
	static function intert(){
        $ids = Array(82518059,82518151,82518422,82518051,82518102,82518223,82518176,82518611,82518352,82518207,82518443,82518241,82518634,82518144);
        $unicef = new Unicef();
        for ($i = 0; $i < count($ids); $i ++){
            $unicef->insertDataCampana($ids[$i],82);
        }
    }
    static function extraction(){
        $datos = file_get_contents("http://192.168.100.152/unicefws/data");
        $array = API::JSON_TO_ARRAY($datos);
        return $array;
    }

    static function extractionSaving(){
        $datos = file_get_contents("http://192.168.100.152/unicefws/saving");
        $array = API::JSON_TO_ARRAY($datos);
        return $array;
    }

    /**
     * Enviar parámetros a un servidor a través del protocolo HTTP (POST) para obtener Token de autenticación
     *
     * @param string $url URL recurso, ejemplo: http://website.com/recurso
     * @param string $username usuario de autenticaón
     * @param string $password contraseña de autenticación
     * @return JSON
     */
    static function POSTAuth($username , $password){
        $url = "http://ws.agenciasunicef.com/api/Authenticate?username=oscar.quinche@interactivo.com.co&password=Unicef2019*";
        //$url = "http://ws.agenciasunicef.com/api/Authenticate";
        $data = Array(
            "username" => $username,
            "password" => $password
        );

        foreach ( $data as $key => $value) {
            $post_items[] = $key . '=' . $value;
        }

        $postdata = json_encode($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, 1);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Content-Length: 0'));
        $result = curl_exec($ch);
        curl_close($ch);
        $lines = explode("\n",$result);
        $token = explode(":",$lines[14]);
        return trim($token[1]);

    }

    static function POST_($url,$token, $json){

        $headers = array(
            "Content-Type: application/json; charset=utf-8",
            'HTTP/1.0 401 Unauthorized',
            "token: {$token}",
            "Content-Length: ". strlen($json)
        );

        $ch = curl_init($url);
        //curl_setopt($ch,CURLOPT_URL,urlencode($url));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$json);
        curl_setopt($ch, CURLOPT_USERPWD, "token: {$token}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);


        $response = curl_exec($ch);
        curl_close ($ch);
        $lines = explode("\n",$response);

        /*
         * $lines[0] => Respuesta del servidor
         * $lines[12] => Mensaje del error 400 Bad Request.
         * */

        return $lines;
    }
}
?>
