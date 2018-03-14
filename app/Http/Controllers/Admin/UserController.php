<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function profile(){
        return view('site.profile.profile');
    }

    public function profileUpdate(Request $request){
        $dataForm = $request->all();

        if($dataForm['password'] != null)
            $dataForm['password'] = bcrypt($dataForm['password']);
        
        $update = auth()->user()->update($dataForm);

        if ($update)
            return redirect()
                            ->route('profile') 
                            ->with('succes','Perfil Atualizado com Sucesso!!');

        return redirect()
        ->back() 
        ->with('error','Ocorreu um erro ao tentar atualizar o perfil');
    }
}
