@extends('layout.main')
    
@section('content')
    
    <div class="page-wrapper">
    
        @include('partials.sidebar_customer')

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            @include('partials.header')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-11 ml-5 mt-3 ">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="font-weight-bold">Riwayat Transaksi</h4>
                                        <div class="list-group list-group-flush row gx-4">
                                            @foreach ($transaksis as $transaksi)
                                            <h6 class="bg-body-tertiary p-2 border-top border-bottom">
                                                {{ $transaksi->tanggal }}
                                                <span class="float-right">Rp.
                                                    {{ number_format($transaksi->total_harga, 2, ',', '.') }}</span>
                                            </h6>
                                            @php
                                                $transaksiList = App\Models\Transaksi::select('invoice', 'tgl_transaksi')
                                                    ->where(DB::raw('DATE(tgl_transaksi)'), $transaksi->tanggal)
                                                    ->where('id_user', auth()->id())
                                                    ->groupBy('invoice', 'tgl_transaksi')
                                                    ->orderBy('tgl_transaksi', 'desc')
                                                    ->get();
                                            @endphp
        
                                            <ul class="list-group list-group-light mb-4">
                                                @foreach ($transaksiList as $list)
                                                    @php
                                                        $totalHarga = App\Models\Transaksi::where('invoice', $list->invoice)->sum('total_harga');
                                                    @endphp
                                                    <a href="{{ route('customer.transaksi.detail', $list->invoice) }}">
                                                        <li
                                                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center col-12">
                                                                <div class="ms-3 col-12">
                                                                    <p class="fw-bold mb-1">{{ $list->invoice }} <span
                                                                            class="float-right">{{ $list->tgl_transaksi }}</span>
                                                                    </p>
                                                                    <p class="text-muted mb-0">Rp.
                                                                        {{ number_format($totalHarga, 2, ',', '.') }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </a>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @include('partials.footer')
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>


@endsection