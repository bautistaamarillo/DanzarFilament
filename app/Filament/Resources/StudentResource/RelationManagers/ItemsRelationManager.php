<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('name')
            ->required()
            ->maxLength(255),
            TextInput::make('price')
            ->required()
            ->numeric()
            ->prefix('$')
            ->maxValue(4992999949996799992.95),
            Select::make('category_id')
            ->relationship('category', 'name')
            ->searchable()
            ->preload()
            ->createOptionForm([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ])
            ->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                ->sortable()
                ->searchable(),
                TextColumn::make('price')
                ->numeric()
                ->prefix('$')
                ->sortable(),
                TextColumn::make('category.name')
                ->sortable()
                ->searchable(),
            ])
            ->filters([
                SelectFilter::make('category')
                ->relationship('category', 'name')
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                ->preloadRecordSelect(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make(),
            ]);
    }
}
