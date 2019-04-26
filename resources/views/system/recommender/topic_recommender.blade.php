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
                                    output = output.concat('      SUGGESTED DATASETS: ', detail.datasets, '\n');

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
   
   <div class="row">
      <div class="col-12">
         <h3 class="section-heading">Topic Model</h3>
         <hr>
      </div>
   </div>
   <div class="row"  >
      <div class="col-md-12">
            <div  class="col-md-12" id="firstSection">
               <h4 style="display: inline-block;">What is Topic Model Recommender?</h4>
               <p style="text-align: justify;">
                  Suggest relevant research topics as well as recommend tools and datasets for each topic based on user’s search term. Help guide researchers to get started on a research topics without having to look through large amount of information

               </p>
               <p style="text-align: justify;">
                  Data used in the topic model had been trained by parsing through publish scientific papers (mostly neuroscience and bioinformatics) and discover relationship between topics, tools, and datasets
               </p>     
            </div>
      </div>
      <div  class="col-md-12" id="secondSection">
            <form method="POST" action="http://localhost:9000/api/topics">
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
                        <div style="border:1px solid black;padding:2px;">
                           <pre id="output"></pre>
                        </div>
                        <!-- <textarea rows="4" cols="50" id="output"></textarea> -->
                     </div>
               </div>
               <div class="form-group row ">
                  <button type="button" class="btn btn-primary mb-2" onclick="output()">Confirm</button>
               </div>
            </form>
      </div>
			
           
			
			
 