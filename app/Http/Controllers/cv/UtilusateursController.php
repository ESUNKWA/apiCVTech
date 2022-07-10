<?php

namespace App\Http\Controllers\cv;

use App\Models\cr;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\traits\responseTrait;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UtilusateursController extends Controller
{
    use responseTrait;
    /**
     * Liste des utilisateurs par ordre alphabétique.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $listeUtilisateurs = User::orderBy('name', 'ASC')->get();

            return $this->responseSuccess('Liste des utilisateurs',json_decode($listeUtilisateurs));

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Cette fonction permet de créer un nouvelle utilisateur dans la bd.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        try {
            //Validation des données
            $validation = Validator::make($input, [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
            ]);

            if( !$validation->fails() ) {

                //Insertion dans la bd
                $insert = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]);

                return $this->responseSuccess( 'L\'utilisateur [ '. $insert->name .' ] a bien été ajouté');

            }else {
                return $this->responseError($validation->errors());
            }


        } catch (\Throwable $th) {
            return $th->getMessage();
        }

    }

    /**
     *
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
    }
}
