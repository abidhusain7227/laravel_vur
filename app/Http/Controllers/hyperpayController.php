<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hyperpayController extends Controller
{
    public static $entityId = '8ac7a4ca859fb06c0185a04584d000b3';
    public static $Bearer = 'OGFjN2E0Y2E4NTlmYjA2YzAxODVhMDQ0NjAxMTAwYTZ8UzdSWEpKRUd4dw==';
    //
    public function hyperPay()
    {
        $url = "https://test.oppwa.com/v1/checkouts";
        $data = "entityId=".self::$entityId .
            "&amount=2.00" .
            "&currency=IQD" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer '. self::$Bearer
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData);
        $data = [
            "id" => $responseData->id,
        ];
        $this->addLog($responseData->result->description);
        return view('hyperpay', $data);
    }

    public function hyperpaySubmit(Request $request)
    {
        $url = "https://test.oppwa.com/" . $request->resourcePath;
        $url .= "?entityId=". self::$entityId;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer '. self::$Bearer
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $data = json_decode($responseData);
        dd($data);
    }

    public function addLog($data){
        $file = storage_path('logs/log.log');
        $myfile = fopen($file, "a") or die("Unable to open file!");
        fwrite($myfile,"\n\n"." Date:- ". now(). ' data:- '. $data);
        fclose($myfile);
        // dd($data);
    }
}
