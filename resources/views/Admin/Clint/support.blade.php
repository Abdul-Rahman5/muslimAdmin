@extends('Admin.layout')

@section('content')

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h2 class="mb-0">  Support  Clints </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Name </th>
                                    <th scope="col">Email </th>
                                    <th scope="col">Messages </th>
                                    <th scope="col">created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clint as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->message}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <form action="{{ url("Clintdelete/$item->id") }}" method="post">
                                    @csrf
                                    @method("DELETE")

                                    <td><button class="btn btn-sm btn-danger" href="">Delete</button></td>
                                </form>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

@endsection