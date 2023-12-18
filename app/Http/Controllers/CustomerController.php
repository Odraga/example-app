<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $customers = Customer::all();
       \Log::info($customers);

        return view('customer/customer',['customers'=> $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('customer/createcustomer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $input=$request->all();
            \Log::info($input);
    
            Customer::create($input);

            return redirect()->route("customer.index")->with('Success', 'Customer update succesfully');

        } catch (\Throwable $th) {
            \Log::info($th);
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       try {
            $customer = Customer::findOrFail($id);

            \Log::info("Data" .$customer);

            return view('customer/editcustomer', ['customer' => $customer]);

        } catch (\Throwable $th) {
            \Log::error("Ha ocurrido un error: " . $th);
        }  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $input=$request->all();
            \Log::info($input);
    
            Customer::find($id)->update($input);

            return redirect()->route("customer.index")->with('Success', 'Customer update succesfully');

        } catch (\Throwable $th) {
            \Log::error("Ha ocurrido un error: " . $th);
        }       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            \Log::info("EL ID".$id);

            $customer = Customer::findOrFail($id);

            \Log::info("Customer".$customer);

            if($customer != null){
                $customer->delete();
                return redirect()->route("customer.index")->with('Success', 'Customer update succesfully');
            }

            
            return redirect()->route("customer.index")->with('Success', 'Customer update succesfully');
        } catch (\Throwable $th) {
             \Log::error("Ha ocurrido un error: " . $th);
        }
    }
}
