@extends('organizateur.layouts')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Events</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">EventTable</li>
                        <li class="breadcrumb-item active" aria-current="page">Reservation</li>

                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Event name</th>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $item)
                         <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->event->title}}</td>
                            <td>{{$item->event->date}}</td>
                            <td>
                                <a href="" class="btn btn-primary">pending</a>
                                <a href="" class="btn btn-danger">aproved</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>


                </table>
            </div>
        </div>

    </section>


@endsection
