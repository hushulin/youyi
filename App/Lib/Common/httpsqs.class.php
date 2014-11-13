<?php

/**
 * @author wenliang 2013-7-13 上午11:14:29 httpsqs.class.php
 * tags
 */
class httpsqs
{

    /**
     *
     * @var unknown
     */
    public $httpsqs_host;

    /**
     *
     * @var unknown
     */
    public $httpsqs_port;

    /**
     *
     * @var unknown
     */
    public $httpsqs_auth;

    /**
     *
     * @var unknown
     */
    public $httpsqs_charset;

    /**
     * @class httpsqs
     * 
     * @name __construct
     * @todo
     *
     * @param string $host            
     * @param number $port            
     * @param string $auth            
     * @param string $charset            
     * @return boolean
     */
    public function __construct($host = '127.0.0.1', $port = 1218, $auth = '', $charset = 'utf-8')
    {
        $this->httpsqs_host = $host;
        $this->httpsqs_port = $port;
        $this->httpsqs_auth = $auth;
        $this->httpsqs_charset = $charset;
        return true;
    }

    /**
     * @class httpsqs
     * 
     * @name http_get
     * @todo
     *
     * @param unknown $query            
     * @return boolean string
     */
    public function http_get($query)
    {
        $socket = fsockopen($this->httpsqs_host, $this->httpsqs_port, $errno, $errstr, 5);
        if (! $socket) {
            return false;
        }
        $out = "GET {$query} HTTP/1.1\r\n";
        $out .= "Host: " . $this->httpsqs_host . "\r\n";
        $out .= "Connection: close\r\n";
        $out .= "\r\n";
        fwrite($socket, $out);
        $header = "";
        $line = trim(fgets($socket));
        $header .= $line;
        list ($proto, $rcode, $result) = explode(" ", $line);
        $len = - 1;
        while (($line = trim(fgets($socket))) != "") {
            $header .= $line;
            if (strstr($line, "Content-Length:")) {
                list ($cl, $len) = explode(" ", $line);
            }
            if (strstr($line, "Pos:")) {
                list ($pos_key, $pos_value) = explode(" ", $line);
            }
            if (strstr($line, "Connection: close")) {
                $close = true;
            }
        }
        if ($len < 0) {
            return false;
        }
        
        $body = fread($socket, $len);
        $fread_times = 0;
        while (strlen($body) < $len) {
            $body1 = fread($socket, $len);
            $body .= $body1;
            unset($body1);
            if ($fread_times > 100) {
                break;
            }
            $fread_times ++;
        }
        // if ($close) fclose($socket);
        fclose($socket);
        $result_array["pos"] = (int) $pos_value;
        $result_array["data"] = $body;
        return $result_array;
    }

    /**
     * @class httpsqs
     * 
     * @name http_post
     * @todo
     *
     * @param unknown $query            
     * @param unknown $body            
     * @return boolean unknown
     */
    public function http_post($query, $body)
    {
        $socket = fsockopen($this->httpsqs_host, $this->httpsqs_port, $errno, $errstr, 1);
        if (! $socket) {
            return false;
        }
        $out = "POST {$query} HTTP/1.1\r\n";
        $out .= "Host: " . $this->httpsqs_host . "\r\n";
        $out .= "Content-Length: " . strlen($body) . "\r\n";
        $out .= "Connection: close\r\n";
        $out .= "\r\n";
        $out .= $body;
        fwrite($socket, $out);
        $header = "";
        $line = trim(fgets($socket));
        $header .= $line;
        list ($proto, $rcode, $result) = explode(" ", $line);
        $len = - 1;
        while (($line = trim(fgets($socket))) != "") {
            $header .= $line;
            if (strstr($line, "Content-Length:")) {
                list ($cl, $len) = explode(" ", $line);
            }
            if (strstr($line, "Pos:")) {
                list ($pos_key, $pos_value) = explode(" ", $line);
            }
            if (strstr($line, "Connection: close")) {
                $close = true;
            }
        }
        if ($len < 0) {
            return false;
        }
        $body = @fread($socket, $len);
        // if ($close) fclose($socket);
        fclose($socket);
        $result_array["pos"] = (int) $pos_value;
        $result_array["data"] = $body;
        return $result_array;
    }

    /**
     * @class httpsqs
     * 
     * @name put
     * @todo
     *
     * @param unknown $queue_name            
     * @param unknown $queue_data            
     * @return boolean Ambigous
     */
    public function put($queue_name, $queue_data)
    {
        $result = $this->http_post("/?auth=" . $this->httpsqs_auth . "&charset=" . $this->httpsqs_charset . "&name=" . $queue_name . "&opt=put", $queue_data);
        if ($result["data"] == "HTTPSQS_PUT_OK") {
            return true;
        } else 
            if ($result["data"] == "HTTPSQS_PUT_END") {
                return $result["data"];
            }
        return false;
    }

    /**
     * @class httpsqs
     * 
     * @name get
     * @todo
     *
     * @param unknown $queue_name            
     * @return boolean Ambigous
     */
    public function get($queue_name)
    {
        $result = $this->http_get("/?auth=" . $this->httpsqs_auth . "&charset=" . $this->httpsqs_charset . "&name=" . $queue_name . "&opt=get");
        if ($result == false || $result["data"] == "HTTPSQS_ERROR" || $result["data"] == false) {
            return false;
        }
        return $result["data"];
    }

    /**
     * @class httpsqs
     * 
     * @name gets
     * @todo
     *
     * @param unknown $queue_name            
     * @return boolean Ambigous string>
     */
    public function gets($queue_name)
    {
        $result = $this->http_get("/?auth=" . $this->httpsqs_auth . "&charset=" . $this->httpsqs_charset . "&name=" . $queue_name . "&opt=get");
        if ($result == false || $result["data"] == "HTTPSQS_ERROR" || $result["data"] == false) {
            return false;
        }
        return $result;
    }

    /**
     * @class httpsqs
     * 
     * @name status
     * @todo
     *
     * @param unknown $queue_name            
     * @return boolean Ambigous
     */
    public function status($queue_name)
    {
        $result = $this->http_get("/?auth=" . $this->httpsqs_auth . "&charset=" . $this->httpsqs_charset . "&name=" . $queue_name . "&opt=status");
        if ($result == false || $result["data"] == "HTTPSQS_ERROR" || $result["data"] == false) {
            return false;
        }
        return $result["data"];
    }

    /**
     * @class httpsqs
     * 
     * @name view
     * @todo
     *
     * @param unknown $queue_name            
     * @param unknown $queue_pos            
     * @return boolean Ambigous
     */
    public function view($queue_name, $queue_pos)
    {
        $result = $this->http_get("/?auth=" . $this->httpsqs_auth . "&charset=" . $this->httpsqs_charset . "&name=" . $queue_name . "&opt=view&pos=" . $queue_pos);
        if ($result == false || $result["data"] == "HTTPSQS_ERROR" || $result["data"] == false) {
            return false;
        }
        return $result["data"];
    }

    /**
     * @class httpsqs
     * 
     * @name reset
     * @todo
     *
     * @param unknown $queue_name            
     * @return boolean
     */
    public function reset($queue_name)
    {
        $result = $this->http_get("/?auth=" . $this->httpsqs_auth . "&charset=" . $this->httpsqs_charset . "&name=" . $queue_name . "&opt=reset");
        if ($result["data"] == "HTTPSQS_RESET_OK") {
            return true;
        }
        return false;
    }

    /**
     * @class httpsqs
     * 
     * @name maxqueue
     * @todo
     *
     * @param unknown $queue_name            
     * @param unknown $num            
     * @return boolean
     */
    public function maxqueue($queue_name, $num)
    {
        $result = $this->http_get("/?auth=" . $this->httpsqs_auth . "&charset=" . $this->httpsqs_charset . "&name=" . $queue_name . "&opt=maxqueue&num=" . $num);
        if ($result["data"] == "HTTPSQS_MAXQUEUE_OK") {
            return true;
        }
        return false;
    }

    /**
     * @class httpsqs
     * 
     * @name status_json
     * @todo
     *
     * @param unknown $queue_name            
     * @return boolean Ambigous
     */
    public function status_json($queue_name)
    {
        $result = $this->http_get("/?auth=" . $this->httpsqs_auth . "&charset=" . $this->httpsqs_charset . "&name=" . $queue_name . "&opt=status_json");
        if ($result == false || $result["data"] == "HTTPSQS_ERROR" || $result["data"] == false) {
            return false;
        }
        return $result["data"];
    }

    /**
     * @class httpsqs
     * 
     * @name synctime
     * @todo
     *
     * @param unknown $num            
     * @return boolean
     */
    public function synctime($num)
    {
        $result = $this->http_get("/?auth=" . $this->httpsqs_auth . "&charset=" . $this->httpsqs_charset . "&name=httpsqs_synctime&opt=synctime&num=" . $num);
        if ($result["data"] == "HTTPSQS_SYNCTIME_OK") {
            return true;
        }
        return false;
    }
}
?>