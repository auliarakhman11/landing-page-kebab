<table class="table-shopping-cart">
   
        <tr class="table_head">
            <th class="text-center column-1">Produk</th>						<th class="text-center column-1"></th>	
            <th class="text-center column-1">Qty</th>
            <th class="text-center column-1">Harga</th>
            <th class="text-center column-1">Subtotal</th>
        </tr>
        @php
            $total = 0;
        @endphp
        @foreach ($penjualan as $p)
        @php
            $total += $p->total;
        @endphp
        <tr class="table_row">
            <td class="text-center column-1">{{ $p->nm_produk }}</td>
            <td class="text-center column-1"><img width="50px;" src="https://admin.kebabyasmin.id/{{ $p->foto }}" alt="IMG"></td>
            <td class="text-center column-1">{{ $p->qty }}</td>
            <td class="text-center column-1">{{ number_format($p->harga_jual,0) }}</td>
            <td class="text-center column-1">{{ number_format($p->total,0) }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="4" class="text-center"><strong>Total</strong></td>
            <td class="text-center"><strong>{{ number_format($total,0) }}</strong></td>
        </tr>
        
    </tbody>
</table>