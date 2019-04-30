@extends('system.layouts.header')
@section('css')

    <link href="{{ asset('jscss/custom/chatbot/chatbot.css') }}" rel="stylesheet">

@endsection
@section('content')


    <section>
        <div class="container">

            <div class="row">
                <div class="col-10">
                    <h3 class="section-heading">Recommend System</h3>
                </div>
                <div class="col-2">
                    <a href="{{ route('system.project.home') }}"><button type="button" class="btn btn-secondary" style="float:right">back</button></a>
                </div>


            </div>

            <hr class="hr-line">


            <div class="row" style="display: block">
                <div class="col-md-12">
                    <h4>Introduction</h4>
                    <p>A neuron is an electrically excitable cell that receives, processes, and transmits information
                        through electrical and chemical signals. These signals between neurons occur via specialized
                        connections called synapses. Neurons can connect to each other to form neural networks. Neurons
                        are major components of the brain and spinal cord of the central nervous system, and of the
                        autonomic ganglia of the peripheral nervous system.


                    </p>
                </div>
            </div><!-- row -->


            <div class="row justify-content-md-center" >
                <div class="col-sm-auto">
                    <label><input id="first" ng-checked="true" type="radio" name="neuronradio" ng-model="content"
                                  value="first"  ng-init="content = 'first'">&nbsp;Jupyter Notebook &nbsp;</label>
                    <label><input id="second" type="radio" name="neuronradio" ng-model="content" value="second">&nbsp;Publication
                        &nbsp;</label>
                    <label><input id="third" type="radio" name="neuronradio" ng-model="content" value="third">Cloud
                        solution Template &nbsp;</label>
                    <label><input id="forth" type="radio" name="neuronradio" ng-model="content" value="fourth">Topic
                        Model</label>
                </div>
            </div><!-- row -->
            </br>




            <div class="row justify-content-lg-center"  ng-show="content == 'first'">
                <div class="col-md-10 ">
                    <form action="{{ url("/project/jupyter") }}" method="get">
                        {{ csrf_field() }}
                        <div class="form-group">

                            <label for="juin">Jupyter Notebook Input</label>
                            <input type="text" name="jupInput" class="form-control" id="juin" aria-describedby="juHelp" placeholder="Enter a keyword">
                            <!--<small id="juHelp" class="form-text text-muted">the number x reuquired xxxx.</small>-->
                            </br>
                            <button type="submit" class="btn btn-primary ">Confirm</button>
                        </div>
                    </form>
                </div>
            </div><!-- row -->


            <div class="row justify-content-lg-center"  ng-show="content == 'second'">
                <div class="col-md-10 ">



                </div>
            </div><!-- row -->


            <div class="row justify-content-lg-center"  ng-show="content == 'third'">
                <div class="col-md-10 ">
                    <form>
                        <div class="form-group">

                            <label for="incloud">cloud file input</label>
                            <input type="text" class="form-control" id="incloud" aria-describedby="cloudHelp" placeholder="Enter cloud">
                            <small id="cloudHelp" class="form-text text-muted">the number x reuquired xxxx.</small>
                        </br>
                            <button type="submit" class="btn btn-primary mb-2">Confirm</button>

                        </div>
                    </form>
                </div>
            </div><!-- row -->

            <script>
            function output(){
	            //https://www.w3schools.com/php/php_ajax_php.asp
                //https://stackoverflow.com/questions/24468459/sending-a-json-to-server-and-retrieving-a-json-in-return-without-jquery
	            //https://stackoverflow.com/questions/18441375/submit-form-field-values-to-a-javascript-function
                var xmlhttp = new XMLHttpRequest();
                var input = document.getElementById("topicin").value;
	            xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var text = null;
                        text = this.responseText;
                        text = JSON.parse(text);
                        var output = "Highly matched topics is: \n";
                        if(text != null){
                            var t = text.topics;
                            console.dir(t[0]);
                            for (var i = 0; i < t.length; i++){
                                    var detail = t[i];
                                    //console.dir(t[i]);
                                    output = output.concat('   TOPIC ', detail.id, ' : ', detail.summary, ' \n');
                                    output = output.concat('      SUGGESTED TOOLS: ', detail.tools, ' \n');
                                    output = output.concat('      SUGGESTED DATASETS: ', detail.datasets, '||\n');

                            }
                        }
                        document.getElementById("output").innerHTML = output;
                    }
                };
                var text = JSON.stringify({"text": input});
                xmlhttp.open("POST", "http://localhost:9000/api/topics", true);
                xmlhttp.setRequestHeader("Content-Type", "application/json");
                xmlhttp.send(text);
            }
            </script> 
            <div class="row justify-content-lg-center"  ng-show="content == 'fourth'">
                <div class="col-md-10 ">
                    <form method="POST" action="http://localhost:9000/api/topics">
                        <div class="form-group">

                            <label for="topicin">topic input</label>
                            <input type="text" class="form-control" id="topicin" aria-describedby="topicHelp" placeholder="Enter topic">
                            </br>
                            <p>Output</p>
                            <span id="output"></span>
                            </br>
                            <button type="button" class="btn btn-primary mb-2" onclick="output()">Confirm</button>

                        </div>
                    </form>
                </div>
            </div><!-- row -->


            <!-- error -->

            <div class="row justify-content-lg-center"  >
                <div class="col-md-10 ">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <h4>ERROR</h4>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        </br>
                    @endif
                </div>
            </div>

            <!-- intro -->
            <div class="row">
                <div class="col-md-12" ng-show="content == 'first'">
                    <h4>
                        Jupyter Notebook Recommenders:
                    </h4>
                    <p>
                        This workflow will guide you through requirements for selecting and finding a jupyter notebook.
                    </p>
                    <dl> The input requires:
                        <dt>a keyword for the search engine</dt>
                    </dl>
                </div>
            </div><!-- row -->

            <div class="row">
                <div class="col-md-12" ng-show="content == 'second'">
                    <h4>
                        publication:
                    </h4>
                    <p>
                        This tool will guide you through the creation, execution, and visualization of a neural
                        simulation. It involves following steps and each step will be accomplished by a corresponding
                        app.
                    </p>
                    <dl>
                        <dt>Pre-processing</dt>
                        <dd>Adjust the neuron types, morphology, connectivity, and weights using the "Pre-processing"
                            app.
                        </dd>
                        <dt>NEURON Simulation</dt>
                        <dd>Then execute the model on HPC resources using the "Neuron" app.</dd>
                        <dt>Visulization</dt>
                        <dd>Finally, visualize your results using the "Visualization" App.</dd>
                    </dl>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" ng-show="content == 'third'">
                    <h4>
                        Cloud solution Template Recommender

                    </h4>
                    <p>
                        This workflow will guide you through requirements gathering, execution, and visualization of a
                        single neural simulation. It involves following steps and each step will be accomplished by a
                        corresponding app.
                    </p>
                    <dl> The input requires:
                        <dt>Collecting length</dt>
                        <dd>Collecting Soma length & diameter.</dd>
                        <dd>Collecting Dendri length</dd>
                        <dt>Choose Channels</dt>
                        <dd>Selecting Sodium, Potassium and Calcium.</dd>
                        <dt>Choosing voltage and current</dt>
                        <dd>Membrane voltage and current.</dd>
                    </dl>
                </div>
            </div><!-- row -->

            <div class="row">
                <div class="col-md-12" ng-show="content == 'fourth'">
                    <h4>
                        Topic Model:
                    </h4>
                    <p>
                        This workflow will guide you through requirements gathering, execution, and visualization of a
                        single neural simulation. It involves following steps and each step will be accomplished by a
                        corresponding app.
                    </p>
                    <dl> The input requires:
                        <dt>Collecting length</dt>
                        <dd>Collecting Soma length & diameter.</dd>
                        <dd>Collecting Dendri length</dd>
                        <dt>Choose Channels</dt>
                        <dd>Selecting Sodium, Potassium and Calcium.</dd>
                        <dt>Choosing voltage and current</dt>
                        <dd>Membrane voltage and current.</dd>
                    </dl>
                </div>
            </div><!-- row -->

            <!-- row -->
        </div><!-- selection2 -->


        <div ng-controller="chatbot-controller">
            @include('system.analytics.chatbot')
        </div>

    </section>

@endsection
@section('javascript')

    <script type="text/javascript" src="{{ asset('jscss/custom/chatbot/chatbot-angular-controller.js') }}"></script>

@endsection