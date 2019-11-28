<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;

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

    public function store(Request $request){
    	$flight = Balance::firstOrCreate([]);
    	return "teste";
    	//return view('admin.balance.deposit');
    }
}
