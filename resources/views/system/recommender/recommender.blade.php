@extends('system.layouts.header')
@section('content')

<link href="{{ asset('jscss/dropzone/dropzone.css') }}" rel="stylesheet">
<!-- Style sheet for the Chatbot -->
<link rel="stylesheet"  href="{{ asset('jscss/custom/chatbot/chatbot.css') }}">

<section class="bg-light">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="section-heading">Recommender Systems</h3>
				<hr class="hr-line">
			</div>
		</div>
		
		<div class="row" ng-controller="recommender-workflow">
		
		   <div class="col-md-3 recommender-left-menu"   > 
			  <input type="submit" id="jupyter_recommender_link" ng-click="openRecommender('jupyter_recommender');" ng-class="classActive['jupyter_recommender']" class="list-group-item  text-center"
				value ='Jupyter Notebook Recommender' />
			  
			   <input type="submit" id="publication_recommender_link" ng-click="$event.preventDefault();openRecommender('publication_recommender');" ng-class="classActive['publication_recommender']"  class="list-group-item text-center" 
				value="Publication Recommender" />
			  
			   <input type="submit" id="cloud_recommender_link" ng-click="$event.preventDefault();openRecommender('template_recommender');" ng-class="classActive['template_recommender']"   class="list-group-item text-center"
				value="Cloud solution Template Recommender" />
				
			   <input type="submit" id="topic_recommender_link" ng-click="$event.preventDefault();openRecommender('topic_recommender');" ng-class="classActive['topic_recommender']"  class="list-group-item text-center" 
				value="Topic Model" />
			  </a>
		   </div>
		   <div class="col-md-9 recommender-right-menu"   >
			  <div ng-show="recomm_section && recomm_section=='recommendersystems'">
				 @include(' system.recommender.recommendersystems')
			  </div>
			  <div ng-show="recomm_section && recomm_section=='template_recommender'">
				 @include(' system.recommender.template_recommender')
			  </div>
			  <div ng-show="recomm_section && recomm_section=='jupyter_recommender'">
				 @include(' system.recommender.jupyter_recommender')
			  </div>
			  <div ng-show="recomm_section && recomm_section=='publication_recommender'">
				 @include(' system.recommender.publication_recommender')
			  </div>
			  <div ng-show="recomm_section && recomm_section=='topic_recommender'">
				 @include(' system.recommender.topic_recommender')
			  </div>
		   </div>
		</div>
		
		<div ng-controller="chatbot-controller">
		  @include('system.analytics.chatbot')
	   </div>
		
	</div> <!-- container -->
</section>
@endsection
@section('javascript')
<script type="text/javascript">
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
</script>
<script type="text/javascript" src="{{ asset('jscss/custom/chatbot/chatbot-angular-controller-rec.js') }}"></script> 
<script type="text/javascript" src="{{ asset('jscss/custom/angular/controller/template-rec-workflow-controller.js') }}"></script> 
@endsection