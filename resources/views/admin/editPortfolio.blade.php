@extends('admin.layout')
@section('body')
<!-- Extended material form grid -->
<h2 style="margin-bottom: 50px;" class="text-center">Now Add Category  Details</h2>
<hr>
<form method="post" action="/upload_update_portfolio_data/{{$id}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="portfolio_id" value="{{$v_id}}">
    <!-- Grid row -->
    <div class="form-row">
      <!-- Grid column -->
      @foreach ($data as $item)
          
     
      <div class="col-md-6">
        <!-- Material input -->
        <div class="md-form form-group">
            <label for="inputEmail4MD">Client Name</label>
          <input required type="text" class="form-control" name="clientTitle" value="{{$item->categoryClient}}">
         
        </div>
      </div>
      
        <!-- Grid column -->
        <div class="col-md-6">
          <!-- Material input -->
          <div class="md-form form-group">
              <label for="inputEmail4MD">Project Date</label>
            <input required value="{{$item->prjectDate}}" type="date" class="form-control" name="prjectDate" >
           
          </div>
        </div>
        <div class="col-md-6">
            <!-- Material input -->
            <div class="md-form form-group">
                <label for="inputEmail4MD">Project Url</label>
              <input required value="{{$item->prjectUrl}}" type="text" class="form-control" name="prjectUrl" placeholder="Project Url">
             
            </div>
          </div>
          <div class="col-md-6">
            <!-- Material input -->
            <div class="md-form form-group">
                <label for="inputEmail4MD">Project Title</label>
              <input required value="{{$item->prjectTitle}}" type="text" class="form-control" name="prjectTitle" placeholder="Project Title">
             
            </div>
          </div>
      <!-- Grid column -->
      <br>
      <!-- Grid column -->
      <div class="col-md-8">
        <label for="textarea-char-counter">Project Details</label>
        <textarea  required name="projectDetail"  id="textarea-char-counter" class="form-control md-textarea" length="120" rows="3">
            {{$item->prjectDetail}}
        </textarea>
        
      </div>
      @endforeach


<div class="col-md-6">
    <p>You must add photo</p>
    @foreach ($list as $image)
        
    <div class="input-group control-group increment" >
        <input required type="file" name="filename[]" class="form-control">
        <img style="width: 100px;height:100px;" src="/images/portfolio/{{$image->prject_image}}" alt="">
        <div class="input-group-btn"> 
          <button class="btn btn-primary btn-md" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
        </div>
      </div>
    @endforeach

      <div class="clone invisible">
        <div class="control-group input-group" style="margin-top:10px">
          <input required type="file" name="filename[]" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
          </div>
        </div>
      </div>
        
        
</div>

      
      
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
    <button onclick="return confirm('Are you sure you want to update this item?');" style="margin-top: 30px;" type="submit" class="btn btn-warning btn-md">Save Details</button>
  </form>
  <!-- Extended material form grid -->
  <script type="text/javascript">
            $(document).ready(function() {
              $(".btn-primary").click(function(){ 
                  var html = $(".clone").html();
                  $(".increment").after(html);
              });
              $("body").on("click",".btn-danger",function(){ 
                  $(this).parents(".control-group").remove();
              });
            });
    </script>
@endsection

        
