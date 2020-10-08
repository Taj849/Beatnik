@extends('admin.layout')
@section('body')
<!-- Extended material form grid -->
<h2 style="margin-bottom: 50px;" class="text-center">Now Add About Details</h2>
<hr>
<form method="post" action="{{url('upload_contact_data')}}" enctype="multipart/form-data">
    @csrf
    <!-- Grid row -->
    <div class="form-row">
      <!-- Grid column -->
      <div class="col-md-6">
        <!-- Material input -->
        <div class="md-form form-group">
            <label for="inputEmail4MD">Full Address</label>
          <input required type="text" class="form-control" name="address" placeholder="Full Address">
         
        </div>
      </div>
      <!-- Grid column -->
      <br>
      <!-- Grid column -->
      <div class="col-md-8">
        <label for="textarea-char-counter">Email</label>
        <input required type="email" class="form-control" name="email" placeholder="Email">
        
      </div>
      <div class="col-md-8">
        <label for="textarea-char-counter">Service Detail</label>
        <input required type="text" class="form-control" name="phone" placeholder="Phone">
        
      </div>
    </div>
    <!-- Grid row -->
    <button style="margin-top: 30px;" type="submit" class="btn btn-warning btn-md">Save</button>
  </form>
@endsection

        