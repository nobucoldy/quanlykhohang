<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Tên hàng
        $table->integer('quantity'); // Số lượng
        $table->date('import_date'); // Ngày nhập
        $table->date('expiry_date');
        $table->unsignedBigInteger('supplier_id'); // Thêm cột này
        $table->unsignedBigInteger('products_list_id'); // Thêm cột này
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
