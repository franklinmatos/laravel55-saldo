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
        
        $user = auth()->user();
       
        $dataform['image'] = $user->image;

        if($dataForm['password'] != null)
            $dataForm['password'] = bcrypt($dataForm['password']);
        else
            unset($dataForm['password']);
        
          
        if($request->hasFile('image') && $request->file('image')->isValid()){
            
            if($user->image)
                $name = $user->image;
                $name = $user->id.kebab_case($user->name);
           
            $extension = $request->image->extension();
            $nameFile = "$name.$extension";
            $dataform['image'] = $nameFile;
            $uploadFile = $request->image->storeAs('users',$nameFile);
           
            if(!$uploadFile)
                return redirect()
                                ->back()
                                ->with('error','Ocorreu um erro ao tentar fazer upload da imagem');
                               


        }

        $update = auth()->user()->update($dataForm);

        if ($update)
            return redirect()
                            ->route('profile') 
                            ->with('success','Perfil atualizado com sucesso!!');

        return redirect()
        ->back() 
        ->with('error','Ocorreu um erro ao tentar atualizar o perfil');
    }
}
