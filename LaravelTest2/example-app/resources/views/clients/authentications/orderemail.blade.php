<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Order Detail</h2>
<h4>- Customer Name : {{$user_name}}</h4>
<h4>- Order Phone Number : {{$user_phonenumber}}</h4>
<h4>- Order Address : {{$user_address}}</h4>
<p>- Thank you for purchasing from us, hope to be supported by customers in the future !!!</p>
<table>
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
        </tr>
    </thead>
    <tbody>
    @foreach($carts as $productId => $cart)
        <tr>
            <td>#{{$productId}}</td>
            <td>{{$cart['name']}}</td>
            <td>{{number_format($cart['price'])}} đ</td>
            <td>{{$cart['quantity']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<h2>Total : {{number_format($total)}} đ</h2>
</body>
</html>
