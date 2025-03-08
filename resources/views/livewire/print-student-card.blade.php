<!-- <div class="content-page"> -->
<div class="content">
    <!-- Start Content-->
    <div class="container mt-5">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Preview Cetak Kartu</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                    <li class="breadcrumb-item active">Cetak Kartu</li>
                </ol>
            </div>
        </div>

        <!-- start row -->
        <div class="row justify-content-center">
            <div class="col-md-6">
            <div class="card card-print" style="border-radius: 10px; overflow: hidden;">
                @if($payment_status !== 'paid')
                <div class="card-header bg-danger text-white text-center" style="padding: 20px;">
                    <h4 class="mb-0">Menunggu Pembayaran</h4>
                </div>
                @else
                <div class="card-header bg-primary text-white text-center" style="padding: 20px;">
                <h4 class="mb-0">Kartu Peserta</h4>
                </div>
                <div class="card-body text-center" style="padding: 30px;">
                <h1 class="mt-4"> <span class="badge bg-success" style="font-size: 1.2em;">{{ $student_registration->registration_code }}</span></h1>
                <table class="mt-4 mb-4" style="width: 100%; text-align: center;">
                    <tr>
                        <td style="text-align: right;">
                            {!! QrCode::size(100)->generate($student_registration->registration_code) !!}
                        </td>
                        <td style="padding-left: 20px;">
                            <div style="width: 75px; height: 100px; object-fit: cover; border: 1px solid black; border-radius: 0;"></div>
                        </td>
                    </tr>
                </table>

                <h3>{{ $student->name }}</h3>
                <p>{{ $student->gender }}</p>

                </div>
                @endif
            </div>
            @if($payment_status == 'paid')
            <center>
            <button id="printButton" onclick="printB1()" class="btn btn-primary" style="">Cetak</button>
            </center>
            @else
            <center>
            <a href="{{ url('/') }}" class="btn btn-secondary">Kembali ke Beranda</a>
            </center>
            @endif
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>

<script>
function printB1() {
    document.getElementById('printButton').style.display = 'none';
    var printContent = document.querySelector('.card-print').outerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    var style = document.createElement('style');
    style.innerHTML = '@page { size: 435px 638.25px; } .card-print { box-shadow: none !important; }';
    document.head.appendChild(style);
    window.print();
    document.body.innerHTML = originalContent;
    document.getElementById('printButton').style.display = 'block';
    location.reload();
}
</script>

