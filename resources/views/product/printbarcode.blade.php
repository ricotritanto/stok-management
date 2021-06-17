<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cetak Barcode - starcctv</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: white;
            color: black;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            @forelse($datane as $abc)
            <td align="left" style="width: 40%;">
                {{$datane->name}}
                {!! DNS1D::getBarcodeHTML($datane->code, "C128",1.4,22) !!}
                {{$datane->code}}
            </td>
            @empty
            @endforelse
        </tr>

    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} starcctv - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                STARCCTV
            </td>
        </tr>

    </table>
</div>
</body>
</html>
