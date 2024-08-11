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
        Schema::create('exports', function (Blueprint $table) {
            $table->id();
            $table->text('job_created_dt')->nullable();
            $table->text('job_no')->nullable();
            $table->text('bill_no')->nullable();
            $table->text('invoice_no')->nullable();
            $table->text('party_name')->nullable();
            $table->text('gross_wt')->nullable();
            $table->text('port_of_loading')->nullable();
            $table->text('port_of_discharge')->nullable();
            $table->text('vessel_and_voy')->nullable();
            $table->text('mslpl_forwarder_name')->nullable();
            $table->text('obl_delivered_on_to')->nullable();
            $table->text('through_doc_receive')->nullable();
            $table->text('no_of_pkgs')->nullable();
            $table->text('no_of_containers')->nullable();
            $table->text('e_seal_cfs_seal')->nullable();
            $table->text('phyto')->nullable();
            $table->text('fumigation')->nullable();
            $table->text('name_of_fumgn_agent')->nullable();
            $table->text('coo_or_gsp')->nullable();
            $table->text('name_of_goods')->nullable();
            $table->text('carting_send_to_spg_co_on')->nullable();
            $table->text('carting_received_on')->nullable();
            $table->text('b_l_draft_made_on')->nullable();
            $table->text('vessel_sailed_on')->nullable();
            $table->text('s_b_no')->nullable();
            $table->text('document_send_to_dock_cfs_on')->nullable();
            $table->text('remarks')->nullable();

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
            $table->timestamp('create_date')->nullable();

            $table->text('status')->nullable();
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
        Schema::dropIfExists('exports');
    }
};
