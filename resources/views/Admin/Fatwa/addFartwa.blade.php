@extends('Admin.layout')
@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h2 class="mb-4">Add Fatwa</h2>
                    @include('errors')

                    <form method="POST" action="{{ url('storeFatwa') }}" autocomplete>
                        @csrf
                        <div class="info d-flex">

                        <div class="mb-3 w-50 mx-2">
                            <label for="question_ar" class="form-label">Question ar :</label>
                            <textarea class="form-control " name="question_ar" id="question_ar" cols="30" rows="5"></textarea>

                        </div>
                        <div class="mb-3 w-50 mx-2">
                            <label for="question_en" class="form-label">Question en :</label>
                            <textarea class="form-control " name="question_en" id="question_en" cols="30" rows="5"></textarea>

                        </div>
                    </div>
                    <div class="info d-flex">

                        <div class="mb-3 w-50 mx-2">
                            <label for="response_ar" class="form-label">Response ar :</label>
                            <textarea class="form-control " name="response_ar" id="response_ar" cols="30" rows="5"></textarea>


                        </div>
                        <div class="mb-3 w-50 mx-2">
                            <label for="response_en" class="form-label">Response en :</label>
                            <textarea class="form-control " name="response_en" id="response_en" cols="30" rows="5"></textarea>

                        </div>
                    </div>


                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
