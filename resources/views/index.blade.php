@extends(auth()->check() ? 'layouts.user_type.auth' : 'layouts.user_type.guest')

@section('content')
<br>
<section class="min-vh-100 mb-8">
    <div class="page-header min-vh-75">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-dark mb-2 mt-5">Cek Domain</h1>
                    <p class="text-lead text-dark">Masukan alamat domain untuk mengecek ketersediaan.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-body">
                        <form id="domainCheckForm" role="form text-left" action="{{ route('check.domain') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" id="domain" name="domain" placeholder="Domain" required>
                            </div>
                            <div class="text-center" id="submitButton">
                                <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Cari</button>
                            </div>
                        </form>
                        <div style="text-align: center;">
                            <span id="result" style="display: none; font-size: 1em;"></span>
                        </div>
                        <div class="text-center" id="orderButton" hidden>
                            <form id="checkout-form" action="/config" method="POST">
                                @csrf
                                <input class="form-control" name="domainResult" id="domainResult" hidden>
                                <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">Pesan Sekarang</button>
                            </form>
                        </div>
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
        $('#domainCheckForm').on('submit', function(event) {
            event.preventDefault();

            const form = $(this);
            const url = form.attr('action');
            const method = form.attr('method');
            const formData = form.serialize();

            $.ajax({
                url: url,
                method: method,
                data: formData,
                success: function(data) {
                    console.log(data);
                    let resultSpan = $('#result');
                    if (data.result === 'success') {
                        resultSpan.css('color', data.status === 'available' ? 'orange' : 'red');
                        resultSpan.html(`Domain <strong>${$('#domain').val()}</strong> is ${data.status}.`);
                        if (data.status == 'available') {
                            $('#orderButton').removeAttr('hidden', false);
                            $('#domainResult').val($('#domain').val());
                        } else {
                            $('#orderButton').attr('hidden', true);
                        }
                    } else {
                        resultSpan.css('color', 'red');
                        resultSpan.html(`Domain <strong>${$('#domain').val()}</strong> is not valid`);
                        $('#orderButton').attr('hidden', true);
                    }
                    resultSpan.show();
                },
                error: function() {
                    let resultSpan = $('#result');
                    resultSpan.css('color', 'red');
                    resultSpan.html('Terjadi Kesalahan.');
                    resultSpan.show();
                }
            });
        });

    });
</script>