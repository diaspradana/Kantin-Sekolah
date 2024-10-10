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
                                            <tr class="text-capitalize">
                                                <th scope="col">Produk</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($selectedProducts as $selectedProduct)
                                                <tr>
                                                    <td style="vertical-align: middle;">
                                                        {{ $selectedProduct->produk->nama_produk }}</td>
                                                    <td style="vertical-align: middle;">
                                                        Rp.{{ number_format($selectedProduct->produk->harga, 0, ',', '.') }},00
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        @if ($selectedProduct->jumlah_produk !== null)
                                                        {{ $selectedProduct->jumlah_produk }}
                                                        @else
                                                            {{ $selectedProduct->kuantitas }}
                                                        @endif
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        Rp.{{ number_format($selectedProduct->total_harga, 0, ',', '.') }},00
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3">Total Seluruh Harga :</td>
                                                <td>Rp.{{ number_format($totalHarga, 0, ',', '.') }},00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-buttons text-center">
                                <a href="{{ url()->previous()}} " class="btn btn-dark">Back</a>
                            </div>
                            <div class="invoice-buttons text-center ml-3">
                                <button type="submit" id="printInvoiceBtn" class="btn btn-primary">Cetak Invoice</button>
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
            var printBtn = document.getElementById('printInvoiceBtn');

            printBtn.addEventListener('click', function() {
                window.location.href = '{{ route('cetak.transaksi') }}';
            });
        });
    </script>
@endsection