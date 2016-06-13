<?php
/**
 * ARTIK Cloud helper class that communicates to ARTIK Cloud
 * */
class ArtikCloudProxy {
    # General Configuration
    const CLIENT_ID = "5ae418379d754a05a6077dc6eb1c4d38";
    const DEVICE_ID = "c34e9556019d452eaf463c4eba27b7a8";
    const API_URL = "https://api.artik.cloud/v1.1";
    const ACCOUNT_URL = "https://accounts.artik.cloud/authorize";





    # API paths
    const API_USERS_SELF = "/users/self";
    const API_MESSAGES_LAST = "/messages/last?sdids=<DEVICES>&count=<COUNT>";
    const API_MESSAGES = "/messages/last?sdids=<DEVICES>&count=<COUNT>&startDate=<SDATE>&endDate<EDATE>&fieldPresence=ppg7";
    const API_MESSAGES_SPEC = "/messages/analytics/histogram?endDate=<EDATE>&field=<THING>&interval=minute&sdid=<DEVICES>&startDate=<SDATE>";

    const AUTH_INFO = "client_id=<CLIENT_ID>&response_type=token&redirect_uri=http://localhost/HACK4&state=abcdefgh&scope=read,write";


    const API_MESSAGES_POST = "/messages";
     
    # Members
    public $token = null;
    public $user = null;
     
    public function __construct(){ }
     
    /**
     * Sets the access token and looks for the user profile information
     */
    public function setAccessToken($someToken){
        $this->token = $someToken;
        $this->user = $this->getUsersSelf();
    }
     
    /**
     * API call GET
     */
    public function getCall($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization:bearer '.$this->token));
        $json = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($status == 200){
            $response = json_decode($json);
        }
        else{
            var_dump($json);
        	$response = $json;
        }

       return $response;
    }
     
    /**
     * API call POST
     */
    public function postCall($url, $payload){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, (String) $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: bearer '.$this->token));
        $json = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($status == 200){
            $response = json_decode($json);
        }
        else{
            var_dump($json);
            $response = $json;
        }
        return $response;
    }
     
    /**
     * GET /users/self API
     */
    public function getUsersSelf(){
        return $this->getCall(ArtikCloudProxy::API_URL . ArtikCloudProxy::API_USERS_SELF);
    }
     
    /**
     * POST /message API
     */
    public function sendMessage($payload){
        return $this->postCall(ArtikCloudProxy::API_URL . ArtikCloudProxy::API_MESSAGES_POST, $payload);
    }
     
    /**
     * GET /historical/normalized/messages/last API
     */
    public function getMessagesLast($deviceCommaSeparatedList, $countByDevice){
        $apiPath = ArtikCloudProxy::API_MESSAGES_LAST;
        $apiPath = str_replace("<DEVICES>", $deviceCommaSeparatedList, $apiPath);
        $apiPath = str_replace("<COUNT>", $countByDevice, $apiPath);

        return $this->getCall(ArtikCloudProxy::API_URL.$apiPath);

    }
    public function getMessages($deviceCommaSeparatedList, $countByDevice, $startDate, $endDate){
        $apiPath = ArtikCloudProxy::API_MESSAGES;
        $apiPath = str_replace("<DEVICES>", $deviceCommaSeparatedList,  $apiPath);
        $apiPath = str_replace("<COUNT>",   $countByDevice,             $apiPath);
	    $apiPath = str_replace("<SDATE>",   $startDate,                 $apiPath);
	    $apiPath = str_replace("<EDATE>",   $endDate,                   $apiPath);
        return $this->getCall(ArtikCloudProxy::API_URL.$apiPath);
    }
    public function getMessagesSpec($deviceCommaSeparatedList, $countByDevice, $startDate, $endDate, $field){
        $apiPath = ArtikCloudProxy::API_MESSAGES_SPEC;
        $apiPath = str_replace("<DEVICES>", $deviceCommaSeparatedList,  $apiPath);
        #$apiPath = str_replace("<COUNT>",   $countByDevice,             $apiPath);
        $apiPath = str_replace("<SDATE>",   $startDate,                 $apiPath);
        $apiPath = str_replace("<EDATE>",   $endDate,                   $apiPath);
        $apiPath = str_replace("<THING>",   $field,                     $apiPath);

        return $this->getCall(ArtikCloudProxy::API_URL.$apiPath);

    }






}
