@extends('layouts.app')

@section('content')
<div class="position-absolute top-0 end-0 m-3">
    <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-sm">
        <i class="fas fa-user-edit"></i> 
    </a>
</div>
<div class="container">
    <div class="d-flex">
        <a href="{{ route('home') }}" class="btn btn-primary ms-auto">
            <i class=""></i> Trang chủ
        </a>
    </div>
    
    <h1>Kho hàng</h1>

    <!-- Bao bọc bảng và nút -->
    <div style="display: flex; flex-direction: column; align-items: flex-end;">
        <!-- Bảng danh sách -->
        <table id="products-table" class="table table-bordered mb-3">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Ngày nhập</th>
                    <th>Ngày hết hạn</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->import_date }}</td>
                    <td>{{ $product->expiry_date }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Nút thêm hàng hóa -->
        <a href="{{ route('products.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Thêm hàng hóa
        </a>
        
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#products-table').DataTable();
    });
</script>
@endsection