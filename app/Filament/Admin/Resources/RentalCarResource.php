<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RentalCarResource\Pages;
use App\Filament\Admin\Resources\RentalCarResource\RelationManagers;
use App\Models\RentalCar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RentalCarResource extends Resource
{
    protected static ?string $navigationGroup = 'Transaction';

    protected static ?string $navigationLabel = 'Rental Car';

    protected static ?string $pluralModelLabel = 'Rental Car';

    protected static ?string $model = RentalCar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('car_id')
                    ->relationship(
                        name: 'car',
                        // modifyQueryUsing: fn (Builder $query) => $query->orderBy('model'),

                        modifyQueryUsing: function (Builder $query) {
                            // Hanya menampilkan mobil yang tidak memiliki relasi dengan rental
                            $query->whereDoesntHave('rentalCars');
                        },
                    )
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->model} ({$record->brand}) ")
                    ->searchable(['brand', 'model'])
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->label('Nama Penyewa'),
                Forms\Components\DateTimePicker::make('start_date'),
                Forms\Components\DateTimePicker::make('end_date')->after('start_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('car.full_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->dateTime()
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
            'index' => Pages\ListRentalCars::route('/'),
            'create' => Pages\CreateRentalCar::route('/create'),
            'edit' => Pages\EditRentalCar::route('/{record}/edit'),
        ];
    }
}
