<!-- <script>
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
                                    output = output.concat('      SUGGESTED DATASETS: ', detail.datasets, '\n');

                            }
                        }
                        document.getElementById("output").innerHTML = output;
                    }
                };
                var text = JSON.stringify({"text": input});
                xmlhttp.open("POST", "http://54.173.2.13:9000/api/topics", true);
                xmlhttp.setRequestHeader("Content-Type", "application/json");
                xmlhttp.send(text);
            }
   </script>  -->

  
   <script>
               //References:
	            //https://www.w3schools.com/php/php_ajax_php.asp
               //https://stackoverflow.com/questions/24468459/sending-a-json-to-server-and-retrieving-a-json-in-return-without-jquery
	            //https://stackoverflow.com/questions/18441375/submit-form-field-values-to-a-javascript-function
               //https://www.w3schools.com/js/js_object_definition.asp
               //https://www.w3schools.com/jsref/jsref_split.asp
               //https://stackoverflow.com/questions/40683151/compare-a-string-to-a-key-in-a-javascript-object
            var tool = {
               hnn: 		   'https://hnn.brown.edu/',
               lsnm:		   'https://omictools.com/lsnm-tool',	
               nest:		   'https://nest-initiative.org/',
               pynn:		   'https://neuralensemble.org/PyNN/',
               fmrib:		'https://www.ndcn.ox.ac.uk/divisions/fmrib/about-fmrib',
               brian:		'http://www.computational-neuroscience-of-sensory-systems.org/research/technology/the-brian-simulator/',
               caffe:		'https://caffe.berkeleyvision.org/',
               keras:		'https://www.tensorflow.org/guide/keras',
               matlab:		'https://www.mathworks.com/products/matlab.html',
               eeglab:		'https://sccn.ucsd.edu/eeglab/index.php',
               octave:		'https://www.gnu.org/software/octave/',
               openmp:		'https://www.openmp.org/',
               modeldb:		'https://senselab.med.yale.edu/modeldb/',
               dynasim:		'http://home.earthlink.net/~perlewitz/sftwr.html',
               carlsim:		'http://www.socsci.uci.edu/~jkrichma/CARLsim/documentation_cpusnn.html',
               gromacs:		'https://www.ncbi.nlm.nih.gov/pmc',
               biaslab:		'https://www.tue.nl/en/research/research-groups/signal-processing-systems/',
               areslab:		'https://www.frontiersin.org',
               genesis:		'https://www.genesishealth.com/facilities/location-public-profile/neurology-ghg/',
               ligplot:		'https://www.ncbi.nlm.nih.gov/pmc',
               pymoose:		'https://www.ncbi.nlm.nih.gov',
               pytorch:		'https://pytorch.org/',
               molsoft:		'https://www.molsoft.com/',
               ipython:		'https://ipython.org/',
               cartool:		'https://www.fbmlab.com/cartool-software/',
               netpyne:		'https://www.neurosimlab.com/netpyne/',
               xgboost:		'https://github.com/dmlc/xgboost',
               xmgrace:		'https://www.wesleyan.edu/scic/',
               neurondb:	'https://senselab.med.yale.edu/modeldb/',
               annarchy:   'https://annarchy.readthedocs.io/',
               pgenesis:	'https://www.genesisneuro.com/',
               fnirsoft:	'https://www.biopac.com/product/fnirsoft-professional-edition/',
               graphpa:	   'https://www.graphpad.com/',
               pyglmnet:	'https://pypi.org/project/pyglmnet/',
               fmristat:	'https://www.math.mcgill.ca/worsley/fmristat',
               openblas:	'https://www.openblas.net/',
               medinria:	'https://med.inria.fr/',
               statsoft:	'https://www.statsoft.com/',
               neuronsim:	'https://www.neuron.yale.edu/neuron/',
               cplusplus:	'https://www.cplusplus.com',
               bluepyopt:	'https://bluepyopt.readthedocs.io',
               bootwptos:	'https://rdrr.io/cran/BootWPTOS/',
               freesurfer:	'https://surfer.nmr.mgh.harvard.edu/',
               edfbrowser:	'https://www.teuniz.net/edfbrowser/',
               tensorflow:	'https://www.tensorflow.org/',
               matplotlib:	'https://matplotlib.org/'
            };
            function output(){
             
               var xmlhttp = new XMLHttpRequest();
               var input = document.getElementById("topicin").value;
	            xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var text = null;
                        text = this.responseText;
                        text = JSON.parse(text);
                        var output = "Here is the tools and datasets we found relevant to your topic: \n";
                        output = output.concat('Click on the link on each tool to learn more about them \n');
                        if(text != null){
                            var t = text.topics;
                            var detail = t[0];
                            var temp = detail.tools;
                            temp = temp.split(",");
                            var keys = Object.keys(tool);
                            for(var i = 0; i < temp.length;i++){
                               for(var j = 0; j < keys.length;j++){
                                  if(temp[i] == keys[j]){
                                     console.log('equal');
                                     temp[i] = '<a href='+tool[keys[j]]+'>'+temp[i]+'</a>';
                                  }
                               }
                            }
                            output = output.concat('  SUGGESTED TOOLS: ', temp, ' \n');
                            output = output.concat('  SUGGESTED DATASETS: ', detail.datasets, '\n');
                        }
                        document.getElementById("output").innerHTML = output;
                    }
                };
                var text = JSON.stringify({"text": input});
                xmlhttp.open("POST", "http://54.173.2.13:9000/api/topics", true);
                xmlhttp.setRequestHeader("Content-Type", "application/json");
                xmlhttp.send(text);
            }
   </script> 
   
   <div class="row">
      <div class="col-12">
         <h3 class="section-heading">Topic Model</h3>
         <hr>
      </div>
   </div>
   <div class="row"  >
      <div  class="col-md-12" id="firstSection">
               <h4 style="display: inline-block;">What is Topic Model Recommender?</h4>
               <p style="text-align: justify;">
                  Suggest relevant research topics as well as recommend tools and datasets for each topic based on user’s search term. Help guide researchers to get started on a research topics without having to look through large amount of information

               </p>
               <p style="text-align: justify;">
                  Data used in the topic model had been trained by parsing through publish scientific papers (mostly neuroscience and bioinformatics) and discover relationship between topics, tools, and datasets
               </p>  
      </div>   

      <div  class="col-md-12" id="secondSection">
            <form method="POST" action="http://54.173.2.13:9000/api/topics">
			   <br/>
            <p>Type in keyword of the topics you want to research</p>
               <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Input</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="topicin" name="appname" value = ""/>
                     </div>
               </div>
				  
               <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Output</label>
                     </div>
                     <div class="col-md-7">
                        <div style="border:1px solid black;padding:2px;width:700px;height:200px;">
                           <pre id="output"></pre>
                        </div>
                        <!-- <textarea rows="4" cols="50" id="output"></textarea> -->
                     </div>
               </div>
               <div class="form-group row " style="float: right; margin-right: 250px;">
                  <button id="topic-confirm" type="button" class="btn btn-primary mb-2" onclick="output()">Confirm</button>
               </div>
            </form>
      </div>
			
           
			
			
 