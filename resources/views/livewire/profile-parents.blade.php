<!-- <div class="content-page"> -->
<div class="content">
    <!-- Start Content-->
    <div class="container mt-5">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Profil Orangtua Murid</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                    <li class="breadcrumb-item active">Profil</li>
                </ol>
            </div>
        </div>

        <!-- start row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="assets/images/users/user.png" class="rounded-2 avatar-xxl" alt="image profile">
                                <div class="overflow-hidden ms-4">
                                    <h4 class="m-0 text-dark fs-20">{{ Auth::user()->name }}</h4>
                                    <p class="my-1 text-muted fs-16">{{ $userProfile->address }}</p>
                                    <span class="fs-15"><i class="mdi mdi-email me-2 align-middle"></i><span>{{ Auth::user()->email }}</span> </span>
                                    <br>
                                    <span class="fs-15"><i class="mdi mdi-phone me-2 align-middle"></i><span>{{ $userProfile->phone }}</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body pt-1">
                        <ul class="nav nav-underline border-bottom" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active p-2" id="profile_about_tab" data-bs-toggle="tab" href="#profile_about" role="tab" aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="mdi mdi-information"></i></span>
                                    <span class="d-none d-sm-block">Submition Calon Siswa</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link p-2" id="profile_experience_tab" data-bs-toggle="tab" href="#profile_experience" role="tab" aria-selected="false" tabindex="-1">
                                    <span class="d-block d-sm-none"><i class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Riwayat Pembayaran</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link p-2" id="portfolio_education_tab" data-bs-toggle="tab" href="#profile_education" role="tab" aria-selected="false" tabindex="-1">
                                    <span class="d-block d-sm-none"><i class="mdi mdi-school"></i></span>
                                    <span class="d-none d-sm-block">Pengumuman</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content text-muted bg-white">
                            <div class="tab-pane active show pt-4" id="profile_about" role="tabpanel" aria-labelledby="profile_about_tab">
                                <div class="row">
                                    @foreach($userProfile->students as $student)
                                        <div class="col-md-4">
                                            <div class="card d-block border border-secondary">
                                                <div class="card-header bg-transparent border-secondary">
                                                    <div class="d-flex justify-content-between">
                                                        <h4 class="card-title mb-0">{{ $student->name }}</h4>
                                                        <h5><span class="badge text-bg-secondary">{{ $student->status }}</span></h5>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <p class="text-muted">Gender: {{ $student->gender }}</p>
                                                    <p class="text-muted">Birth Date: {{ $student->birth_date }}</p>
                                                    <p class="text-muted">Birth Place: {{ $student->birth_place }}</p>
                                                </div><!-- end card body -->
                                                <div class="card-footer bg-transparent border-secondary">
                                                    <a href="{{ url('/profile/student', $student->id) }}" class="btn btn-secondary w-100">Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- end Experience -->

                            <div class="tab-pane pt-4" id="profile_experience" role="tabpanel" aria-labelledby="profile_experience_tab">
                                <div class="row">

                                </div>
                            </div> <!-- end Experience -->

                            <div class="tab-pane pt-4" id="profile_education" role="tabpanel" aria-labelledby="portfolio_education_tab">
                                <div class="row">

                                </div>
                            </div> <!-- end education -->
                        </div> <!-- Tab panes -->
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- container-fluid -->
</div>
