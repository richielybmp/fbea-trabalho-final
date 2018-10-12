<?php

require '../vendor/autoload.php';

class FilmeController {

    public function getFilmes($url) {
        $myClient = new GuzzleHttp\Client([
            'headers' => ['user-Agent' => 'MyReader']
        ]);

        $response = $myClient->request('GET', $url);

        if($response->getStatusCode() == 200){
            if($response->hasHeader('content-length')){
                $contentLength = $response->getHeader('content-length')[0];
                //echo 'Dados '.$contentLength;

                //resposta da API
                $filmes = json_decode($response->getBody());

                return $filmes;
            }


        }

    }
}

?>