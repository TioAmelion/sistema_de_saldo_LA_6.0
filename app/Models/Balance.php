<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Balance extends Model
{
    public function depositar(float $value): Array {

    	DB::beginTransaction();

    	$total_before = $this->amount ? $this->amount : 0;

    	$this->amount += number_format($value, 2, '.', ',');
    	$sucess = $this->save();

    	$historic = auth()->user()->historics()->create(
    		[
    			'type'         => 'I', 
    			'amount'       => $value,
    			'total_before' => $total_before,
    			'total_after'  => $this->amount,
    			'data'         => date('Ymd'),
    		] 
    	);
    	
    	if ($sucess && $historic){

    		DB::commit();

    		return [
    			'sucesso' => "true",
    			'mensagem' => "Recarga com sucesso"
    		];

    	}else{

    		DB::rollback();

    		return [
    			'sucesso' => "false",
    			'mensagem' => "A recarga falhou"
    		];
    	}			
    }

    public function withdraw(float $value): Array {

        if($this->amount < $value){

            return [
                'sucesso'  => "false",
                'mensagem' => "Saldo insuficiente"
            ];
        }

        DB::beginTransaction();

        $total_before = $this->amount ? $this->amount : 0;

        $this->amount -= number_format($value, 2, '.', ',');
        $sucess = $this->save();

        $historic = auth()->user()->historics()->create(
            [
                'type'         => 'O', 
                'amount'       => $value,
                'total_before' => $total_before,
                'total_after'  => $this->amount,
                'data'         => date('Ymd'),
            ] 
        );
        
        if ($sucess && $historic){

            DB::commit();

            return [
                'sucesso' => "true",
                'mensagem' => "Valor retirado com sucesso"
            ];

        }else{

            DB::rollback();

            return [
                'sucesso' => "false",
                'mensagem' => "Falhou ao retirar o valor"
            ];
        }           
    }
}
