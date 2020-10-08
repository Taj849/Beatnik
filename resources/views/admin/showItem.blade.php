@extends('admin.layout')

@section('body')
@if (session()->has('delete'))
    <div class="alert alert-danger">
      {{ session('delete') }}
    </div>
  @endif
<div class="container">
    @php
        $num=0;
    @endphp
    <h2 class="text-center">{{$app}} Details</h2>
   
    
    
    @foreach ($list as $item)
        
        <table class="table">
            <thead class="thead-light">
                <tr>
                  
                  <th scope="col">Client</th>
                  <th scope="col">Prjoect Date</th>
                  <th scope="col">Project Url</th>
                  <th scope="col">Project Title</th>
                  <th scope="col">Project Detail</th>
                  <th scope="col">Image</th>
                </tr>
              </thead>
            
            <tbody>
                <tr>
                  <td>{{$item->categoryClient}}</td>

                  <td>{{$item->prjectDate}}</td>
                  <td>{{$item->prjectUrl}}</td>
                  <td>{{$item->prjectTitle}}</td>
                  <td>{{$item->prjectDetail}}</td>
                  
                  <td>
                      @for ($i = $num; $i < $m; $i++)
                          @php
                              $count=count($item_port[$i]);
                          @endphp
                          @for ($k = 0; $k < $count; $k++)
                          <img style="width: 100px;height:100px;"  src="/images/portfolio/{{$item_port[$i][$k]->prject_image}}" alt=""><br>
                          @endfor
                          @php
                              $num++;
                                break;
                          @endphp
                      @endfor
                </td>
                  <td><a href="/portfolioEdit/{{$item->id}}"><button btn btn-warning>Edit</button></a> 
                    <a href="/portfolioDelete/{{$item->id}}"><button btn btn-danger>Delete</button></a> 
                  </td>
                </tr>
                
              </tbody> 
            
            
          </table>

          @endforeach
         {{ $list->links() }}
        
   
    
</div>

@endsection