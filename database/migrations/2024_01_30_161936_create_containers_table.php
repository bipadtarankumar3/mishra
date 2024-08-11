<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('containers', function (Blueprint $table) {
            $table->id();
            $table->text('booking_no')->nullable();
            $table->text('container_seal_no')->nullable();
            $table->text('tare_wt')->nullable();
            $table->text('pay load')->nullable();
            $table->text('vgm_wt_of_cont')->nullable();
            $table->text('lorry_no')->nullable();
            $table->text('picked_on')->nullable();
            $table->text('reach_at_factory')->nullable();
            $table->text('release_from_factory')->nullable();
            $table->text('entry_at_dock')->nullable();
            $table->text('actual_unloading_on')->nullable();
            $table->text('transport_name')->nullable();
            $table->text('remark_of_cont')->nullable();
            $table->text('c_status')->nullable();
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
        Schema::dropIfExists('containers');
    }
};
