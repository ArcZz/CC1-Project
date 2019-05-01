system_app.controller('recommender-workflow', function ($scope, $http, $window, $sce) {

	$scope.recomm_section = 'recommendersystems';


	$scope.clouddetails = {};
	$scope.req_operatingsystem = function (operating_system) {
		req_os_ = [];
		if ($scope.clouddetails.req_os) {
			req_os_ = $scope.clouddetails.req_os;
		}

		if ($scope.operatingsystem[operating_system]) {
			req_os_.push(operating_system);
		} else {
			for (var i = 0; i < req_os_.length; i++) {
				if (req_os_[i] == operating_system) {
					req_os_.splice(i, 1);
					break;
				}
			}
		}


		$scope.clouddetails.req_os = req_os_;
		console.log($scope.clouddetails);
	}
 
	$scope.openRecommender = function (recommender_section) {
		$scope.recomm_section = recommender_section;
		$scope.classActive = [];
		$scope.classActive[recommender_section] = 'active';

		if (recommender_section == 'template_recommender') {
			$scope.visibleSection = 'temprecomdstep1';
		}
	}

	$scope.callOptimizer = function (clouddetails) {

		console.log(clouddetails);
		clouddetails = '{"req_os":"LINUX","req_vCPU":"8","req_ram":"12","req_network":"5","req_clock":"2","req_gpu":false,"req_storage":"20","req_ssd":false}';

		var req = {
			method: 'POST',
			url: '/callOptimizer',
			headers: {
				'Content-Type': 'json',
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: clouddetails

		}


		$http(req).then(function (responseText) {
			console.log(responseText.data.msg);
			var response = JSON.parse(responseText.data.msg);

			if (response.status == 200) {

				$scope.visibleSection = 'temprecomdstep2';
				var cloudTemplateSuggetion = response.data;
				$scope.cloudTemplateSuggetion = cloudTemplateSuggetion;
				 
			} else {
				alert("Issue with API");
			}


		});


	}


	$scope.viewTemplateDetails = function (cloudTemplate) {
		var html = '';
		var  instances = cloudTemplate.instances;
		for (key_cloud in instances) {

			var instance = instances[key_cloud];
			html = html + ' <tr >';

			html = html + '<td>' + instance.instance_csp + '</td>';
			html = html + '<td>' + instance.instance_name + '</td>';
			html = html + '<td>' + instance.instance_count + '</td>';
			html = html + '<td>' + instance.instance_details.OS + '</td>';
			html = html + '<td>' + instance.instance_details.vCPU + '</td>';
			html = html + '<td>' + instance.instance_details.ram + '</td>';
			html = html + '<td>' + instance.instance_details.price + '</td>';
			html = html + '<td>' + instance.instance_details.network + '</td>';
			html = html + '<td>' + instance.instance_details.clock + '</td>';

			html = html + ' </tr >';
		}


		$scope.UsedToInsertHTMLCode = $sce.trustAsHtml(html);

	}
	
	$scope.selectTemplate = function(cloudTemplate){
		var type_cloud = [];
		var  instances = cloudTemplate.instances;
		for (key_cloud in instances) {
			var instance = instances[key_cloud];

			if(type_cloud && type_cloud.indexOf(instance.instance_csp) == -1){
				type_cloud.push(instance.instance_csp);
			}
		}
		
		var check_aws = type_cloud.indexOf("AWS");
		var check_local = type_cloud.indexOf("LOCAL");
		
		if(check_aws >= 0 && check_local >= 0){
			cloudTemplate['typeofInstance'] = 'AWS_LOCAL';
		}
		else if(check_aws >= 0 && check_local == -1){
			cloudTemplate['typeofInstance'] = 'AWS';

		}
		else if(check_aws == -1 && check_local >= 0){
			cloudTemplate['typeofInstance'] = 'LOCAL';

		}
		
		var req = {
			method: 'POST',
			url: '/allocateResources',
			headers: {
				'Content-Type': 'json',
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			params:{"cloudTemplate":cloudTemplate}

		}

		$http(req).then(function (data) {
			console.log(data);
			alert(1)
		});
		
		

	}

	$scope.proceed = function () {

		console.log($scope.workflowtype);
		if (!$scope.workflowtype) {
			//alert("Please select workflow type.");
			$scope.errorworkflowtype = true;

		} else if ($scope.workflowtype.name == 'temprecomd') {

			$scope.visibleSection = 'temprecomdstep1';
			$scope.firstSection = false;
			$scope.errorworkflowtype = false;

			var closeWorkflowModal = document.getElementById('selectWorkflowModal');
			selectWorkflowModal.click();


		}


	}


});