@extends('admin.layout')
@section('body')
<!-- Extended material form grid -->
<h2 style="margin-bottom: 50px;" class="text-center">Now Add About Details</h2>
<hr>
<form method="post" action="/upload_update_contact_data/{{$id}}" enctype="multipart/form-data">
    @csrf
    <!-- Grid row -->
    <div class="form-row">
        @foreach ($data as $item)
        <div class="col-md-6">
            <!-- Material input -->
            <div class="md-form form-group">
                <label for="inputEmail4MD">Full Address</label>
              <input required type="text" class="form-control" name="address" value="{{$item->adress}}">
             
            </div>
          </div>
          <!-- Grid column -->
          <br>
          <div class="col-md-6">
            <!-- Material input -->
            <div class="md-form form-group">
                <label for="inputEmail4MD">Email</label>
              <input required type="email" class="form-control" name="email" value="{{$item->email}}">
             
            </div>
          </div>
          <div class="col-md-6">
            <!-- Material input -->
            <div class="md-form form-group">
                <label for="inputEmail4MD">Phone</label>
              <input required type="text" class="form-control" name="phone" value="{{$item->phone}}">
             
            </div>
          </div>
          <!-- Grid column -->
        @endforeach
      <!-- Grid column -->
      
    </div>
    <!-- Grid row -->
    <button onclick="return confirm('Are you sure you want to update this item?');" style="margin-top: 30px;" type="submit" class="btn btn-warning btn-md">Update</button>
  </form>
@endsection

        
