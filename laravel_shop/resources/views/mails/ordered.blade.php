<body>
    <h2>Elishop thông báo bạn đã đặt hàng thành công</h2>
    
    <h3>Thông tin chi tiết đơn hàng DH001:</h3>
    <table border='1'>
        <tr>
            <th>Tên SP</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </tr>
        @if($items) 
            @foreach($items as $item)
        <tr>
            <td>{{$item['item']['name']}}</td>
            <td>{{$item['item']['price']/1000000}} Tr</td>
            <td>{{$item['qty']}}</td>
            <td>{{$item['price']/1000000}} Tr </td>
        </tr>
        @endforeach
            @endif
        <tr>
            <td colspan="2">Tổng cộng:</td>
            <td colspan="3">{{$totalPrice}} Tr</td>
        </tr>
    </table>
</body>
