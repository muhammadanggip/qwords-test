@extends(auth()->check() ? 'layouts.user_type.auth' : 'layouts.user_type.guest')

@section('content')
<br>
<section class="min-vh-50 mb-8">
    <div class="page-header min-vh-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-dark mb-2 mt-5">Konfigurasi</h1>
                    <p class="text-lead text-dark"></p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <br>
                <div class="card z-index-0">
                    <div class="card-body">
                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Domain</label>
                                <input type="text" class="form-control" id="domain" name="domain" value="{{ $domain }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Pilihan Paket</label>
                                <select class="form-control" id="packageDuration">
                                    <option value="1">1 Tahun</option>
                                    <option value="2">2 Tahun</option>
                                    <option value="3">3 Tahun</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <a class="text-dark font-weight-bolder" style="text-align: right; display: block;" id="packagePrice"></a>
                            </div>
                            <span></span>
                            <div class="mb-3" hidden>
                                <label>Harga</label>
                                <input type="text" class="form-control" name="harga" id="harga" aria-label="Harga" aria-describedby="harga" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Nama" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ $username }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ $email }}" readonly>
                            </div>
                            <div class="text-center" id="submitButton">
                                <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Checkout</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $('#harga').val('10000');

        $('#packageDuration').on('change', function() {
            var selectedValue = $(this).val();
            var priceText;

            switch (selectedValue) {
                case '1':
                    priceText = 'Total: Rp.100.000';
                    $('#harga').val('100000');
                    break;
                case '2':
                    priceText = 'Total: Rp.200.000';
                    $('#harga').val('200000');
                    break;
                case '3':
                    priceText = 'Total: Rp.300.000';
                    $('#harga').val('300000');
                    break;
                default:
                    priceText = '';
            }

            $('#packagePrice').text(priceText);
        });

        $('#packageDuration').trigger('change');
    });
</script>