<?php

namespace App\Http\Controllers\System\Recommender;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;
use Session;
use Redirect;
use Validator;
use ZipArchive;
use App\Current_injection;

class TempRecomController extends Controller {


    private $backend_url;
    private $backend_password;
    private $backend_key;

    public function __construct() {
       
      //  $this->middleware('auth');
      
    }

	public function allocateResources(Request $request)
	{
		$cloudTemplate= $request->input('cloudTemplate');

		//$typeofInstance =$cloudTemplate['typeofInstance'];
		//error_log($typeofInstance);
		
		$connection_status= \SSH::into('production')->run(array('./run.sh aws t3.nano:2,t3.small:1'), 
		 function ($line){
			$output = $line.PHP_EOL;
			error_log("===========");
			error_log($output);

		});
		error_log($connection_status);
		error_log("After function");

		return response()->json(array('msg'=> 'hii'));
	}
   
public function callOptimizer()
	{
		$clouddetails='{"req_os":"LINUX","req_vCPU":"8","req_ram":"12","req_network":"5","req_clock":"2","req_gpu":false,"req_storage":"20","req_ssd":false}';
		
		/*$ch = curl_init('http://10.7.24.31:8080/TestingWeb/rest/getTemplateCatalog');
		curl_setopt_array($ch, array(
			CURLOPT_POST => TRUE,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			),
			CURLOPT_POSTFIELDS => $clouddetails
		));
		$result = curl_exec($ch);
		//$resultData = json_decode($result, TRUE);

		curl_close($ch);*/
		
		$result = '{"data":{"Red":[{"template_Cost":"0.1248","instances":[{"instance_csp":"AWS","instance_name":"t3.nano","instance_count":"2","instance_details":{"OS":"LINUX","name":"t3.nano","vCPU":"2","ram":"0.5","price":"0.0052","network":"5","clock":"2.5"}},{"instance_csp":"AWS","instance_name":"t3.micro","instance_count":"1","instance_details":{"OS":"LINUX","name":"t3.micro","vCPU":"2","ram":"1","price":"0.0104","network":"5","clock":"2.5"}},{"instance_csp":"AWS","instance_name":"t3.small","instance_count":"1","instance_details":{"OS":"LINUX","name":"t3.small","vCPU":"2","ram":"2","price":"0.0208","network":"5","clock":"2.5"}},{"instance_csp":"AWS","instance_name":"t3.medium","instance_count":"2","instance_details":{"OS":"LINUX","name":"t3.medium","vCPU":"2","ram":"4","price":"0.0416","network":"5","clock":"2.5"}}]}],"Green":[{"template_Cost":"0.306","instances":[{"instance_csp":"AWS","instance_name":"a1.medium","instance_count":"12","instance_details":{"OS":"LINUX","name":"a1.medium","vCPU":"1","ram":"2","price":"0.0255","network":"10","clock":"2.3"}}]},{"template_Cost":"0.357","instances":[{"instance_csp":"AWS","instance_name":"a1.medium","instance_count":"14","instance_details":{"OS":"LINUX","name":"a1.medium","vCPU":"1","ram":"2","price":"0.0255","network":"10","clock":"2.3"}}]},{"template_Cost":"0.408","instances":[{"instance_csp":"AWS","instance_name":"a1.medium","instance_count":"16","instance_details":{"OS":"LINUX","name":"a1.medium","vCPU":"1","ram":"2","price":"0.0255","network":"10","clock":"2.3"}}]}],"Gold":[{"template_Cost":"0.22949999999999998","instances":[{"instance_csp":"AWS","instance_name":"a1.medium","instance_count":"9","instance_details":{"OS":"LINUX","name":"a1.medium","vCPU":"1","ram":"2","price":"0.0255","network":"10","clock":"2.3"}},{"instance_csp":"AWS","instance_name":"a1.medium","instance_count":"9","instance_details":{"OS":"LINUX","name":"a1.medium","vCPU":"1","ram":"2","price":"0.0255","network":"10","clock":"2.3"}}]},{"template_Cost":"0.28049999999999997","instances":[{"instance_csp":"AWS","instance_name":"a1.medium","instance_count":"11","instance_details":{"OS":"LINUX","name":"a1.medium","vCPU":"1","ram":"2","price":"0.0255","network":"10","clock":"2.3"}}]},{"template_Cost":"0.306","instances":[{"instance_csp":"AWS","instance_name":"a1.medium","instance_count":"12","instance_details":{"OS":"LINUX","name":"a1.medium","vCPU":"1","ram":"2","price":"0.0255","network":"10","clock":"2.3"}}]}]},"status":200,"config":{"method":"POST","transformRequest":[null],"transformResponse":[null],"jsonpCallbackParam":"callback","url":"/callOptimizer","headers":{"Content-Type":"json","X-CSRF-TOKEN":"VfGl0Hi65RHtFrcHWMWLKhGjj5Ug8EN41YnhN4Dm","Accept":"application/json, text/plain, */*","X-XSRF-TOKEN":"eyJpdiI6ImhEUXJmZlwvUUgwajRuTU5qNVhQS2RnPT0iLCJ2YWx1ZSI6IlVtb0d6T0tzdEl5QVhzYk5XQ1wvSHFsbWtJZUZqZFR5dTBKc0pVcGhBKzlDekpJS29RRzZxT3R1Q1JlQ29Wb1ArXC9vQjRYSVwvNUtwQzVyXC9kRGZDTVIwUT09IiwibWFjIjoiNDUxNWFkZWQ4ZWMyOGQ0ZGQ3MzdiZjFlN2U2NjAyMTQyZTBiNDY5OGIxMTRhMjllZGZhY2Y5YzI2NmFhZjg0OSJ9"},"data":"{\"req_os\":\"LINUX\",\"req_vCPU\":\"8\",\"req_ram\":\"12\",\"req_network\":\"5\",\"req_clock\":\"2\",\"req_gpu\":false,\"req_storage\":\"20\",\"req_ssd\":false}"},"statusText":"OK"}';
	//	error_log($result);

		return  response()->json(array('msg'=> $result));
	}
   
    //test Route
    public function template_recommender() {

        return view('system/recommender/template_recommender');

    }

}
