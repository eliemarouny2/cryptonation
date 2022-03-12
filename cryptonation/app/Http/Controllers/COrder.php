<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class COrder extends Controller
{
  function complete_order(Request $req)
  {
    $result = Order::where('order_id', $req->id)
    ->update([
      'status'=>'complete'
    ]);      
    if ($result == 1) {
      session(['res' => 'success']);
      session(['result' => "Order Updated successfully"]);
    } else {
      session(['res' => 'danger']);
      session(['result' => "Problem updating order"]);
    }
    return redirect('pending_orders');
  }
  function delete_pending_order(Request $req)
  {
    $result = Order::where('order_id', $req->id)->delete();
    if ($result == 1) {
      session(['res' => 'success']);
      session(['result' => "Successfully deleted"]);
    } else {
      session(['res' => 'danger']);
      session(['result' => "Problem deleting data"]);
    }
    return redirect('/pending_orders');
  }
  function delete_successful_order($id)
  {
    $result = Order::where('order_id', $id)->delete();
    if ($result == 1) {
      session(['res' => 'success']);
      session(['result' => "Successfully deleted"]);
    } else {
      session(['res' => 'danger']);
      session(['result' => "Problem deleting data"]);
    }
    return redirect('/successful_orders');
  }

  function view_order($id)
  {
    $orderinfo = DB::table('orders')
      ->join('customers', 'orders.customer_id', '=', 'customers.cust_id')
      ->join('checkout', 'orders.order_id', '=', 'checkout.order_id')
      ->select('customers.*', 'orders.*','checkout.*')
      ->where('orders.order_id', $id)
      ->orderBy('orders.date')
      ->first();

    $orderdata = DB::table('order_infos')
      ->join('products', 'order_infos.product_id', '=', 'products.prod_id')
      ->select('products.*', 'order_infos.*')
      ->where('order_infos.ord_id', $id)->get();

    return view('admin/orders/view_order', [
      'orderdata' => $orderdata,
      'orderinfo' => $orderinfo
    ]);
  }
}
