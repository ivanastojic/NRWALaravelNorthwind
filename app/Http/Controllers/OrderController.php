<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Shipper;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        $employees = Employee::all();
        $shippers = Shipper::all();
        $products = Product::all(); // za izbor više proizvoda

        return view('orders.create', compact('customers', 'employees', 'shippers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'CustomerID' => 'required',
            'EmployeeID' => 'required',
            'OrderDate' => 'required',
            'products' => 'required|array',
            'products.*.ProductID' => 'required|exists:products,ProductID',
            'products.*.Quantity' => 'required|numeric',
            'products.*.UnitPrice' => 'required|numeric',
            'products.*.Discount' => 'nullable|numeric',
        ]);

        $order = Order::create($request->only(['CustomerID', 'EmployeeID', 'OrderDate']));

        foreach ($request->products as $product) {
            $order->products()->attach($product['ProductID'], [
                'Quantity' => $product['Quantity'],
                'UnitPrice' => $product['UnitPrice'],
                'Discount' => $product['Discount'] ?? 0
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Narudžba kreirana.');
    }


    public function edit($id)
    {
        $order = Order::with('products')->findOrFail($id);
        $customers = Customer::all();
        $employees = Employee::all();
        $shippers = Shipper::all();
        $products = Product::all();

        return view('orders.edit', compact('order', 'customers', 'employees', 'shippers', 'products'));
    }


    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'CustomerID' => 'required',
            'EmployeeID' => 'required',
            'OrderDate' => 'required',
            'products' => 'required|array',
            'products.*.ProductID' => 'required|exists:products,ProductID',
            'products.*.Quantity' => 'required|numeric',
            'products.*.UnitPrice' => 'required|numeric',
            'products.*.Discount' => 'nullable|numeric',
        ]);

        $order->update($request->only(['CustomerID', 'EmployeeID', 'OrderDate']));

        $order->products()->detach(); // ukloni stare
        foreach ($request->products as $product) {
            $order->products()->attach($product['ProductID'], [
                'Quantity' => $product['Quantity'],
                'UnitPrice' => $product['UnitPrice'],
                'Discount' => $product['Discount'] ?? 0
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Narudžba ažurirana.');
    }


    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Prvo ukloni sve proizvode povezane s narudžbom
        $order->order_details()->delete(); // Ovo će obrisati redove u 'order_details'

        // Sada možeš obrisati narudžbu
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Narudžba izbrisana.');
    }

}

