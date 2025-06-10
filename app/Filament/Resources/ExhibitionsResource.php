<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExhibitionsResource\Pages;
use App\Models\Exhibition;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
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
                        RichEditor::make('title')
                            ->disableToolbarButtons(['attachFiles'])
                            ->label('Título da exposição')
                            ->required(),
                        TextInput::make('slug')
                            ->label('Slug da exposição')
                            ->placeholder('titulo-da-exposicao')
                            ->required(),
                        DatePicker::make('start_date')
                            ->label('Data de inicio'),
                        DatePicker::make('end_date')
                            ->label('Data de fim'),
                        TextInput::make('year')
                            ->label('Ano da exposição')
                            ->placeholder('2025'),
                        Checkbox::make('is_collective')
                            ->label('Exposição coletiva')
                            ->reactive(),
                        Select::make('photographers')
                            ->label('Fotógrafos')
                            ->multiple()
                            ->preload()
                            ->relationship('photographers', 'name')
                            ->createOptionForm([
                                TextInput::make('name')->label('Nome do fotógrafo')->required(),
                            ])
                            ->visible(fn($get) => $get('is_collective')),
                        RichEditor::make('author_name')
                            ->disableToolbarButtons(['attachFiles'])
                            ->label('Nome do autor')
                            ->visible(fn($get) => !$get('is_collective')),
                        Section::make('Imagens da exposição')
                            ->columnSpan(2)
                            ->columns(2)
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Convite da exposição')
                                    ->columnSpan(1)
                                    ->image()
                                    ->disk('public')
                                    ->directory('uploads/exhibitions')
                                    ->required(),
                                FileUpload::make('banner')
                                    ->label('Banner da exposição')
                                    ->columnSpan(1)
                                    ->image()
                                    ->disk('public')
                                    ->directory('uploads/exhibitions/banners')
                                    ->required(),
                                TextInput::make('banner_url')
                                    ->label('URL do banner (opcional)')
                                    ->url()
                                    ->nullable(),
                                Select::make('banner_position')
                                    ->label('Posição do banner')
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
                                Repeater::make('gallery')
                                    ->label('Obras')
                                    ->columnSpan(2)
                                    ->schema([
                                        RichEditor::make('name')
                                            ->disableToolbarButtons(['attachFiles'])
                                            ->label('Nome da obra')
                                            ->required(),
                                        TextInput::make('year')
                                            ->label('Ano')
                                            ->required(),
                                        TextInput::make('technique')
                                            ->label('Técnica')
                                            ->required(),
                                        TextInput::make('size_cm')
                                            ->label('Tamanho (cm)')
                                            ->required(),
                                        RichEditor::make('description')
                                            ->disableToolbarButtons(['attachFiles'])
                                            ->label('Descrição')
                                            ->required(),
                                        FileUpload::make('image')
                                            ->label('Imagem da obra')
                                            ->image()
                                            ->disk('public')
                                            ->directory('uploads/exhibitions/works')
                                            ->required(),
                                    ])
                                    ->defaultItems(0)
                                    ->addActionLabel('Adicionar obra')
                                    ->reorderableWithButtons()
                                    ->collapsible()
                                    ->itemLabel(fn(array $state): ?string => $state['name'] ?? 'Nova obra'),
                            ]),
                        Section::make('Descrições da exposição')
                            ->columnSpan(2)
                            ->columns(2)
                            ->schema([
                                RichEditor::make('description')
                                    ->label('Descrição da exposição')

                                    ->columnSpan(1),
                                RichEditor::make('summary')
                                    ->disableToolbarButtons(['attachFiles'])
                                    ->label('Resumo da exposição')
                                    ->columnSpan(1),
                                FileUpload::make('pdf')
                                    ->label('PDF para download')
                                    ->disk('public')
                                    ->directory('uploads/exhibitions/pdfs')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->maxSize(10240)
                                    ->columnSpan(2),
                            ]),

                    ]),
                Section::make('Informações do autor')
                    ->columns(1)
                    ->schema([
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
            ->reorderable('sort')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título'),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug'),
                Tables\Columns\TextColumn::make('author_name')
                    ->label('Autor'),

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
