<?php

namespace App\Filament\Resources\Organizations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class OrganizationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('organizationTypeId')
                    ->label('Organization Type')
                    ->relationship('type', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')->required()
                    ])
                    ->required(),
                TextInput::make('location'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('mobile'),
                TextInput::make('website')
                    ->url(),
            ]);
    }
}
