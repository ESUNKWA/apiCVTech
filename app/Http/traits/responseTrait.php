<?php

namespace App\Http\traits;

trait responseTrait{
    /**
     * Cette fonction return le resultat de la requête en cas de success.
     *
     * @param string $message
     * @param array $data
     * @return void
     */
    public function responseSuccess( string $message, array $data = [], string $token = null ) {

        $response = [
            "_status" => 1,
            "_msg" => $message
        ];

        if( $token != null ) {
            $response['_access'] = $token;
        }

        if( count( $data ) > 0 ){
            $response['_data'] = $data;
        }

        return response()->json($response, 200);
    }

    /**
     * Cette fonction return le resultat de la requête en cas d'erreur.
     *
     * @param String $message
     * @return void
     */
    public function responseError(String $message) {

        $response = [
            "_status" => 0,
            "_datas" => $message
        ];

        return response()->json($response, 401);
    }

}
