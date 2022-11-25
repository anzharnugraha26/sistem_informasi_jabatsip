@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Surat Masuk</h1>

        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <a href="#" class="btn btn-primary  mt-3 mb-3" data-toggle="modal"
                                data-target=".bd-example-modal-lg"><i class="ri-add-box-fill"></i> Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table datatable table-striped " id="tabel-data">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">No Surat Masuk</th>
                                            <th scope="col">No Agenda</th>
                                            <th scope="col">Asal Surat</th>
                                            <th scope="col">Perihal Surat</th>
                                            <th scope="col">Tanggal Terima</th>

                                            <th scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($surat_masuk as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->no_surat_masuk }}</td>
                                                <td>{{ $item->no_agenda }}</td>
                                                <td>{{ $item->asal_surat }}</td>
                                                <td>{{ $item->perihal_surat }}</td>
                                                <td>{{ $item->tgl_terima }}</td>

                                                <td colspan="3">
                                                    <a href="{{ url('surat-masuk/hapus/' . $item->id) }}"
                                                        onclick="return confirm('Are you sure, you want to delete it?')"
                                                        class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></a>
                                                    <a href="#" data-id="{{ $item->id }}"
                                                         
                                                        class="btn btn-success btn-sm" id="editBtn" data-toggle="modal"
                                                        data-target=".edit"><i class="bi bi-pencil"></i></a>
                                                    <a href="{{ url('data-surat-masuk/view/' . $item->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="bi bi-eye-fill"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>

                            </div>
                            <!-- Table with stripped rows -->

                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Input Surat Masuk</h5>
                            <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <form action="{{ url('save-surat-masuk') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2"><b>No Surat Masuk</b> </label>
                                        <input type="text" class="form-control" name="no_surat_masuk"
                                            value="{{ old('no_surat_masuk') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2"> <b>Klasifikasi Surat</b> </label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="klasifikasi_surat">
                                            <?php $kl = DB::table('kategori')->get(); ?>
                                            @foreach ($kl as $i)
                                                <option value="{{ $i->nama_kategori }}"
                                                    {{ old('kategori') == $i->nama_kategori ? 'selected' : '' }}>
                                                    {{ $i->nama_kategori }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2"> <b>No Agenda Tu Perssip</b> </label>
                                        <input type="text" class="form-control" name="no_agenda"
                                            value="{{ old('no_agenda') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2"> <b>Tanggal Surat</b> </label>
                                        <input type="date" class="form-control" name="tgl_surat"
                                            value="{{ old('tgl_surat') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2"> <b>Asal Surat</b> </label>
                                        <input type="text" class="form-control" name="asal_surat"
                                            value="{{ old('asal_surat') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2"> <b>Tanggal Terima</b> </label>
                                        <input type="date" class="form-control" name="tgl_terima"
                                            value="{{ old('tgl_terima') }}" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2"> <b>Perihal Surat</b> </label>
                                        <textarea class="form-control" name="perihal_surat" required>
                                            {{ old('perihal_surat') }}
                                        </textarea>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2"> <b>Sifat Surat</b> </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sifat_surat"
                                                value="rahasia" id="flexRadioDefault1"
                                                {{ old('sifat_surat') == 'rahasia' ? 'checked' : '' }} checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Rahasia
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sifat_surat"
                                                value="biasa" id="flexRadioDefault2"
                                                {{ old('sifat_surat') == 'biasa' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Biasa
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2"> <b>Kabinet</b> </label>
                                        <select class="form-select" aria-label="Default select example" name="kabinet">
                                            <?php $k = DB::table('kabinet')->get(); ?>
                                            @foreach ($k as $i)
                                                <option value="{{ $i->id }}"
                                                    {{ old('kabinet') == $i->id ? 'selected' : '' }}>
                                                    {{ $i->nama_kabinet }} -
                                                    {{ $i->slot }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2"> <b>Jenis Surat</b> </label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="jenis_surat">
                                            <?php $k = DB::table('jenis_surats')->get(); ?>
                                            @foreach ($k as $i)
                                                <option value="{{ $i->id }}"
                                                    {{ old('jenis_surat') == $i->id ? 'selected' : '' }}>
                                                    {{ $i->nama_jenis }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputText" class="mb-2"> <b>File</b> </label>
                                        <br>
                                        <small style="color: red">*Format : jpg/jpeg/png/pdf (5 Mb)</small>
                                        <input type="file" class="form-control" name="file" required>
                                        @if ($errors->has('file'))
                                            <small style="color: red">{{ $errors->first('file') }}</small>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                        class="bi bi-x-circle"></i> Batal</button>
                                <button class="btn btn-success"><i class="bi bi-box-arrow-down"></i>
                                    Simpan</button>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg edit" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Surat Masuk</h5>
                            <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>

                        <div class="modal-body">
                            <div id="contenedit">

                            </div>

                        </div>
                        <div class="modal-footer">

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('script')
    @if ($errors->has('file'))
        <script>
            alert("file hanya bisa berbentuk , pdf, jpeg, jpg, png")
        </script>
    @endif
    @if ($errors->has('file_baru'))
        <script>
            alert("file hanya bisa berbentuk , pdf, jpeg, jpg, png")
        </script>
    @endif
    <script>
        $(document).ready(function() {

            $('body').on('click', '#editBtn', function() {
                var id = $(this).data('id');
                var url = "edit-surat-masuk/" + id;
                console.log(id)
                $.ajax({
                    url: url,
                    type: 'GET',
                    chace: false,
                    // dataType: 'json',
                    success: function(data) {
                        // console.log(data)
                        document.getElementById("contenedit").innerHTML = data;
                    }
                });
            })
        })

        function hideDivFile(id, elementValue) {
            document.getElementById(id).style.display = elementValue.value == 1 ? 'block' : 'none';
        }
    </script>
@endsection
