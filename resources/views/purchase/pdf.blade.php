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
                    Code :{{$abc->suplier_code}}
                    Name: {{$abc->suplier_name}}                   
                    Address: {{$abc->address}}
                    Hp: {{$abc->phone}}

                    <br /><br />
                    
                    Nota : {{$abc->purchase_facture}}
                    Date: {{$abc->date}}
                    @empty
                    @endforelse
                </pre>
            </td>
            <td align="center">
                <img src="{{asset('dist/img/logo2.png')}}" alt="Logo" width="64" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>STARCCTV</h3>
                <pre>
                    www.starcctv.com

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
    <h3>Invoice specification  {{$abc->purchase_facture}}</h3>
    <table width="100%">
        <thead>
        <tr>
            <th>Code</th>
            <th>Description</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$abc->code}}</td>
            <td>{{$abc->name}}</td>
            <td>{{$abc->category_name}}</td>
            <td>{{$abc->qty}}</td>
            <td align="left">Rp{{number_format($abc->sell_price,0,".",".")}}</td>
        </tr>
        </tbody>

        <tfoot>
        <tr>
            <td colspan="1"></td>
            <td colspan="1"></td>
            <td colspan="1"></td>
            <td align="left">Grand Total</td>
            <td align="left" class="gray"> Rp{{number_format($abc->total,0,".",".")}}</td>
        </tr>
        </tfoot>
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