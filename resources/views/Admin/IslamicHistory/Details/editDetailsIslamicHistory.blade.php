@extends('Admin.layout')
@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h2 class="mb-4">Edit Details Islamic History</h2>
                    @include('errors')
                    <form method="POST" action="{{ url("updateDetailsIslamicHistory/$detailsIslamicHistory->id") }}" autocomplete>
                        @csrf
                        @method("put")
                        <div class="info d-flex">

                            <div class="mb-3 w-50 mx-2">
                                <label for="Title_ar" class="form-label">Title ar :</label>
                                <textarea class="form-control "  name="title_ar" id="Title_ar" cols="30" rows="5"> {{$detailsIslamicHistory->title_ar}} </textarea>
                            </div>
                            <div class="mb-3 w-50 mx-2">
                                <label for="title_en" class="form-label">Title en :</label>
                                <textarea class="form-control "  name="title_en" id="title_en" cols="30" rows="5"> {{$detailsIslamicHistory->title_en}} </textarea>
                            </div>
                        </div>


                        <div class="info d-flex">


                            <div class="mb-3 w-50 mx-2">
                                <label for="Repeat" class="form-label">Caregories :</label>

                                <select name="category_islamic_histories_id" class="form-select mb-3"
                                    aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name_en}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
