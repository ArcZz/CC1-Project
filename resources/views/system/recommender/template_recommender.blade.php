
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
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </p>
               <p style="text-align: justify;">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </p>
               <form type="POST">
                  <p style="text-align: justify;">
                     <label>Choose Image &nbsp;&nbsp;</label><input type="file" name="img"/>
                  </p>
                  <p style="text-align: right;">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#selectWorkflowModal">
                     Next
                     </button>
                  </p>
               </form>
            </div>
			
            <div  class="col-md-12" id="secondSection" ng-show="visibleSection && visibleSection=='temprecomdstep1'">
               <h4 style="display: inline-block;">Step 2: Image processing analysis - Details required - 1/5 General</h4>
               <form type="POST">
			   <br/>
				  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Application Name</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="appname" name="appname" value = ""/>
                     </div>
                  </div>
				  
                  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Application Type</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="apptype" name="apptype" value = ""/>
                     </div>
                  </div>
				  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Application Priority</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="apppriority" name="apppriority" value = ""/>
                     </div>
                  </div>
				  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Data Size of Your Application</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="datasize" name="datasize" value = ""/>
                     </div>
                  </div>
				  
                  <p style="text-align: left;">
                     <button type="button" class="btn btn-primary" ng-click="visibleSection ='temprecomdstep2'" >
                     Next
                     </button>
                  </p>
               </form>
            </div>
			
			
			<div  class="col-md-12" id="secondSection" ng-show="visibleSection && visibleSection=='temprecomdstep2'">
               <h4 style="display: inline-block;">Step 2: Image processing analysis - Details required - 2/5 Network-Connectivity</h4>
               <form type="POST">
			   <br/>
				  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Public or Private IP address</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="ipaddress" name="ipaddress" value = ""/>
                     </div>
                  </div>
				  
                  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Do you need P2P or VPN network?</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="networktype" name="networktype" value = ""/>
                     </div>
                  </div>
				  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Do you need Firewall?</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="firewall" name="firewall" value = ""/>
                     </div>
                  </div>
				  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Do you need SDN?</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="sdn" name="sdn" value = ""/>
                     </div>
                  </div>
				  
              
                  <p style="text-align: left;">
                     <button type="button" class="btn btn-primary" ng-click="visibleSection ='temprecomdstep3'" >
                     Next
                     </button>
                  </p>
               </form>
            </div>
			
			
			
			<div  class="col-md-12" id="secondSection" ng-show="visibleSection && visibleSection=='temprecomdstep3'">
               <h4 style="display: inline-block;">Step 2: Image processing analysis - Details required - 3/5 Storage</h4>
               <form type="POST">
			   <br/>
				  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Storage Size(GB)</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="storagesize" name="storagesize" value = ""/>
                     </div>
                  </div>
				  
                  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Do you need SSD Storage?</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="ssd" name="ssd" value = ""/>
                     </div>
                  </div>
				  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Choose the Data Center for Storage</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="datacenter" name="datacenter" value = ""/>
                     </div>
                  </div>
				
              
                  <p style="text-align: left;">
                     <button type="button" class="btn btn-primary" ng-click="visibleSection ='temprecomdstep4'" >
                     Next
                     </button>
                  </p>
               </form>
            </div>
			
			
			<div  class="col-md-12" id="secondSection" ng-show="visibleSection && visibleSection=='temprecomdstep4'">
               <h4 style="display: inline-block;">Step 2: Image processing analysis - Details required - 4/5 Storage</h4>
               <form type="POST">
			   <br/>
				  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Storage Size(GB)</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="storagesize" name="storagesize" value = ""/>
                     </div>
                  </div>
				  
                  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Do you need SSD Storage?</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="ssd" name="ssd" value = ""/>
                     </div>
                  </div>
				  <div class="form-group row ">
                     <div class="col-md-3">
                        <label for="jobname" class=" col-form-label">Choose the Data Center for Storage</label>
                     </div>
                     <div class="col-md-7">
                        <input type="text" class="form-control" id="datacenter" name="datacenter" value = ""/>
                     </div>
                  </div>
				
              
                  <p style="text-align: left;">
                     <button type="button" class="btn btn-primary" ng-click="visibleSection ='temprecomdstep5'" >
                     Next
                     </button>
                  </p>
               </form>
            </div>
			
			
            <div  class="col-md-12" id="secondSection" ng-show="visibleSection && visibleSection == 'temprecomdstep5'">
               <h4 style="display: inline-block;">Step 3: Image processing analysis - Select Cloud Template</h4>
               <p>
               </p>
               <p style="text-align: right;">
                  <button type="button" class="btn btn-primary" >
                  Next
                  </button>
               </p>
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
                     <button type="button" class="btn btn-primary" ng-click="proceed()">Proceed</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
 