<x-layouts.app>
    <div class="content-page">
        <div class="content">
            <div class="container-xxl mt-3">

                <!-- Header -->
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-4 fw-bold text-success m-0"><i class="bi bi-box-seam me-2"></i>Menus</h4>
                    </div>
                    <div class="text-end">
                        <a href="/menus/create" class="btn btn-success btn-sm">
                            <i class="bi bi-plus-circle"></i> Create Menu
                        </a>
                    </div>
                </div>

                <!-- Flash Messages -->
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Menus Table -->
                <div class="card border-success shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="bi bi-table me-2"></i>Daftar Menus</h5>
                    </div>
                    <div class="card-body">
                        @if($menus->isEmpty())
                            <p class="text-center text-muted">Belum ada data menu.</p>
                        @else
                            <table class="table table-hover align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>Title</th>
                                        <th>URL</th>
                                        <th>Icon</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($menus as $menu)
                                        <tr>
                                            <td>{{ $menu->title }}</td>
                                            <td>{{ $menu->url }}</td>
                                            <td>{{ $menu->icon }}</td>
                                            <td>
                                                <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>
