@extends('layout.app')

@section('content')
    <!-- cart item -->
    <div class="small-container cart-page mb-4">
        <table>
            <tr>
                <th>Menu</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="{{ asset('/images/menu/'.$item->associatedModel->image) }}" alt="">
                            <div>
                                <p>{{ $item->name }}</p>
                                <small>Price: {{ $item->price }} PHP</small>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" id="removeItemform">
                                    @csrf
                                    @method("DELETE")
                                    <button class="removeBtn" type="submit">Remove</button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <td class="center-quant-el">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                                <button type="button" class="input-group-text minus-btn cart-quant-btn" onclick="decrementQuantity({{ $item->id }})">-</button>
                                <input type="text"
                                       name="quantity"
                                       id="quantity_{{ $item->id }}"
                                       value="{{ $item->quantity }}"
                                       min="1"
                                       max="{{ $item->associatedModel->quantity }}"
                                >
                                <button type="button" class="input-group-text plus-btn cart-quant-btn" onclick="incrementQuantity({{ $item->id }})">+</button>
                            </div>
                            <button type="submit" class="btn btn-sm btn-warning">
                                <i class="fas fa fa-edit"></i>
                            </button>
                        </form>
                    </td>
                    <td class="price">{{ $item->quantity * $item->price }} PHP</td>
                </tr>
            @endforeach
        </table>
        @if (Cart::getSubTotal() > 0)
            <div class="total-price">
                <table>
                    <tr>
                        <td>SubTotal</td>
                        <td class="fw-bolder">{{ Cart::getSubTotal() }} PHP</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            {{-- payment using paypal --}}
                            <div class="row">
                                <div class="form-group">
                                    <a href="{{ route('make.payment') }}" class="btn-paypal mt-3 ml-2 d-flex align-items-center">
                                        <!-- <i class="fab fa-cc-paypal mr-1" style="font-size: 1.7rem"></i> PAY  {{ Cart::getSubTotal() }} PHP WITH PAYPAL` -->
                                        <i class="fab fa-food mr-1" style="font-size: 1.7rem"></i> ADD ORDER
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        @endif
    </div>
@endsection
