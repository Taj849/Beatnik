@extends('admin.layout')

@section('body')

<div class="container">
    @if (session()->has('delete'))
    <div class="alert alert-danger">
      {{ session('delete') }}
    </div>
  @endif
    <div class="col-md-12 ">
    <form action="{{url('addQuestion')}}">
        <button  style="margin-bottom: 50px;" type="submit" class="btn btn-warning">Add Question</button>
    </form>
    </div>
    
   
    @foreach ($about as $item)
        
        <table class="table">
            <thead class="thead-light">
              <tr>
                
                <th scope="col">Question Title</th>
                <th scope="col">Question Details</th>
              </tr>
            </thead>
            
            <tbody>
                <tr>
                  <td>{{$item->questionTitle}}</td>

                  <td>{{$item->questionDetail}}</td>
                  <td><a href="/questionEdit/{{$item->id}}"><button btn btn-warning>Edit</button></a> 
                    <a href="/questionDelete/{{$item->id}}"><button btn btn-danger>Delete</button></a> 
                  </td>
                </tr>
                
              </tbody> 
            
            
          </table>
          @endforeach
   {{$about->links()}}
    
</div>

@endsection