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
                            <h1 class="title-4">Welcome Back Admin
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
                            <h3 class="title-5 m-b-35">Data Table kategori</h3>
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
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategoris as $i => $kategori)
                                        <tr>
                                            <td>{{$i + 1}}</td>
                                            <td>{{$kategori->nama_kategori}}</td>    
                                            <td>
                                                <!-- Tombol Edit untuk setiap baris -->
                                                <button class="btn btn-light" class="submit" data-toggle="modal" data-target="#editModal{{$kategori->id}}" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <!-- Tombol Delete -->
                                                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display: inline;">
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

    @foreach ($kategoris as $kategori)
    <!-- Modal untuk Edit -->
    <div class="modal fade" id="editModal{{$kategori->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal{{$kategori->id}}Label" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="editModal{{$kategori->id}}Label">Edit Kategori</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <!-- Formulir Edit -->
                   <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                       @csrf
                       @method('PUT')
                       <div class="form-group">
                           <label for="nama_kategori">Nama Kategori</label>
                           <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{$kategori->nama_kategori}}">
                       </div>
                       <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                   </form>
               </div>
           </div>
       </div>
   </div>

   <!-- Modal untuk Tambah -->
   <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="tambahModalLabel">Tambah Kategori</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <!-- Formulir Tambah -->
                   <form action="{{ route('kategori.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label for="nama_kategori">Nama Kategori</label>
                           <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                       </div>
                       <button type="submit" class="btn btn-primary">Tambahkan</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
@endforeach
@endsection