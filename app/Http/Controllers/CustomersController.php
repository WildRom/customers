<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;

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

    public function addCustomer(Request $request){
      $now = Carbon::now();

      $customer = new Customer();
      
      $customer->name = $request->name;
      $customer->tel_num = $request->tel_num;
      $customer->model = $request->model;
      $customer->todo = $request->todo;
      $customer->comment = $request->comment;
      $customer->added_at = $now;
      $customer->finished_at = NULL;
      $customer->price = $request->price;
      $customer->cost = $request->cost;
      $customer->save();
      return response()->json($customer);
    }
}