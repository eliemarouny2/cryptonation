<style>
   .view-btn{
      background-color: #010124;
   }
</style>
<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Your orders
      </h2>
   </x-slot>

   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">order ID</th>
                        <th scope="col">Order date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Payment method</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i=1; ?>
                     @foreach($orders as $order)
                     <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$order->order_id}}</td>
                        <td>{{$order->date}}</td>
                        <td>{{$order->total_amount}}$</td>
                        <td>{{$order->paymethod}}</td>
                        <td>{{$order->status}}</td>
                        <td><a class="badge view-btn" href={{"single_order/".$order->order_id}}>view</a></td>
                     </tr>
                     <?php $i++; ?>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>