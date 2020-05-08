@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Residence</div>
                <div class="card-body">
                    <a href="{{url('/residence/form')}}" class="btn btn-primary">
                        Create New Residence
                    </a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Units
                                </th>
                                <th>
                                    Units size
                                </th>
                                <th>
                                    Rent
                                </th>
                                <th>
                                    #
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($AllResidences as $ThisResidence)
                                <tr>
                                    <td>{{$ThisResidence->address}}</td>
                                    <td>{{$ThisResidence->numUnits}}</td>
                                    <td>{{$ThisResidence->sizePerUnit}}</td>
                                    <td>{{$ThisResidence->monthlyRental}}</td>
                                    <td>
                                        <a href="{{ url('/residence/edit',$ThisResidence->id)}}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
