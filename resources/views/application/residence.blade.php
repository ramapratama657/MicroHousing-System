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
        <span>Residence</span>
    </div>
</div>
    
       <div class="container my-con">
           <table>
        <tr>
          <th>Address</th>
          <th>Units</th>
          <th>Units size</th>
          <th>Rent</th>
          <th>#</th>
        </tr>
        @foreach($AllResidences as $ThisResidence)
        <tr>
            <td>{{$ThisResidence->address}}</td>
            <td>{{$ThisResidence->numUnits}}</td>
            <td>{{$ThisResidence->sizePerUnit}}</td>
            <td>{{$ThisResidence->monthlyRental}}</td>
          <td>
            <div class="btn-group">
                <a href="{{url('/application/form',$ThisResidence->id)}}">
                <button>Apply</button>
                </a>
            </div>
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

