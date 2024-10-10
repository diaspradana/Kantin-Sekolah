<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Tarik Tunai</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="">
        <div class="card-body m-5">
            <div class="mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f; font-size: 20px">yes</p>
                    </div>
                </div>

                <div class="border-top">
                    <div class="col-md-12 pt-3">
                        <div class="text-center">
                            <i class="fab fa-mdb fa-4x ms-0" style="color: #5d9fc5"></i>
                            <h4 class="pt-0">Riwayat Tarik Tunai</h4>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">
                                    Nama : {{ auth()->user()->name }}
                                </li>
                                <li class="text-muted">{{ now()->format('d F Y') }}</li>
                                <li class="text-muted">{{ $tanggal }}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Rekening</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Kode Unik</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdrawals as $i => $withdrawal)
                                    <tr>
                                        <td>{{ $i + 1}}</td>
                                        <td style="vertical-align: middle;">{{ $withdrawal->created_at }}</td>
                                        <td style="vertical-align: middle;">{{ $withdrawal->wallet->rekening }}</td>
                                        <td style="vertical-align: middle;">{{ $withdrawal->wallet->user->name }}</td>
                                        <td style="vertical-align: middle;">Rp.{{ number_format($withdrawal->nominal, 0, ',', '.') }}</td>
                                        <td style="vertical-align: middle;">{{ $withdrawal->kode_unik }}</td>
                                        <td style="vertical-align: middle;">{{ $withdrawal->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr class="mt-5" />
                    <div class="row">
                        <div class="col-12 text-center">
                            <p>Terimakasih</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.print();

            window.addEventListener('afterprint', function() {

                window.location.href = '{{ route('customer.index') }}';
            });

        });
    </script>

</body>

</html>