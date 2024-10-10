@extends('layout.main')
@section('content')

    <div class="page-wrapper">

        <!-- WELCOME-->
        @include('partials.welcome_bank')
        <!-- END WELCOME-->

        <!-- PAGE CONTENT-->
        <div class="page-container3">
            <section class="alert-wrap p-t-70 p-b-70">
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <!-- MENU SIDEBAR-->
                        @include('partials.sidebar_bank')
                        <!-- END MENU SIDEBAR-->
                        <div class="col-xl-9">
                            <!-- PAGE CONTENT-->
                            <div class="page-content">
                                <div class="row">
                                    <div class="col-11 ml-5 mt-3 ">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="font-weight-bold">Riwayat Tarik Tunai</h3>
                                                <div class="list-group list-group-flush row gx-4">
                                                    @foreach ($withdrawals as $withdrawal)
                                                            @php
                                                                $withdrawalList = App\Models\Withdrawal::where(DB::raw('DATE(created_at)'), $withdrawal->tanggal)
                                                                    // ->where('rekening', $wallet->rekening)
                                                                    ->orderBy('created_at', 'desc')
                                                                    ->get();

                                                                $totalNominal = App\Models\Withdrawal::where(DB::raw('DATE(created_at)'), $withdrawal->tanggal)
                                                                ->get()->sum('nominal');
                                                            @endphp
                                                        <h6 class="bg-body-tertiary p-2 border-top border-bottom">
                                                            {{ $withdrawal->tanggal }}
                                                            <span class="float-right">Rp. {{ number_format($totalNominal, 0, ',', '.') }}</span>
                                                        </h6>

                                                            <ul class="list-group list-group-light mb-4">
                                                                @foreach ($withdrawalList as $list)
                                                                <a href="{{ route('withdrawal.detail', $withdrawal->tanggal)}}">
                                                                    <li
                                                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                                        <div class="d-flex align-items-center col-12">
                                                                            <div class="ms-3 col-12">
                                                                                <p class="fw-bold mb-1">{{ $list->kode_unik }} <span
                                                                                        class="float-right">{{ $list->created_at }}</span>
                                                                                </p>
                                                                                <p class="text-muted mb-0">Rp.
                                                                                    {{ number_format($list->nominal, 2, ',', '.') }}
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
                            <!-- END PAGE CONTENT-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- END PAGE CONTENT  -->

    </div>
@endsection