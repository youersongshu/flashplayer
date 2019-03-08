<?php
/**
 * HTTP
 *
 * @copyright	youku.com
 * @author	   zhangjunbao	
 */
class Http
{

	 /**
     * GET
     * @param $url 目标URL
     * @param $parameters 参数(key=>value)
     * return string
     */
    static public function get($url,$parameters=array(),$headers=array()) {
        return self::request('GET',$url,$parameters,$headers);
    }
    /**
     * POST
     * @param $url 目标URL
     * @param $parameters 参数(key=>value)
     * return string
     */
    static public function post($url,$parameters=array(),$headers=array()) {
        return self::request2('POST',$url,$parameters,$headers);
    }

    static private function request($method,$url,$parameters=array(),$headers=array()) {
		$paramStr = is_array($parameters) ? http_build_query($parameters) : $parameters;
		$result = null;
		$headers_ext = 'User-Agent: YOUKU.COM API PHP5 Client 1.0 '."\r\n";
		$headers = !empty($headers) ? $headers : 'Content-type: application/x-www-form-urlencoded';
		// GET
		if ($method=='GET') {
			$url .= stristr($url,'?')==FALSE ? '?' : '&';
			$url .= $paramStr;
			$paramStr = null;
			$headers_ext .= 'Content-length: 0';
		}
		else {
			$headers_ext .= 'Content-length: ' . strlen($paramStr);
		}

		$opts = array(
			'http' => array(
				'method' => $method,
				'header' => $headers .  "\r\n". $headers_ext,
				'content' => $paramStr
			)
		);
		//var_dump($opts);
		$context = stream_context_create($opts);
		$fp = fopen($url,'r',false,$context);
		if ($fp) {
			while(!feof($fp)) $result .= @fgets($fp,4096);
			fclose($fp);
		}
		return $result;
    }
	static private function request2($method,$url,$parameters=array(),$headers=array()) {
		$paramStr = is_array($parameters) ? http_build_query($parameters) : $parameters;
        $ch = curl_init();
		curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
		// post
        if ($method=='POST') {
            curl_setopt($ch,CURLOPT_POST,true);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$paramStr);
		} else {
			$url .= '?' . $paramStr;
		}
		//var_dump ($url);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_TIMEOUT,20);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
	static private function request3($method,$url,$parameters=array(),$headers=array()) {
		// Convert the data array into URL Parameters like a=b&foo=bar etc.
		$data = is_array($parameters) ? http_build_query($parameters) : $parameters;
	 
		// parse the given URL
		$url = parse_url($url);
	 
		if ($url['scheme'] != 'http') { 
			die('Error: Only HTTP request are supported !');
		}
		// extract host and path:
		$host = $url['host'];
		$path = $url['path'];
		$port = !empty($url['port']) ? $url['port'] : 80;
		 
		// open a socket connection on port $port - timeout: 30 sec
		$fp = fsockopen($host, $port, $errno, $errstr, 30);
	 
		if ($fp){
	 
			// send the request headers:
			$cmd = '';
			$cmd .= "POST $path HTTP/1.1\r\n";
			$cmd .= "Host: $host:$port\r\n";
			$cmd .= "Accept: */*\r\n";
			$cmd .= "User-Agent: youku.com\r\n";
	 
			//if ($referer != '')
			//	fputs($fp, "Referer: $referer\r\n");
	 
			$cmd .= "Content-type: application/x-www-form-urlencoded\r\n";
			$cmd .= "Content-length: ". strlen($data);
			$cmd .= "\r\n\r\n";
			$cmd .= $data;
			fputs($fp, $cmd);
	 
			$result = ''; 
			while(!feof($fp)) {
				// receive the results of the request
				$result .= fgets($fp, 4096);
			}
			//echo "<" . $result;
		}
		else { 
			// return null when error
			return '';
			return array(
				'status' => 'err', 
				'error' => "$errstr ($errno)"
			);
		}
	 
		// close the socket connection:
		fclose($fp);
	 
		// split the result header from the content
		$result = explode("\r\n\r\n", $result, 2);
	 
		$header = isset($result[0]) ? $result[0] : '';
		$content = isset($result[1]) ? $result[1] : '';
	 
		return $content;
		// return as structured array:
		return array(
			'status' => 'ok',
			'header' => $header,
			'content' => $content
		);
	}
}
?>
