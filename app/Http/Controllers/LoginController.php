<?php

namespace estoque\Http\Controllers;

use Auth;
use Request;
//use \Illuminate\Http\Request;

use estoque\Http\Requests;
use estoque\Http\Controllers\Controller;



class LoginController extends Controller
{
    public function login(){
      $credenciais = Request::only('email', 'password');
      if (Auth::attempt($credenciais)) {
        return 'Usuario NOME logado com sucesso!';
      }

      return 'As credenciais não são validas.';
    }
}
