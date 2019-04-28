@extends('system.layouts.header')
@section('content')

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
                    echo '<h4>notebook: </h4>'; echo $notebooks['filename'];
                    echo '<br>';
                    echo '<h4>cell number: </h4>'; echo $notebooks['cell_no'];
                    echo '<br><br>';
               }
            @endphp
        </div>
    </div>
</section>

@endsection

@section('javascript')


@endsection