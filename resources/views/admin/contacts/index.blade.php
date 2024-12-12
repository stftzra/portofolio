<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #ff99cc, #ffe6f2);
            font-family: 'Roboto', sans-serif;
            color: #000; /* Teks menjadi hitam */
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #ffe6f2;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1200px;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #000; /* Teks menjadi hitam */
            font-weight: bold;
            margin-bottom: 40px;
            font-size: 2.5rem;
        }

        .btn {
            font-size: 16px;
            padding: 12px 24px;
            border-radius: 50px;
            letter-spacing: 0.5px;
            transition: all 0.3s ease-in-out;
            text-transform: uppercase;
            font-weight: bold;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #ff66a3;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e55c93;
            transform: translateY(-3px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #000; /* Teks menjadi hitam */
        }

        th {
            background-color: #ff66a3;
            color: white;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .btn-warning {
            background-color: #ffcc80;
            border: none;
        }

        .btn-danger {
            background-color: #ff6f61;
            border: none;
        }

        .btn-warning:hover {
            background-color: #ffb74d;
        }

        .btn-danger:hover {
            background-color: #ff3d3d;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 2rem;
            }
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Contact List</h1>

    <!-- Button for Adding Contact -->
    <div class="text-center mb-4">
        <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> Add New Contact
        </a>
    </div>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- DataTable -->
    <div class="table-responsive">
        <table id="contactsTable" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->notelp }}</td>
                    <td>{{ $contact->description }}</td>
                    <td>
                        <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <!-- Delete Form with SweetAlert -->
                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" style="display:inline;" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#contactsTable').DataTable({
            responsive: true,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            }
        });

        // SweetAlert for delete confirmation
        $('.delete-form').on('submit', function(e) {
            e.preventDefault();
            const form = this;
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
</body>
</html>