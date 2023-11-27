<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CarResource\Pages;
use App\Filament\Admin\Resources\CarResource\RelationManagers;
use App\Models\Car;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('brand')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('model')
                    ->maxLength(255),
                Forms\Components\TextInput::make('license_plate')
                    ->maxLength(255),
                Forms\Components\TextInput::make('daily_rental_rate')
                    ->numeric(),
                FileUpload::make('photo_car')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('images/cars')
                    ->visibility('private')
                    ->openable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('license_plate')
                    ->searchable(),
                Tables\Columns\TextColumn::make('daily_rental_rate')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('photo_car')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
