<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileFormRequest;

class UserController extends Controller
{
    public function profile(){
        return view('site.profile.profile');
    }

    public function profileUpdate(UpdateProfileFormRequest $request){
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
            // armazena o arquivo dentro da pastas users ue fica em storage/app/public
            $uploadFile = $request->image->storeAs('users',$nameFile);
            $dataform['image'] = $nameFile;
            if(!$uploadFile)
                return redirect()
                                ->back()
                                ->with('error','Ocorreu um erro ao tentar fazer upload da imagem');
        }
        
        $user['image'] = $dataform['image'];
       
        $update = $user->update();

        if ($update)
            return redirect()
                            ->route('profile') 
                            ->with('success','Perfil atualizado com sucesso!!');

        return redirect()
        ->back() 
        ->with('error','Ocorreu um erro ao tentar atualizar o perfil');
    }
}
