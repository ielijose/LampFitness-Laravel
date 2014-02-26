<?php

class AuthController extends BaseController {

    public function doLogin()
    {
        $email = mb_strtolower(trim(Input::get('username')));
        $password = Input::get('password');
 
        if (Auth::attempt(['username' => $email, 'password' => $password]))
        {
            return Redirect::to('/');
        }

        return Redirect::back()->with('msg', 'Datos incorrectos, vuelve a intentarlo.');
    }
 
    public function doLogout()
    {
        Auth::logout();
        return Redirect::to('/login')->with('msg', 'Gracias por visitarnos!.');
    }
 
}