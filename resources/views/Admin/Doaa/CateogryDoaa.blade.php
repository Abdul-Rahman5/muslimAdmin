@extends('Admin.layout')

@section('content')

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h2 class="mb-0">Show  category Doaa</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Name Ar</th>
                                    <th scope="col">Name En</th>
                                    <th scope="col">User added</th>
                                    <th scope="col">created at</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allDoaa as $item)
                                <tr>
                                    <td>{{$item->name_ar}}</td>
                                    <td>{{$item->name_en}}</td>
                                    <td>{{$item->user_name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td><a class="btn btn-sm btn-primary" href="{{url("editDoaa/$item->id") }}">Edit</a></td>
                                    <form action="{{ url("deleteDoaa/$item->id") }}" method="post">
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