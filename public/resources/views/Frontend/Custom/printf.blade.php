<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://guland.vn/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <title>Phiếu {{ $data->collect != 0 ? 'thu' : 'chi' }}</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        table {
            border: 0;
            font-size: 14px;
            width: 100%;
            text-align: left;
            border-collapse: collapse;
        }

        div {
            margin: 3px 0 0;
        }

        hr {
            margin: 5px 0;
            border: 0;
            border-top: 1px solid #ccc;
        }

        th,
        td {
            vertical-align: top;
        }

        .ivsbd-tbl-wrap {
            line-height: 1.375;
            font-family: sans-serif;
            max-width: 720px;
            margin: 0 auto;
        }

        .ivsbd-tbl-inf td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .ivsbd-tbl-sig td {
            text-align: center;
            padding: 10px 10px 80px;
        }
    </style>

    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>

</head>

<body data-new-gr-c-s-check-loaded="14.1189.0" data-gr-ext-installed="">
    <table class="ivsbd-tbl-wrap">
        <tbody>
            <tr>
                <td>
                    <table class="ivsbd-tbl-top">
                        <tbody>
                            <tr>
                                <td style="padding: 20px 20px 20px 0;">
                                    <div style="font-size: 16px;"><b>Công Ty Cổ Phần Bất Động Sản Guland</b></div>
                                    <div style="font-size: 14px;">{{ $data['category_name'] }}</div>
                                </td>
                                <td style="padding: 20px 0 20px 20px; text-align: right;">
                                    <div style="width: 280px">
                                        <div style="font-size: 16px;"><b>Số phiếu: 01-VT</b></div>
                                        <div style="font-size: 14px;"><i>(Ban hành theo QĐ số 15/2016 QĐ-BTC ngày
                                                20/03/2006 của Bộ trưởng BTC)</i></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="ivsbd-tbl-hdr">
                        <tbody>
                            <tr>
                                <td style="text-align: center; padding: 0 0 20px;">
                                    <div style="font-size: 32px; font-weight: 700;">Phiếu {{ $data->collect != 0 ? 'thu' : 'chi' }} </div>
                                    <div><i>{{ $data['format_date'] }}</i></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="ivsbd-tbl-inf">
                        <tbody>
                            <tr>
                                <td>
                                    <div><b>Thông tin người nhận </b></div>
                                    <hr>
                                    <div>{{ $data['to_user_name'] }} </div>
                                    <div>SĐT: {{ $data['to_user_phone'] }}</div>
                                    <div></div>
                                </td>
                                <td>
                                    <div><b>Thông tin người chi </b></div>
                                    <hr>
                                    <div>{{ $data['from_user_name'] }} - Tổng giám đốc</div>
                                    <div>SĐT: {{ $data['from_user_phone'] }}</div>
                                    <div>Quận 10, TP. Hồ Chí Minh</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="padding: 20px 0;">

                        <div>Mã phiếu <b>{{ $data['id'] }}</b> - {{ $data['description'] }}</div>
                        <div>Số tiền: <b> {{ $data['collect'] != 0 ? number_format($data['collect'], 0, ',', '.') : number_format($data['spend']) }} </b>, <i>Bằng chữ: {{ $data['price'] }}</i></div>
                        <div>Kèm theo: ..... chứng từ gốc</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="ivsbd-tbl-sig">
                        <tbody>
                            <tr>
                                <td>
                                    <div><b>Giám đốc</b></div>
                                    <div><small><i>(Ký, đống dấu, họ tên)</i></small></div>
                                </td>
                                <td>
                                    <div><b>Kế toán trưởng</b></div>
                                    <div><small><i>(Ký, họ tên)</i></small></div>
                                </td>
                                <td>
                                    <div><b>Người nhận tiền</b></div>
                                    <div><small><i>(Ký, họ tên)</i></small></div>
                                </td>
                                <td>
                                    <div><b>Người nhập</b></div>
                                    <div><small><i>(Ký, họ tên)</i></small></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>
