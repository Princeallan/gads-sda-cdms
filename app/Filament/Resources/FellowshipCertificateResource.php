<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FellowshipCertificateResource\Pages;
use App\Filament\Resources\FellowshipCertificateResource\RelationManagers;
use App\Models\FellowshipCertificate;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FellowshipCertificateResource extends Resource
{
    protected static ?string $model = FellowshipCertificate::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\FileUpload::make('thumbnail')
                        ->required(),
                    Forms\Components\RichEditor::make('description'),
                    Forms\Components\DatePicker::make('expiry_date'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('expiry_date'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('created_at')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListFellowshipCertificates::route('/'),
            'create' => Pages\CreateFellowshipCertificate::route('/create'),
            'edit' => Pages\EditFellowshipCertificate::route('/{record}/edit'),
        ];
    }
}
