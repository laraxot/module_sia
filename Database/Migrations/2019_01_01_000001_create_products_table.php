<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//--- MODELS ---
use Modules\Sia\Models\Product as MyModel;

class CreateProductsTable extends Migration {
    public function getTable() {
        return with(new MyModel())->getTable();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //--- create ---
        if (! Schema::hasTable($this->getTable())) {
            Schema::create($this->getTable(), function (Blueprint $table) {
                $table->increments('post_id');
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
