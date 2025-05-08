<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GallerySettingResource\Pages;
use App\Models\GallerySetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GallerySettingResource extends Resource
{
    protected static ?string $model = GallerySetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Texto sobre a galeria';
    protected static ?string $pluralLabel = 'Texto sobre a galeria';
    protected static ?string $slug = 'gallery-settings';
    protected static ?string $navigationGroup = 'Galeria';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('about')
                    ->label('Texto sobre a galeria')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('about')
                    ->label('Texto sobre a galeria')
                    ->limit(80),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGallerySettings::route('/'),
            'create' => Pages\CreateGallerySetting::route('/create'),
            'edit' => Pages\EditGallerySetting::route('/{record}/edit'),
        ];
    }
} 