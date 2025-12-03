<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    // ------------------ AUTH ---------------------

    public function registerPage() {
        return view('register');
    }

    public function register(Request $request) {

        Http::post("http://127.0.0.1:8001/api/register", [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "password_confirmation" => $request->password_confirmation,
        ]);

        return redirect('/login')->with('msg', 'Registered Successfully');
    }

    public function loginPage() {


        return view('login');
    }

    public function login(Request $request) {

        $response = Http::post("http://127.0.0.1:8001/api/login", [
            "email" => $request->email,
            "password" => $request->password
        ]);

        if (!$response->successful()) {
            return back()->with('msg', 'Invalid Credentials');
        }

        session(['token' => $response['access_token']]);

        return redirect('/products');
    }

    // ------------------ PRODUCTS ---------------------

    public function products() {

        $token = session('token');
        $products = Http::withToken($token)->get("http://127.0.0.1:8002/api/products")->json();

        return view('products', compact('products'));
    }

   public function addProduct(Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0'
    ]);

    $token = session('token');

        $response = Http::withToken($token)
            ->withHeaders(['Accept' => 'application/json'])
            ->post("http://127.0.0.1:8002/api/products", [
                "name" => $request->name,
                "price" => $request->price
            ]);

        if($response->successful()){
            return back()->with('msg', 'Product Added!');
        } else {
            return back()->with('msg', 'Failed to add product. Check input or token.');
        }
}



    public function updateProduct(Request $request, $id)
    {
        $token = session('token');

        Http::withToken($token)->put("http://127.0.0.1:8002/api/products/$id", [
            "name" => $request->name,
            "price" => $request->price
        ]);

        return back()->with('msg', 'Product Updated!');
    }

    public function deleteProduct($id)
    {
        $token = session('token');

        Http::withToken($token)->delete("http://127.0.0.1:8002/api/products/$id");

        return back()->with('msg', 'Product Deleted!');
    }
}
