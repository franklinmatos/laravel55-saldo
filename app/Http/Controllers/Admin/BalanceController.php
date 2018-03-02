<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\MoneyValidationFormRequest;
use App\User;
use App\Models\Historic;
use App\Models\Balance;

class BalanceController extends Controller
{
    private $totalPaginas = 5;

    public function index(){
        
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;
    
        return view('admin.balance.index',compact('amount'));   
    }

    public function deposit(){
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request){

        $balance = auth()->user()->balance()->firstOrCreate([]);

        $response = $balance->deposit($request->value);
        if($response['success']){
            return redirect()
                                ->route('admin.balance')
                                ->with('success',$response['message']);
        }
        return redirect()
                        ->back()
                        ->with('error',$response['message']);
    }

    public function withdraw(){
        return view('admin.balance.withdraw');
    }

    public function withdrawStore(MoneyValidationFormRequest $request){

        $balance = auth()->user()->balance()->firstOrCreate([]);

        $response = $balance->withdraw($request->value);
        if($response['success']){
            return redirect()
                ->route('admin.balance')
                ->with('success',$response['message']);
        }
        return redirect()
            ->back()
            ->with('error',$response['message']);
    }

    public function transfer(){
        return view('admin.balance.transfer');
    }

    public function confirmTransfer(Request $request, User $user){
        $email = $user->getEmail($request->email);


        if(!$email){
            return redirect()
                ->back()
                ->with('error','Usuário Informado não foi Encontrado!');
        }

        if($email->id === auth()->user()->id)
            return redirect()
                            ->back()
                            ->with('error','Não pode transferir par você mesmo!');

        $balance = auth()->user()->balance;

        return view('admin.balance.transfer-confirm',compact('email','balance'));
    }

    public function transferStore(MoneyValidationFormRequest $request, User $user)
    {

        if (!$sender =$user->find($request->email_id)) {
            return redirect()
                ->route('balance.transfer')
                ->with('success','Recebedor não encontrado!');
        }
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->transfer($request->value, $sender);

        if($response['success']){
            return redirect()
                ->route('admin.balance')
                ->with('success',$response['message']);
        }
        return redirect()
            ->route('admin.balance')
            ->with('error',$response['message']);
    }
    
    public function historic(Historic $historic){

        $historics = auth()->user()->historics()
                    ->with(['userEnv'])
                    ->paginate($this->totalPaginas);
        $types = $historic->type();
        return view('admin.balance.historic',compact('historics', 'types'));
    }
}
