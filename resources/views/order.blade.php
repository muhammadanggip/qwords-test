@extends(auth()->check() ? 'layouts.user_type.auth' : 'layouts.user_type.guest')

@section('content')
<br>
<section class="min-vh-100 mb-8">
    <div class="page-header min-vh-75">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-dark mb-2 mt-5">Order</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-body">

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Domain </th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                        <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Invoice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $orders)
                                    <tr>
                                        <td class="align-middle text-center text-sm">{{ $orders->domain }}</td>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">Unpaid</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">Rp.{{ number_format($orders->harga, 0, ',', '.') }}</td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('invoice.download', $orders->id) }}" class="text-secondary text-xs font-weight-bold">Cetak invoice</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection