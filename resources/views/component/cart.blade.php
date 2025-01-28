<div class="header-cart-content flex-w js-pscroll">
    <ul class="header-cart-wrapitem w-full">
        @php
            $tot = 0;
        @endphp
        @foreach ($cart as $c)
        <li class="header-cart-item flex-w flex-t m-b-12">
            <div class="header-cart-item-img">
                <img src="https://admin.kebabyasmin.id/{{ $c->options->foto }}" alt="IMG">
            </div>

            <div class="header-cart-item-txt p-t-8">
                <a href="#" class="header-cart-item-name hov-cl1 trans-04">
                    {{ $c->qty > 1 ? $c->qty : '' }}  {{ $c->name }} {{ $c->options->saos ? '('.$c->options->nm_saos.')' : '' }}
                    <br>
                    
                </a>
                @php
                    $harga_tambahan = 0;
                @endphp
                @if ($c->options->dt_varian)
                    @foreach ($c->options->dt_varian as $dtv)
                    <span class="header-cart-item-info">
                        {{ $c->qty > 1 ? $c->qty : '' }} {{ $dtv['nm_varian'] }} 
                    </span>
                    @php
                        $harga_tambahan += $c->qty * $dtv['harga'];
                    @endphp
                    @endforeach
                @endif
                <span class="header-cart-item-info">
                    <i>
                    {{ $c->options->ket ? '* '.$c->options->ket : '' }}
                    </i>
                </span>
                    
                

                <span class="header-cart-item-info">
                   <b>Rp. {{ number_format($c->qty * $c->price + $harga_tambahan,0) }}</b>
                </span>

                @php
                    $tot += $c->qty * $c->price + $harga_tambahan;
                @endphp
                
                
            </div>
        </li>
        @endforeach
        

    </ul>
    
    <div class="w-full">
        <div class="header-cart-total w-full p-tb-40">
            Total: Rp.{{ number_format($tot,0)}}
        </div>

        <div class="header-cart-buttons flex-w w-full">
            {{-- <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                View Cart
            </a> --}}

            <a href="{{ route('cart') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                Check Out
            </a>
        </div>
    </div>
</div>