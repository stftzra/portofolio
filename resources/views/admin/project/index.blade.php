<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proyek</title>

    <!-- Link to Google Fonts and Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffe6f0;
            color: #333;
            padding: 40px 0;
        }

        h1 {
            text-align: center;
            color: #e91e63;
            margin-bottom: 30px;
            font-size: 2.5rem;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .add-project-btn {
            display: block;
            width: 240px;
            margin: 20px auto;
            padding: 14px 22px;
            background-color: #e91e63;
            color: white;
            font-weight: 600;
            text-align: center;
            border-radius: 8px;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table.dataTable {
            width: 100% !important;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 1rem;
            color: white;
            text-decoration: none;
            text-transform: capitalize;
        }

        .btn-edit {
            background-color: #e91e63;
        }

        .btn-delete {
            background-color: #f06292;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Proyek</h1>

        @if(session('success'))
            <div class="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <a href="{{ route('admin.project.create') }}" class="add-project-btn">
            <i class="fas fa-plus-circle"></i> Tambah Proyek Baru
        </a>

        <table id="projectTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Alat</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ Str::limit($project->description, 100) }}</td>
                    <td>{{ $project->tools ?? 'N/A' }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $project->image_path) }}" alt="Image" style="width: 100px; height: auto;">
                    </td>
                    <td>
                        <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $project->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete({{ $project->id }})" class="btn btn-delete">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#projectTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                }
            });
        });

        function confirmDelete(projectId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + projectId).submit();
                }
            });
        }

        @if(session('success'))
            Swal.fire({
                title: 'Sukses!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
</body>
</html>
