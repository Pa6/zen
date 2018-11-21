<?php

namespace App\Http\Controllers;

use App\Customer;
use Exception;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    //API controller
    public function doAction(Request $request){


//        $Case = $_GET["case"];
//        $customer = $_POST["customer"];
//        $product_id = $_GET["productId"];

        $Case = $request['case'];
        $customer = $request['customer'];
        $product_id = $request['productId'];


        try {
            switch ($Case) :
                case 'product':
                    switch ($product_id) {
                        case 1 :
                            $output = [
                                'id' => '666',
                                'name' => 'Fluffy unicorn',
                                'description' => 'It\'s so fluffy you\'ll melt and bring it to the park and eat ice cream. https://timedotcom.files.wordpress.com/2015/03/deadpool.jpg',
                                'price' => ['amount' => 10000, 'currency' => 'USD']
                            ];
                            break;
                        case 2 :
                            $output = [
                                'id' => '667',
                                'name' => 'Fluffy tech lead',
                                'description' => '”I don’t care if it works on your machine! We are not shipping your machine!” – Vidiu Platon',
                                'price' => ['amount' => 300000, 'currency' => 'USD']
                            ];
                            break;
                    }
                    break;
                case 'contact':
                    $output = 'contact@zemrooms.com';
                    break;
                case 'customer':
                    $output = 'OK';
//                    $Customer = new Customer($customer);
//                    $db = new dbConnector($this->DbConfig);
//                    $Customer->save($db);

                    ////new saving with php 7
                    $Customer = Customer::create($customer);
                    break;
                default:
                    throw new Exception('Invalid case');
            endswitch;
        } catch (Exception $e) {
            throw new Exception('Ooops'. $e->getMessage());
        }

        //////return the out put
        return response()->json($output);
    }
}
