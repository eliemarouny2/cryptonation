<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CCustomer extends Controller
{
        function insert_customer(Request $req){
        Customer::insert([
    'firstname' => $req->firstname,
    'lastname' => $req->lastname,
    'email' => $req->email,
]);
   return redirect('manage_customers');
}

function delete_customer(Request $req){
    Customer::where('cust_id',$req->id)->delete();
   return redirect('/manage_customers');
}

function edit_customer($id){
   $customer=Customer::where('cust_id',$id)->first();
   return view('admin/customers/edit_customer',[
       'customer'=>$customer
   ]);
}

function update_customer(Request $req){
   Customer::where('cust_id', $req->id)
            ->update([
                'firstname'=> $req->firstname,
                'lastname'=> $req->lastname,
                'email'=> $req->email,
            
            ]);
   return redirect('/manage_customers');
}
}
