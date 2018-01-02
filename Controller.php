<?php
/*
*/
namespace Helpers;
/*
Helpers\Controller
========================
Provide simple static functions for handling Phalcon Controllers and responses
*/
class Controller {
    /*
    Helpers\Controller::jsonify($iterable)
    ============================================
    Sends Content-Type: application/json header and echoes JSON response
    */
    public static function jsonify($iterable){
        header('Content-Type: application/json');
        echo json_encode($iterable);
    }

    public static function unauthorized($iterable){
        header("HTTP/1.1 401 Unauthorized");
        if($iterable){
            echo json_encode($iterable);
        } else {
            echo 'ACCESS DENIED';
        }
    }

    public static function sanitizeUrl($url){
        $illegal = array(' ','!','"','#','$','%','&');
        $safe = array('%20','%21','%22','%23','%24','%25','%26');
        $url = str_replace($illegal,$safe,$url);
        return $url;
    }

    public static function sanitizeFileName($file_name){
        $patterns = array();
        $patterns[0] = "/[#(),!?\[\]{}]/";
        $patterns[1] = "/ /";
        $patterns[2] = "/&/";
        $patterns[3] = "/%/";
        $replacements = array();
        $replacements[0] = '';
        $replacements[1] = '_';
        $replacements[2] = '_and_';
        $replacements[3] = '_percent_';
        return preg_replace($patterns,$replacements,$file_name);
    }

    public static function xml_to_json($xml) {


        self::normalizeSimpleXML(simplexml_load_string($xml), $result);
        return json_encode($result);
    }

    public static function normalizeSimpleXML($obj, &$result) {
        $data = $obj;
        if (is_object($data)) {
            $data = get_object_vars($data);
        }
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $res = null;
                self::normalizeSimpleXML($value, $res);
                if (($key == '@attributes') && ($key)) {
                    $result = $res;
                } else {
                    $result[$key] = $res;
                }
            }
        } else {
            $result = $data;
        }
    }
}
