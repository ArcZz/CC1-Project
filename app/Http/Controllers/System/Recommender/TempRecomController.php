<?php

namespace App\Http\Controllers\System\Recommender;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
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

   

    //test Route
    public function template_recommender() {

        return view('system/recommender/template_recommender');

    }

}
