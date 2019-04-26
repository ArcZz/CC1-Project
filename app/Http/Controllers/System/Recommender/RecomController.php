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

class RecomController extends Controller {


    private $backend_url;
    private $backend_password;
    private $backend_key;

    public function __construct() {
       
       // $this->middleware('auth');
      
    }

    //home page
    public function homePage() {

        return view('system/recommender/project');

    }

    //test Route
    public function recommender() {

        return view('system/recommender/recommender');

    }

}
