<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\User;
use App\Http\Requests\MoneyValidation;


class BalanceController extends Controller
{
    public function index(){
    	
    	$amount = auth()->user()->balance;
    	
    	$dados = $amount ? $amount->amount : 0;
    	return view('admin.balance.index', compact('dados'));
    }

    public function deposit(){

    	return view('admin.balance.deposit');
    }

    public function store(MoneyValidation $request){

    	$balance = (auth()->user()->balance()->firstOrCreate([]));
        $resposta = $balance->depositar($request->saldo);
        
        if ($resposta['sucesso']) {

            return redirect()
                        ->route('admin.balance')
                        ->with('sucesso', $resposta['mensagem']);

            return redirect()
                        ->back()
                        ->with('error', $resposta['mensagem']);
        }
    }

    public function withdraw(){

        return view('admin.balance.withdraw');
    }  

    public function withdrawStore(MoneyValidation $request){

        $balance = (auth()->user()->balance()->firstOrCreate([]));
        $resposta = $balance->withdraw($request->saldo);
        
        if ($resposta['sucesso']) {

            return redirect()
                        ->route('admin.balance')
                        ->with('sucesso', $resposta['mensagem']);

            return redirect()
                        ->back()
                        ->with('error', $resposta['mensagem']);
        }
    }

    public function transfer(){

        return view('admin.balance.transfer');
    }

     public function confirmTransfer(Request $request, User $user){

        //pegar o saldo do usuario logado
        $balance = auth()->user()->balance;

        if(!$sender = $user->getSender($request->sender))
            return redirect()
                        ->route('admin.transfer')
                        ->with('error', "Destinatário não encontrado");

        if ($sender->id === auth()->user()->id)
            return redirect()
                        ->back()
                        ->with('error', "Não pode transferir valor a si mesmo");

        return view('admin.balance.confirmTransfer', compact('sender', 'balance'));
    }

    public function transferStore(MoneyValidation $request, User $user){

        dd($request->all());

        /*$balance = (auth()->user()->balance()->firstOrCreate([]));
        $resposta = $balance->withdraw($request->value, $request->sender_id);
        
        if ($resposta['sucesso']) {

            return redirect()
                        ->route('admin.balance')
                        ->with('sucesso', $resposta['mensagem']);

            return redirect()
                        ->back()
                        ->with('error', $resposta['mensagem']);
    }*/
}

}
