<?php

namespace App\Http\Controllers;

// use GuzzleHttp\Exception\RequestException;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Header;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;

class amezonController extends Controller
{

    //
    public function Amazon(Request $request)
    {
        // dd('hello');
        $jar = new \GuzzleHttp\Cookie\CookieJar();
        $client = new \GuzzleHttp\Client([
            'headers' => [
                'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'accept-language' => 'en;q=0.8',
                'user-agent' => '', //set some User-Agent or just leave it empty cos it works too
                'x-requested-with' => 'XMLHttpRequest'
            ],
            'cookies' => $jar,
        ]);

        try {
            $client->post('https://www.amazon.com/gp/delivery/ajax/address-change.html', [
                'form_params' => [
                    'locationType' => 'LOCATION_INPUT',
                    'zipCode' => '90001',
                    'storeContext' => 'generic',
                    'deviceType' => 'web',
                    'pageType' => 'Gateway',
                    'actionSource' => 'glow',
                ]
            ]);
        } catch (RequestException $e) {
            echo "Failed to set ZIP";
        }
        $response = $client->get('https://www.amazon.com/');
        $data = $client->getConfig('cookies');
        $datas = $data->toArray();
        foreach ($datas as $id => $data) {
            // $arr_cookie_options = array (
            //     'expires' => $data['Expires'],
            //     'path' => $data['Path'],
            //     'domain' => $data['Domain'], // leading dot for compatibility or use subdomain
            //     'secure' => $data['Secure'],     // or false
            //     'httponly' => $data['HttpOnly'],    // or false
            //     'samesite' => 'None' // None || Lax  || Strict
            //     );
            // setcookie($data['Name'], $data['Value'], $arr_cookie_options); 
            //    dump($id ,$data['Name']);
            //    dump($id ,$data['Value']);
            //    dump($id ,$data['Domain']);
            //    dump($id ,$data['Path']);
            //    dump($id ,$data['Max-Age']);
            //    dump($id ,$data['Expires']);
            //    dump($id ,$data['Secure']);
            //    dump($id ,$data['Discard']);
            //    dump($id ,$data['HttpOnly']);
            // Cookie::make($data['Name'], $data['Value'], $data['Expires'],  $data['Path'],  $data['Domain'],  $data['Secure'],  $data['HttpOnly']);
            // $cookie = Cookie::queue($data['Name'], $data['Value'], $data['Expires'], $data['Path'], $data['Domain'],$data['Secure'], $data['HttpOnly']);
            $cookie = Cookie::queue($data['Name'], $data['Value'], $data['Expires'], $data['Path']);
        }
        // Cookie::queue('ssotoken', 'test', 0, '/', '.domain.com');
        // Cookie::queue('abid', 'Setting Cookie from Online Web Tutor', 120);
        // $cookies = Cookie::make('Foo_Application', 'This is from foo application', 60, null, '.example.com');
        // return response()->json(['status' => true, 'message' => 'Cookie is set'])->withCookie($cookies);
        // $abid = Cookie::get('abid') ;
        $cookie =  response()->json(['Cookie set successfully.']);
        // $value = Cookie::get('owt-cookie');
        // dd($cookie);
        return $cookie;
        // header('Location: https://www.amazon.com');


    }

    public function Carbon()
    {
        $data = Carbon::now('America/Los_Angeles');
        $startDate = Carbon::parse($data, 'Asia/Kolkata')->setTimezone('UTC');
        // dd($data->toDateTimeString());
        return view('test');
    }

    // hyp pay
    public function testPay()
    {
        $url = "https://test.oppwa.com/v1/checkouts";
        $data = "entityId=8ac7a4ca859fb06c0185a04584d000b3" .
            "&amount=2.00" .
            "&currency=IQD" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGFjN2E0Y2E4NTlmYjA2YzAxODVhMDQ0NjAxMTAwYTZ8UzdSWEpKRUd4dw=='
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
        // dd($data);
        return view('hyp', $data);
    }

    public function hayperpaysubmit(Request $request)
    {
        // dd($request->all());
        $url = "https://test.oppwa.com/" . $request->resourcePath;
        $url .= "?entityId=8ac7a4ca859fb06c0185a04584d000b3";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGFjN2E0Y2E4NTlmYjA2YzAxODVhMDQ0NjAxMTAwYTZ8UzdSWEpKRUd4dw=='
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

        // chek trangegtion

        // $url = "https://test.oppwa.com/v1/query/8ac7a49f85b777fe0185ba22f7e5520b";
        // $url .= "?entityId=8ac7a4ca859fb06c0185a04584d000b3";

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     'Authorization:Bearer OGFjN2E0Y2E4NTlmYjA2YzAxODVhMDQ0NjAxMTAwYTZ8UzdSWEpKRUd4dw=='
        // ));
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $responseData = curl_exec($ch);
        // if (curl_errno($ch)) {
        //     return curl_error($ch);
        // }
        // curl_close($ch);
        // return $responseData;
    }
}
