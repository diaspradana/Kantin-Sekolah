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

           <!-- Content Row -->
           <div class="row">
                <div class="col-11 ml-5 mt-3 ">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="font-weight-bold">Riwayat Transaksi Customer</h4>
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
                                        ->groupBy('invoice', 'tgl_transaksi')
                                        ->get();
                                @endphp

                                <ul class="list-group list-group-light mb-4">
                                    @foreach ($transaksiList as $list)
                                        @php
                                            $totalHarga = App\Models\Transaksi::where('invoice', $list->invoice)->sum('total_harga');
                                        @endphp
                                        <a href="{{ route('transaksi.detail', $list->invoice) }}">
                                            <li
                                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center col-12">
                                                    <div class="ms-5 col-12">
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
        </div>

            <!-- COPYRIGHT-->
            @include('partials.footer')
            <!-- END COPYRIGHT-->
        </div>

    </div>

@endsection