<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->comment("yayınlayan kişinin id'si");
            $table->string("name")->comment("kitabın adı");
            $table->string("author")->comment("kitabın yazarı");
            $table->string("image")->comment("kitabın kapak resmi");
            $table->string("page")->nullable()->comment("sayfa sayısı");
            $table->dateTime("year")->nullable()->comment("basım yılı");
            $table->text("explanation")->nullable()->comment("kitap hakkında açıklama");
            $table->boolean("active")->comment("yayın durumunun aktif olup olmaması");
            $table->integer("sum_by_slug")->default(1)->comment("adının slugına göre kaç tane
            olduğu");//çok okunanlarda kullanılacak
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
        Schema::dropIfExists('books');
    }
}
