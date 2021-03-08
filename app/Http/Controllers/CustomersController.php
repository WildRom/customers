<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersController extends Controller
{
    public function index() {
      
      $customers = Customer::all();
      // return $customers;

      return view('index', ['customers' => $customers]);
    }
}