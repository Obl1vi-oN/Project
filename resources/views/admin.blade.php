@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Заказы</h1>

        <table border="1" cellspacing="0" class="order-table">
            <thead>
            <tr>
                <th>Название товара</th>
                <th>Количество</th>
                <th>Дата создания</th>
                <th>E-mail пользователя</th>
                <th>Текущий статус</th>
                <th>Изменить статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->product ? $order->product->name : 'Неизвестный продукт' }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    <td>{{ $order->user ? $order->user->email : 'Неизвестный пользователь' }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        {{-- Форма для изменения статуса --}}
                        @if($order->status == 'Новый')
                            <form action="{{ route('admin.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Одобрен">
                                <button type="submit" class="btn btn-table btn-primary">Одобрить</button>
                            </form>
                        @elseif($order->status == 'Одобрен')
                            <form action="{{ route('admin.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Доставлен">
                                <button type="submit" class="btn btn-table btn-success">Доставлен</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
@endsection
