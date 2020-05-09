@extends('layouts.layoutStaff')

@section('customeSty')
<style>
     table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
@endsection

@section('content')

<div class="jumbotron" style="height: 160px">
    <img src="{{ asset('img/menu.png') }}" alt="menu" id="menu-toggle">
    <h2>MICRO HOUSING</h2>
    <div>
        <span>Application </span>
    </div>
</div>

   

       <div class="container my-con">
           <table>
        <tr>
          <th>Date</th>
          <th>Month</th>
          <th>Year</th>
          <th>Status</th>
          <th>#</th>
        </tr>
        @foreach($AllApplication as $ThisApplication)
        <tr>
          <td>{{$ThisApplication->applicationDate}}</td>
          <td>{{$ThisApplication->requiredMonth}}</td>
          <td>{{$ThisApplication->requiredYear}}</td>
          <td>{{$ThisApplication->Status}}</td>
          <td>
            @if ($ThisApplication->Status == "New Application")
            <a href="{{url('/application/assign/' .$ThisApplication->id. '/approve')}}"
              class="btn btn-primary">Aprove</a>
            <a href="{{url('/application/assign/' .$ThisApplication->id. '/decline')}}"
              class="btn btn-primary">Decline</a>
            @else
            <a href="{{url('/residence/allocation/'.$ThisApplication->id)}}"
              class="btn btn-primary">Allocation</a>
            @endif                              
          </td>
        </tr>
        @endforeach
      </table>

         <div class="margin-top2">
           <nav aria-label="Page navigation example">
             <ul class="pagination justify-content-center">
               
               <li class="page-item"> </li>
             </ul>
           </nav>
         </div>

         <!-- /#page-content-wrapper -->
       </div>
@endsection

