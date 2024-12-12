<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills Management</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css" rel="stylesheet">
      <!-- SweetAlert2 -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ffe4e1; /* Light Pink */
            color: #333; /* Dark Gray */
            line-height: 1.6;
            padding-bottom: 50px;
            font-size: 16px;
        }

        .header {
            background: linear-gradient(135deg, #ff69b4, #ff1493);
            color: white;
            padding: 50px 20px;
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2.5rem;
        }

        .dataTables_wrapper {
            margin: 20px auto;
            width: 90%;
            max-width: 1200px;
        }

        .fab {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #ff1493;
            padding: 15px;
            border-radius: 50%;
            font-size: 1.8rem;
            color: white;
            text-align: center;
            box-shadow: 0px 5px 30px rgba(255, 20, 147, 0.3);
            transition: all 0.3s ease;
        }

        .fab:hover {
            transform: scale(1.1);
            background-color: #ff69b4;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="header">
        <h1>Skills Management</h1>
        <p>Enhance Your Abilities and Track Your Progress</p>
    </div>

    <!-- Skills Table Section -->
    <div class="dataTables_wrapper">
        <table id="skillsTable" class="display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>{{ $skill->description }}</td>
                    <td>
                        <a href="{{ route('skill.edit', $skill) }}" class="btn btn-edit"><i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('skill.destroy', $skill) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Floating Action Button -->
    <a href="{{ route('skill.create') }}" class="fab">
        <i class="fas fa-plus"></i>
    </a>

    <script>
        $(document).ready(function () {
            $('#skillsTable').DataTable({
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