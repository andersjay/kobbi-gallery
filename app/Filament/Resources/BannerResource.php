<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Banners';
    protected static ?string $pluralLabel = 'Banners';
    protected static ?string $slug = 'banners';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('Imagem')
                    ->image()
                    ->required(),
                Forms\Components\Select::make('position')
                    ->label('Posição da imagem')
                    ->options([
                        'center center' => 'Centro Centro',
                        'top center' => 'Cima Centro',
                        'bottom center' => 'Baixo Centro',
                        'center left' => 'Centro Esquerda',
                        'center right' => 'Centro Direita',
                        'top left' => 'Cima Esquerda',
                        'top right' => 'Cima Direita',
                        'bottom left' => 'Baixo Esquerda',
                        'bottom right' => 'Baixo Direita',
                    ])
                    ->default('center center')
                    ->required(),
                Forms\Components\TextInput::make('url')
                    ->label('URL (opcional)')
                    ->url()
                    ->nullable(),
                Forms\Components\TextInput::make('order')
                    ->label('Ordem')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('active')
                    ->label('Ativo')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Imagem'),
                Tables\Columns\TextColumn::make('url')
                    ->label('URL'),
                Tables\Columns\TextColumn::make('order')
                    ->label('Ordem'),
                Tables\Columns\IconColumn::make('active')
                    ->label('Ativo')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
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
            ])
            ->defaultSort('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
} 