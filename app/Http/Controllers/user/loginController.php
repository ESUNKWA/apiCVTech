<?php

namespace App\Http\Controllers\user;

use App\Models\rc;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\traits\responseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    use responseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function show(rc $rc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function edit(rc $rc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rc $rc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function destroy(rc $rc)
    {
        //
    }

    public function login(Request $request){

        $inputs = $request->all();

        //Validation des données

        $errors = [
            'email' => 'required',
            'password' => 'required',
        ];

        $erreurs = [
            'email.required' => 'L\'addresse email est réquis',
            'password.required' => 'Le mot de passe est réquis',
        ];

        $validation = Validator::make($inputs, $errors, $erreurs);

        if( !$validation->fails() ){

            try {

                //Enregistrement des données dans la base de données

                $utilisateur = User::where('email', '=', $request->email)->first();

                if(Hash::check($request->password, $utilisateur->password)){

                    // création du token;
                    $token = $utilisateur->createToken('auth_token')->plainTextToken;

                    return $this->responseSuccess('Utilisateur trouvé', [json_decode($utilisateur)], $token);

                }else{
                    return $this->responseError('');
                }

            } catch (\Exception $th) {
                return $this->responseError($th->getMessage());
            }

        }else{
            return $validation->errors();
        }

    }

    public function logout() {
        Auth::user()->tokens()->delete();
        return $this->responseSuccess('Vous êtes maintenant déconnecté');
    }
}
