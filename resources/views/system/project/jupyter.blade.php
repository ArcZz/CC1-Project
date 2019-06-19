@extends('system.layouts.header')
@section('content')

<link href="{{ asset('jscss/dropzone/dropzone.css') }}" rel="stylesheet">
<!-- Style sheet for the Chatbot -->
<link rel="stylesheet"  href="{{ asset('jscss/custom/chatbot/chatbot.css') }}">

<section class="bg-light" id="services">
        <div class="container">
            <div class="row">
                <a href="{{ url("/system/recommender/recommender") }}" ><--Back to Recommender</a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="section-heading">Jupyter Recommendation System</h3>
                    <hr class="hr-line">
                    <!-- <h3 class="section-subheading"> -->
                    <p>List of Recommended Notebooks</p>
                    <p></p>
                    </br>
                </div>
            </div>
            </br>
            @php
                // echo $notebooks;
               $jsonData = json_decode($notebooks,true);
               
               foreach($jsonData['notebooks'] as $notebooks) {
                    $hyperlink = "http://ec2-3-83-127-51.compute-1.amazonaws.com/notebooks/" . $notebooks['filename'];
                    echo '<h4>notebook: </h4>'; echo "<a class='junotebook' href=" . $hyperlink . ">" . $notebooks['filename'] . "</a>";
                    echo '<br>';
                    echo '<h4>cell number: </h4>'; echo $notebooks['cell_no'];
                    echo '<br><br>';
               }
            @endphp
        </div>
        <div ng-controller="chatbot-controller">
            @include('system.analytics.chatbot')
        </div>
    </div>

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