<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="qr_box">
        <div class="qr_text_section">
            <h2>Tell Us About Your Experiance</h2>
        </div>
        <div class="qr_logo_section my-4">
            {{-- <img src="{{Auth::user()->logo}}" alt=""> --}}
        </div>
        <div class="qr_section">
            {{-- {!! QrCode::size(170)->generate("qrcode_generator_test123") !!} --}}
        </div>
        <div class="qr_desc_section my-4">
            <h1>
                <b> Scan the QR Code to leave us a Review on </b>
            </h1>
        </div>
        <div class="qr_desc_google my-4">
            {{-- <img src="{{asset('frontend/images/gog_rev.png')}}" alt=""> --}}
        </div>
        <div class="qr_desc_power_by my-4">
            {{-- <img src="{{asset('frontend/images/power_by.png')}}" alt="">
            <img src="{{asset('frontend/images/ask.png')}}" alt=""> --}}
        </div>
    </div>
</body>
</html>