<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('credit_type_id');
            $table->decimal('amount', 10, 2);
            $table->integer('repayment_duration');
            $table->decimal('interest_rate', 5, 2); // specify the precision and scale
            $table->integer('grace_period');
            $table->unsignedBigInteger('account_id');
            $table->string('status');
            $table->string('credit_motif'); // add this line to include the credit_motif field
            $table->timestamps();
            
            $table->foreign('credit_type_id')
                ->references('id')
                ->on('credit_types')
                ->onDelete('cascade');
            
            $table->foreign('account_id')
                ->references('id')
                ->on('accounts')
                ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
};