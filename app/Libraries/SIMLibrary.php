<?php

namespace App\Libraries;

class SIMLibrary
{
    protected $data;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
        
    /**
     * sendData
     *
     * @param  mixed $service_url
     * @param  mixed $method
     * @param  mixed $payload
     * @return array
     */
    public function sendData($service_url, $method, $payload = []) : array {
        $curl = service('curlrequest');

        $url = getenv('SIM_HOST') . $service_url;
        
        try {
            $posts_data = $curl->request($method, $url, [
                "headers" => [
                    "Accept" => "application/json",
                    "api-token" => getenv('API_KEY')
                ],
                'http_errors' => false,
                "form_params" => $payload
            ]);


            if ($posts_data->getStatusCode() == 200 || $posts_data->getStatusCode() == 201) {
                return [
                    'status' => true,
                    'body' => json_decode($posts_data->getBody(), true)
                ];
            }
            else {
                return [
                    'status' => false,
                    'body' => json_decode($posts_data->getBody(), true)
                ];
            }

        } catch (\Exception $e) {
            return [
                'status' => false,
                'body' => null,
                'message' => $e->getMessage()
            ];
            
        }
        
    }
}
