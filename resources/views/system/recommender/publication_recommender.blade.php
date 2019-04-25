<div class="row">
    <div class="col-12">
        <h3 class="section-heading">Publication Recommender</h3>
        <hr>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <form action="{{ url("/project/pubrec") }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">


                <label for="pubin">Publication Recommender System input</label>
                <label for="putype">Type</label>
                <select class="form-control" id="putype" name="putype">
                    <option>Articles</option>
                    <option>Artists</option>

                </select>
                </br>

                <input type="text" class="form-control" name="pubin" id="pubin" aria-describedby="pubHelp"
                       placeholder="Enter number">
                <small id="pubHelp" class="form-text text-muted">the number x reuquired xxxx.</small>
                </br>
                <button type="submit" class="btn btn-primary">Confirm</button>


            </div>
        </form>


    {{--                    @php  echo '<h4>'.$type.'_API </h4>'; @endphp--}}
    <!-- <h3 class="section-subheading"> -->
        <p>In this work, we propose a new approach for discovering various relationships among keywords over the
            scientific publications based on a Markov Chain model. It is an important problem since keywords are the
            basic elements for representing abstract objects such as documents, user profiles, topics and many things
            else. Our model is very effective since it combines four important factors in scientific publications:
            content, publicity, impact and randomness. Particularly, a recommendation system (called SciRecSys) has been
            presented to support users to efficiently find out relevant articles.</p>
        <br>

        <div id="resultID">
            <h4 id="psload"><i class="fa fa-spinner fa-spin"></i> Loading...</h4>
            Title: <h3 id="titleID"></h3>
            Abstract: <p id="abstractID"></p>
            Authors:
            <ul id="authorID"></ul>
            PMID: <b id="PMID"></b><br><br>
            Related Articles: <p style="margin-left:1.75%;" id="simID"></p>
        </div>

        <script>
            {{--var tmpNumber='{{ $number }}';--}}
                tmpNumber = 123213;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // $(window).on("load", function () {
            $(document).ready(function () {

                var x = "http://localhost:3002/articles?id=";
                var y = "@php echo 30742056 @endphp"; //"30742056";
                var url = x + y;

                $.ajax({
                    type: 'GET',
                    url: url,
                    // crossDomain: true,
                    // credientials:false,
                    // emulateJSON: true,
                    dataType: 'JSON',

                    success: function (data) {
                        console.log(data[0]);

                        $("#titleID").append('<a href="https://www.ncbi.nlm.nih.gov/pubmed/' + data[0].PMID + '">' + data[0].Title + '</a>');
                        $("#PMID").append(data[0].PMID);
                        $("#abstractID").append(data[0].Abstract);

                        for (var i = 0; i < data[0].Authors.length; i++) {
                            $("#authorID").append('<li>' + data[0].Authors[i] + '</li>');
                        }

                        for (var i = 0; i < 10; i++) {
                            var PMID = data[0].Sim[i];

                            $("#simID").append('pmid' + '<li> <a href="https://www.ncbi.nlm.nih.gov/pubmed/' + PMID + '" target="_blank">' +
                                "https://www.ncbi.nlm.nih.gov/pubmed/" + PMID +
                                '</a></li>');
                        }


                        {{--                    @php--}}
                        {{--                        $json = file_get_contents('http://localhost:3002/articles?id=30742056');--}}
                        {{--                        $obj = json_decode($json, true);--}}
                        {{--                        // $myvar = $obj[0]['Sim'][0];--}}
                        {{--                        // echo ($myvar);--}}
                        {{--                        // $doc = new DOMDocument();--}}
                        {{--                    @endphp--}}

                        {{--                    @php--}}
                        {{--                        for ($i =0; $i <=9; $i++) {--}}
                        {{--                            $str = file_get_contents('https://www.ncbi.nlm.nih.gov/pubmed/30792538');--}}
                        {{--                            $str = trim(preg_replace('/\s+/', ' ', $str));--}}
                        {{--                            preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title);--}}
                        {{--                            //print_r($title);--}}

                        {{--                    @endphp--}}
                        {{--                            // $("#simID").append('<li> <a href="https://www.ncbi.nlm.nih.gov/pubmed/' + data[0].Sim[i] + '">' + data[0].Sim[i] + '</a></li>');--}}
                        {{--                            $("#simID").append('<li> <a href="https://www.ncbi.nlm.nih.gov/pubmed/' + @php echo $obj[0]['Sim'][$i] @endphp + '">' + @php echo $obj[0]['Sim'][$i] @endphp + '</a></li>');--}}
                        {{--                    @php--}}
                        {{--                        }--}}
                        {{--                    @endphp--}}


                        $("#psload").hide()
                    }

                }).fail(function (xhr, status, error) {
                    $("#resultID").after(error);
                })

            });

            {{--                @php--}}

            {{--                    if(isset($article)){--}}
            {{--                    // echo $article;--}}
            {{--                   $jsonData = json_decode($article,true);--}}


            {{--                   $doc = new DOMDocument();--}}

            {{--                   echo '<a href="https://www.ncbi.nlm.nih.gov/pubmed/' . $jsonData ['PMID']. '"><h4> Input article: ' . $jsonData['Title'] .'</h4></a><br>';--}}
            {{--                   echo '<b>List of Recommendations:</b>'.'<br>';--}}
            {{--                   for ($i =0; $i <=9; $i++) {--}}
            {{--                       $j = $i + 1;--}}
            {{--                       $web = 'https://www.ncbi.nlm.nih.gov/pubmed/' . $jsonData ['Sim'][$i];--}}
            {{--                       @$doc->loadHTMLFile($web);--}}
            {{--                       $xpath = new DOMXPath($doc);--}}
            {{--                       echo '<div style="text-indent: 0.5%;">'. $j . ') <a href="https://www.ncbi.nlm.nih.gov/pubmed/' . $jsonData ['Sim'][$i] . '">' . $xpath->query('//title')->item(0)->nodeValue.'</a><br></div>';--}}
            {{--                   }--}}
            {{--    }--}}

            {{--                @endphp--}}



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


    </div>
</div>


