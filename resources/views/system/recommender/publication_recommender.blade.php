<div class="row">
    <div class="col-12">
        <h3 class="section-heading">Publication Recommender</h3>
        <hr>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <form method="post" id="myForm1">
            {{ csrf_field() }}
            <div class="form-group">
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
                </br>
                <button id="publication-confirm-button" type="submit" class="btn btn-primary" style="float: right;">Confirm</button>
            </div>
        </form>

        <div id="resultID"></div>

    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {

        $('#myForm1').on('submit', function(event) {

            $("#resultID").append(' <div class="w3-container" id="w3-container"> </div>');
            $("#w3-container").append('<div class="w3-panel w3-card" id="panel1"></div>');
            $("#panel1").append('<h3 id="titleID"></h3>');
            $("#panel1").append('<p id="authorID"></p>');
            $("#panel1").append('<p id="abstractID"></p>');
            $("#panel1").append('<p id="PMID"></p>');



            event.preventDefault();
            var type = $("#putype").val();
            var inputVal = $("#searchInput").val();
            var url;

            if (type == 1) {

                url = "http://localhost:3002/PMID?id=" + inputVal;

                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'JSON',
                    beforeSend: function() {
                        $("#myForm1").after('<h4 id="psload" style="text-align:center"><i class="fa fa-spinner fa-spin"></i> Loading...</h4>');
                    },
                    success: function (data) {
                        console.log(data[0]);

                        $("#titleID").empty();
                        $("#PMID").empty();
                        $("#abstractID").empty();
                        $("#authorID").empty();
                        $("#authorsHeader").remove();
                        $("#simID").empty();

                        $("#titleID").append('<a href="https://www.ncbi.nlm.nih.gov/pubmed/' + data[0].PMID + '">' + data[0].Title + '</a>');
                        $("#PMID").append('<h5>'+ "PMID: " + '</h5>'+ data[0].PMID);
                        $("#abstractID").append('<h5>'+ 'Abstract: ' + '</h5>'+ data[0].Abstract);


                        $("#authorID").append('<h5>'+ "Author(s): " + '</h5>');
                        for (var i = 0; i < data[0].Authors.length - 1; i++) {
                            $("#authorID").append(data[0].Authors[i] + ', ');
                        }
                        $("#authorID").append(data[0].Authors[i]);

                        for (var i = 0; i < 10; i++) {
                            var PMID = data[0].Sim[i];

                            $("#w3-container").after(

                                ' <div class="w3-container" id="w3-container">' +
                                ' <div class="w3-panel w3-card">' + ' <a href="https://www.ncbi.nlm.nih.gov/pubmed/' + PMID + '" target="_blank">' +
                                + PMID +
                                '</a>' +
                                '</div> ' +
                                '</div>'
                            );
                        }

                        $("#w3-container").after("<h3 id='authorsHeader'>Related Articles:</h3>");

                        $("#psload").remove()
                    }

                }).fail(function (xhr, status, error) {
                    $("#resultID").after(error);
                    $("#psload").remove();
                });

            } else if (type == 2) {

                url = "http://localhost:3002/title?id=" + inputVal;

                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'JSON',
                    beforeSend: function() {
                        $("#myForm1").after('<h4 id="psload" style="text-align:center"><i class="fa fa-spinner fa-spin"></i> Loading...</h4>');
                    },
                    success: function (data) {
                        console.log(data[0]);

                        $("#titleID").empty();
                        $("#PMID").empty();
                        $("#abstractID").empty();
                        $("#authorID").empty();
                        $("#authorsHeader").remove();
                        $("#simID").empty();

                        $("#titleID").append('<a href="https://www.ncbi.nlm.nih.gov/pubmed/' + data[0].PMID + '">' + data[0].Title + '</a>');
                        $("#PMID").append("PMID: " + data[0].PMID);
                        $("#abstractID").append('Abstract: ' + data[0].Abstract);


                        $("#authorID").before("<h3 id='authorsHeader'>Author(s): </h3>");
                        for (var i = 0; i < data[0].Authors.length; i++) {
                            $("#authorID").append('<li>' + data[0].Authors[i] + '</li>');
                        }

                        for (var i = 0; i < 10; i++) {
                            var PMID = data[0].Sim[i];

                            $("#w3-container").after(

                                ' <div class="w3-container" id="w3-container">' +
                                ' <div class="w3-panel w3-card">' + ' <a href="https://www.ncbi.nlm.nih.gov/pubmed/' + PMID + '" target="_blank">' +
                                + PMID +
                                '</a>' +
                                '</div> ' +
                                '</div>'
                            );
                        }

                        $("#w3-container").after("<h3 id='authorsHeader'>Related Articles:</h3>");

                        $("#psload").remove()
                    }

                }).fail(function (xhr, status, error) {
                    $("#resultID").after(error);
                });

            } else if (type == 3) {

                url = "http://localhost:3002/authors?id=" + inputVal;

                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'JSON',
                    beforeSend: function() {
                        $("#myForm1").after('<h4 id="psload" style="text-align:center"><i class="fa fa-spinner fa-spin"></i> Loading...</h4>');
                    },
                    success: function (data) {
                        console.log(data[0]);

                        $("#titleID").empty();
                        $("#PMID").empty();
                        $("#abstractID").empty();
                        $("#authorID").empty();
                        $("#authorsHeader").remove();
                        $("#simID").empty();

                        $("#titleID").append('<a href="https://www.ncbi.nlm.nih.gov/pubmed/' + data[0].PMID + '">' + data[0].Title + '</a>');
                        $("#PMID").append("PMID: " + data[0].PMID);
                        $("#abstractID").append('Abstract: ' + data[0].Abstract);


                        $("#authorID").before("<h3 id='authorsHeader'>Author(s): </h3>");
                        for (var i = 0; i < data[0].Authors.length; i++) {
                            $("#authorID").append('<li>' + data[0].Authors[i] + '</li>');
                        }

                        for (var i = 0; i < 10; i++) {
                            var PMID = data[0].Sim[i];

                            $("#w3-container").after(

                                ' <div class="w3-container" id="w3-container">' +
                                ' <div class="w3-panel w3-card">' + ' <a href="https://www.ncbi.nlm.nih.gov/pubmed/' + PMID + '" target="_blank">' +
                                + PMID +
                                '</a>' +
                                '</div> ' +
                                '</div>'
                            );
                        }

                        $("#w3-container").after("<h3 id='authorsHeader'>Related Articles:</h3>");

                        $("#psload").remove()
                    }

                }).fail(function (xhr, status, error) {
                    $("#resultID").after(error);
                });
            }

        });
    });

</script>

