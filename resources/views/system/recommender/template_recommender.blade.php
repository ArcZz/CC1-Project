
 <div ng-controller = "temp-recommender-workflow" >

   <div class="row">
      <div class="col-12">
         <h3 class="section-heading">Cloud solution Template Recommender</h3>
         <hr>
      </div>
   </div>
   <div class="row"  >
      <div class="col-md-12">
         <div class="row"  id="data-processing" >
            <div  class="col-md-12" id="firstSection" ng-show="visibleSection && visibleSection=='firstpage'">
               <h4 style="display: inline-block;">Step 1: Image processing analysis - Choose Image</h4>
               <p style="text-align: justify;">
					Image processing analysis is one example of how cloud solution template recommender works.
               </p>
             
               <form type="POST" enctype="multipart/form-data" id="modal_form_id"  >
                  <p style="text-align: justify;">
                     <label>Select Image to process: &nbsp;&nbsp;</label><input  type="file" id="img1" name="img1"/>
                  </p>
				  
				   
                  <p style="text-align: right;">
                     <button type="button" class="btn btn-primary" id='upload'  data-toggle="modal" data-target="#selectWorkflowModal"> 
                     Next
                     </button>
                  </p>
               </form>
            </div>
			
         
			
			<div  class="col-md-12" id="secondSection" ng-show="visibleSection && visibleSection=='temprecomdstep1'">
               <h4 style="display: inline-block;">Step 2: Image processing analysis - Required Details</h4>
               <form type="POST">
			   <br/>
				  
				  
                  <div class="form-group row ">
                     <div class="col-md-12">
                        <label for="req_os" class=" col-form-label">Required OS</label><br>
						<select class="form-control"  ng-model="clouddetails.req_os" name="select">
							<option>--Select OS--</option>
							<option value="LINUX">LINUX </option>
							<option  value="RHEL"> RHEL</option>
							<option  value="SLES">SLES </option>
							<option  value="WINDOWS">WINDOWS </option>
						</select>
						
                     </div>
                    
                  </div>
				  <div class="form-group row ">
                     <div class="col-md-12">
                        <label for="jobname" class=" col-form-label">No. of cores or vCPUs you need?</label>
						<input type="text" class="form-control" ng-model="clouddetails.req_vCPU" id="req_vCPU" name="req_vCPU" value = ""/>
                     </div>
                    
                  </div>
				   <div class="form-group row ">
                     <div class="col-md-12">
                        <label for="jobname" class=" col-form-label">Whats the size of your RAM</label>
						<input type="text" class="form-control" ng-model="clouddetails.req_ram" id="req_ram" name="req_ram" value = ""/>

                     </div>
                     
                  </div>
				  
				  <div class="form-group row ">
                     <div class="col-md-12">
                        <label for="jobname" class=" col-form-label">Required Network</label>
						<input type="text" class="form-control" ng-model="clouddetails.req_network" id="req_network" name="req_network" value = ""/>
                     </div>
                     
                  </div>
				  <div class="form-group row ">
                     <div class="col-md-12">
                        <label for="jobname" class=" col-form-label">Required clock speed(GHz)</label>
						<input type="text" class="form-control"  ng-model="clouddetails.req_clock"  id="req_clock" name="req_clock" value = ""/>
                     </div>
                    
                  </div>
				  <div class="form-group row ">
                     <div class="col-md-12">
                        <label for="jobname" class=" col-form-label">Do you require dedicated GPU?</label><br>
						<select  class="form-control"  name="req_gpu">
							<option>--Select--</option>
							<option value="true">Yes </option>
							<option  value="false"> No</option>
						
						</select>
                     </div>
                    
                  </div>
				  
				<div class="form-group row ">
                     <div class="col-md-12">
                        <label for="jobname" class=" col-form-label">Storage Size(GB)</label>
						<input type="text" class="form-control"  ng-model="clouddetails.req_storage" id="req_storage" name="req_storage" value = ""/>
                     </div>
                    
                  </div>
				  
				  <div class="form-group row ">
                     <div class="col-md-12">
                        <label for="jobname" class=" col-form-label">Do you need SSD Storage?</label><br/>
						<select  name="req_ssd" class="form-control" >
							<option>--Select--</option>
							<option value="true">Yes </option>
							<option  value="false"> No</option>
						
						</select>
                     </div>
                    
                  </div>
              
                  <p style="text-align: left;">
                     <button type="button" id="callOptimizer" class="btn btn-primary" ng-click="callOptimizer(clouddetails);" >
                     Next
                     </button>
                  </p>
               </form>
            </div>
			
			
            <div  class="col-md-12" id="secondSection" ng-show="visibleSection && visibleSection == 'temprecomdstep2'">
               <h4 style="display: inline-block;">Step 3: Image processing analysis - Select Cloud Template</h4>
               <br/>
			   
			   <div class="row">
					
					<div class="col-md-3 cloudsolution red">
						<div class="cloud_header ">
							<h4> Red </h4>
							
						</div>
						<div class="cloud_body ">
							<div class="template" ng-repeat="(key, cloudTemplate) in cloudTemplateSuggetion.Red" >
								 <p>Template @{{ key+1 }} &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;  Cost : @{{ cloudTemplate.template_Cost|number : 2  }} / hour</p>
								 <button id="viewred@{{ key+1 }}" data-toggle="modal" data-target="#viewTemplateDetail"  ng-click="viewTemplateDetails(cloudTemplate);" > View details</button> &nbsp;&nbsp;|&nbsp;&nbsp;
								 <button  id="selectred@{{ key+1 }}"  ng-click="selectTemplate(cloudTemplate,false);" >Select Template</button>
								 
							</div>
						</div>
					</div>
					
					<div class="col-md-3 cloudsolution green">
						<div class="cloud_header ">
							<h4> Green </h4>
							
						</div>
						<div class="cloud_body ">
							<div class="template" ng-repeat="(key, cloudTemplate) in cloudTemplateSuggetion.Green">
								 <p>Template @{{ key+1 }} &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;  Cost : @{{ cloudTemplate.template_Cost |number : 2  }} / hour</p>
								  <button id="viewgreen@{{ key+1 }}"  data-toggle="modal" data-target="#viewTemplateDetail"  ng-click="viewTemplateDetails(cloudTemplate);" > View details</button> &nbsp;&nbsp;|&nbsp;&nbsp;
								  <button id="selectgreen@{{ key+1 }}"  ng-click="selectTemplate(cloudTemplate,false);">Select Template</button>
								 
							</div>
						</div>
					</div>
					
					
					<div class="col-md-3 cloudsolution gold">
						<div class="cloud_header ">
							<h4> Gold </h4>
							
						</div>
						<div class="cloud_body ">
							<div class="template" ng-repeat="(key, cloudTemplate) in cloudTemplateSuggetion.Gold">
								 <p>Template @{{ key+1 }} &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;  Cost : @{{ cloudTemplate.template_Cost |number : 2 }} / hour</p>
								 <button  id="viewgold@{{ key+1 }}"   data-toggle="modal" data-target="#viewTemplateDetail"  ng-click="viewTemplateDetails(cloudTemplate);" > View details</button> &nbsp;&nbsp;|&nbsp;&nbsp;
								 <button id="selectgold@{{ key+1 }}"  ng-click="selectTemplate(cloudTemplate,false);" >Select Template</button>
								 
							</div>
						</div>
					</div>
			   </div>
              <!-- <p style="text-align: right;">
                  <button type="button" class="btn btn-primary" >
                  Next
                  </button>
               </p>-->
            </div>
			
			 <div  class="col-md-12" id="secondSection" ng-show="visibleSection && visibleSection == 'temprecomdstep3'">
               <h4 style="display: inline-block;">Step 3: Image processing analysis - Select Cloud Template</h4>
               <br/>
			   
			   <div class="row">
					
					<div class="col-md-12  ">
						<div class="alert alert-success" >
							<p>Workflow has been submitted </p>
							<p><a href="#"  ng-click="checkStatus();" style="text-decoration: underline;">Click Here</a> to @{{ link_text }}
							&nbsp;&nbsp;&nbsp; <a target="_blank" download href="http://cyneuro.orgdev/jscss/custom/img/img_after"   style="text-decoration: underline;" > Download File </a>
							</p>
							<div ng-show="loader_status"> <div  class="loader green" ></div> &nbsp;&nbsp;&nbsp;Checking Status   </div>
							<p><pre style="overflow:hidden;">
							@{{ output_status }}
							</pre>
							</p>
						</div>
						
					</div>
					
				
					
			   </div>

            </div>
			
			 <div  class="col-md-12" id="secondSection" ng-show="visibleSection && visibleSection == 'temprecomdstep4'">
               <h4 style="display: inline-block;">Step 3: Image processing analysis - Select Cloud Template</h4>
               <br/>
			   
			   <div class="row">
					
					<div class="col-md-12  ">
						<div class="alert alert-warning" >
							<p> <div class="loader"></div> &nbsp;&nbsp;&nbsp;Please Wait, We are allocating resources for you....</p>
						</div>
						
					</div>
					
				
					
			   </div>
             
            </div>
			
         </div>
         <!-- Modal -->
         <div class="modal fade" id="selectWorkflowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Select Workflow Type</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <div class="alert alert-danger" ng-show="errorworkflowtype">  
                        Please select workflow type.
                     </div>
                     <input type="radio" id="default" name="workflowtype" value="default" ng-model="workflowtype.name"  />
                     <label   for="default">Default</label>
                     <br/>
                     <input type="radio" id="temprecomd" name="workflowtype" value="temprecomd"  ng-model="workflowtype.name" />
                     <label  for="temprecomd">Cloud solution Template Recommender</label>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" id="closeWorkflowModal" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary" ng-click="proceed()"  >Proceed</button>
                  </div>
               </div>
            </div>
         </div>
		 
		 
		 <div class="modal fade" id="viewTemplateDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
            <div class="modal-dialog" role="document" style="max-width: 850px !important;">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Template Details</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <table class="cloud_table table">
						<thead>
							<tr>
								<td>Cloud Service Provider</td>
								<td>Instance Name</td>
								<td>Instance Count</td>
								<td>Instance OS</td>
								<td>Instance vCPU</td>
								<td>Instance RAM</td>
								<td>Instance Price</td>
								<td>Instance Network</td>
								<td>Instance Clock</td>
							</tr>
						</thead>
						<tbody ng-bind-html='UsedToInsertHTMLCode'></tbody>
					</table>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" id="closeSelectTempModal" data-dismiss="modal">Close</button>
                   <!--  <button type="button" class="btn btn-primary" ng-click="selectTemplate(cloudTemplate,true);">Select Template</button> -->
                  </div>
               </div>
            </div>
         </div>
		 
		 
      </div>
   </div>
   
</div>
 