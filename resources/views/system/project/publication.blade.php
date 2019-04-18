@extends('system.layouts.header')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <!-- Services -->
    <section class="bg-light" id="services">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h3 class="section-heading">Publication Recommendation System</h3>
                </div>
                <div class="col-2">
                    <a href="{{ route('system.project.recommender') }}"><button type="button" class="btn btn-secondary" style="float:right">back</button></a>
                </div>
            </div>
            <hr class="hr-line">


            <div class="row">
                <div class="col-lg-12">
                    @php  echo '<h4>'.$type.'_API </h4>'; @endphp
                    <!-- <h3 class="section-subheading"> -->
                    <p>In this work, we propose a new approach for discovering various relationships among keywords over the scientific publications based on a Markov Chain model. It is an important problem since keywords are the basic elements for representing abstract objects such as documents, user profiles, topics and many things else. Our model is very effective since it combines four important factors in scientific publications: content, publicity, impact and randomness. Particularly, a recommendation system (called SciRecSys) has been presented to support users to efficiently find out relevant articles.</p>
                    <p></p>
                    <br>
                        @php
                            if(!isset($article)){
                      echo '<h4 id="psload"> <i class="fa fa-spinner fa-spin"></i> Loading...</h4>';
                      }
                    @endphp
                </div>
            </div>


            <br>

            @php

                if(isset($article)){
                // echo $article;
               $jsonData = json_decode($article,true);


               $doc = new DOMDocument();

               echo '<a href="https://www.ncbi.nlm.nih.gov/pubmed/' . $jsonData ['PMID']. '"><h4> Input article: ' . $jsonData['Title'] .'</h4></a><br>';
               echo '<b>List of Recommendations:</b>'.'<br>';
               for ($i =0; $i <=9; $i++) {
                   $j = $i + 1;
                   $web = 'https://www.ncbi.nlm.nih.gov/pubmed/' . $jsonData ['Sim'][$i];
                   @$doc->loadHTMLFile($web);
                   $xpath = new DOMXPath($doc);
                   echo '<div style="text-indent: 0.5%;">'. $j . ') <a href="https://www.ncbi.nlm.nih.gov/pubmed/' . $jsonData ['Sim'][$i] . '">' . $xpath->query('//title')->item(0)->nodeValue.'</a><br></div>';
               }
}

            @endphp
            @php
            @endphp

        </div>
    </section>





@endsection

@section('javascript')
    <script>
        var tmpNumber='{{ $number }}';
        var tmpString = '{{ $type }}';



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });

        $.ajax({

            type:'GET',
            url:'http://laravel/project/pubrec',
            crossDomain: true,

            credientials:false,
            emulateJSON: true,


            success:function(data){
                window.location.replace("http://laravel/project/pubrec");



            }

        });



        // $.ajax({
        //     url: "http://localhost:3002/artists?id=30753827",
        //     method: "POST",
        //     data: {"_token": _token},
        //     dataType: "json",
        //     success: function success(data) {
        //         if (data.error != 0) {
        //             alert(data.msg);
        //             return;
        //         }
        //
        //     }
        // });

    </script>


@endsection
