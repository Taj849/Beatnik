@extends('admin.layout')

@section('body')

<div class="container">
    @if ($data==2)
   
    @if (session()->has('delete'))
    <div class="alert alert-danger">
      {{ session('delete') }}
    </div>
  @endif
    <div class="col-md-12 ">
    <form action="{{url('addContact')}}">
        <button  style="margin-bottom: 50px;" type="submit" class="btn btn-warning">Add Contact</button>
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
                
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
              </tr>
            </thead>
            
            <tbody>
                <tr>
                  <td>{{$item->adress}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->phone}}</td>
                  
    
                  <td><a href="/contactEdit/{{$item->id}}"><button btn btn-warning>Edit</button></a> 
                    <a href="/contactDelete/{{$item->id}}"><button btn btn-danger>Delete</button></a> 
                  </td>
                </tr>
                
              </tbody> 
            
            
          </table>
          @endforeach
         
        @endif
   
    
</div>

@endsection