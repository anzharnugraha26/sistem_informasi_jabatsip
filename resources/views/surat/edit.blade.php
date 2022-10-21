@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Data Surat</h1>

        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">

                            <!-- General Form Elements -->
                            <form class="mt-5" method="POST" action="{{ url('surat/update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <input type="hidden" value="{{ $s->id }}" name="id">
                                    <label for="inputText" class="col-sm-3 col-form-label">Tanggal Terima Surat</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tanggal_terima"
                                            value="{{ $s->tanggal_terima }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">No Surat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="no_surat"
                                            value="{{ $s->no_surat }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tanggal_surat"
                                            value="{{ $s->tanggal_surat }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Asal Surat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="asal_surat"
                                            value="{{ $s->asal_surat }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">No Agenda TU Persip</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="agenda_persip"
                                            value="{{ $s->agenda_persip }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Perihal Surat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" style="height: 100px" name="perihal_surat"> {{ $s->perihal_surat }} </textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" style="height: 100px" name="keterangan">{{ $s->keterangan }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Jenis Surat</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" aria-label="Default select example" name="sifat_surat">
                                            <option disabled>Open this select menu</option>
                                            <option value="Rahasia" {{ $s->sifat_surat == 'Rahasia' ? 'selected' : '' }}>
                                                Rahasia</option>
                                            <option value="Biasa" {{ $s->sifat_surat == 'Biasa' ? 'selected' : '' }}>Biasa
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Kode Lemari</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" aria-label="Default select example" name="kode_kabinet">
                                            <option disabled>Open this select menu</option>
                                            @foreach ($kb as $i)
                                                <option value="{{ $i->kode_kabinet }}"
                                                    {{ $s->kode_kabinet == $i->kode_kabinet ? 'selected' : '' }}>
                                                    {{ $i->nama_kabinet }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Kode Ketegori</label>
                                    <div class="col-sm-4">
                                        <select class="form-select" aria-label="Default select example"
                                            name="kode_kategori">
                                            <option disabled>Open this select menu</option>
                                            @foreach ($k as $i)
                                                <option value="{{ $i->kode_kategori }}"
                                                    {{ $s->kode_kategori == $i->kode_kategori ? 'selected' : '' }}>
                                                    {{ $i->nama_kategori }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-3 col-form-label">File Upload</label>

                                    <div class="col-sm-8">
                                        <div>
                                            <select class="form-select" aria-label="Default select example"
                                                name="pilih_file" onchange="showDiv(this)">
                                                <option value="0">Gunakan File yang lama</option>
                                                <option value="1">Upload File Baru</option>
                                            </select>
                                        </div>
                                        <div>
                                            <input class="form-control mt-3" type="file" id="formFile"
                                                name="file_baru" style="display: none">
                                        </div>

                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>


            </div>
        </section>
    </main>

    <script>
        function showDiv(select) {
            if (select.value == 1) {
                // console.log("ppppp");
                document.getElementById('formFile').style.display = "block";
            } else {
                // console.log("ppppp2");
                document.getElementById('formFile').style.display = "none";
            }
        }
    </script>
@endsection
