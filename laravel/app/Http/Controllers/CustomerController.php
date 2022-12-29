<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use stdClass;

class CustomerController extends Controller
{
    public function index()
    {

        $customers = Customer::all(); // select * from customers
        return view('customer.index', ["customers" => $customers]);
    }

    public function add()
    {
        return view('customer.add');
    }

    public function edit($id)
    {
        $customer = Customer::find($id); // select * from where id = ?

        return view('customer.edit', ["customer" => $customer]);
    }

    public function update($id)
    {
        $customer = Customer::find($id); // select * from where id = ?
        $customer->name = request("name", "");
        $customer->phone = request("phone", "");
        $customer->address = request("address", "");
        $customer->save();

        return redirect('customer');
    }

    public function delete($id)
    {
        $customer = Customer::find($id); // select * from where id = ?
        $customer->delete();
        return redirect('customer');
    }

    public function store()
    {
        // validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors, 422);
        }

        // validasi business
        $cityExists = City::find(request("city_id", -1));
        if(is_null($cityExists))
        {
            return response()->json([
                "messsage" => "Kota dengan id ... tidak ditemukan"
            ], 422);
        }

        $customer = new Customer();
        $customer->name = request("name", "");
        $customer->phone = request("phone", "");
        $customer->city_id = request("city_id", -1);
        $customer->address = request("address", "");
        $customer->save();
        return redirect('customer');
    }
}
