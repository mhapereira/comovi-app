<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventoResource\Pages;
use App\Filament\Resources\EventoResource\RelationManagers;
use App\Models\Evento;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventoResource extends Resource
{
    protected static ?string $model = Evento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('path')->label('Imagem')
                ->image()
                ->directory('eventos')
                ->imageCropAspectRatio('4:3')
                ->imageEditor(),
                TextInput::make('titulo')->label('Título')
                ->required()
                ->live(debounce: 500),
                Textarea::make('descricao')->label('Descrição'),
                DateTimePicker::make('data')
                ->seconds(false)
                ->required(),
                TextInput::make('valor')
                ->numeric()
                ->inputMode('decimal')
                ->required(),
                Select::make('status')
                ->options([
                    'ativo' => 'Ativo',
                    'inativo' => 'Inativo',
                ])->default('ativo')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('path')->label('Imagem'),
                TextColumn::make('titulo')->label('Título'),
                TextColumn::make('descricao')->label('Descrição'),
                TextColumn::make('data')->dateTime(),
                TextColumn::make('valor')->money('BRL'),
                TextColumn::make('status')
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
            'index' => Pages\ListEventos::route('/'),
            'create' => Pages\CreateEvento::route('/create'),
            'edit' => Pages\EditEvento::route('/{record}/edit'),
        ];
    }
}
