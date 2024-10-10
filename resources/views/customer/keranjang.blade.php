@extends('layout.main')
@section('content')

<body class="animsition">
    <div class="page-wrapper">

        <!-- MENU SIDEBAR-->
        @include('partials.sidebar_customer')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('partials.header')
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Produk</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Total Harga</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($keranjangs as $keranjang)
                                                <tr>
                                                    <td style="vertical-align: middle;"> <img width="100px"
                                                        src="{{ asset('storage/produk/' . $keranjang->produk->foto) }}"
                                                        alt=""></td>
                                                    <td style="vertical-align: middle;">
                                                        {{ $keranjang->produk->nama_produk }}</td>
                                                    <td style="vertical-align: middle;">
                                                        Rp.{{ number_format($keranjang->produk->harga, 0, ',', '.') }},00
                                                    </td>
                                                    <td style="vertical-align: middle;">{{ $keranjang->jumlah_produk }}
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        Rp.{{ number_format($keranjang->total_harga, 0, ',', '.') }},00
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <!-- Tombol Delete -->
                                                        <form action="{{ route('keranjang.destroy', $keranjang->id) }}" method="POST" style="display: inline;">
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
                                        <tfoot>
                                            <tr class="font-weight-bold">
                                                <td colspan="4" class="text-right">TOTAL SELURUH HARGA :
                                                </td>
                                                <td>Rp.{{ number_format($totalHarga, 0, ',', '.') }},00</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="text-right mt-3">
                                        <form action="{{ route('checkout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary col-2">Beli</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('partials.footer')
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkoutForm = document.getElementById('checkoutForm');
            const submitButton = document.getElementById('submitButton');

            submitButton.addEventListener('click', function() {
                // Lakukan submit form secara manual
                checkoutForm.submit();
            });
        });
    </script>
@endsection