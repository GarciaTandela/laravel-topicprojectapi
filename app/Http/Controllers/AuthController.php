<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\User;
use App\Http\Resources\User as UserResource;

class AuthController extends Controller
{
    //
    public function register(UserRegisterRequest $request)
    {

    	// Cadastra os dados na base de dados
    	$user = User::create([

    		'email' => $request->email,
    		'name' => $request->name,
    		'password' => bcrypt($request->password),

    	]);

    	//Ele irá tentar autenticar o usuário
    	if (!$token = auth()->attempt($request->only(['email','password']))) 
    	{
    		return abort(401);
    	}

        //Retorna um objecto json com dados adicionais, nesse caso o nosso token
    	return (new UserResource($request->User()))->additional([

    		'meta' => 
    		[

    			'token' => $token

    		]

    	]);

    }

    public function login(UserLoginRequest $request)
    {
        //Ele irá tentar autenticar o usuário
        if (!$token = auth()->attempt($request->only(['email','password']))) 
        {
            return response()->json([

                'errors' => [

                    'email' => ['Sorry we can not find with these details']

                ],

            ], 422

        );

        }

        //Retorna um objecto json com dados adicionais, nesse caso o nosso token
        return (new UserResource($request->User()))->additional([

            'meta' => 
            [

                'token' => $token

            ]

        ]);

    }

    public function user(Request $request)
    {
        return new UserResource($request->User());
    }

    public function logout()
    {
        auth()->logout();
    }

}
