<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FoodResource\Pages;
use App\Filament\Resources\FoodResource\RelationManagers;
use App\Models\Food;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FoodResource extends Resource
{
    protected static ?string $model = Food::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift'; // Icon yang bagus untuk Food

    protected static ?string $navigationGroup = 'Produk Katering'; // Kelompok navigasi

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('deskripsi') // Menggunakan RichEditor untuk deskripsi
                    ->required()
                    ->columnSpanFull(), // Mengambil lebar penuh
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('Food_photos')
                    ->visibility('public')
                    ->nullable(),
                // Forms\Components\FileUpload::make('foto')
                //     ->image()
                //     ->disk('public')
                //     ->directory('Food_photos')
                //     ->visibility('public')
                //     ->storeFileNamesIn('foto')
                //     ->preserveFilenames(),
                Forms\Components\TextInput::make('harga_per_orang')
                    ->label('Harga Per Orang')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),
                Forms\Components\TextInput::make('min_orang')
                    ->label('Minimum Orang')
                    ->numeric()
                    ->minValue(1)
                    ->required(),
            ])->columns(2); // Mengatur layout form menjadi 2 kolom
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->width(50)
                    ->height(50)
                    ->circular(),
                // Tables\Columns\ImageColumn::make('foto')
                //     ->disk('public')
                //     ->label('Foto'),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('harga_per_orang')
                    ->label('Harga/Orang')
                    ->money('IDR') // Format mata uang Rupiah
                    ->sortable(),
                Tables\Columns\TextColumn::make('min_orang')
                    ->label('Min. Orang')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Sembunyikan secara default
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Sembunyikan secara default
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListFood::route('/'),
            'create' => Pages\CreateFood::route('/create'),
            'edit' => Pages\EditFood::route('/{record}/edit'),
        ];
    }
}