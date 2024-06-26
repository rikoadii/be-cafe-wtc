@extends('layouts.app')

@section('title', 'Order Item')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Order Item</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="/order">Orders</a></div>
                    <div class="breadcrumb-item">Order Item</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Orders</h2>
                <p class="section-lead">
                    detail of orders {{ $orders->id }}
                </p>


                <div class="row mt-4">
                    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Order</h4>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-3"></div>
                                <ul class="list-unstyled list-unstyled-border">
                                    <li class="media">
                                        <div class="media-body">
                                            <div>Transaction Time : {{ $orders->transaction_time }}</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                            <div>Payment Method : {{ $orders->payment_method }}</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                            <div>Total Price : {{ $orders->total_price }}</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body">
                                            <div>Total Item : {{ $orders->total_item }}</div>
                                        </div>
                                    </li>
                                </ul>
                                {{-- <div class="text-center pt-1 pb-1">
                                    <a href="#" class="btn btn-primary btn-lg btn-round">
                                        View All
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail</h4>
                            </div>
                            <div class="card-body">

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                        </tr>
                                        @foreach ($orderItems as $item)
                                            <tr>

                                                <td>{{ $item->product->name }}
                                                </td>
                                                <td>
                                                    {{ $item->product->price }}
                                                </td>
                                                <td>
                                                    {{ $item->quantity }}
                                                </td>
                                                <td>{{ $item->total_price }}</td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
