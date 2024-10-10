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
                            <h1 class="title-4">Welcome back
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
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <th>No.</th>
                                            <th>Invoice</th>
                                            <th>Customer</th>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Total Harga</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksis as $i =>$transaksi)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td> {{ $transaksi->invoice }}</td>
                                            <td> {{ $transaksi->user->name }}</td>
                                            <td> {{ $transaksi->produk->nama_produk}}</td>
                                            <td>Rp.{{ number_format ( $transaksi->harga, 0,',','.') }}</td>
                                            <td> {{ $transaksi->kuantitas}}</td>
                                            <td>Rp.{{ number_format ( $transaksi->total_harga, 0,',','.') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-end mt-3">
                                    <a href="{{ url()->previous()}} " class="btn btn-dark">Back</a>
                                    <button type="submit" id="printInvoiceBtn" class="btn btn-primary">Cetak Invoice</button>
                                </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var printBtn = document.getElementById('printInvoiceBtn');

            printBtn.addEventListener('click', function() {
                window.location.href = '{{ route('cetak.transaksi') }}';
            });
        });
    </script>
@endsection