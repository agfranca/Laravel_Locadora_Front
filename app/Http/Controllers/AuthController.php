<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function autenticar(Request $request)
    {
        //Regras de validação
        $regras = [
            'email' => 'email',
            'password' => 'required'
        ];
        //Menssagens de Feedback
        $feedback = [
            'email.email' => 'O usuario (email) é obrigatório',
            'password.required' => 'A senha é obrigatória',
        ];
        //Validação do Formulario
        $request->validate($regras, $feedback);
        
        //echo "Usuario: $email | senha: $password";
        
        //Envio para o LOgin da API
        $response = Http::accept('application/json')
        ->post('https://locadoraxapi.herokuapp.com/api/auth/login',[
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);

        //dd($response->body());
        //dd( $request->get('email'));
        //Testar a resposta do Login da API

        $status = $response->collect($key = 'status');
        $message = $response->collect($key = 'message');

        //Se o Status for True é porque conseguiu Logar na API
        if ($status[0]) {
            $token = $response->collect($key = 'token');
            session_start();
            $_SESSION['email'] = $request->get('email');
            $_SESSION['token'] = $token[0];
             //Usuario Logado na API
            $usuariologado = Http::accept('application/json')
            ->withToken($token[0])
            ->get('https://locadoraxapi.herokuapp.com/api/me');
            $nome = $usuariologado->collect($key = 'name');
            $_SESSION['nome'] = $nome[0];
            return redirect()->route('index');
        }else{
            return view('login',[
            'email' => $request->get('email'),
            'message' => $message,
            ]);
        }
    }
    
    public function logout()
    {
        //Testar se a session foi iniciada
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        //Apargar o Token na API
        $logout = Http::accept('application/json')
            ->withToken($_SESSION['token'])
            ->post('https://locadoraxapi.herokuapp.com/api/auth/logout');
 
       //Destruir a Sessão
        session_destroy();
        unset( $_SESSION );

       //Retornar para Página de Login
       return view('login');
    }

}
