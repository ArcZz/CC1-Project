<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="row">
   <div class="col-12">
      <h3 class="section-heading">Jupyter Notebook Recommender</h3>
      <hr>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <form  method="get" id="juform">
         {{ csrf_field() }}
         <div class="form-group">
            <label>This recommender searches through a group of Jupyter Notebooks and picks various ones based on a keyword search.</label>
            </br></br>
            <label for="juin">Jupyter Notebook Input</label>
            <input type="text" name="jupInput" class="form-control" id="juin" aria-describedby="juHelp" placeholder="Enter a keyword">
            </br>
            <button id='juconfirm' type="submit" class="btn btn-primary ">Confirm</button>
         </div>
      </form>
   </div> 
</div>
<div class="row">
   <div class="col-md-12">
         <div id="results">
   
         </div>
   </div>
</div>

<script>
   function parseInput(input) {
      return input.toString().replace(/ /g, "%20")
   }


   $(document).ready(function() {
      $('#juform').on('submit', function(event) {
         var input = parseInput($('#juin').val())
         var url = "http://ec2-3-94-109-60.compute-1.amazonaws.com:8001/api/rec/jupyter?keyword=" + input

         $.ajax({
            type: 'GET',
            url: url,
            dataType: 'JSON',
            success: function(data) {
               var html = ""
               var notebooks = data.notebooks
               if (notebooks.length == 0 ) {
                  html = "<div>No Notebooks Found</div>"
               } else {
                  for (var x = 0; x < notebooks.length; x++ ) {
                     book = notebooks[x]
                     var hyperlink = "http://ec2-3-94-109-60.compute-1.amazonaws.com:8001/notebooks/" + book.filename
                     html += "<a style='color:blue;' class='junotebook' href=" + hyperlink + ">" + book.filename + "</a>"
                     html += "<br>"
                     html += "<h4>cell number: </h4>'" + book.cell_no
                     html += "<br><br>"
                  }
               }
               
               $('#results').html(html)
               
            }
         })
      })
   })
</script>

