<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Career</title>
</head>
<body>

    @if ($getuserData == 'ADMIN')

        <table style="width: 100%; background: #f5f5f5; margin: 0 auto; border-spacing: 0px; ">
            <tr>
                <td style="text-align: center; padding: 15px; padding-bottom: 0px;">
                <table style="width: 100%; border-spacing: 0px; ">
                    <tr>
                        <td style="padding: 50px 20px;  background: #fff;">
                            <h4 style="font-family: 'Open Sans',serif ; font-weight: 600; color: #000000; text-align: center; margin: 0px;     font-size: 30px;">Booking</h4>
                        </td>
                    </tr>
                </table>

                </td>
            </tr>
            <tr>
                <td style="padding: 15px; padding-top: 0px;">
                    <table style="width: 100%; border-spacing: 0px; ">
                        <tr>
                            <td style="padding: 40px 30px; font-family: 'Open Sans',serif ; background: #fff; padding-top: 0px;">
                                    <p style="font-size: 14px; margin-bottom: 0px; margin-top: 5px; text-align: left;"><b style="float: left;">Name :</b> <span style="margin-left: 5px">{{$getData['Name']}}</span></p>
                                    <p style="font-size: 14px; margin-bottom: 0px; margin-top: 5px; text-align: left;"><b style="float: left;">Email :</b> <span style="margin-left: 5px">{{$getData['Email']}}</span></p>

                                    <p style="font-size: 14px; margin-bottom: 0px; margin-top: 5px; text-align: left;"><b style="float: left;">Phone :</b> <span style="margin-left: 5px">{{$getData['Phone']}}</span></p>
                                    <p style="font-size: 14px; margin-bottom: 0px; margin-top: 5px; text-align: justify;"><b style="float: left;">Message :</b> <span style="margin-left: 5px">{{$getData['Message']}}</span></p>

                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td  style="padding: 20px 20px; font-family: 'Open Sans',serif ; ">
                                <p style=" margin-top: 0px; color: #333333; line-height: 18px; font-size: 13px; text-align: center;">This e-mail is automatically generated. Answers to this email address will not be read.</p>


                                <p style="margin: 0px; color: #888888; font-size: 13px; text-align: center;"></p>
                            </td>
            </tr>

        </table>


    @else
        <table style="width: 100%; background: #f5f5f5; margin: 0 auto; border-spacing: 0px; ">
            <tr>
                <td style="text-align: center; padding: 15px; padding-bottom: 0px;">
                <table style="width: 100%; border-spacing: 0px; ">
                    <tr>
                        <td style="padding: 50px 20px;  background: #fff;">
                            <h4 style="font-family: 'Open Sans',serif ; font-weight: 600; color: #000000; text-align: center; margin: 0px; font-size: 30px;">Thanks for reaching out! We’d be more than happy to help you. </h4>
                        </td>
                    </tr>
                </table>

                </td>
            </tr>
            <tr>
                <td style="padding: 15px; padding-top: 0px;"><table style="width: 100%; border-spacing: 0px; ">
            <tr>
            <td style="padding: 40px 30px; font-family: 'Open Sans',serif ;     background: #fff; padding-top: 0px;">
                <h5 style="font-family: 'Open Sans',serif ; margin: 0px; font-size: 20px; margin-bottom: 8px;">Dear {{$getData['Name']}},</h5>
                    <p style="font-family: 'Open Sans',serif ; margin: 0px; font-size:14px; text-align: justify; margin-bottom: 10px; line-height: 25px;">There must be a few questions or problems for which we will help you find a more personalized solution to your problem. We hope to serve with our best capabilities and make your usage smoother. Feel free to call or email us anytime and we will get back to you soon.</p>
                    <p style="font-size: 14px; margin-bottom: 0px;">Thank you</p>
                
                </td>
                </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 15px; padding-top: 0px;">
                    <table style="width: 100%; border-spacing: 0px; ">
                        <tr>
                            <td style="padding: 40px 30px; font-family: 'Open Sans',serif ; background: #fff; padding-top: 0px;">
                                    <p style="font-size: 14px; margin-bottom: 0px; margin-top: 5px; text-align: left;"><b style="float: left;">Email :</b> <span style="margin-left: 5px">{{$getData['Email']}}</span></p>
                                    <p style="font-size: 14px; margin-bottom: 0px; margin-top: 5px; text-align: left;"><b style="float: left;">Password :</b> <span style="margin-left: 5px">{{$getData['Password']}}</span></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td  style="padding: 20px 20px; font-family: 'Open Sans',serif ; ">
                                <p style=" margin-top: 0px; color: #333333; line-height: 18px; font-size: 13px; text-align: center;">This e-mail is automatically generated. Answers to this email address will not be read.</p>

                            </td>
            </tr>
            <tr style="background: #fff; text-align: center; font-size: 14px; color: #333333;">

        </tr>
        </table>
    @endif

</body>
</html>
