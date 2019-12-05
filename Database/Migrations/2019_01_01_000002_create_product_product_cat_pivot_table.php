<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//--- MODELS ---
use Modules\Sia\Models\Product;
use Modules\Sia\Models\ProductCat;
use Modules\Sia\Models\ProductProductCatPivot as MyModel;

class CreateProductProductCatPivotTable extends Migration {
    public function getTable() {
        return with(new MyModel())->getTable();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //$product_table    =with(new Product()   )->getTable();
        //$product_cat_table=with(new ProductCat())->getTable();
        //--- create ---
        if (! Schema::hasTable($this->getTable())) {
            Schema::create($this->getTable(), function (Blueprint $table) {
                $product_table = with(new Product())->getTable();
                $product_cat_table = with(new ProductCat())->getTable();

                $table->increments('id');

                $table->integer('product_post_id')->unsigned()->nullable();
                $table->foreign('product_post_id')->references('post_id')->on($product_table)->onDelete('cascade');

                $table->integer('product_cat_post_id')->unsigned()->nullable();
                $table->foreign('product_cat_post_id')->references('post_id')->on($product_cat_table)->onDelete('cascade');

                $table->string('updated_by', 255)->nullable();
                $table->string('created_by', 255)->nullable();
                $table->timestamps();
            });
        }
        //--- update ---
        Schema::table($this->getTable(), function (Blueprint $table) {
            if (! Schema::hasColumn($this->getTable(), 'updated_by')) {
                $table->string('updated_by', 255)->nullable()->after('updated_at');
            }
            if (! Schema::hasColumn($this->getTable(), 'created_by')) {
                $table->string('created_by', 255)->nullable()->after('created_at');
            }
            if (! Schema::hasColumn($this->getTable(), 'pos')) {
                $table->integer('pos')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists($this->getTable());
    }
}
