<div class="container mt-5">
    <div class="mt-5" style="margin-top: 6.6rem !important;">
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
                          <div class="row">
                                <div class="col-md-6">
                                     <div class="mb-3">
                                          <label class="form-label">NIK</label>
                                          <input type="text" class="form-control" wire:model="parent.nik" required>
                                     </div>
                                     <div class="mb-3">
                                          <label class="form-label">Nama</label>
                                          <input type="text" class="form-control" wire:model="parent.name" required>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="mb-3">
                                          <label class="form-label">Email</label>
                                          <input type="email" class="form-control" wire:model="parent.email" required>
                                     </div>
                                     <div class="mb-3">
                                          <label class="form-label">Telepon</label>
                                          <input type="text" class="form-control" wire:model="parent.phone" required>
                                     </div>
                                </div>
                          </div>
                          <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" wire:model="parent.address" required></textarea>
                          </div>
                          <div class="mb-3">
                                <label class="form-label">Batch</label>
                                <select wire:model="batch_id" id="batch_id" class="form-control" required>
                                     <option value="">Pilih Batch</option>
                                     @foreach($batches as $batch)
                                          <option value="{{ $batch->id }}">{{ $batch->name }} ({{ $batch->start_date }} - {{ $batch->end_date }})</option>
                                     @endforeach
                                </select>
                                @error('batch_id') <span class="text-danger">{{ $message }}</span> @enderror
                          </div>
                          <div class="mb-3">
                                <label class="form-label">Calon Siswa</label>
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
                                                     <td><input type="text" class="form-control" wire:model="parent.students.{{ $index }}.name" required></td>
                                                     <td>
                                                          <select class="form-select" wire:model="parent.students.{{ $index }}.gender" required>
                                                                <option value="">Pilih Jenis Kelamin</option>
                                                                <option value="Laki-laki">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                          </select>
                                                     </td>
                                                     <td><input type="date" class="form-control" wire:model="parent.students.{{ $index }}.birth_date" required></td>
                                                     <td><input type="text" class="form-control" wire:model="parent.students.{{ $index }}.birth_place" required></td>
                                                     <td><button type="button" class="btn btn-danger" wire:click="removeStudent({{ $index }})"><i class="mdi mdi-delete"></i></button></td>
                                                </tr>
                                          @endforeach
                                     </tbody>
                                </table>
                                <div class="d-flex justify-content-between">
                                     <button type="button" class="btn btn-primary" wire:click="addStudent">Tambah Calon Siswa</button>
                                     <button type="submit" class="btn btn-success">Berikutnya</button>
                                </div>
                          </div>
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
                                     <table class="table table-bordered">
                                          <tbody>
                                                <tr>
                                                     <th>NIK</th>
                                                     <td>:</td>
                                                     <td>{{ $parent['nik'] }}</td>
                                                </tr>
                                                <tr>
                                                     <th>Nama</th>
                                                     <td>:</td>
                                                     <td>{{ $parent['name'] }}</td>
                                                </tr>
                                                <tr>
                                                     <th>Email</th>
                                                     <td>:</td>
                                                     <td>{{ $parent['email'] }}</td>
                                                </tr>
                                                <tr>
                                                     <th>Telepon</th>
                                                     <td>:</td>
                                                     <td>{{ $parent['phone'] }}</td>
                                                </tr>
                                                <tr>
                                                     <th>Alamat</th>
                                                     <td>:</td>
                                                     <td>{{ $parent['address'] }}</td>
                                                </tr>
                                          </tbody>
                                     </table>
                                     <h6>Informasi Calon Siswa</h6>
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
                                          <select class="form-select" wire:model="paymentMethod" required>
                                                <option value="">Pilih Metode Pembayaran</option>
                                                <option value="payment_gateway" >Payment Gateway</option>
                                          </select>
                                     </div>
                                     <div class="mb-3">
                                          <label class="form-label">Total Pembayaran</label>
                                          <input type="text" class="form-control" wire:model="totalPembayaran" readonly>
                                     </div>
                                     <button type="button" class="btn btn-secondary" wire:click="previousStep">Sebelumnya</button>
                                     <button type="submit" id="pay-button" class="btn btn-success">Bayar</button>
                                </div>
                          </div>
                     </div>
                </div>
          </form>
     @endif
</div>
