@extends('admin.layout')

@section('body')

<div class="container">
    
    
    <div class="col-md-12 ">
        @if (session()->has('add'))
        <div class="alert alert-warning">
          {{ session('add') }}
        </div>
      @endif
    <form action="{{url('addCategory')}}">
        <button class="btn btn-warning" style="margin-bottom: 50px;" class="float-right" type="submit" class="btn btn-light">Add Category</button>
    </form>
    </div>
    
   
    <div class="col-md-12">
        <h3>Category Name</h3>
        @php
            $l=0;
        @endphp
    @foreach ($about as $item)
        
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">Category</th>
                <th scope="col">Item</th>
                <th  scope="col"></th>
                <th  scope="col"></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$item->categoryName}}</td>
                    @for ($i = $l; $i < $f; $i++)
                    <td>{{$count[$i]}} Item</td>
                    @php
                        $l++;
                        break;
                    @endphp
        
                    @endfor
                    <td class="float-right btn"><a href="/showDetails/{{$item->id}}"> Show Item</a></td>
                    <td class="float-right btn"><a href="/addDetails/{{$item->id}}"> Add Item</a></td>
                    
                </tr>
               
            </tbody>
          @endforeach
    </div>
    
         
       
   
    
</div>

@endsection