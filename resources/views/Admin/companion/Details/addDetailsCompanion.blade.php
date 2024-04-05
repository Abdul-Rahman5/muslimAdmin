@extends('Admin.layout')
@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 ">
                <div class="bg-light rounded h-100 p-4">
                    <h2 class="mb-4">Add Details Companion</h2>
                    @include('errors')
                    <form method="POST" action="{{ url('storeDetailsCompanion') }}" autocomplete>
                        @csrf
                        <div class="info d-flex">

                        <div class="mb-3 w-50 mx-2">
                            <label for="Title_ar" class="form-label">Title ar :</label>
                            <textarea class="form-control " name="title_ar" id="Title_ar" cols="30" rows="5"></textarea>
                        </div>
                        <div class="mb-3 w-50 mx-2">
                            <label for="title_en" class="form-label">Title en :</label>
                            <textarea class="form-control " name="title_en" id="title_en" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                        <div class="info d-flex">

                        <div class="mb-3 w-50 mx-2">
                            <label for="desc_ar" class="form-label">Description ar :</label>
                            <textarea class="form-control " name="desc_ar" id="desc_ar" cols="30" rows="5"></textarea>
                        </div>
                        <div class="mb-3 w-50 mx-2">
                            <label for="desc_en" class="form-label">Description en :</label>
                            <textarea class="form-control " name="desc_en" id="desc_en" cols="30" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="info d-flex">


                        <div class="mb-3 w-50 mx-2">
                            <label for="Repeat" class="form-label">Caregories :</label>

                            <select name="category_companions_id" class="form-select mb-3" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                @foreach ($Companions as $category)
                                <option  value="{{$category->id}}"> {{$category->name_ar}} </option>

                                @endforeach
                            </select>                        </div>
                    </div>


                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
