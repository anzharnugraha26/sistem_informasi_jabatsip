@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Kabinet</h1>

        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <a href="{{ url('kabinet/tambah') }}" class="btn btn-primary  mt-3 mb-3"><i
                                    class="ri-add-box-fill"></i> Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table datatable table-striped " id="tabel-data">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Kode User</th>
                                            <th scope="col">Nama </th>

                                            <th scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($u as $i)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $i->username }}</td>
                                                <td>{{ $i->kode_user }}</td>
                                                <td>{{ $i->name }}</td>

                                                <td colspan="2">

                                                    <a href="{{ url('kabinet/hapus/' . $i->id) }}"
                                                        onclick="return confirm('Are you sure, you want to delete it?')"
                                                        class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                                                    <a href="{{ url('kategori/edit/' . $i->id) }}"
                                                        class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>

                                                </td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                <div>
                                    <p>Jumlah Data : {{$c}}</p>
                                </div>
                            </div>
                            <!-- Table with stripped rows -->

                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
