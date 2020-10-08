@extends('admin.layout')
@section('body')
<!-- Extended material form grid -->
<h2 style="margin-bottom: 50px;" class="text-center">Now Add About Details</h2>
<hr>
<form method="post" action="{{url('upload_service_data')}}" enctype="multipart/form-data">
    @csrf
    <!-- Grid row -->
    <div class="form-row">
      <!-- Grid column -->
      <div class="col-md-6">
        <!-- Material input -->
        <div class="md-form form-group">
            <label for="inputEmail4MD">Service Title</label>
          <input required type="text" class="form-control" name="aboutTitle" placeholder="About Title">
         
        </div>
      </div>
      <!-- Grid column -->
      <br>
      <!-- Grid column -->
      <div class="col-md-8">
        <label for="textarea-char-counter">Service Detail</label>
        <textarea required name="aboutdetail"  id="textarea-char-counter" class="form-control md-textarea" length="120" rows="3"></textarea>
        
      </div>
    </div>
    <!-- Grid row -->
    <button style="margin-top: 30px;" type="submit" class="btn btn-warning btn-md">Save</button>
  </form>
@endsection

        