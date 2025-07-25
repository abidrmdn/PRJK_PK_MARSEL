@extends('back.layout.template')

@section('title', 'List Categoris')

@section('content')
    {{-- content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Categories</h1>
        </div>

        <div class="mt-3">
            <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#modalCreate">Create</button>


            @if ($errors->any())
                <div class="my-3" id="alert-danger">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div class="my-3" id="alert-success">
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                </div>
            @endif


            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Funcition</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <div class="text-center">
                                    <button class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#modalUpdate{{ $item->id }}">Edit</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete{{ $item->id }}">Hapus</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal Create-->
        @include('back.category.create-modal')

        <!-- Modal Update-->
        @include('back.category.update-modal')

        <!-- Modal delete-->
        @include('back.category.delete-modal')

    </main>



@endsection

<script>
    // Tutup alert success dalam 3 detik
    setTimeout(() => {
        const successAlert = document.getElementById('alert-success');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
    }, 3000); // 3000 ms = 3 detik

    // Tutup alert error dalam 5 detik
    setTimeout(() => {
        const errorAlert = document.getElementById('alert-danger');
        if (errorAlert) {
            errorAlert.style.display = 'none';
        }
    }, 5000); // 5000 ms = 5 detik
</script>
