<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProspectResource\Pages;
use App\Filament\Resources\ProspectResource\RelationManagers;
use App\Models\Division;
use App\Models\Hemisphere;
use App\Models\Prospect;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class ProspectResource extends Resource
{
    protected static ?string $model = Prospect::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique()
                            ->maxLength(255),
                    ]),
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\Select::make('hemisphere_id')
                            ->label('Hemisphere')
                            ->options(function () {
                                return Hemisphere::all()->pluck('name', 'id')->toArray();
                            })
                            ->reactive()
                            ->afterStateUpdated(fn(callable $set) => $set('division_id', null)),

                    ]),
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\Select::make('division_id')
                            ->reactive()
                            ->options(function (callable $get) {
                                $hemisphere = Hemisphere::find($get('hemisphere_id'));
                                if (!$hemisphere) {
                                    return Division::all()->pluck('name', 'id');
                                }
                                return $hemisphere->divisions->pluck('name', 'id');
                            }),
                        Forms\Components\Select::make('location_id')
                            ->label('Location Address')
                            ->relationship('location', 'name')
                    ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('division.name'),
                Tables\Columns\TextColumn::make('hemisphere.name'),
                Tables\Columns\TextColumn::make('location.name'),
                TextColumn::make('created_at')
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
//                Action::make('Update')
//                    ->color('success')
//                    ->icon('heroicon-o-user-add')
//                    ->url(fn (Prospect $record): string => ProspectResource1::getUrl('update', ['record' => $record]))

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
            'index' => Pages\ListProspects::route('/'),
            'create' => Pages\CreateProspect::route('/create'),
            'edit' => Pages\EditProspect::route('/{record}/edit'),
            'view' => Pages\ViewProspect::route('/{record}'),
        ];
    }
}
