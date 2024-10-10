@extends('remake.template')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pengguna Aplikasi</h5>

            <!-- Search Form -->
            <form action="{{ route('users') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari pengguna..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table text-nowrap align-middle mb-0">
                    <thead>
                        <tr class="border-2 border-bottom border-primary border-0">
                            <th scope="col" class="ps-0">Deskripsi Pengguna</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider w-100">
                        @if ($users->count() > 0)
                            @foreach ($users as $item)
                                <tr>
                                    <th scope="row" class="align-top w-25">
                                        <span class="d-flex align-items-start">
                                            <table>
                                                <tr>
                                                    <td class="text-start w-25">
                                                        Nama
                                                    </td>
                                                    <td class="text-center w-25 p-1">
                                                        :
                                                    </td>
                                                    <td class="text-start w-50">
                                                        {{ $item->username }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-start w-25">
                                                        Unit
                                                    </td>
                                                    <td class="text-center w-25 p-1">
                                                        :
                                                    </td>
                                                    <td class="text-start w-50">
                                                        {{ $item->nama_unit }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-start w-25">
                                                        Role
                                                    </td>
                                                    <td class="text-center w-25 p-1">
                                                        :
                                                    </td>
                                                    <td class="text-start w-50">
                                                        {{ strtoupper($item->role) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-start w-25">
                                                        Email
                                                    </td>
                                                    <td class="text-center w-25 p-1">
                                                        :
                                                    </td>
                                                    <td class="text-start w-50">
                                                        {{ $item->email }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </span>
                                    </th>
                                    <td class="align-top">
                                        <div class="d-flex flex-column gap-3 align-items-end">
                                            <a href="{{ route('edit_user') . '?id=' . $item->id }}" target="_blank">
                                                <iconify-icon class="text-black fs-6 pointer w-100" data-toggle="tooltip"
                                                    data-placement="top" title="Edit" icon="teenyicons:edit-1-solid"
                                                    style="cursor: pointer"></iconify-icon>
                                                <a href="{{ route('delete_user') . '?id=' . $item->id }}" target="_blank">
                                                    <iconify-icon class="text-black fs-6 pointer w-100"
                                                        data-toggle="tooltip" data-placement="top" title="Delete"
                                                        icon="material-symbols:delete"
                                                        style="cursor: pointer"></iconify-icon>
                                                </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">No users found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $users->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <!-- Add this JavaScript to enable the 'Lihat selengkapnya' functionality -->
    <script>
        document.querySelectorAll('.toggle-content').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const content = btn.previousElementSibling;
                const shortContent = content.querySelector('.short-content');
                const fullContent = content.querySelector('.full-content');

                // Check if both elements exist before proceeding
                if (shortContent && fullContent) {
                    if (fullContent.style.display === 'none') {
                        fullContent.style.display = 'block';
                        shortContent.style.display = 'none';
                        btn.textContent = 'Lihat lebih sedikit';
                    } else {
                        fullContent.style.display = 'none';
                        shortContent.style.display = 'block';
                        btn.textContent = 'Lihat selengkapnya';
                    }
                } else {
                    console.error('Short content or full content not found.');
                }
            });
        });
    </script>
@endsection
