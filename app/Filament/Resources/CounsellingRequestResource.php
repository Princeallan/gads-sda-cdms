<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CounsellingRequestResource\Pages;
use App\Filament\Resources\CounsellingRequestResource\RelationManagers;
use App\Models\CounsellingRequest;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CounsellingRequestResource extends Resource
{
    protected static ?string $model = CounsellingRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DateTimePicker::make('requested_date'),
                                Forms\Components\Select::make('requester_id')
                                    ->label('Requester')
                                    ->relationship('requester', 'name')
                                    ->searchable()
                                    ->preload(),
                                Forms\Components\Textarea::make('counseling_purpose')
                                    ->required(),
                                Forms\Components\Toggle::make('urgency')
                                    ->label('Urgent'),
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('requester.name'),
                Tables\Columns\TextColumn::make('counseling_purpose'),
                Tables\Columns\TextColumn::make('requested_date')
                    ->dateTime(),
                Tables\Columns\IconColumn::make('urgency')
                    ->boolean(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Added by'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('D M-Y H:i:s')
                    ->dateTime(),
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
            'index' => Pages\ListCounsellingRequests::route('/'),
            'create' => Pages\CreateCounsellingRequest::route('/create'),
            'edit' => Pages\EditCounsellingRequest::route('/{record}/edit'),
        ];
    }
}
