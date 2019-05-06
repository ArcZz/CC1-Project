<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="row">
    <div class="col-12">
        <h3 class="section-heading">Publication Recommender</h3>
        <hr>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <form method="post" id="myFormSearch">
            {{ csrf_field() }}
            <div class="form-group">
                <Label>We have developed a PubMed article recommendation system, which is based on content-based filtering. This filter is for searching for specific authors, PMID, and titles which also suggest relevant related research publications.</Label>
                </br></br>
                <label for="pubin">Input</label>
                <label for="putype">Type:</label>
                <select class="form-control" id="putype" name="putype">
                    <option value="1">PMID</option>
                    <option value="2">Title</option>
                    <option value="3">Author</option>
                </select>
                </br>
                <input type="text" class="form-control" name="searchInput" id="searchInput" aria-describedby="pubHelp"
                       placeholder='Please enter "PMID", "Title", or "Author"...'>
                <label style = "color: gray;"> Example for PMID = 12345678</label>
                </br></br>
                <button id="publication-confirm-button" type="submit" class="btn btn-primary" style="...">Confrim</button>
            </div>
        </form>

        <div id="resultID"></div>

    </div>
</div>

<script>

    $(document).ready(function () {

        $('#myFormSearch').on('submit', function(event) {

            $('#resultID').empty();

            event.preventDefault();
            var type = $("#putype").val();
            var searchKey = $("#searchInput").val();
            var url;

            $("#resultID").append(' <div class="w3-container" id="w3-container"> </div>');


            if (type == 1) {

                //----------------------------------------------------------------------------------------------------//
                //----------------------------------------------------------------------------------------------------//

                // url = "http://localhost:3002/PMID?id=" + searchKey;
                url = "http://ec2-3-87-14-167.compute-1.amazonaws.com:3002/PMID?id=" + searchKey

                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'JSON',
                    beforeSend: function() {
                        $("#myFormSearch").after('<h4 id="psload" style="text-align:center"><i class="fa fa-spinner fa-spin"></i> Loading...</h4>');
                    },
                    success: function (data) {

                        if (data[0] != undefined) {
                            $("#w3-container").append('<div class="w3-panel w3-card" id="w3-card-outer"></div>');
                            $("#w3-card-outer").append('<h3 style="color: #4C4CFF;"  id="titleID"></h3>');  // 1
                            $("#w3-card-outer").append('<p id="authorID"></p>');   // 2
                            $("#w3-card-outer").append('<p id="abstractID"></p>'); // 3
                            $("#w3-card-outer").append('<p id="PMID"></p>');       // 4

                            console.log(data[0]); // DEBUG

                            // 1
                            $("#titleID").append('<a href="https://www.ncbi.nlm.nih.gov/pubmed/' + data[0].PMID + '">' + data[0].Title + '</a>');

                            // 2
                            $("#authorID").append('<h5>'+ "Author(s): " + '</h5>');
                            for (var i = 0; i < data[0].Authors.length - 1; i++) {
                                $("#authorID").append(data[0].Authors[i] + ', ');
                            }
                            $("#authorID").append(data[0].Authors[i]);

                            //3
                            $("#abstractID").append('<h5>'+ 'Abstract: ' + '</h5>'+ data[0].Abstract);

                            // 4
                            $("#PMID").append('<h5>'+ "PMID: " + '</h5>'+ data[0].PMID);

                            for (var i = 0; i < data[0].Sim.length; i++) {

                                var PMID = data[0].Sim[i];
                                url = "http://ec2-3-87-14-167.compute-1.amazonaws.com:3002/PMID?id=" + PMID;

                                $.ajax({
                                    type: 'GET',
                                    url: url,
                                    dataType: 'JSON',
                                    // beforeSend: function() {
                                    //     $("#myFormSearch").after('<h4 id="psload" style="text-align:center"><i class="fa fa-spinner fa-spin"></i> Loading...</h4>');
                                    // },
                                    success: function (data) {

                                        console.log(data[0]); // DEBUG

                                        $("#w3-container").after(' <div class="w3-container" id="w3-container-inner"> </div>');
                                        $("#w3-container-inner").append('<div class="w3-panel w3-card" id="w3-card-inner"></div>');
                                        $("#w3-card-inner").append('<h3 style="color: #4C4CFF;" id="titleID-inner"></h3>');  // 1
                                        $("#w3-card-inner").append('<p id="authorID-inner"></p>');   // 2
                                        $("#w3-card-inner").append('<p id="abstractID-inner"></p>'); // 3
                                        $("#w3-card-inner").append('<p id="PMID-inner"></p>');       // 4

                                        // 1
                                        $("#titleID-inner").append('<a href="https://www.ncbi.nlm.nih.gov/pubmed/' + data[0].PMID + '">' + data[0].Title + '</a>');

                                        // 2
                                        $("#authorID-inner").append('<h5>'+ "Author(s): " + '</h5>');
                                        for (var i = 0; i < data[0].Authors.length - 1; i++) {
                                            $("#authorID-inner").append(data[0].Authors[i] + ', ');
                                        }
                                        $("#authorID-inner").append(data[0].Authors[i]);

                                        //3
                                        $("#abstractID-inner").append('<h5>'+ 'Abstract: ' + '</h5>'+ data[0].Abstract);

                                        // 4
                                        $("#PMID-inner").append('<h5>'+ "PMID: " + '</h5>'+ data[0].PMID);
                                    }

                                }).fail(function (xhr, status, error) {
                                    $('#resultID').empty();
                                    $("#resultID").append('<br><br><div style="text-align:center;" id="notFound">Not Found</div>');
                                });

                            }

                        } else {
                            $('#resultID').empty();
                            $("#resultID").append('<br><br><div style="text-align:center;" id="notFound">Not Found</div>');
                        }
                        $("#psload").remove();
                    }

                }).fail(function (xhr, status, error) {
                    $('#resultID').empty();
                    $("#resultID").append('<br><br><div style="text-align:center;" id="notFound">Not Found</div>');
                });

            } else if (type == 2) {

                //----------------------------------------------------------------------------------------------------//
                //----------------------------------------------------------------------------------------------------//

                // url = "http://localhost:3002/titles?id=" + searchKey
                url = "http://ec2-3-87-14-167.compute-1.amazonaws.com:3002/titles?id=" + searchKey

                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'JSON',
                    beforeSend: function() {
                        $("#myFormSearch").after('<h4 id="psload" style="text-align:center"><i class="fa fa-spinner fa-spin"></i> Loading...</h4>');
                    },
                    success: function (data) {

                        if (data[0] == undefined) {
                            $('#resultID').empty();
                            $("#resultID").append('<br><br><div style="text-align:center;" id="notFound">Not Found</div>');
                        }

                        for (var i = 0; i < data.length; i++) {

                            console.log(data[i]);

                            if (data[i] != undefined) {

                                $("#w3-container").append('<div class="w3-panel w3-card">' +
                                    '<h3 style="color: #4C4CFF;"  id="titleID">' +
                                    '<a href="https://www.ncbi.nlm.nih.gov/pubmed/' + data[i].PMID + '">' + data[i].Title + '</a>' +
                                    '</h3>' +
                                    '<h5>'+ "Author(s): " + '</h5>' +
                                    '<p id="authorID' + i + '">' +
                                    '</p>' +
                                    '<p id="abstractID">' +
                                    '<h5>'+ 'Abstract: ' + '</h5>'+ data[i].Abstract +
                                    '</p>' +
                                    '<p id="PMID">' +
                                    '<h5>'+ "PMID: " + '</h5>'+ data[i].PMID +
                                    '</p>' +
                                    '</div>');

                                for (var j = 0; j < data[i].Authors.length - 1; j++) {
                                    $("#authorID"+ i).append(data[i].Authors[j] + ', ');
                                }
                                $("#authorID" + i).append(data[i].Authors[j]);

                            }
                        }

                        $("#psload").remove();

                    }

                }).fail(function (xhr, status, error) {
                    $('#resultID').empty();
                    $("#resultID").append('<br><br><div style="text-align:center;" id="notFound">Not Found</div>');
                });

            } else if (type == 3) {

                //----------------------------------------------------------------------------------------------------//
                //----------------------------------------------------------------------------------------------------//

                // url = "http://localhost:3002/authors?id=" + searchKey
                url = "http://ec2-3-87-14-167.compute-1.amazonaws.com:3002/authors?id=" + searchKey;
                
                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'JSON',
                    beforeSend: function() {
                        $("#myFormSearch").after('<h4 id="psload" style="text-align:center"><i class="fa fa-spinner fa-spin"></i> Loading...</h4>');
                    },
                    success: function (data) {

                        if (data[0] == undefined) {
                            $('#resultID').empty();
                            $("#resultID").append('<br><br><div style="text-align:center;" id="notFound">Not Found</div>');
                        }

                        for (var i = 0; i < data.length; i++) {

                            console.log(data[i]);

                            if (data[i] != undefined) {

                                $("#w3-container").append('<div class="w3-panel w3-card">' +
                                    '<h3 style="color: #4C4CFF;"  id="titleID">' +
                                    '<a href="https://www.ncbi.nlm.nih.gov/pubmed/' + data[i].PMID + '">' + data[i].Title + '</a>' +
                                    '</h3>' +
                                    '<h5>'+ "Author(s): " + '</h5>' +
                                    '<p id="authorID' + i + '">' +
                                    '</p>' +
                                    '<p id="abstractID">' +
                                    '<h5>'+ 'Abstract: ' + '</h5>'+ data[i].Abstract +
                                    '</p>' +
                                    '<p id="PMID">' +
                                    '<h5>'+ "PMID: " + '</h5>'+ data[i].PMID +
                                    '</p>' +
                                    '</div>');

                                for (var j = 0; j < data[i].Authors.length - 1; j++) {
                                    $("#authorID"+ i).append(data[i].Authors[j] + ', ');
                                }
                                $("#authorID" + i).append(data[i].Authors[j]);

                            }
                        }

                        $("#psload").remove();

                    }

                }).fail(function (xhr, status, error) {
                    $('#resultID').empty();
                    $("#resultID").append('<br><br><div style="text-align:center;" id="notFound">Not Found</div>');
                });

            }

        });

    });

</script>