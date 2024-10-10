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
                                        <h4 class="font-weight-bold">Riwayat Tarik Tunai</h4>
                                        <div class="list-group list-group-flush row gx-4">
                                            @foreach ($withdrawals as $withdrawal)
                                                <h6 class="bg-body-tertiary p-2 border-top border-bottom">{{ $withdrawal->tanggal }}
                                                    <span
                                                        class="float-right">Rp.{{ number_format($withdrawal->nominal, 0, ',', '.') }}</span>
                                                </h6>
                                                @php
                                                    $withdrawalList = App\Models\Withdrawal::where(DB::raw('DATE(created_at)'), $withdrawal->tanggal)
                                                        ->where('rekening', $wallet->rekening)
                                                        ->orderBy('created_at', 'desc')
                                                        ->get();
                                                @endphp

                                                <ul class="list-group list-group-light mb-4">
                                                    @foreach ($withdrawalList as $list)
                                                    <a href="{{ route('cetak.withdrawal', $withdrawal->tanggal) }}">
                                                        <li
                                                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                            <div class="d-flex align-items-center col-12">
                                                                <div class="ms-3 col-12">
                                                                    <p class="fw-bold mb-1 me-3">{{ $list->kode_unik }} <span
                                                                            class="float-end">{{ $list->created_at }}</span>
                                                                    </p>
                                                                    <p class="text-danger mb-0 ">- Rp.
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
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>


@endsection