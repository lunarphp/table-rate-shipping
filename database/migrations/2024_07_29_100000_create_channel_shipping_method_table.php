<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lunar\Base\Migration;
use Lunar\Models\Channel;
use Lunar\Shipping\Models\ShippingMethod;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create($this->prefix . 'channel_shipping_method', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Channel::class)->constrained(
                $this->prefix . 'channels'
            );
            $table->foreignIdFor(ShippingMethod::class)->constrained(
                $this->prefix . 'shipping_methods'
            );
            $table->boolean('enabled')->default(true)->index();
            $table->timestamp('starts_at')->nullable()->index();
            $table->timestamp('ends_at')->nullable()->index();
            $table->timestamps();

            $table->unique(['channel_id', 'shipping_method_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'channel_shipping_method');
    }
};
