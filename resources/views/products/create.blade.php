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
    <h1>Thêm hàng hóa mới</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Tên hàng</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="quantity">Số lượng</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="import_date">Ngày nhập</label>
            <input type="date" name="import_date" id="import_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="expiry_date">Ngày hết hạn</label>
            <input type="date" name="expiry_date" id="expiry_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="supplier">Nhà cung cấp</label>
            <input type="text" name="supplier" id="supplier" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="supplier">Địa chỉ nhà cung cấp</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
    
    
        <button type="submit" class="btn btn-primary">Thêm hàng hóa</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy bỏ</a>
    </form>
</div>
@endsection