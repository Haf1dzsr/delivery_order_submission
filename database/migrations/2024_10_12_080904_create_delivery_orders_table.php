<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('delivery_orders', function (Blueprint $table) {
            $table->id();
            $table->string('do_number');
            $table->string('do_purpose');
            $table->string('do_origin');
            $table->string('do_destination');
            $table->string('origin_postal_code');
            $table->string('destination_postal_code');
            $table->string('item_name');
            $table->bigInteger('item_length');
            $table->bigInteger('item_width');
            $table->bigInteger('item_height');
            $table->bigInteger('item_weight');
            $table->integer('item_qty');
            $table->integer('item_price');
            $table->integer('shipment_fee')->nullable();
            $table->string('shipment_courier')->nullable();
            $table->string('do_status');
            $table->string('do_creator');
            $table->dateTime('do_created_date');
            $table->string('do_approved_by')->nullable();
            $table->dateTime('do_approved_date')->nullable();
            $table->text('do_approver_reject_note')->nullable();
            $table->dateTime('do_approver_reject_date')->nullable();
            $table->string('do_approver_reject_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_orders');
    }
};
