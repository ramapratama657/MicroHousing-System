@extends('layouts.layoutApplicant')

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
        <span>Allocation</span>
    </div>
</div>
    
       <div class="container my-con">
           <table>
        <tr>
          <th>ID</th>
          <th>Application ID</th>
          <th>Unit</th>
          <th>Form Date</th>
          <th>Duration</th>
          <th>End Date</th>
          <th>#</th>
        </tr>
        @foreach($ThisAllocation as $ThisData)
        <tr>
            <td>{{$ThisData->id}}</td>
            <td>{{$ThisData->application_id}}</td>
            <td>{{$ThisData->unit_id}}</td>
            <td>{{$ThisData->fromDate}}</td>
            <td>{{$ThisData->duration}}</td>
            <td>{{$ThisData->endDate}}</td>
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

