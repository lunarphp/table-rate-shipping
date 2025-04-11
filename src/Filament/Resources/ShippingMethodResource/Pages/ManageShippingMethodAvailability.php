<?php

namespace Lunar\Shipping\Filament\Resources\ShippingMethodResource\Pages;

use Filament\Resources\RelationManagers\RelationGroup;
use Filament\Support\Facades\FilamentIcon;
use Lunar\Admin\Filament\Resources\ProductResource\RelationManagers\CustomerGroupRelationManager;
use Lunar\Admin\Support\Pages\BaseManageRelatedRecords;
use Lunar\Admin\Support\RelationManagers\ChannelRelationManager;
use Lunar\Shipping\Filament\Resources\ShippingMethodResource;

class ManageShippingMethodAvailability extends BaseManageRelatedRecords
{
    protected static string $resource = ShippingMethodResource::class;

    protected static string $relationship = 'customerGroups';

    public function getTitle(): string
    {
        return __('lunarpanel.shipping::shippingmethod.pages.availability.label');
    }

    public static function getNavigationIcon(): ?string
    {
        return FilamentIcon::resolve('lunar::availability');
    }

    public static function getNavigationLabel(): string
    {
        return __('lunarpanel.shipping::shippingmethod.pages.availability.label');
    }

    public function getRelationManagers(): array
    {
        return [
            RelationGroup::make('Availability', [
                ChannelRelationManager::make([
                    'description' => __('lunarpanel.shipping::relationmanagers.shipping_methods.channels.description'),
                ]),
                CustomerGroupRelationManager::make([
                    'description' => __('lunarpanel.shipping::relationmanagers.shipping_methods.customer_groups.description'),
                ]),
            ]),
        ];
    }
}
