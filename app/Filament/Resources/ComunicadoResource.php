<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComunicadoResource\Pages;
use App\Filament\Resources\ComunicadoResource\RelationManagers;
use App\Models\Comunicado;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ComunicadoResource extends Resource
{
    protected static ?string $model = Comunicado::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')->label('Título'),
                Textarea::make('descricao')->label('Descrição'),
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
                TextColumn::make('titulo')->label('Título'),
                TextColumn::make('descricao')->label('Descrição'),
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
            'index' => Pages\ListComunicados::route('/'),
            'create' => Pages\CreateComunicado::route('/create'),
            'edit' => Pages\EditComunicado::route('/{record}/edit'),
        ];
    }
}
