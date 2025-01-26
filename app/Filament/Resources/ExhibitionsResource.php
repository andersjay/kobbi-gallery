<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExhibitionsResource\Pages;
use App\Models\Exhibition;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExhibitionsResource extends Resource
{
    protected static ?string $model = Exhibition::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Exposição';
    protected static ?string $pluralLabel = 'Exposições';
    protected static ?string $slug = 'exhibitions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informações da exposição')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Título da exposição')
                            ->required(),
                        TextInput::make('slug')
                            ->label('Slug da exposição')
                            ->placeholder('titulo-da-exposicao')
                            ->required(),
                        DatePicker::make('start_date')
                            ->label('Data de inicio')
                            ->required(),
                        DatePicker::make('end_date')
                            ->label('Data de fim')
                            ->required(),
                        FileUpload::make('image')
                            ->label('Imagem da exposição')
                            ->columnSpan(2)
                            ->directory('uploads/exposicoes') // Define o diretório de armazenamento
                            ->required()
                            ->storeFileNamesIn('image') // Salva o nome do arquivo no banco de dados
                            ->visibility('public'), // Garante acesso público ao arquivo
                        RichEditor::make('description')
                            ->disableToolbarButtons(['attachFiles'])
                            ->label('Descrição da exposição')
                            ->columnSpan(2)
                            ->required(),

                    ]),
                Section::make('Informações do autor')
                    ->columns(1)
                    ->schema([
                        TextInput::make('author_name')
                            ->label('Nome do autor'),
                        RichEditor::make('author_description')
                            ->disableToolbarButtons(['attachFiles'])
                            ->label('Descrição do autor')
                            ->columnSpan(2)
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListExhibitions::route('/'),
            'create' => Pages\CreateExhibitions::route('/create'),
            'edit' => Pages\EditExhibitions::route('/{record}/edit'),
        ];
    }
}
