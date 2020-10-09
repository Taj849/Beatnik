@extends('admin.layout')

@section('body')

<div class="container">
    @if (session()->has('delete'))
    <div class="alert alert-danger">
      {{ session('delete') }}
    </div>
  @endif
    <div class="col-md-12 ">
    <form action="{{url('addService')}}">
        <button  style="margin-bottom: 50px;" type="submit" class="btn btn-warning">Add Service</button>
    </form>
    </div>
    
   
    @foreach ($about as $item)
        
        <table class="table">
            <thead class="thead-light">
              <tr>
                
                <th scope="col">Service Title</th>
                <th scope="col">Service Details</th>
              </tr>
            </thead>
            
            <tbody>
                <tr>
                  <td>{{$item->serviceTitle}}</td>

                  <td>{{$item->serviceDetail}}</td>
                  <td><a href="/serviceEdit/{{$item->id}}"><button btn btn-warning>Edit</button></a> 
                    <a href="/serviceDelete/{{$item->id}}" onclick="return confirm('Are you sure you want to Delete this item?');"><button btn btn-danger>Delete</button></a> 
                  </td>
                </tr>
                
              </tbody> 
            
            
          </table>
          @endforeach

          {{$about->links()}}
   
    
</div>

@endsection
