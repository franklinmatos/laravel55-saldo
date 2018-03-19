<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DespesaValidationFormRequest;
use App\Models\Despesas;
use app\http\business\DespesaBusiness;



class DespesaController extends Controller
{
    private $totalPaginas = 10;
    
    public function despesa(){
       
        $despesas = auth()->user()->depesas()
                    ->paginate($this->totalPaginas);
                   
     return view('admin.despesas.index',compact('despesas'));   
     
    }

    public function addDespesa(){
        return view('admin.despesas.addDespesa');
    }

    public function storeDespesa(DespesaValidationFormRequest $request) {
      
        $dadosForm = $request->all();
       
       
        $despesa = new Despesas();
        
        $despesa->user_id = auth()->user()->id;
        $despesa->descricao = $dadosForm['descricao'];
        $despesa->valor = $dadosForm['valor'];
        $despesa->data = $dadosForm['data'];
        
        $retorno =$despesa->save();
       
        if($retorno == true){
            return redirect()
                            ->route('admin.despesa')
                            ->with('success','A Despesa foi cadastrada com sucesso!');
            
        }else{
            return redirect()
            ->back()
            ->with('error','Ocorreu um erro ao tentar cadastrar a despesa!');
           
        }
        
    }
} 
