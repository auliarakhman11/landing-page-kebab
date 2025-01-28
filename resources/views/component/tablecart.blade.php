<tr class="table_head">
    {{-- <th class="column-1">Product</th> --}}
    <th class="column-2"><center>Total</center></th>
    <th class="column-1">Harga</th>
    <th class="column-3"><center>Jumlah</center></th>
    <th class="column-3"><center>Total</center></th>
</tr>
@php
    $tot = 0;
@endphp
@foreach ($cart as $c)
<tr class="table_row">
    {{-- <td class="column-1">
        <div class="how-itemcart1">
            <img src="https://admin.kebabyasmin.id/{{ $c->options->foto }}" alt="IMG">
        </div>
    </td> --}}
    <td class="column-2">{{ $c->qty > 1 ? $c->qty : '' }} {{ $c->name }}  ({{ $c->options->nm_saos }})
        @if ($c->options->dt_varian)
        
        
        @foreach ($c->options->dt_varian as $dtv)
        <br>
        {{ $c->qty > 1 ? $c->qty : '' }} {{ $dtv['nm_varian'] }}

        @endforeach
        @endif
        <br>
        <span><i>
            {{ $c->options->ket ? '* '.$c->options->ket : '' }}
            </i></span>
    
    </td>
    <td class="column-3">Rp. {{ number_format($c->price,0) }}
        @php
            $harga_tambahan = 0;
        @endphp
    @if ($c->options->dt_varian)
    
    @foreach ($c->options->dt_varian as $dtv)
    <br>
    Rp. {{ number_format($dtv['harga'],0) }}
    @php
        $harga_tambahan += $c->qty * $dtv['harga'];
    @endphp
    @endforeach
    @endif
    
    </td>
    @php
        $tot += $c->qty * $c->price + $harga_tambahan;
    @endphp
    <td class="column-4">
        <div class="wrap-num-product flex-w m-l-auto m-r-0">
            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m min-qty" rowId="{{ $c->rowId }}">
                <i class="fs-16 zmdi zmdi-minus"></i>
            </div>

            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{ $c->qty }}">

            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m plus-qty" rowId="{{ $c->rowId }}">
                <i class="fs-16 zmdi zmdi-plus"></i>
            </div>
        </div>
    </td>
    <td class="column-5">Rp. {{ number_format($c->qty * $c->price + $harga_tambahan,0) }}</td>
</tr>
@endforeach


