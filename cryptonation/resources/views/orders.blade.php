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
                        <th scope="col">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <th scope="row">1</th>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <th scope="row">2</th>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <th scope="row">3</th>
                        <td colspan="2"></td>
                        <td></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>