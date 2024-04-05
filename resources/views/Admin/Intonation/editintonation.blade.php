@extends('Admin.layout')
@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h2 class="mb-4">Edit category Intonation</h2>
                    <form method="POST" action="{{ url("updateIntonation/$categoryIntonation->id") }}" autocomplete>
                        @csrf
                        @method("put")
                    @include('errors')

                        <div class="info d-flex">

                        <div class="mb-3 w-50 mx-2">
                            <label for="nameAr" class="form-label">Name ar :</label>
                            <input type="text" value="{{$categoryIntonation->name_ar}}" name="name_ar" class="form-control " id="nameAr" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3 w-50 mx-2">
                            <label for="nameEn" class="form-label">name en :</label>
                            <input name="name_en" value="{{$categoryIntonation->name_en}}" type="text" class="form-control " id="nameEn">
                        </div>
                    </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
