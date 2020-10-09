@extends('admin.layout')

@section('body')

<div class="container">
    @if ($data==2)
    <h2 class="text-center">You Have To add About Details</h2>
    @if (session()->has('delete'))
    <div class="alert alert-danger">
      {{ session('delete') }}
    </div>
  @endif
    <div class="col-md-12 ">
    <form action="{{url('addAbout')}}">
        <button  style="margin-bottom: 50px;" class="float-right" type="submit" class="btn btn-warning">Add About</button>
    </form>
        
        <table class="table">
            <thead class="thead-light">
                <tr>
                  
                  <th scope="col">About Title</th>
                  <th scope="col">About Details</th>
                  <th scope="col">About List</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
        </table>
        
        
    </div>
    
    @else
    @foreach ($about as $item)
        
        <table class="table">
            <thead class="thead-light">
              <tr>
                
                <th scope="col">About Title</th>
                <th scope="col">About Details</th>
                <th scope="col">About List</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            
            <tbody>
                <tr>
                  <td>{{$item->aboutTitle}}</td>

                  <td>{{$item->aboutDetail}}</td>
                  
                  
                  <td>@foreach ($list as $data){{$data->aboutList}} @endforeach</td>
                  
                  <td><img style="width: 100px;height:100px;"  src="images/about/{{$item->aboutImage}}" alt=""></td>
                  <td><a href="/aboutEdit/{{$item->id}}"><button btn btn-warning>Edit</button></a> 
                    <a href="/aboutDelete/{{$item->id}}"onclick="return confirm('Are you sure you want to Delete this item?');"><button btn btn-danger>Delete</button></a> 
                  </td>
                </tr>
                
              </tbody> 
            
            
          </table>
          @endforeach
         
        @endif
   
    
</div>

@endsection
