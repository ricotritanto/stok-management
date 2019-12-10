<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - starcctv</title>

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
            <td align="left" style="width: 40%;">
                @forelse($datane as $abc)    
                <pre>
                    Code Customer :{{$abc->customer_code}}
                    Name: {{$abc->name}}                   
                    Address: {{$abc->address}}
                    Hp: {{$abc->phone}}

                    <br /><br />
                    
                    Nota : {{$abc->issuing_facture}}
                    Date: {{$abc->date}}
                    @empty
                    @endforelse
                </pre>
            </td>
            <td align="center">
                <img src="{{asset('dist/img/logo2.png')}}" alt="Logo" width="64" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>STARTCCTV</h3>
                <pre>
                    www.startcctv.com

                    Street 26
                    Semarang City
                    Indonesia
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Invoice specification  {{$abc->issuing_facture}}</h3>
    <table width="100%" style="border-collapse: collapse; border: 0px;">
        <thead>
        <tr>
            <th style="border: 1px solid; padding:12px;" width="15%">Code</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Description</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Brand</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Quantity</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="border: 1px solid; padding:12px;">{{$abc->product_kode}}</td>
            <td style="border: 1px solid; padding:12px;">{{$abc->product_name}}</td>
            <td style="border: 1px solid; padding:12px;">{{$abc->brand_name}}</td>
            <td style="border: 1px solid; padding:12px;">{{$abc->qty}}</td>
            <td style="border: 1px solid; padding:12px;" align="left">Rp{{number_format($abc->sell_price,0,".",".")}}</td>
        </tr>
        </tbody>

        <tfoot>
        <tr>
            <td colspan="1"></td>
            <td colspan="1"></td>
            <td colspan="1"></td>
            <td style="border: 1px solid; padding:12px;" align="left"style="border: 1px solid; padding:12px;" >Total</td>
            <td style="border: 1px solid; padding:12px;" align="left" class="gray"> Rp{{number_format($abc->total,0,".",".")}}</td>
        </tr>
        </tfoot>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} startcctv - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                STARTCCTV
            </td>
        </tr>

    </table>
</div>
</body>
</html>