@extends('admin/layout/admin')

@section('content')
    <section class="camotek-admin-hero-stats">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Количество продаж
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">{{ $stats['sales'] }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Количество заказов
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">{{ $stats['orders'] }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Количество товаров
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">{{ $stats['items'] }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Количество клиентов
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">{{ $stats['users'] }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="camotek-admin-index-modules">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Google Аналитика
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">код гугла</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="camotek-admin-index-modules">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Последние заказы
                    </div>
                    @if(isset($latest_orders) && $latest_orders->count() > 0)
                        <table class="table camotek-admin-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Клиент</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Дата заказа</th>
                                <th scope="col">Всего</th>
                                <th scope="col">Просмотр</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latest_orders as $order)
                                <tr>
                                    <th scope="row">{{ $order->id }}</th>
                                    <td>@if(isset($order->client))<a href="{{ route('show_client', $order->client->id) }}">{{ $order->client->name }}</a>@else {{ $order->guest_name }} @endif</td>
                                    <td>{{ $order->getOrderStatus($order->status_id) }}</td>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $order->total }} грн.</td>
                                    <td><a href="{{ route('show_order', $order->id) }}" class="btn btn-primary">Просмотр заказа</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="card-body">Нет заказов!</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection