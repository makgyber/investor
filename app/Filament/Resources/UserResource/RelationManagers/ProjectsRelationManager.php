<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class ProjectsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'projects';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('amount')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('percent_roi')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options(['draft' => 'Draft', 
                    'for_approval' => 'For approval', 
                    'for_funding' => 'For funding', 
                    'ongoing' => 'Ongoing', 
                    'payout' => 'Payout', 
                    'completed' => 'Completed', 
                    'cancelled' => 'Cancelled'
                    ])
                    ->disablePlaceholderSelection()
                    ->required()
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('percent_roi'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ]);
    }
}
