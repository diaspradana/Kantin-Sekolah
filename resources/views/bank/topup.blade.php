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
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right">
                                        <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#topupModal">
                                            <i class="zmdi zmdi-plus"></i>ADD TOPUP
                                        </button>
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
                                                    @foreach ($topups as $i => $topup)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ $topup->wallet->user->name }}</td>
                                                    <td>{{ $topup->rekening }}</td>
                                                    <td>Rp. {{ number_format($topup->nominal, 0, ',', '.') }},00</td>
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

    <!-- modal tambah topup -->
    <div class="modal fade" id="topupModal" tabindex="-1" role="dialog" aria-labelledby="topupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="topupModalLabel">Top Up</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="{{ route('topup') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rekening">Rekening</label>
                            <input id="rekening" name="rekening" type="text" placeholder="" class="form-control"
                                required value="">
                        </div>
        
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" id="nominal" min="1000" class="form-control" placeholder="" name="nominal"
                                required>
                        </div>
        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Top Up</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection