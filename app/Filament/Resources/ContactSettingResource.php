<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactSettingResource\Pages;
use App\Filament\Resources\ContactSettingResource\RelationManagers;
use App\Models\ContactSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactSettingResource extends Resource
{
    protected static ?string $model = ContactSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Configurações Contato';
    protected static ?string $pluralLabel = 'Configurações Contato';
    protected static ?string $slug = 'contact-settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Seções Personalizadas Contato')
                    ->schema([
                        Forms\Components\TextInput::make('section1_title')
                            ->label('Título da Seção 1'),
                        Forms\Components\RichEditor::make('section1_description')
                            ->label('Descrição da Seção 1')
                            ->nullable()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('section2_title')
                            ->label('Título da Seção 2'),
                        Forms\Components\RichEditor::make('section2_description')
                            ->label('Descrição da Seção 2')
                            ->nullable()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('section3_title')
                            ->label('Título da Seção 3'),
                        Forms\Components\RichEditor::make('section3_description')
                            ->label('Descrição da Seção 3')
                            ->nullable()
                            ->columnSpanFull(),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section1_title')
                    ->label('Título Seção 1'),
                Tables\Columns\TextColumn::make('section2_title')
                    ->label('Título Seção 2'),
                Tables\Columns\TextColumn::make('section3_title')
                    ->label('Título Seção 3'),
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
            'index' => Pages\ListContactSettings::route('/'),
            'create' => Pages\CreateContactSetting::route('/create'),
            'edit' => Pages\EditContactSetting::route('/{record}/edit'),
        ];
    }
}
