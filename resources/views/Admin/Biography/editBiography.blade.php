@extends('Admin.layout')
@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h2 class="mb-4">Edit Biography of the Prophet</h2>
                    @include('errors')
                    <form method="POST" action="{{ url("updateBiography/$Biography->id") }}" autocomplete>
                        @csrf
                        @method("put")
                        <div class="info d-flex">

                            <div class="mb-3 w-50 mx-2">
                                <label for="biographie_ar" class="form-label">Title ar :</label>
                                <textarea class="form-control "  name="biographie_ar" id="biographie_ar" cols="30" rows="10"> {{$Biography->biographie_ar}} </textarea>
                            </div>
                            <div class="mb-3 w-50 mx-2">
                                <label for="biographie_en" class="form-label">Title en :</label>
                                <textarea class="form-control "  name="biographie_en" id="biographie_en" cols="30" rows="10"> {{$Biography->biographie_en}} </textarea>
                            </div>
                        </div>




                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
