@extends('admin.layout')
@section('body')
<!-- Extended material form grid -->
<h2 style="margin-bottom: 50px;" class="text-center">Now Add Catyegory</h2>
<hr>
@if (session()->has('add'))
<div class="alert alert-danger">
  {{ session('add') }}
</div>
@endif
<hr>
<form method="post" action="{{url('upload_portfolio_data')}}" enctype="multipart/form-data">
    @csrf
    <!-- Grid row -->
    <div class="form-row">
      <!-- Grid column -->
      <div class="col-md-6">
        <!-- Material input -->
        <div class="md-form form-group">
            <label for="inputEmail4MD">Category Name</label>
          <input required type="text" class="form-control" name="categoryTitle" placeholder="Category Name">
         
        </div>
      </div>
      <!-- Grid column -->
      

      
      
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
    <button style="margin-top: 30px;" type="submit" class="btn btn-warning btn-md">Save</button>
  </form>
@endsection

        