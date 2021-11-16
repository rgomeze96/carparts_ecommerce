@extends('layouts.app')
@section("title", $data["title"])
@section('content')
<div class="container-fluid text-center">
    @include('util.message')
    <h3>{{ __('user.orders.title') }}</h3>
    <div class="row">
        <table class="table table-bordered table-dark table-hover text-center">
            <thead>
                <th scope="col">{{ __('user.orders.dateOfPurchase') }}</th>
                <th scope="col">{{ __('user.orders.numberItems') }}</th>
                <th scope="col">{{ __('user.orders.purchaseTotal') }}</th>
                <th scope="col">{{ __('user.orders.reviewPurchase') }}</th>
            </thead>
            @foreach($data["orders"] as $order)
            <tbody>
                <tr>
                    <td>{{ $order->getCreatedAt() }}</td>
                    <td>{{ $order->getNumberItems()}}</td>
                    <td>${{number_format($order->getTotal(),2, '.', ',')}}</td>
                    <td>
                        <button type="button" class="btn btn-outline-light ml-1 mt-1" data-toggle="modal"
                            data-target="#modal-seeItems-{{$order->getId()}}">
                            {{ __('user.orders.seeItemsButton') }}
                        </button>
                    </td>
                    <div class="modal fade" id="modal-seeItems-{{$order->getId()}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content mx-auto text-center text-light bg-dark border border-info">
                                <div class="modal-header">
                                    <h5 class="modal-title mx-auto">
                                        {{ __('user.orders.seeItemsTitle') }}
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        @foreach($order["items"] as $item)
                                            <div class="row shadow-lg rounded rounded-pill m-2 bg-light text-dark">
                                                <div class="col font-weight-bold">
                                                    {{__('user.orders.itemName')}}: {{$item->getProductName()}}
                                                </div>
                                                <div class="col font-weight-bold">
                                                {{__('user.orders.itemSubtotal')}}: ${{number_format($item->getSubtotal(),2, '.', ',')}}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <h3 class="text-light">{{ __('user.orders.total') }}
                                        ${{number_format($order->getTotal(),2, '.', ',')}}</h3>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ __('user.orders.closeButton') }}</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection