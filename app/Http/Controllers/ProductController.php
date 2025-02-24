<?php

namespace App\Http\Controllers;
use App\Models\productsList;
use App\Models\Supplier;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Hiển thị danh sách hàng hóa
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Hiển thị form thêm hàng hóa
    public function create()
    {
        return view('products.create');
    }

    // Lưu hàng hóa mới
    public function store(Request $request)
    {
        // Kiểm tra và tạo Supplier nếu chưa tồn tại
        $supplier = Supplier::firstOrCreate(
            ['supplier' => $request->supplier],
            ['address' => $request->address]
        );
    
        // Kiểm tra và tạo ProductsList nếu chưa tồn tại
        $productsList = ProductsList::firstOrCreate(
            ['name' => $request->name],
            ['supplier' => $supplier->supplier]
        );
    
        // Tạo sản phẩm mới với dữ liệu đã có
        $product = Product::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'import_date' => $request->import_date,
            'expiry_date' => $request->expiry_date,
            'supplier_id' => $supplier->id,
            'products_list_id' => $productsList->id,
        ]);

        return redirect()->route('products.index')->with('success', 'Hàng hóa đã được thêm thành công!');
    }

    // Hiển thị form chỉnh sửa hàng hóa
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Cập nhật hàng hóa
    public function update(Request $request, $id)
    {
          // Tìm sản phẩm cần cập nhật
    $product = Product::findOrFail($id);

    // Kiểm tra và cập nhật Supplier (Nếu đổi nhà cung cấp)
    $supplier = Supplier::updateOrCreate(
        ['id' => $product->supplier_id], // Kiểm tra theo ID hiện tại
        ['supplier' => $request->supplier, 'address' => $request->address] // Cập nhật dữ liệu mới
    );

    // Kiểm tra và cập nhật ProductsList (Nếu đổi danh mục sản phẩm)
    $productsList = ProductsList::updateOrCreate(
        ['id' => $product->products_list_id], // Kiểm tra theo ID hiện tại
        ['name' => $request->name, 'supplier' => $supplier->supplier] // Cập nhật dữ liệu mới
    );

    // Cập nhật thông tin sản phẩm
    $product->update([
        'name' => $request->name,
        'quantity' => $request->quantity,
        'import_date' => $request->import_date,
        'supplier_id' => $supplier->id,
        'products_list_id' => $productsList->id,
    ]);

        return redirect()->route('products.index')->with('success', 'Hàng hóa đã được cập nhật thành công!');
    }

    // Xóa hàng hóa
    public function destroy($id)
{
    // Tìm sản phẩm cần xóa
    $product = Product::findOrFail($id);

    // Lấy ID của Supplier và ProductsList trước khi xóa Product
    $supplierId = $product->supplier_id;
    $productsListId = $product->products_list_id;

    // Xóa sản phẩm
    $product->delete();

    // Kiểm tra nếu Supplier không còn sản phẩm nào thì xóa luôn
    if (!Product::where('supplier_id', $supplierId)->exists()) {
        Supplier::where('id', $supplierId)->delete();
    }

    // Kiểm tra nếu ProductsList không còn sản phẩm nào thì xóa luôn
    if (!Product::where('products_list_id', $productsListId)->exists()) {
        ProductsList::where('id', $productsListId)->delete();
    }
    
        return redirect()->route('products.index')->with('success', 'Hàng hóa đã được xóa thành công!');
    }
    
}