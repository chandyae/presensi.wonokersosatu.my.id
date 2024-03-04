@extends('layouts.admin.tabler')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->

                    <h2 class="page-title">
                        Hari Libur
                    </h2>
                </div>

            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    @if (Session::get('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif

                                    @if (Session::get('warning'))
                                        <div class="alert alert-warning">
                                            {{ Session::get('warning') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @role('administrator', 'user')
                                <div class="row">
                                    <div class="col-12">
                                        <a href="#" class="btn btn-primary" id="btnHarilibur">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 5l0 14"></path>
                                                <path d="M5 12l14 0"></path>
                                            </svg>
                                            Tambah Data
                                        </a>
                                    </div>
                                </div>
                            @endrole
                           
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Libur</th>
                                                <th>Tanggal Libur</th>
                                                <!-- <th>Sekolah</th> -->
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($harilibur as $d)
                                            <tr>
                                                <td>{{$loop->iteration + $harilibur->firstItem() - 1}}</td>
                                                <td>{{$d->kode_libur}}</td>
                                                <td>{{date('d-m-Y',strtotime($d->tanggal_libur))}}</td>
                                                <td>{{$d->keterangan}}</td>
                                                <td>
                                                <div class="d-flex">
                                                            <div>
                                                                @role('administrator', 'user')
                                                                    <a href="#" class="edit btn btn-info btn-sm"
                                                                        kode_libur="{{ $d->kode_libur }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="icon icon-tabler icon-tabler-edit"
                                                                            width="24" height="24" viewBox="0 0 24 24"
                                                                            stroke-width="2" stroke="currentColor"
                                                                            fill="none" stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none"></path>
                                                                            <path
                                                                                d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                                            </path>
                                                                            <path
                                                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                                            </path>
                                                                            <path d="M16 5l3 3"></path>
                                                                        </svg>
                                                                    </a>
                                                                @endrole
                                                                
                                                                
                                                            </div>
                                                            @role('administrator', 'user')
                                                                <div>
                                                                    <form action="/konfigurasi/hari_libur/{{ $d->kode_libur }}/delete"
                                                                        method="POST" style="margin-left:5px">
                                                                        @csrf
                                                                        <a class="btn btn-danger btn-sm delete-confirm">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="icon icon-tabler icon-tabler-trash-filled"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                                stroke="currentColor" fill="none"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round">
                                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none"></path>
                                                                                <path
                                                                                    d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z"
                                                                                    stroke-width="0" fill="currentColor">
                                                                                </path>
                                                                                <path
                                                                                    d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z"
                                                                                    stroke-width="0" fill="currentColor">
                                                                                </path>
                                                                            </svg>
                                                                        </a>
                                                                    </form>
                                                                </div>
                                                            @endrole
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    {{-- {{ $karyawan->links('vendor.pagination.bootstrap-5') }} --}}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="modal modal-blur fade" id="modal-createlibur" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Input Hari Libur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadcreatelibur">
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-editlibur" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Hari Libur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadeditlibur">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('myscript')
    <script>
        $(function(){
            $("#btnHarilibur").click(function() {
                $("#modal-createlibur").modal("show");
                $("#loadcreatelibur").load('/konfigurasi/hari_libur/create')
            });

            $(".edit").click(function() {
                var kode_libur = $(this).attr('kode_libur');
                $.ajax({
                    type: 'POST',
                    url: '/konfigurasi/hari_libur/edit',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        kode_libur: kode_libur
                    },
                    success: function(respond) {
                        $("#loadeditlibur").html(respond);
                    }
                });
                $("#modal-editlibur").modal("show");
            });

            $(".delete-confirm").click(function(e) {
                var form = $(this).closest('form');
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda Yakin Data Ini Mau Di Hapus ?',
                    text: "Jika Ya Maka Data Akan Terhapus Permanent",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus Saja!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        // Swal.fire(
                        //     'Deleted!', 'Data Berhasil Di Hapus', 'success'
                        // )
                    }
                })
            });
        })
    </script>
@endpush