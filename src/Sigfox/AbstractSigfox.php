<?php



namespace Sigfox;


abstract class AbstractSigfox{
    const API_ENDPOINT = "https://backend.sigfox.com";

    protected $credentials = array(
        'user' => "",
        'password' => "",
    );

    protected $response;
    protected $response_code;

    public function __construct($user, $password)
    {
        $this->credentials['user'] = $user;
        $this->credentials['password'] = $password;
    }


    protected function makeGetRequest($uri, $params = array()) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this::API_ENDPOINT . $uri . '?' . http_build_query($params),
            CURLOPT_USERAGENT => '',
        ));
        curl_setopt($curl, CURLOPT_USERPWD, $this->credentials['user'] . ":" . $this->credentials['password']);

        $this->response = curl_exec($curl);
        $this->response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    }


    protected function makePostRequest($uri, $params = array())
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this::API_ENDPOINT . $uri);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,
            http_build_query($params));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERPWD, $this->credentials['user'] . ":" . $this->credentials['password']);


        $this->response = curl_exec($curl);
        $this->response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    }

    /**
     * Return latest HTTP response code
     * @return integer HTTP code of latest response
     */
    public function getResponseCode() {
        return $this->response_code;
    }

}
