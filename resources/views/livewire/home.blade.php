<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Dashboard Penerimaan Peserta Didik Baru</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <p class="text-muted mb-3 fw-semibold">Total Pendaftar</p>
                                    <h4 class="m-0 mb-3 fs-18">450 Siswa</h4>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success me-2"><i class="mdi mdi-arrow-top-right text-success"></i>+ 12%</span>Bulan lalu
                                    </p>
                                </div>

                                <div class="col-4">
                                    <div class="d-flex justify-content-center">
                                        <div id="total_applicants" class="me-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <p class="text-muted mb-3 fw-semibold">Pendaftar Diterima</p>
                                    <h4 class="m-0 mb-3 fs-18">300 Siswa</h4>
                                    <p class="mb-0 text-muted">
                                        <span class="text-danger me-2"><i class="mdi mdi-arrow-bottom-left text-danger"></i>- 5%</span>Bulan lalu
                                    </p>
                                </div>

                                <div class="col-4">
                                    <div class="d-flex justify-content-center">
                                        <div id="accepted_applicants" class="me-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <p class="text-muted mb-3 fw-semibold">Pendaftar Ditolak</p>
                                    <h4 class="m-0 mb-3 fs-18">150 Siswa</h4>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success me-2"><i class="mdi mdi-arrow-top-right text-success"></i> + 8%</span>Bulan lalu
                                    </p>
                                </div>

                                <div class="col-4">
                                    <div class="d-flex justify-content-center">
                                        <div id="rejected_applicants" class="me-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <p class="text-muted mb-3 fw-semibold">Pendaftar Cadangan</p>
                                    <h4 class="m-0 mb-3 fs-18">50 Siswa</h4>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success me-2"><i class="mdi mdi-arrow-top-right text-success"></i> + 3%</span>Bulan lalu
                                    </p>
                                </div>

                                <div class="col-4">
                                    <div class="d-flex justify-content-center">
                                        <div id="waitlisted_applicants" class="me-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title mb-0">Tingkat Penerimaan Ulang</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="justify-content-center">
                                <div id="customer_rate" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title mb-0">Pendaftar Teratas</h5>
                                <div class="dropdown mx-0">
                                    <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal text-muted fs-20"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">28 Hari Terakhir</a>
                                        <a class="dropdown-item" href="#">Bulan Lalu</a>
                                        <a class="dropdown-item" href="#">Tahun Lalu</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="justify-content-center">
                                <div class="table-responsive card-table">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center my-1">
                                                        <div class="avatar-sm rounded me-3 align-items-center justify-content-center d-flex">
                                                            <img src="{{ asset('assets') }}/images/users/user-11.jpg" class="img-fluid rounded-circle" alt="">
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mb-1">Noam Henson</h5>
                                                            <span class="text-muted">14 Pendaftaran Terverifikasi</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="fw-normal my-1">88%</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center my-1">
                                                        <div class="avatar-sm rounded me-3 align-items-center justify-content-center d-flex">
                                                            <img src="{{ asset('assets') }}/images/users/user-12.jpg" class="img-fluid rounded-circle" alt="">
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mb-1">Israel Faizul</h5>
                                                            <span class="text-muted">23 Pendaftaran Terverifikasi</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="fw-normal my-1">104%</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center my-1">
                                                        <div class="avatar-sm rounded me-3 align-items-center justify-content-center d-flex">
                                                            <img src="{{ asset('assets') }}/images/users/user-13.jpg" class="img-fluid rounded-circle" alt="">
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mb-1">Pascal Kremp</h5>
                                                            <span class="text-muted">13 Pendaftaran Terverifikasi</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="fw-normal my-1">67%</p>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center my-1">
                                                        <div class="avatar-sm rounded me-3 align-items-center justify-content-center d-flex">
                                                            <img src="{{ asset('assets') }}/images/users/user-14.jpg" class="img-fluid rounded-circle" alt="">
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mb-1">Jenny Dubois</h5>
                                                            <span class="text-muted">8 Pendaftaran Terverifikasi</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="fw-normal my-1">48%</p>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td class="border-0">
                                                    <div class="d-flex align-items-center my-1">
                                                        <div class="avatar-sm rounded me-3 align-items-center justify-content-center d-flex">
                                                            <img src="{{ asset('assets') }}/images/users/user-15.jpg" class="img-fluid rounded-circle" alt="">
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mb-1">Felipa Silva</h5>
                                                            <span class="text-muted">8 Pendaftaran Terverifikasi</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-0">
                                                    <p class="fw-normal my-1">95%</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->

    @include('components.layouts.footer')
</div>
