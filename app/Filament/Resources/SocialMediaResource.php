<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialMediaResource\Pages;
use App\Filament\Resources\SocialMediaResource\RelationManagers;
use App\Models\SocialMedia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialMediaResource extends Resource
{
    protected static ?string $model = SocialMedia::class;

    protected static ?string $navigationIcon = 'heroicon-o-share';
    
    protected static ?string $navigationLabel = 'Redes Sociais';
    
    protected static ?string $navigationGroup = 'Site';
    
    protected static ?int $navigationSort = 90;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações da Rede Social')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('url')
                            ->label('URL')
                            ->required()
                            ->url()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('icon')
                            ->label('Ícone Phosphor')
                            ->helperText('Nome do ícone Phosphor (exemplo: instagram-logo, whatsapp-logo, facebook-logo)')
                            ->maxLength(255),
                        Forms\Components\Toggle::make('active')
                            ->label('Ativo')
                            ->default(true),
                        Forms\Components\TextInput::make('order')
                            ->label('Ordem')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon')
                    ->label('Ícone')
                    ->formatStateUsing(fn (string $state): string => $state ? "<i class=\"ph ph-{$state}\"></i> {$state}" : '')
                    ->html(),
                Tables\Columns\IconColumn::make('active')
                    ->label('Ativo')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Ordem')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocialMedia::route('/'),
            'create' => Pages\CreateSocialMedia::route('/create'),
            'edit' => Pages\EditSocialMedia::route('/{record}/edit'),
        ];
    }
}
