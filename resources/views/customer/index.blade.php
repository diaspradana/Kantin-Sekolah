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
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Dashboard Customer/Siswa</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h3 style="color: white">{{count($keranjangs)}}</h3>
                                                <span>Keranjang</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h3 style="color: white">Rp.{{number_format($wallet->saldo)}}</h3>
                                                <span>Saldo</span>
                                            </div>
                                            <span class="float-right">
                                                <button type="button" class="btn btn-outline-dark my-3 mr-3" data-toggle="modal"
                                                    data-target="#topupModal"><i class="ti-plus"></i> TopUp</button>
        
                                                <button type="button" class="btn btn-outline-dark my-3 mr-5" data-toggle="modal"
                                                    data-target="#tariktunaiModal"><i class="ti-archive"></i> Tarik Tunai</button>
                                            </span>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-10 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-credit-card"></i>
                                            </div>
                                            <div class="text">
                                                <h4 style="color: white">{{ implode('', str_split(str_replace(',','',$wallet->rekening), 3)) }}</h4>
                                                <span>Rekening</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start tampilan produk -->
                        <div class="row">
                            <div class="col-11 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="font-weight-bold">Produk</h3>
                                        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center mt-4">
                                            @foreach ($produks as $produk)
                                                <div class="col-xs-6 col-md-4 mb-5">
                                                    <div class="card h-90"
                                                        style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
                                                        <!-- Product itmage-->
                                                        <img class="card-img-top" src="{{ asset('storage/produk/' . $produk->foto) }}"
                                                            alt="{{ $produk->nama_produk }}"
                                                            style="max-height: 15em; object-fit: cover;" />
                                                        <!-- Product details-->
                                                        <div class="card-body p-4">
                                                            <div class="text-center">
                                                                <h5 class="fw-bolder mb-3">{{ $produk->nama_produk }}</h5>
                                                                <p class="mb-3">{{ $produk->kategori->nama_kategori }}</p>
                                                                <p class="mb-3">Stok :{{ $produk->stok }}</p>
                                                                <h5>Rp. {{ number_format($produk->harga, 0, ',', '.') }},00</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tampilan produk -->
                        
                        @include('partials.footer')
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

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
                        required value="{{ $wallet->rekening }}">
                </div>

                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="text" min="1000" id="nominal" class="form-control" placeholder="" name="nominal"
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
                    <input id="rekening" name="rekening" type="hidden" placeholder="" class="form-control"
                        required value="{{ $wallet->rekening }}">
                </div>

                <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="text" min="1000" id="nominal" class="form-control" placeholder="" name="nominal"
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