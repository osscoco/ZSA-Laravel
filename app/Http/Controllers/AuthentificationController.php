<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Managers\UserManager;

class AuthentificationController extends Controller
{
    protected $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function login(Request $request)
    {
        try {

            //Validations
            $validateUser = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|max:255'
            ]);

            //Vérification des validations
            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            //Recherche d'un email d'utilisateur (envoyé dans la requête) dans la base de données
            $user = User::where('email', $request['email'])->first();

            //Si un utilisateur existe pour cet email
            if ($user) {

                //Déclaration d'un objet composé des informations de connexions (envoyées dans la requête)
                $requestCredentials = [
                    'email' => $request['email'],
                    'password' => $request['password']
                ];

                //Si l'utilisateur n'a pas fournis les bonnes informations de connexion
                if(!Auth::attempt($requestCredentials)){

                    //Message JSON retourné
                    return response()->json([
                        'status' => false,
                        'message' => 'Les identifiants sont invalides',
                    ], 401);
                }

                //Sinon, Message JSON retourné
                return response()->json([
                    'status' => true,
                    'message' => 'Vous êtes connecté',
                    'token' => $user->createToken("API TOKEN")->plainTextToken
                ], 200);
            }
            else {

                //Message JSON retourné
                return response()->json([
                    'status' => false,
                    'message' => 'Les identifiants sont invalides',
                ], 401);
            }

        }
        catch (\Throwable $th) {

            //Message JSON retourné
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function register(Request $request)
    {
        //Essayer
        try {

            //Validations
            $validateUser = Validator::make($request->all(),
            [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'password' => 'required|max:255'
            ]);

            //Vérification des validations
            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            //Verification que l'email (envoyé en requête) de l'utilisateur n'existe pas déjà
            $userVerify = User::where('email', $request['email'])->first();

            //S'il existe
            if ($userVerify !== null)
            {
                //Message JSON retourné
                return response()->json([
                    'status' => false,
                    'message' => 'Un compte existe déjà avec cet email',
                    'data' => null
                ], 200);
            }
            //Sinon
            else
            {
                //Création de l'utilisateur
                $user = $this->userManager->create($request->all());

                //Sauvegarde de l'utilisateur en base de données
                $user->save();

                //Message JSON retourné
                return response()->json([
                    'status' => true,
                    'message' => 'Compte créé avec succès',
                    'data' => [
                        'user' => $user,
                    ]
                ], 200);
            }
        }
        //Si erreur
        catch (\Throwable $th) {

            //Message JSON retourné
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
