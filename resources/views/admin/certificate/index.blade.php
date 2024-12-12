<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f7f7f7, #e0e0e0);
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #ff4081;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .btn-primary {
            background-color: #ff4081;
            color: #fff;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .btn-primary i {
            margin-right: 10px;
        }

        .btn-primary:hover {
            background-color: #f50057;
        }

        .table-responsive {
            margin-top: 40px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 12px;
        }

        th,
        td {
            padding: 16px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ff4081;
            color: white;
            font-weight: 700;
        }

        td {
            background-color: #fff;
            color: #333;
        }

        tr:hover td {
            background-color: #fce4ec;
        }

        .btn-warning {
            background-color: #ff80ab;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #ff4081;
        }

        .btn-danger {
            background-color: #ff6f61;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #e53935;
        }

        .file-link {
            color: #ff4081;
            text-decoration: none;
            font-weight: 500;
        }

        .file-link:hover {
            color: #f50057;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Certificate Management</h1>
        <a href="{{ route('admin.certificate.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Create Certificate
        </a>

        <div class="table-responsive">
            <table id="certificateTable" class="table display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Issued By</th>
                        <th>Issued At</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($certificates as $certif)
                    <tr>
                        <td>{{ $certif->id }}</td>
                        <td>{{ $certif->name }}</td>
                        <td>{{ $certif->issued_by }}</td>
                        <td>{{ $certif->issued_at }}</td>
                        <td>
                            @if($certif->file)
                            <a href="{{ asset('storage/' . $certif->file) }}" target="_blank" class="file-link">View Certificate</a>
                            @else
                            No file uploaded
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.certificate.edit', $certif) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button class="btn btn-danger" onclick="confirmDelete({{ $certif->id }})">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                            <form id="delete-form-{{ $certif->id }}" action="{{ route('admin.certificate.destroy', $certif) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#certificateTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/id.json"
                }
            });
        });

        function confirmDelete(certifId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Menghapus...',
                        text: 'Sedang memproses permintaan Anda.',
                        icon: 'info',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        document.getElementById('delete-form-' + certifId).submit();
                    });
                }
            });
        }

        @if(session('success'))
        Swal.fire({
            title: 'Sukses!',
            text: '{{ session('success') }}',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false
        });
        @endif
    </script>
</body>

</html>