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
    
    <h1>Danh sách hàng hóa</h1>

    <!-- Bao bọc bảng và nút -->
    <div style="display: flex; flex-direction: column; align-items: flex-end;">
        <!-- Bảng danh sách -->
        <table id="products-table" class="table table-bordered mb-3">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Nhà cung cấp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->supplier }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


        
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