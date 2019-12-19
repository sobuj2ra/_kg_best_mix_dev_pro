{{-- <!DOCTYPE html> --}}
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="{{asset('public/admin/vendor/barcode/js/jquery-3.2.1.slim.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/barcode/js/JsBarcode.all.min.js')}}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/jsbarcode/3.3.20/JsBarcode.all.min.js"></script>  -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css" media="print">
        .barcode_jk {
            float: left;
            text-align: left;
            width: 80%;
            /*margin-bottom: 25px;
            padding: 0;
            */
            height: auto;
            margin: 0 auto;
        }

        .barcode_jk {
            margin-bottom: 30px;
        }

        .barcode_jk p {
            text-align: center;
            width: 100%;
            margin: 0 auto;
        }

        .barcode_jk span {
            text-align: center;
            font-size: 8px;
            font-weight: 700;
            margin: 0;
            padding: 0;
            padding-left: 30px
        }

        a[href]:after {
            content: none !important;
        }

        @media print {
            @page {
                size: auto;   /* auto is the initial value */
                margin: 0mm;  /* this affects the margin in the printer settings */
            }

            html, body {
                margin: 0px !important;
                padding: 0px !important;
            }

            footer {
                display: none;
                position: fixed;
                bottom: 0;
            }

            header {
                display: none;
                position: fixed;
                top: 0;
            }

            a[href]:after {
                content: none !important;
            }
        }

    </style>
</head>
<body>
<?php
$n = 0;
$com_name = "-- Best Mix --";
$p_date = Date('d-m-Y  H:i:s');
$p_date = "Print: ".$p_date;
?>
<div class="barcode_jk">
    <div class="barcode_jk_sub">
        <p>
            <span style="margin-left:20px;margin-top:7px;font-size:10px;display: inline-block;"><i>{{$com_name}}</i></span>
            <canvas id="code128<?php echo $n; ?>" style="height:35px;width:70%;margin-top:10px;margin-bottom:2px; margin-left:15px;margin-right:0;"></canvas>
            <br>
            <span style="margin-left:0px;margin-right:0px;font-size:12px; margin-bottom:0px;">{{$order_ref_no}}</span>
            <span style="float:right;font-size:9px;margin-top:15px;display:inline-block;"><i>{{$p_date}}</i></span>
        </p>
    </div>
</div>

<script>
    JsBarcode("#code128<?php echo $n; ?>", "<?php echo $unique_id; ?>", {
        fontSize: 100,
        fontOptions: "bold",
        textMargin: 0,
        displayValue: true,
        height: 370,
        width: 7,
        marginBottom:0,
        marginLeft:250,
        marginTop:0,
    });
</script>


<script type="text/javascript">
    //window.print();
    window.onload = function () {
        self.print();
    }
    //window.onfocus=function(){ window.close();}

    $(window).on('afterprint', function () {
        window.location.href = "{{ url("/showbatcher/$order_ref_no/$unique_id") }}";
    });


</script>



