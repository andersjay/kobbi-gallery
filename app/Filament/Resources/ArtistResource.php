<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtistResource\Pages;
use App\Filament\Resources\ArtistResource\RelationManagers;
use App\Models\Artist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArtistResource extends Resource
{
    protected static ?string $model = Artist::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Artista';
    protected static ?string $pluralLabel = 'Artistas';
    protected static ?string $slug = 'artists';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255)
                    ->label('Nome'),
                Forms\Components\Textarea::make('description')
                    ->nullable()
                    ->columnSpanFull()
                    ->label('Descrição'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->multiple()
                    ->directory('artists')
                    ->columnSpanFull()
                    ->maxSize(5120)
                    ->label('Imagens do Artista'), //5MB
                Forms\Components\Section::make('Obras')
                    ->schema([
                        Forms\Components\Repeater::make('artworks')
                            ->relationship()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('Nome da Obra'),
                                Forms\Components\Textarea::make('description')
                                    ->nullable()
                                    ->label('Descrição da Obra'),
                                Forms\Components\FileUpload::make('images')
                                    ->image()
                                    ->multiple()
                                    ->directory('artworks')
                                    ->maxSize(5120)
                                    ->label('Imagens da Obra'),
                            ])
                            ->columns(2)
                            ->defaultItems(1)
                            ->reorderable(true)
                            ->collapsible()
                            ->cloneable()
                            ->label('Obras do Artista')
                    ])
                    ->collapsible()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListArtists::route('/'),
            'create' => Pages\CreateArtist::route('/create'),
            'edit' => Pages\EditArtist::route('/{record}/edit'),
        ];
    }
}
