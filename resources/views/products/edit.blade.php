@extends('layouts.app')

@section('content')
<div class="position-absolute top-0 end-0 m-3">
    <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-sm">
        <i class="fas fa-user-edit"></i> 
    </a>
</div>
<div class="container">
    
    <h1>Chỉnh sửa hàng hóa</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Sử dụng phương thức PUT để cập nhật -->

        <div class="form-group">
            <label for="name">Tên hàng</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="quantity">Số lượng</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}" required>
        </div>

        <div class="form-group">
            <label for="import_date">Ngày nhập</label>
            <input type="date" name="import_date" id="import_date" class="form-control" value="{{ $product->import_date }}" required>
        </div>

        <div class="form-group">
            <label for="expiry_date">Ngày nhập</label>
            <input type="date" name="expiry_date" id="expiry_date" class="form-control" value="{{ $product->expiry_date }}" required>
        </div>

        <div class="form-group">
            <label for="supplier">Nhà cung cấp</label>
            <input type="text" name="supplier" id="supplier" class="form-control" 
                value="{{ $product->supplier ? $product->supplier->supplier : '' }}" required >
        </div>

        <div class="form-group">
            <label for="address">Địa chỉ nhà cung cấp</label>
            <input type="text" name="address" id="address" class="form-control" 
                value="{{ $product->supplier ? $product->supplier->address : '' }}" required >
        </div>


        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy bỏ</a>
    </form>
</div>
@endsection