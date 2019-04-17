<?php

namespace App\Http\Controllers\System\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    //
    public function homePage() {

        return view('system/project/project');

    }
    public function recommenderPage() {

        return view('system/project/recommender');

    }
    public function pubmedtest(Request $request) {

        $input=$request->all();


        return view('system/project/publication',['number' => $input]);
    }


    public function pubmedRecPage() {



        $msg = '{"_id":"5c74b7e8fee2cc5d0cb8110a","Id":26,"Abstract":" Structural plasticity in the myelinated infrastructure of the nervous system has come to light. Although an innate program of myelin development proceeds independent of nervous system activity, a second mode of myelination exists in which activity-dependent, plastic changes in myelin-forming cells influence myelin structure and neurological function. These complementary and possibly temporally overlapping activity-independent and activity-dependent modes of myelination crystallize in a model of experience-modulated myelin development and plasticity with broad implications for neurological function. In this article, I consider the contributions of myelin to neural circuit function, the dynamic influences of experience on myelin microstructure, and the role that plasticity of myelin may play in cognition.  ","PMID":"29986163","Title":"Myelin Plasticity and Nervous System Function.","Authors":["Monje M"],"Journal":"Annu Rev Neurosci","Label":"4\n","Sim":["27655972","30633380","30375119","30667116","30623975","30770136","30637801","30400847","29198135","27341820","30760982","30548333","30475092","30446950","29806482","29618286","27683878","27263272","22613055","30761608","30664769","30599178","30204029","30185147","26159098","30738015","30703773","30465872","27879349","30684238","30633838","30614568","30295677","30089513","29791316","29718742","22875929","21236296","19428820","30796492","30738184","30734928","30667091","30578680","30451065","30419760","30406926","30326823","30293752","30103682","30077775","30022611","29324456","20837059","20685221","30790590","30786269","30763607","30746715","30689302"]}';

        return view('system/project/publication',['article' => $msg]);
    }
}
