<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ url('dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Zaad Al Muslim</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('admin') }}/img/user.jpg" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ url('dashboard') }}" class="nav-item nav-link active"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ url('clint') }}" class="nav-item nav-link "><i class="fa fa-regular fa-envelope"></i>support</a>
                {{-- Fatwa --}}
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-question" aria-hidden="true"></i>Fatwa</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ url('Fatwa') }}" class="dropdown-item"> Fatwa</a>
                        <a href="{{ url('AddFatwa') }}" class="dropdown-item"> Add Fatwa</a>

                    </div>
                </div>
                {{-- InquiriesAndResponses --}}
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-question" aria-hidden="true"></i>Inquiries</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ url('InquiriesAndResponses') }}" class="dropdown-item"> Inquiries</a>
                        <a href="{{ url('AddInquiriesAndResponses') }}" class="dropdown-item"> respons Inquiries</a>

                    </div>
                </div>


                    {{-- zakar --}}
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fas fa-solid fa-mosque"></i>Azkar</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('CateogryAzkar') }}" class="dropdown-item"> Categories Azkar</a>
                    <a href="{{ url('AddCateogryAzkar') }}" class="dropdown-item"> Add Categories Azkar</a>
                    <a href="{{ url('DetailsAzkar') }}" class="nav-item nav-link "> Details Azker</a>
                    <a href="{{ url('AddDetailsAzkar') }}" class="nav-item nav-link ">Add Details Azker</a>

                </div>
            </div>
            {{-- doaa --}}
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fas fa-solid fa-mosque"></i>Doaa</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('CateogryDoaa') }}" class="dropdown-item"> Categories Doaa</a>
                    <a href="{{ url('AddCateogryDoaa') }}" class="dropdown-item"> Add Categories Doaa</a>
                    <a href="{{ url('DetailsDoaa') }}" class="nav-item nav-link "> Details Doaa</a>
                    <a href="{{ url('AddDetailsDoaa') }}" class="nav-item nav-link ">Add Details Doaa</a>

                </div>
            </div>
            {{-- Hadiths --}}
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fas fa-solid fa-mosque"></i>Hadiths</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('Cateogryhadiths') }}" class="dropdown-item"> Categories hadiths</a>
                    <a href="{{ url('AddCateogryhadiths') }}" class="dropdown-item"> Add Categories hadiths</a>
                    <a href="{{ url('Detailshadiths') }}" class="nav-item nav-link "> Details hadiths</a>
                    <a href="{{ url('AddDetailshadiths') }}" class="nav-item nav-link ">Add Details hadiths</a>

                </div>
            </div>
              {{-- Story --}}
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fas fa-solid fa-mosque"></i>Stories</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('CateogryStory') }}" class="dropdown-item"> Categories Story</a>
                    <a href="{{ url('AddCateogryStory') }}" class="dropdown-item"> Add Categories Story</a>
                    <a href="{{ url('DetailsStory') }}" class="nav-item nav-link "> Details Story</a>
                    <a href="{{ url('AddDetailsStory') }}" class="nav-item nav-link ">Add Details Story</a>

                </div>
            </div>
             {{-- intonation --}}
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fas fa-solid fa-mosque"></i>intonation</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('CateogryIntonation') }}" class="dropdown-item"> Categories intonation</a>
                    <a href="{{ url('AddCateogryIntonation') }}" class="dropdown-item"> Add Categories intonation</a>
                    <a href="{{ url('DetailsIntonation') }}" class="nav-item nav-link "> Details intonation</a>
                    <a href="{{ url('AddDetailsIntonation') }}" class="nav-item nav-link ">Add Details intonation</a>

                </div>
            </div>
              {{-- IslamicHistory --}}
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fas fa-solid fa-mosque"></i>Islamic history</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('CateogryIslamicHistory') }}" class="dropdown-item"> Categories  history</a>
                    <a href="{{ url('AddCateogryIslamicHistory') }}" class="dropdown-item"> Add Categories  history</a>
                    <a href="{{ url('DetailsIslamicHistory') }}" class="nav-item nav-link "> Details  history</a>
                    <a href="{{ url('AddDetailsIslamicHistory') }}" class="nav-item nav-link ">Add Details  history</a>

                </div>
            </div>
              {{-- About the companions --}}
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fas fa-solid fa-mosque"></i>companions</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('Cateogrycompanion') }}" class="dropdown-item"> Categories  companions</a>
                    <a href="{{ url('AddCateogrycompanion') }}" class="dropdown-item"> Add Categories  companions</a>
                    <a href="{{ url('DetailsCompanion') }}" class="nav-item nav-link "> Details  companions</a>
                    <a href="{{ url('AddDetailsCompanion') }}" class="nav-item nav-link ">Add Details  companions</a>

                </div>
            </div>
              {{--Biography of the Prophet --}}
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fas fa-solid fa-mosque"></i>Biography Prophet</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ url('Biography') }}" class="dropdown-item">   Biography</a>
                    <a href="{{ url('AddBiography') }}" class="dropdown-item"> Add  Biography</a>
                </div>
            </div>

        </div>
    </nav>
</div>
