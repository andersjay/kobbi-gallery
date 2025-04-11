<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NoticiesResource\Pages;
use App\Models\Noticies;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NoticiesResource extends Resource
{
    protected static ?string $model = Noticies::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Notícia';
    protected static ?string $pluralLabel = 'Notícias';
    protected static ?string $slug = 'noticies';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(2)
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Título')
                    ->columns(1)
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->label('Slug')
                    ->columns(1)
                    ->placeholder('Exemplo: noticia-1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->label('URL da notícia')
                    ->columns(1)
                    ->columnSpan(2)
                    ->placeholder('Exemplo: https://www.google.com')
                    ->maxLength(255),
                Forms\Components\TextInput::make('author_name')
                    ->label('Autor')
                    ->columns(1)
                    ->maxLength(255),
                Forms\Components\TextInput::make('summary')
                    ->label('Resumo')
                    ->columns(1),
                Forms\Components\FileUpload::make('image')
                    ->label('Imagem')
                    ->image(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author_name')
                    ->label('Autor')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Imagem'),
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
            'index' => Pages\ListNoticies::route('/'),
            'create' => Pages\CreateNoticies::route('/create'),
            'edit' => Pages\EditNoticies::route('/{record}/edit'),
        ];
    }
}
