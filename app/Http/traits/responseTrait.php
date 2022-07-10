<?php

namespace App\Http\traits;

trait responseTrait{
    /**
     * Cette fonction return le resultat de la requête en cas de success.
     *
     * @param array $data
     * @return void
     */
    public function responseSuccess( array $data ) {

        $response = [
            "_status" => 1,
            "_datas" => $data
        ];

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
