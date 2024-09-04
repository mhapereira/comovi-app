<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstitutoResource\Pages;
use App\Filament\Resources\InstitutoResource\RelationManagers;
use App\Models\Instituto;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstitutoResource extends Resource
{
    protected static ?string $model = Instituto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('sobre'),
                Repeater::make('ata')
                    ->schema([
                        TextInput::make('name')->required(),
                        FileUpload::make('arquivo')->required()
                    ])
                    ->columns(1),
                Repeater::make('balanco')
                    ->schema([
                        TextInput::make('name')->required(),
                        FileUpload::make('arquivo')->required()
                    ])
                    ->columns(1)
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sobre')->wrap()->limit(100)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListInstitutos::route('/'),
            'create' => Pages\CreateInstituto::route('/create'),
            'edit' => Pages\EditInstituto::route('/{record}/edit'),
        ];
    }
}
