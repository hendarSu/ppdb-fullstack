<div class="container mt-5">
   <div class="mt-5" style="margin-top: 6.6rem !important;
">
      <h3 class="text-center my-4 mt-5">Pendaftaran Peserta Didik Baru</h3>
   </div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if ($currentStep == 1)
        <form wire:submit.prevent="nextStep">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Langkah 1: Input Data</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input type="text" class="form-control" wire:model="parent.nik">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" wire:model="parent.name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" wire:model="parent.email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" class="form-control" wire:model="parent.phone">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" wire:model="parent.address"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Siswa</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat Lahir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parent['students'] as $index => $student)
                                    <tr>
                                        <td><input type="text" class="form-control" wire:model="parent.students.{{ $index }}.name"></td>
                                        <td>
                                            <select class="form-select" wire:model="parent.students.{{ $index }}.gender">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </td>
                                        <td><input type="date" class="form-control" wire:model="parent.students.{{ $index }}.birth_date"></td>
                                        <td><input type="text" class="form-control" wire:model="parent.students.{{ $index }}.birth_place"></td>
                                        <td><button type="button" class="btn btn-danger" wire:click="removeStudent({{ $index }})">Hapus</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary" wire:click="addStudent">Tambah Siswa</button>
                    </div>
                    <button type="submit" class="btn btn-success">Berikutnya</button>
                </div>
            </div>
        </form>
    @elseif ($currentStep == 2)
        <form wire:submit.prevent="submit">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Langkah 2: Pratinjau Data dan Pembayaran</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Informasi Orang Tua</h6>
                            <p><strong>NIK:</strong> {{ $parent['nik'] }}</p>
                            <p><strong>Nama:</strong> {{ $parent['name'] }}</p>
                            <p><strong>Email:</strong> {{ $parent['email'] }}</p>
                            <p><strong>Telepon:</strong> {{ $parent['phone'] }}</p>
                            <p><strong>Alamat:</strong> {{ $parent['address'] }}</p>
                            <h6>Informasi Siswa</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Tempat Lahir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($parent['students'] as $student)
                                        <tr>
                                            <td>{{ $student['name'] }}</td>
                                            <td>{{ $student['gender'] }}</td>
                                            <td>{{ $student['birth_date'] }}</td>
                                            <td>{{ $student['birth_place'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Metode Pembayaran</h6>
                            <div class="mb-3">
                                <label class="form-label">Pilih Metode Pembayaran</label>
                                <select class="form-select" wire:model="paymentMethod">
                                    <option value="">Pilih Metode Pembayaran</option>
                                    <option value="credit_card">Kartu Kredit</option>
                                    <option value="bank_transfer">Transfer Bank</option>
                                    <option value="paypal">PayPal</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total Pembayaran</label>
                                <input type="text" class="form-control" wire:model="totalPembayaran" readonly>
                            </div>
                            <button type="button" class="btn btn-secondary" wire:click="previousStep">Sebelumnya</button>
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>

