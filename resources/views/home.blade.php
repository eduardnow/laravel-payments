@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Make a payment') }}</div>

                    <div class="card-body">
                        <form action="{{ route('payment.pay') }}" method="POST" id="paymentForm">
                            @csrf

                            <div class="row">
                                <div class="col-auto">
                                    <label for="value">How much you want to pay?</label>
                                    <input type="number" id="value" min="5" step="0.01" name="value"
                                           class="form-control"
                                           value="{{ mt_rand(500, 100000) /100  }}" required/>
                                    <small class="form-text text-muted">
                                        Use values with up to two decimal positions, using dot "."
                                    </small>
                                </div>

                                <div class="col-auto">
                                    <label for="currency">Currency</label>
                                    <select name="currency" id="currency" class="custom-select">
                                        @foreach($currencies as $currency)
                                            <option
                                                value="{{ $currency->iso }}">{{ strtoupper($currency->iso) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <label>Select the desired payment platform:</label>
                                    <div class="form-group" id="paymentGatewayToggle">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            @foreach($paymentGateways as $paymentGateway)
                                                <label class="btn btn-outline-secondary rounded m-2 p-1"
                                                       data-target="#{{ strtolower($paymentGateway->name) }}Collapse"
                                                       data-toggle="collapse">
                                                    <input type="radio" name="paymentGateway"
                                                           value="{{ $paymentGateway->id }}"
                                                           required/>
                                                    <img src="{{ asset($paymentGateway->image) }}"
                                                         alt="{{ $paymentGateway->name }}"
                                                         class="img-thumbnail">
                                                </label>
                                            @endforeach
                                        </div>
                                        @foreach($paymentGateways as $paymentGateway)
                                            <div id="{{ strtolower($paymentGateway->name) }}Collapse" class="collapse"
                                                 data-parent="#paymentGatewayToggle">
                                                @includeIf('components.' . strtolower($paymentGateway->name) . '-collapse')
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <button class="btn btn-primary btn-lg" id="payButton">Pay</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
