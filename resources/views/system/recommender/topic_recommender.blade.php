     <style>
         table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
         }
         th, td{
            padding: 5px;
         }

     </style>
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
               cplusplus:	'http://www.cplusplus.com',
               bluepyopt:	'https://bluepyopt.readthedocs.io',
               bootwptos:	'https://rdrr.io/cran/BootWPTOS/',
               freesurfer:	'https://surfer.nmr.mgh.harvard.edu/',
               edfbrowser:	'https://www.teuniz.net/edfbrowser/',
               tensorflow:	'https://www.tensorflow.org/',
               matplotlib:	'https://matplotlib.org/'
            };
            var dataset = { 
               excitatory: 'https://en.wikipedia.org/wiki/Excitatory_synapse',
               inhibitory: 'https://en.wikipedia.org/wiki/Inhibitory_postsynaptic_potential',
               circuit:    'https://en.wikipedia.org/wiki/Neural_circuit',
               granule:    'https://en.wikipedia.org/wiki/Granule_cell',
               mitral:     'https://en.wikipedia.org/wiki/Mitral_valve',
               purkinje:   'https://en.wikipedia.org/wiki/Purkinje_cell'
            };
            function output(){
             
               var xmlhttp = new XMLHttpRequest();
               var input = document.getElementById("topicin").value;
	            xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var text = null;
                        text = this.responseText;
                        text = JSON.parse(text);
                        var output = "Here is the tools and datasets we found relevant to your topic: \n\n";
                        if (input == 'neuron simulation'){
                           if(text != null){
                              var t = text.topics;
                              var detail = t[0];
                              output = output.concat('SUGGESTED TOOLS: \n');
                              output = output.concat('<table><tr><th>Tool Name</th><th>Description</th><th>Link</th></tr>');
                              //tools table
                              var to = detail.tools;
                              to = to.split(",");
                              var key1 = Object.keys(tool);
                              var link = [];
                              for(var i = 0; i < to.length;i++){
                                 for(var j = 0; j < key1.length;j++){
                                    if(to[i] == key1[j]){
                                       link[i] = '<a href='+tool[key1[j]]+'>'+tool[key1[j]]+'</a>';
                                    }
                                 }
                              }
                              output = output.concat('<tr><td>',to[0],'</td><td>Simulation for building and\nusing computational model of neurons</td><td>',link[0],'</td></tr>');
                              output = output.concat('<tr><td>',to[1],'</td><td>General purpose programming\nlanguage</td><td>',link[1],'</td></tr>');
                              output = output.concat('<tr><td>',to[2],'</td><td>Multi-paradigm numerical computing\nenviroment and proprietary programming language</td><td>',link[2],'</td></tr></table>\n\n');
                              
                              
                              output = output.concat('SUGGESTED DATASETS: \n');
                              output = output.concat('<table><tr><th>Dataset Name</th><th>Description</th><th>Link</th></tr>');
                              //datasets table
                              var da = detail.datasets;
                              da = da.split(",");
                              var key2 = Object.keys(dataset);
                              for(var i = 0; i < da.length;i++){
                                 for(var j = 0; j < key2.length;j++){
                                    if(da[i] == key2[j]){
                                       link[i] = '<a href='+dataset[key2[j]]+'>'+dataset[key2[j]]+'</a>';
                                    }
                                 }
                              }
                              output = output.concat('<tr><td>',da[0],'</td><td>Synapse in which action potential\nin a presynapse neuron increase probability\nof action potential occuring in postsynaptic cell</td><td>',link[0],'</td></tr>');
                              output = output.concat('<tr><td>',da[1],'</td><td>Kind of synaptic potential that\nmakes a postsynaptic neuron less likely to\ngenerate an action potential</td><td>',link[1],'</td></tr>');
                              output = output.concat('<tr><td>',da[2],'</td><td>Population of neurons interconnected\nby synapses to carry out a specific function\nwhen activated</td><td>',link[2],'</td></tr></table>');  
                              
                           }
                        }else if (input == 'brain cell'){
                           if(text != null){
                              var t = text.topics;
                              var detail = t[0];
                              output = output.concat('SUGGESTED TOOLS: \n');
                              output = output.concat('<table><tr><th>Tool Name</th><th>Description</th><th>Link</th></tr>');
                              //tools table
                              var to = detail.tools;
                              to = to.split(",");
                              var key1 = Object.keys(tool);
                              var link = [];
                              for(var i = 0; i < to.length;i++){
                                 for(var j = 0; j < key1.length;j++){
                                    if(to[i] == key1[j]){
                                       link[i] = '<a href='+tool[key1[j]]+'>'+tool[key1[j]]+'</a>';
                                    }
                                 }
                              }
                              output = output.concat('<tr><td>',to[0],'</td><td>Multi-paradigm numerical computing\nenviroment and proprietary programming language</td><td>',link[0],'</td></tr>');
                              output = output.concat('<tr><td>',to[1],'</td><td>Simulator for spiking neural\nnetwork</td><td>',link[1],'</td></tr>');
                              output = output.concat('<tr><td>',to[2],'</td><td>Opensource Matlab toolbox\nfor physiological research</td><td>',link[2],'</td></tr></table>\n\n');
                              
                              
                              output = output.concat('SUGGESTED DATASETS: \n');
                              output = output.concat('<table><tr><th>Dataset Name</th><th>Description</th><th>Link</th></tr>');
                              //datasets table
                              var da = detail.datasets;
                              da = da.split(",");
                              var key2 = Object.keys(dataset);
                              for(var i = 0; i < da.length;i++){
                                 for(var j = 0; j < key2.length;j++){
                                    if(da[i] == key2[j]){
                                       link[i] = '<a href='+dataset[key2[j]]+'>'+dataset[key2[j]]+'</a>';
                                    }
                                 }
                              }
                              output = output.concat('<tr><td>',da[0],'</td><td>Cells that account for the majority\nof neurons in the human brain</td><td>',link[0],'</td></tr>');
                              output = output.concat('<tr><td>',da[1],'</td><td>Valve that let blood flow from one\nchamber of the heart, the left atrium, the another, left ventricle</td><td>',link[1],'</td></tr>');
                              output = output.concat('<tr><td>',da[2],'</td><td>Cells that make up class GABAergic\nlocated in the cerebellum</td><td>',link[2],'</td></tr></table>');  
                              
                           }
                        }else{
                           if(text != null){
                              var t = text.topics;
                              var detail = t[0];
                              //tools table
                              var to = detail.tools;
                              to = to.split(",");
                              var key1 = Object.keys(tool);
                              for(var i = 0; i < to.length;i++){
                                 for(var j = 0; j < key1.length;j++){
                                    if(to[i] == key1[j]){
                                       to[i] = '<a href='+tool[key1[j]]+'>'+to[i]+'</a>';
                                    }
                                 }
                              }
                              //datasets table
                              var da = detail.datasets;
                              da = da.split(",");
                              var key2 = Object.keys(dataset);
                              for(var i = 0; i < da.length;i++){
                                 for(var j = 0; j < key2.length;j++){
                                    if(da[i] == key2[j]){
                                       da[i] = '<a href='+dataset[key2[j]]+'>'+da[i]+'</a>';
                                    }
                                 }
                              }
                              output = output.concat('  SUGGESTED TOOLS: ', to, ' \n');
                              output = output.concat('  SUGGESTED DATASETS: ', da, '\n');
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
                     <div class="col-md-12">
                        <label for="jobname" class=" col-form-label">Input</label>
                        <input type="text" class="form-control" id="topicin" name="appname" value = ""/>
                     </div>
               </div>
				  
               <div class="form-group row ">
                     <div class="col-md-12">
                        <label for="jobname" class=" col-form-label">Output</label>
                        <div style="border:1px solid black;padding:2px;width:885px;">
                           <pre id="output"></pre>
                        </div>
                     </div>
               </div>
               <div class="form-group row " style="justify-content: center;">
                   <button  id="topic-confirm" type="button" class="btn btn-primary mb-2" onclick="output()">Confirm</button>
               </div>
            </form>
      </div>
			
           
			
			
 