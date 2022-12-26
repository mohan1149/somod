<!-- business information here -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <title>Receipt-{{$receipt_details->invoice_no}}</title>
    </head>
    <body>
        <div class="ticket">
        	<!-- Logo -->
			<img src="/img/default.png" style="width: 100%">

			<table style="width: 50% !important; float: left">
				<tr>
					<th>{!! $receipt_details->invoice_no_prefix !!}</th>
					<td>
						{{$receipt_details->invoice_no}}
					</td>
				</tr>
				<tr>
					<th>Phone</th>
					<td>
						{{$receipt_details->contact}}
					</td>
				</tr>
		        <tr>
		        	<th colspan="2">&nbsp;</th>
		        </tr>
			</table>
			<table style="width: 49% !important; float: right;">
		        <tr>
		        	<th>
		        		{{$receipt_details->customer_label}}
		        	</th>

		        	<td>
		        		{{ $receipt_details->customer_name }}
		        	</td>
		        </tr>
			</table>
			<table style="width: 49% !important; float: right;">
		        <tr>
		        	<th>
						Address
		        	</th>
		        	<td>
		        		@if(!empty($receipt_details->customer_info))
							{!! $receipt_details->customer_info !!}
						@endif
		        	</td>
		        </tr>
			</table>
			
			<table>
				<tr>
					<td class="sub-headings">
						@if (isset($receipt_details->current_balance) && $receipt_details->current_balance !=="Full")
								<span>Current Balance = {{ number_format($receipt_details->current_balance,3) }}</span>
							@endif
					</td>
				</tr>
			</table>
            <table style="padding-top: 5px !important" class="border-bottom width-100">
                <thead class="border-top border-bottom">
                    <tr>
                        <th class="serial_number">#</th>
                        <th class="description">
                        	{{$receipt_details->table_product_label}}
                        </th>
                        <th class="quantity text-right">
                        	{{$receipt_details->table_qty_label}}
                        </th>
                        {{-- <th class="unit_price text-right">
                        	{{$receipt_details->table_unit_price_label}}
                        </th> --}}
                        <th class="price text-right">{{$receipt_details->table_subtotal_label}}</th>
                    </tr>
                </thead>
                <tbody>
                	@forelse($receipt_details->lines as $line)
	                    <tr>
	                        <td class="serial_number">
	                        	{{$loop->iteration}}
	                        </td>
	                        <td class="description">
	                        	{{$line['name']}} {{$line['variation']}}
	                        </td>
	                        <td class="quantity text-right">{{$line['quantity']}} {{$line['units']}}</td>
	                        {{-- <td class="unit_price text-right">{{$line['unit_price_inc_tax']}}</td> --}}
	                        <td class="price text-right">{{$line['line_total']}}</td>
	                    </tr>
                    @endforeach
                    <tr>
                    	<td colspan="5">&nbsp;</td>
                    </tr>
                </tbody>
            </table>

            <table class="border-bottom width-100">
                <tr>
                    <th class="left text-right sub-headings">
                    	{!! $receipt_details->subtotal_label !!}
                    </th>
                    <td class="width-50 text-right sub-headings">
                    	{{$receipt_details->subtotal}}
                    </td>
                </tr>
				<tr>
					<th class="width-50 text-right">
						{!! $receipt_details->total_label !!}
					</th>
					<td class="width-50 text-right sub-headings">
						{{$receipt_details->total}}
					</td>
				</tr>
            </table>
			<table>
				<tr>
					<td>
						<img src="/img/1.png" style="width: 100%">
					
					</td>
					<td>
						<img src="/img/2.png" style="width: 100%">
					</td>
				</tr>
			</table>
			<ul>
				<li>1-المصبغه غير مسؤولة عن تلف او انكماش الملابس بعد الغسيل </li>
				<li>٢-المصبغه غير مسؤولة عن الاشياء المتروكة داخل الملابس </li>
				<li>٣-المصبغه غير مسؤولة عن الملابس بعد مغادرتكم من المصبغه</li>
			</ul>
        </div>
    </body>
</html>

<style type="text/css">

@media print {
	* {
    	font-size: 12px;
    	font-family: 'Times New Roman';
    	word-break: break-all;
	}
	li{
		font-size: 10px;
		font-weight:bold;
	}

.headings{
	font-size: 20px;
	font-weight: 700;
	text-transform: uppercase;
}

.sub-headings{
	font-size: 15px;
	font-weight: 700;
}

.border-top{
    border-top: 1px dotted darkgrey;
}
.border-bottom{
	border-bottom: 1px dotted darkgrey;
}

td.serial_number, th.serial_number{
	width: 5%;
    max-width: 5%;
}

td.description,
th.description {
    width: 35%;
    max-width: 35%;
    word-break: break-all;
}

td.quantity,
th.quantity {
    width: 15%;
    max-width: 15%;
    word-break: break-all;
}
td.unit_price, th.unit_price{
	width: 25%;
    max-width: 25%;
    word-break: break-all;
}

td.price,
th.price {
    width: 20%;
    max-width: 20%;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 80mm;
    max-width: 80mm;
}

img {
    max-width: inherit;
    width: auto;
}

    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
</style>