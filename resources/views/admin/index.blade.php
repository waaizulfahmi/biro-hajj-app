@extends('Layouts.admin.app')

@section('title')
    Daftar Biro Terdaftar
@endsection

@section('main')
    {{-- {{ $errors }} --}}
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h6>Agent Data </h6>
                            {{-- @dd($candidate) --}}
                            {{-- create button --}}
                            <div>
                                {{-- <a href="{{ route('member.create') }}"
                class="btn btn-sm bg-gradient-primary font-weight-bold text-xs">
                Tambah
              </a> --}}
                                <a href="{{ route('hajj.create') }}"
                                    class="btn btn-sm bg-gradient-success font-weight-bold text-xs">
                                    Add Data
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-4 pt-0 mt-3">
                        <div class="table-responsive p-0">
                            <table class="table table-bordered  table-hover align-middle mb-0" id="membersTable">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder text-center">
                                            No
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                            Name</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                            Price</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                            Location
                                        </th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                            Hotel Rating</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hajjData as $key => $hajj)
                                        <tr class="cursor-pointer" onclick="detail({{ $hajj->id }})">
                                            <td class="align-middle text-center">
                                                <p class="text-sm font-weight-bold mb-0 ml-5">{{ $key + 1 }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $hajj->name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    Rp. {{ number_format($hajj->price, 0, ',', '.') }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $hajj->location }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i
                                                            class="fas fa-star {{ $i <= $hajj->rating ? 'text-warning' : 'text-secondary' }}"></i>
                                                    @endfor
                                                </div>
                                            </td>
                                            {{-- <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $candidate->birth_place }},
                                                    {{ \Carbon\Carbon::parse($candidate->birth_date)->translatedFormat('d F Y') }}
                                                </p>
                                            </td> --}}
                                            {{-- <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $candidate->register_status }}
                                                </p>
                                            </td> --}}



                                            {{-- <td class="align-middle d-flex align-items-center" onclick="handleAksiClick(event)">
                                        <a href="{{ route('candidate.show', $candidate->id) }}"
                                            class="btn bg-gradient-info font-weight-bold text-sm mt-4" data-toggle="tooltip"
                                            data-original-title="Detail" id="detail">
                                            <i class="fa fa-info-circle me-2" aria-hidden="true"></i> Detail
                                        </a>
                                    </td> --}}

                                            <td class="align-middle" onclick="handleAksiClick(event)">
                                                <a href="{{ route('hajj.edit', $hajj->id) }}"
                                                    class="btn bg-gradient-warning font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Update" id="edit">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="btn bg-gradient-danger font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Delete"
                                                    onclick="hapus({{ $hajj->id }})" id="hapus">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Hapus
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('Layouts.admin.footer')
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#membersTable').DataTable();
        });

        function hapus(id) {
            var deleteUrl = "{{ route('hajj.destroy', ':id') }}";
            deleteUrl = deleteUrl.replace(':id', id);

            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda Yakin akan Menghapus Data Ini ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#234CA3',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonColor: '#234CA3',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            var response = JSON.parse(xhr.responseText);
                            Swal.fire({
                                title: 'Failed!',
                                text: response.message,
                                icon: 'error',
                                confirmButtonColor: '#234CA3',
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
