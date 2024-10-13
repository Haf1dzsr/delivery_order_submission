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
        Schema::table('delivery_orders', function (Blueprint $table) {
            $table->text('do_approver_revise_note')->nullable();
            $table->dateTime('do_approver_revise_date')->nullable();
            $table->string('do_approver_revise_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delivery_orders', function (Blueprint $table) {
            $table->dropColumn('do_approver_revise_note');
            $table->dropColumn('do_approver_revise_date');
            $table->dropColumn('do_approver_revise_by');
        });
    }
};
