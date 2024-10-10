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
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#tariktunaiModal">
                                            <i class="zmdi zmdi-plus"></i>TARIK TUNAI
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
                                                    @foreach ($withdrawals as $i => $withdrawal)
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $withdrawal->wallet->user->name }}</td>
                                                            <td>{{ $withdrawal->rekening }}</td>
                                                            <td>Rp. {{ number_format($withdrawal->nominal, 0, ',', '.') }},00</td>
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
        
                                                                    <form action="{{ route('tolak.withdrawal', $withdrawal->id) }}"
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

    <!-- modal Tarik tunai -->
    <div class="modal fade" id="tariktunaiModal" tabindex="-1" role="dialog" aria-labelledby="tariktunaiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="tariktunaiModalLabel">Tarik Tunai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="{{ route('withdrawal') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rekening">Rekening</label>
                            <input id="rekening" name="rekening" type="text" placeholder="" class="form-control"
                                required value="">
                        </div>
        
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" id="nominal" class="form-control" placeholder="" name="nominal"
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
                            <span class="d-none d-sm-block">Tarik Tunai</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        
@endsection