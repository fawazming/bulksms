<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSimInfoSubIDColumnToDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->text('sim_info')->comment('x:y:z => x=SimSlotIndex, y=SubscriberId, z=SimDisplayName');
        });

        Schema::table('sms_queues', function (Blueprint $table) {
            $table->integer('subscriber_id')->comment('SubscriberId is the sim id from the device');
            $table->softDeletes();
        });

        Schema::table('message_logs', function (Blueprint $table) {
            $table->text('sim_info')->comment('x:y:z => x=SimSlotIndex, y=SubscriberId, z=SimDisplayName');
        });

        Schema::table('campaigns', function (Blueprint $table) {
            $table->text('sim_info')->comment('x:y:z => x=SimSlotIndex, y=SubscriberId, z=SimDisplayName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->dropColumn('sim_info');
        });

        Schema::table('sms_queues', function (Blueprint $table) {
            $table->dropColumn('subscriber_id');
            $table->dropSoftDeletes();
        });

        Schema::table('message_logs', function (Blueprint $table) {
            $table->dropColumn('sim_info');
        });

        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropColumn('sim_info');
        });
    }
}
