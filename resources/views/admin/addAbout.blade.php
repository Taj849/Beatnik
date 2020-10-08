@extends('admin.layout')
@section('body')
<!-- Extended material form grid -->
<h2 style="margin-bottom: 50px;" class="text-center">Now Add About Details</h2>
<hr>
<form method="post" action="{{url('upload_about_data')}}" enctype="multipart/form-data">
    @csrf
    <!-- Grid row -->
    <div class="form-row">
      <!-- Grid column -->
      <div class="col-md-6">
        <!-- Material input -->
        <div class="md-form form-group">
            <label for="inputEmail4MD">About Title</label>
          <input type="text" required class="form-control" name="aboutTitle" placeholder="About Title">
         
        </div>
      </div>
      <!-- Grid column -->
      <br>
      <!-- Grid column -->
      <div class="col-md-8">
        <label for="textarea-char-counter">Type your text</label>
        <textarea name="aboutdetail" data-msg="Please write something for us" data-rule="required"  id="textarea-char-counter" class="form-control md-textarea" length="120" rows="3"></textarea>
        
      </div>
      <div style="margin-top:50px" class="col-md-8">
        <div class="input-group control-group " >
            <input type="file" required name="filename[]" class="form-control">
          </div>
    </div>
<div class="col-md-6">
    <label for="textarea-char-counter">Add List Item</label>
    <div class="input-group control-group increment" >
        <input type="text"   name="listname[]" class="form-control">
        <div class="input-group-btn"> 
          <button class="btn btn-primary btn-md" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
        </div>
      </div>
      <div class="clone invisible">
        <div class="control-group input-group" style="margin-top:10px">
          <input type="text" name="listname[]" class="form-control">
          <div class="input-group-btn"> 
            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
          </div>
        </div>
      </div>
        
        
</div>

      
      
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
    <button style="margin-top: 30px;" type="submit" class="btn btn-warning btn-md">Save</button>
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

        