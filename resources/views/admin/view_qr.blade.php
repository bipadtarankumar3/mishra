@extends('adminLayouts.home')
@section('content')

<div class="container-fluid">

 <div class="row">
    <div class="col-12 col-md-4"></div>
    <div class="col-12 col-md-4 text-center">
        <a href="{{URL::to('admin/print_qr_code')}}" class="btn btn-success my-2 float-center" style="font-size: 20px"><i class="fa-solid fa-download"></i> Download PDF</a>
        <div class="qr_box" id="qr_box" style="background-image:url('{{asset('frontend/images/qr_back.jpg')}}')">
            <div class="qr_text_section" >
                <h2>Tell Us About Your Experience</h2>
            </div>
            <div class="qr_logo_section my-4" style="height: 180px;">
                <img src="{{Auth::user()->logo}}" alt="">
            </div>
            <div class="qr_section">
                @php
                    $url = URL::to("u/".Auth::user()->name_url);
                @endphp
                {!! QrCode::size(200)->generate($url) !!}
            </div>
            <div class="qr_desc_section my-4" >
                <h2>
                    <b> Scan the QR Code to leave us a Review on </b>
                </h2>
            </div>
            <div class="qr_desc_google my-4" >
                <img src="{{asset('frontend/images/gog_rev.png')}}" alt="" >
            </div>
            <div class="qr_desc_power_by" >
                <img src="{{asset('frontend/images/power_by.png')}}" class="power_by" alt="">
                <img src="{{asset('frontend/images/ask.png')}}" class="logo" alt="">
            </div>
            <div class="yellow_box"></div>
        </div>
    </div>
    <div class="col-12 col-md-4">

    </div>
 </div>

  
    

  </div>

@endsection

@section('js')
    <script>
        function printDiv(tagid) {
            var hashid = "#"+ tagid;
            var tagname =  $(hashid).prop("tagName").toLowerCase() ;
            var attributes = ""; 
            var attrs = document.getElementById(tagid).attributes;
              $.each(attrs,function(i,elem){
                attributes +=  " "+  elem.name+" ='"+elem.value+"' " ;
              })
            var divToPrint= $(hashid).html() ;
            var head = "<html><head>" + $("head").html() +
        // Add a @page CSS rule for portrait mode
        "<style>@page { size: portrait; }</style>" +
        "</head>";
            var allcontent = head + "<body  onload='window.print()' >"+ "<" + tagname + attributes + ">" +  divToPrint + "</" + tagname + ">" +  "</body></html>"  ;
            var newWin=window.open('','Print-Window');
            newWin.document.open();
            newWin.document.write(allcontent);
            newWin.document.close();
           // setTimeout(function(){newWin.close();},10);
        }
    </script>
@endsection