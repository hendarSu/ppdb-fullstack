<div class="content-page">
    <div class="content">
        <div class="container-xxl mt-5">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Student List</h4>
                </div>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Student List</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0 float-start">Student List</h5>
                            <button wire:click="export" class="btn btn-success btn-sm float-end">
                                <i class="mdi mdi-file-excel-box"></i> Excel
                            </button>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="datatable_length">
                                            <label class="form-label">Show
                                                <select name="datatable_length" aria-controls="datatable" class="form-select form-select-sm" wire:model="perPage">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="datatable_filter" class="dataTables_filter">
                                            <label>Search:
                                                <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable" wire:model="search">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap dataTable no-footer dtr-inline" aria-describedby="datatable_info" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th width="1">ID</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Tempat Lahir</th>
                                                    <th width="5">Pembayaran</th>
                                                    <th width="5">Penyaringan</th>
                                                    <th width="5">Tahap</th>
                                                    <th width="1">#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($students as $student)
                                                    <tr>
                                                        <td>{{ $student->id }}</td>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->gender }}</td>
                                                        <td>{{ $student->birth_date }}</td>
                                                        <td>{{ $student->birth_place }}</td>
                                                        <td>
                                                            @php
                                                                $paymentStatus = 'N/A';
                                                                foreach ($student->registrations as $registration) {
                                                                    foreach ($registration->payments as $payment) {
                                                                        $paymentStatus = $payment->status;
                                                                        break 2; // Exit both loops once a payment status is found
                                                                    }
                                                                }
                                                            @endphp
                                                            @if($paymentStatus == 'paid')
                                                                <span class="badge bg-success">Lunas</span>
                                                            @elseif($paymentStatus == 'unpaid')
                                                                <span class="badge bg-danger">Belum Lunas</span>
                                                            @else
                                                                <span class="badge bg-dark">{{ strtoupper($paymentStatus) }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($student->status == 'pending')
                                                                <span class="badge bg-secondary">MENUNGGU</span>
                                                            @elseif($student->status == 'approved')
                                                                <span class="badge bg-success">DISETUJUI</span>
                                                            @elseif($student->status == 'rejected')
                                                                <span class="badge bg-danger">DITOLAK</span>
                                                            @else
                                                                <span class="badge bg-dark">{{ strtoupper($student->status) }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-info">{{ strtoupper($student->stage) }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="/students/{{ $student->id }}" class="btn btn-sm btn-primary">
                                                                <i class="mdi mdi-eye"></i> Detail
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                            {{ $students->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

