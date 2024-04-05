@extends('Admin.layout')
@section("content")

<div class="container mt-5">
    <h2 class="text-center mb-4"> Question from user  </h2>




    <div class="table-responsive">


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Response</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through inquiries from database and populate the table -->
                @include('errors')
                @foreach ($InquiriesAndResponses as $InquiriesAndResponse  )

                <form method="POST" action="{{ url("updateInquiriesAndResponses/$InquiriesAndResponse->id") }}" autocomplete>
                    @csrf
                    @method("put")

                <tr>
                    <td> {{$InquiriesAndResponse->question}} </td>
                    <td>


                            <textarea name="response" class="form-control"></textarea>
                            <button type="submit"  class="btn btn-primary mt-3">Submit Response</button>
                        </td>
                    </tr>
                </form>

                @endforeach

                    <!-- Add more rows for other inquiries -->
                </tbody>
            </table>
        </div>

</div>

@endsection