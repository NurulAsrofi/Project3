<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Tambah Data</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Rekayasa Perangkat Lunak</a>
        </div>
    </nav>

    <div class="container mt-3">
        <a href="{{ route('admin.peminjaman') }}">
            <i class="bi bi-arrow-left h1"></i>
        </a>

        <!-- Success Alert -->
        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Failed Alert -->
        @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ Session::get('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edit Data</h5>
                        <form action="/postEditPeminjaman/{{ $data->id }}" method="POST">
                            @csrf

                            <!-- Nomor Anggota Input -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nomor Anggota</label>
                                <input type="text" class="form-control border border-secondary" name="idUser"
                                    required value="{{ $data->id_user }}">
                                <span class="text-danger">
                                    @error('idUser')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- ID Buku Input -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">ID Buku</label>
                                <input type="text" class="form-control border border-secondary" name="kodeBuku"
                                    required value="{{ $data->id_buku }}">
                                <span class="text-danger">
                                    @error('kodeBuku')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Tanggal Peminjaman Input -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Tanggal Peminjaman</label>
                                <input type="text" class="form-control border border-secondary"
                                    name="tanggalPeminjaman" required value="{{ $data->tanggal_pinjam }}">
                                <span class="text-danger">
                                    @error('tanggalPeminjaman')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Tanggal Pengembalian Input -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Tanggal Pengembalian</label>
                                <input type="text" class="form-control border border-secondary"
                                    name="tanggalPengembalian" required value="{{ $data->tanggal_kembali }}">
                                <span class="text-danger">
                                    @error('tanggalPengembalian')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Status Radio Buttons -->
                            <div class="form-group mt-4">
                                <label class="text-secondary">Status Pengembalian</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status"
                                        value="Belum Dikembalikan" @if ($data->status == 'Belum Dikembalikan') checked @endif>
                                    <label class="form-check-label">Belum Dikembalikan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status"
                                        value="Sudah Dikembalikan" @if ($data->status == 'Sudah Dikembalikan') checked @endif>
                                    <label class="form-check-label">Sudah Dikembalikan</label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success mt-5">Update Data Peminjaman</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        @if (Session::get('Succes'))
            setTimeout(function() => {
                window.location.href = "{{ route('admin.peminjaman') }}";
            }, 900);
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
