<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersController extends Controller
{
    public function index() {
      
      // $customers = Customer::all();

      $customers = DB::table('customers')
      ->where('paid', '=', 0)
      ->orWhere('ready', '=', 0)
      ->orderBy('added_at', 'asc')
      ->get();
      // dd($customers);

      return view('index', ['customers' => $customers]);
    }
}