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
                                    <div class="col-md-12">
                                        <!-- DATA TABLE-->
                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Customer</th>
                                                        <th>Rekening</th>
                                                        <th>Nominal</th>
                                                        <th>Kode Unik</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($requestTopups as $i => $topup)
                                                    <tr>
                                                        <td>{{ $i + 1 }}</td>
                                                        <td>{{ $topup->wallet->user->name }}</td>
                                                        <td>{{ $topup->rekening }}</td>
                                                        <td>{{ $topup->nominal }}</td>
                                                        <td>{{ $topup->kode_unik }}</td>
                                                        <td>{{ $topup->status }}</td>
                                                        <td class="col-2">
                                                            @if ($topup->status === 'menunggu')
                                                                <form action="{{ route('konfirmasi.topup', $topup->id) }}"
                                                                    method="post" style="display: inline;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-sm">Konfirmasi</button>
                                                                </form>
        
                                                                <form action="{{ route('tolak.topup', $topup->id) }}"
                                                                    method="post" style="display: inline;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm">Tolak</button>
                                                                </form>
                                                            @elseif($topup->status === 'dikonfirmasi')
                                                                <button type="submit"
                                                                    class="btn btn-success btn-sm col-12">{{ $topup->status }}</button>
                                                            @else
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm col-12">{{ $topup->status }}</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END DATA TABLE -->
                                    </div>                
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- DATA TABLE-->
                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Customer</th>
                                                        <th>Rekening</th>
                                                        <th>Nominal</th>
                                                        <th>Kode Unik</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($requestWithdrawals as $i => $withdrawal)
                                                    <tr>
                                                        <td>{{ $i + 1 }}</td>
                                                        <td>{{ $withdrawal->wallet->user->name }}</td>
                                                        <td>{{ $withdrawal->rekening }}</td>
                                                        <td>{{ $withdrawal->nominal }}</td>
                                                        <td>{{ $withdrawal->kode_unik }}</td>
                                                        <td>{{ $withdrawal->status }}</td>
                                                        <td class="col-2">
                                                            @if ($withdrawal->status === 'menunggu')
                                                                <form
                                                                    action="{{ route('konfirmasi.withdrawal', $withdrawal->id) }}"
                                                                    method="post" style="display: inline;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-sm">Konfirmasi</button>
                                                                </form>
        
                                                                <form
                                                                    action="{{ route('tolak.withdrawal', $withdrawal->id) }}"
                                                                    method="post" style="display: inline;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm">Tolak</button>
                                                                </form>
                                                            @elseif($withdrawal->status === 'dikonfirmasi')
                                                                <button type="submit"
                                                                    class="btn btn-success btn-sm col-12">{{ $withdrawal->status }}</button>
                                                            @else
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm col-12">{{ $withdrawal->status }}</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END DATA TABLE -->
                                    </div>                
                                    </div>
                                </div>
                                
                            </div>
                            @include('partials.footer')
                            <!-- END PAGE CONTENT-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- END PAGE CONTENT  -->

    </div>
@endsection