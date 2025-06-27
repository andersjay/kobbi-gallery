<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CollectionResource\Pages;
use App\Filament\Resources\CollectionResource\RelationManagers;
use App\Models\Collection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CollectionResource extends Resource
{
    protected static ?string $model = Collection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Acervo';
    protected static ?string $pluralModelLabel = 'Acervo';
    protected static ?string $modelLabel = 'Obra do Acervo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('artist')
                    ->label('Nome do Artista')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('Título da Obra')
                    ->required(),
                Forms\Components\RichEditor::make('additional_text')
                    ->label('Descrição')
                    ->nullable()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label('Imagem')
                    ->image()
                    ->directory('acervo')
                    ->required(),
                Forms\Components\TextInput::make('order')
                    ->label('Ordem')
                    ->numeric()
                    ->default(0)
                    ->helperText('Número para ordenação (menor = primeiro)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Imagem')
                    ->disk('public')
                    ->square(),
                Tables\Columns\TextColumn::make('artist')
                    ->label('Nome do Artista')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Título da Obra')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Ordem')
                    ->sortable(),
            ])
            ->defaultSort('order')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Editar'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Excluir selecionados'),
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
            'index' => Pages\ListCollections::route('/'),
            'create' => Pages\CreateCollection::route('/create'),
            'edit' => Pages\EditCollection::route('/{record}/edit'),
        ];
    }
}
