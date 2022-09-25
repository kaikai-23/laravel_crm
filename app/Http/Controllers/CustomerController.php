<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
//Guzzleの読み込み
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('customers.index');
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //変数を定義
        $method = 'GET';
        $postcode = $request->postcode;
        //URLの定義
        $url = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=' . $postcode;

        //Clientクラスからインスタンスを生成
        $client = new Client();

        //try catch文でエラー処理を書く
        try {
            //データを取得し、JSON形式からPHPの変数に変換

            $response = $client->request($method, $url);
            $body = $response->getBody();
            $res = json_decode($body, true);
            $results = $res["results"][0];

            $address = $results['address1'] . $results['address2'] . $results['address3'];
        } catch (\Throwable $th) {
            $address = null;
        }

        return view('customers.create', compact('address', 'postcode'));
    }

    public function postcode()
    {
        return view('customers.postcode');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->postcode = $request->postcode;
        $customer->address = $request->address;
        $customer->number = $request->number;

        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //return view('customers.show');

        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, CustomerRequest $customer)
    {
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->postcode = $request->postcode;
        $customer->address = $request->address;
        $customer->number = $request->number;

        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index');
    }
}
