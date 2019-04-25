system_app.controller('recommender-workflow', function($scope, $http, $window) {
	
	$scope.recomm_section ='recommendersystems';
	
	//$scope.cloudTemplateSuggetion ='hhhhhhh';//{"red":["red1","red2","red3"],"green":["green1","green2","green3","green4"],"gold":["gold1","gold2"]};
	
	
	
	
	$scope.openRecommender=function(recommender_section){
		$scope.recomm_section=recommender_section;
		$scope.classActive=[];
		$scope.classActive[recommender_section] = 'active';
		$scope.visibleSection='firstpage';
	}
	
	$scope.proceed = function(){
		
		console.log($scope.workflowtype);
		if(!$scope.workflowtype){
			//alert("Please select workflow type.");
			$scope.errorworkflowtype=true;
			
		}else if($scope.workflowtype.name == 'temprecomd'){
			
			$scope.visibleSection ='temprecomdstep1';
			$scope.firstSection =false;
			$scope.errorworkflowtype=false;
			
			var closeWorkflowModal = document.getElementById('selectWorkflowModal');
			selectWorkflowModal.click();
			
			
		}
		
			
		
	}
	
	
	
}); 