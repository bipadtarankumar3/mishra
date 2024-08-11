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
        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->text('job_created_dt')->nullable();
            $table->text('job_no')->nullable();
            $table->text('bill_no')->nullable();
            $table->text('total_sale_bill_amount')->nullable();
            $table->text('bill_of_entry_n__and_date')->nullable();
            $table->text('invoice_no')->nullable();
            $table->text('party_importer_name')->nullable();
            $table->text('xerox_doc_rcvd_on')->nullable();
            $table->text('thro_forw_name')->nullable();
            $table->text('ship_comp_name')->nullable();
            $table->text('vessel_name')->nullable();
            $table->text('voyag_flight_no')->nullable();
            $table->text('igm_no_and_date')->nullable();
            $table->text('final_entry_on')->nullable();
            $table->text('line_no')->nullable();
            $table->text('bl_no_and_date')->nullable();
            $table->text('free_time_till_date')->nullable();
            $table->text('shipping_comp_bill_amt')->nullable();
            $table->text('shipping_comp_bill_to')->nullable();
            $table->text('ship_comp_sec_deps_amt')->nullable();
            $table->text('ship_co_payment_made_by')->nullable();
            $table->text('sd_amt_payer_mode')->nullable();
            $table->text('delivery_order_rcvd_on')->nullable();
            $table->text('secur_depos_rcvd_on')->nullable();
            $table->text('no_of_contr_w_o_s_ch_no')->nullable();
            $table->text('contr_no')->nullable();
            $table->text('name_of_the_transporter')->nullable();
            $table->text('name_of_cfs')->nullable();
            $table->text('cfs_bill_paid_by')->nullable();
            $table->text('container_release_from_cfs_on')->nullable();
            $table->text('contr_rels_from_party_warehouse_on')->nullable();
            $table->text('checklist_send_to_party_on')->nullable();
            $table->text('chklist_conf_by_party_on')->nullable();
            $table->text('duty_paid_by')->nullable();
            $table->text('description_of_goods')->nullable();
            $table->text('h_s_code')->nullable();
            $table->text('duty_structure')->nullable();
            $table->text('gross_weight')->nullable();
            $table->text('net_weight')->nullable();
            $table->text('remarks')->nullable();
            $table->text('total_purchase')->nullable();
            $table->text('job_completion_date')->nullable();
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
        Schema::dropIfExists('imports');
    }
};
