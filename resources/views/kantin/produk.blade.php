@extends('layout.main')
@section('content')
    
    <div class="page-wrapper">
        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                                <form class="au-form-icon--sm" action="" method="post">
                                    <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for datas &amp; reports...">
                                    <button class="au-btn--submit2" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome Admin
                                <span>{{ auth()->user()->name }}!!</span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Data Table Produk</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-right">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#tambahModal">
                                        <i class="zmdi zmdi-plus"></i>add item
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>stok</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produks as $i => $produk)
                                        <tr>
                                            {{-- nomer --}}
                                            <td>{{$i + 1}}</td>
                                            {{-- foto --}}
                                            <td class="text-center">
                                                <img src="{{ asset('./storage/produk/' . $produk->foto)}}"
                                                    alt="{{ $produk->nama_produk }}" style="max-width: 100px;">
                                            </td>
                                            {{-- namaproduk --}}
                                            <td>{{$produk->nama_produk}}</td>  
                                            {{-- harga   --}}
                                            <td>RP. {{ number_format($produk->harga, 0,',','.')}},00</td>
                                            {{-- stok --}}
                                            <td>{{$produk->stok}}</td>
                                            {{-- desc --}}
                                            <td>{{$produk->desc}}</td>
                                            <td class="text-center">
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-light" class="submit" data-toggle="modal" data-target="#editModal{{$produk->id}}" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <!-- Tombol Delete -->
                                                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-light" class="submit" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </form>
                                            </td>                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->

            <!-- COPYRIGHT-->
            @include('partials.footer')
            <!-- END COPYRIGHT-->
        </div>

    </div>

    @foreach ($produks as $produk)
         <!-- Modal untuk Edit -->
         <div class="modal fade" id="editModal{{$produk->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$produk->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal{{$produk->id}}Label">Edit produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulir Edit -->
                        <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control-file" id="foto" name="foto">
                            </div>
                            <div class="form-group">
                                <label for="nama_produk">Nama produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{$produk->nama_produk}}">
                            </div><div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="Number" class="form-control" id="harga" name="harga" value="{{$produk->harga}}">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" id="stok" min="1" name="stok" value="{{$produk->stok}}">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="id_kategori">
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            @if ($produk->id_kategori == $kategori->id) selected @endif>
                                            {{ $kategori->nama_kategori}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="desc">Deskripsi</label>
                                <input type="text" class="form-control" id="desc" name="desc" value="{{$produk->desc}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Modal untuk Tambah -->
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulir Tambah -->
                        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama_produk">Nama produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" min="1" id="stok" name="stok" required>
                            </div>
                            <div class="form-gorup mb-3" >
                                <select class="form-control" name="id_kategori">
                                    @foreach ($kategoris as $kategori)
                                        <option  value="{{ $kategori->id }}">
                                            {{ $kategori->nama_kategori}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="desc">Deskripsi</label>
                                <input type="text" class="form-control" id="desc" name="desc" required>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control-file" id="foto" name="foto">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
@endsection