<?php

namespace App\Http\Controllers\cv;

use App\Models\cr;
use App\Models\Experiences;
use Illuminate\Http\Request;
use App\Http\traits\responseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ExperiencesProController extends Controller
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
        $inputs = $request->all();
        // Validation des données
        $errors = [
            'p_user_id' => 'required',
            'p_date_debut' => 'required|date',
            'p_date_fin' => 'required|date',
            'p_libelle_poste' => 'required|min:4'
        ];

        $erreurs = [
            'p_user_id.required' => 'Utilisateur inconnu',
            'p_date_debut.required' => 'La date de debut est réquis',
            'p_date_debut.date' => 'Veuillez saisir une date valide',
            'p_date_fin.required' => 'La date de fin  est réquis',
            'p_date_fin.date' => 'Veuillez saisir une date valide',
            'p_libelle_poste.required' => 'Le libelle du poste est réquis',
            'p_libelle_poste.min' => 'Veuillez saisir un poste valide',
        ];


        $validation = Validator::make($inputs, $errors, $erreurs);

        if( !$validation->fails() ) {

            try{
                $insertion = Experiences::create([
                    'individu' => $request->p_individu,
                    'r_date_debut' => $request->p_date_debut,
                    'r_date_fin' => $request->p_date_fin,
                    'r_libelle_poste' => $request->p_libelle_poste,
                    'r_description' => $request->p_description,
                ]);

                if( $insertion->id ){
                    return $this->responseSuccess('Enregistrement effectué avec succès');
                }

            }catch(\Exception $e){
                return $this->responseError($e->getMessage());
            }



        }else {
            return $validation->errors();
        }
    }

    /**
     * Display the specified resource.
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
