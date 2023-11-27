<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ReturnCarResource\Pages;
use App\Filament\Admin\Resources\ReturnCarResource\RelationManagers;
use App\Models\Car;
use App\Models\ReturnCar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReturnCarResource extends Resource
{
    protected static ?string $navigationGroup = 'Transaction';

    protected static ?string $navigationLabel = 'Return Car';

    protected static ?string $pluralModelLabel = 'Return Car';

    protected static ?string $model = ReturnCar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('rental_id')
                    ->relationship('rental', 'id')
                    ->required(),
                Forms\Components\DateTimePicker::make('return_date'),
                Forms\Components\TextInput::make('rental_duration_days')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('car.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rental.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('return_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rental_duration_days')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListReturnCars::route('/'),
            'create' => Pages\CreateReturnCar::route('/create'),
            'edit' => Pages\EditReturnCar::route('/{record}/edit'),
        ];
    }
}
