<?php

namespace App\Filament\Resources\MasterResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DegreesRelationManager extends RelationManager
{
    protected static string $relationship = 'degrees';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('company_id')
                    ->default(fn() => \Filament\Facades\Filament::getTenant()->id),

                Forms\Components\Section::make('Degree Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->label('Title')
                            ->maxLength(100),

                        Forms\Components\Select::make('rank_id')
                            ->relationship('rank', 'name')
                            ->label('Official Rank')
                            ->preload()
                            ->searchable(),

                        Forms\Components\DatePicker::make('issued_date')
                            ->required()
                            ->label('Issue Date'),

                        Forms\Components\TextInput::make('certificate_number')
                            ->label('Certificate Number')
                            ->maxLength(50)
                            ->unique(ignoreRecord: true),

                    ])->columns(2)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('rank.name')
                    ->label('Official Rank')
                    ->sortable(),

                Tables\Columns\TextColumn::make('issued_date')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('certificate_number')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
