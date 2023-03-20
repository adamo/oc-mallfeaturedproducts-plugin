<?php namespace Depcore\MallFeaturedProducts\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddFeaturedProductProductsTable extends Migration
{
    public function up()
    {
        Schema::table('offline_mall_products', function(Blueprint $table) {
            $table->boolean('is_featured')->default(0);
        });
    }

    public function down()
    {
        Schema::table('offline_mall_products', function(Blueprint $table) {
            $table->dropColumn('is_featured');
        });
    }
}
