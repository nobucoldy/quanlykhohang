@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        </div>
    </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        @auth
    <div class="position-absolute top-0 end-0 m-3">
        <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-sm">
            <i class="fas fa-user-edit"></i> 
        </a>
    </div>
    
    <h1 class="mb-4">Chào mừng, {{ Auth::user()->name }}!</h1>
@endauth


        <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg mr-3">
            <i class="fas fa-list"></i> Kho hàng
        </a>

        <a href="{{ route('products.list') }}" class="btn btn-success btn-lg mr-3">
            <i class="fas fa-list"></i> Danh sách hàng hóa
        </a>

        <a href="{{ route('products.supplier') }}" class="btn btn-secondary btn-lg">
            <i class="fas fa-list"></i> Nhà cung cấp
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
