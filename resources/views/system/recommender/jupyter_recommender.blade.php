<div class="row">
   <div class="col-12">
      <h3 class="section-heading">Jupyter Notebook Recommender</h3>
      <hr>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <form action="{{ url("/project/jupyter") }}" method="get">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="juin">Jupyter Notebook Input</label>
            <input type="text" name="jupInput" class="form-control" id="juin" aria-describedby="juHelp" placeholder="Enter a keyword">
            </br>
            <button type="submit" class="btn btn-primary ">Confirm</button>
         </div>
      </form>
   </div> 
</div>
 