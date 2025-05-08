<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterSettingResource\Pages;
use App\Models\FooterSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FooterSettingResource extends Resource
{
    protected static ?string $model = FooterSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Rodapé';
    protected static ?string $pluralLabel = 'Rodapé';
    protected static ?string $slug = 'footer-settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
                    ->image(),
                Forms\Components\TextInput::make('address')
                    ->label('Endereço'),
                Forms\Components\TextInput::make('contact_phone')
                    ->label('Telefone'),
                Forms\Components\TextInput::make('contact_email')
                    ->label('E-mail'),
                Forms\Components\TextInput::make('schedule_week')
                    ->label('Horário (Seg a Sex)'),
                Forms\Components\TextInput::make('schedule_saturday')
                    ->label('Horário (Sábado)'),
                Forms\Components\TextInput::make('copyright')
                    ->label('Copyright'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo'),
                Tables\Columns\TextColumn::make('address')
                    ->label('Endereço'),
                Tables\Columns\TextColumn::make('contact_phone')
                    ->label('Telefone'),
                Tables\Columns\TextColumn::make('contact_email')
                    ->label('E-mail'),
                Tables\Columns\TextColumn::make('schedule_week')
                    ->label('Horário (Seg a Sex)'),
                Tables\Columns\TextColumn::make('schedule_saturday')
                    ->label('Horário (Sábado)'),
                Tables\Columns\TextColumn::make('copyright')
                    ->label('Copyright'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFooterSettings::route('/'),
            'create' => Pages\CreateFooterSetting::route('/create'),
            'edit' => Pages\EditFooterSetting::route('/{record}/edit'),
        ];
    }
} 