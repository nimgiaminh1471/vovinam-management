<?php

namespace App\Filament\Resources\MasterResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RankHistoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'rankHistories';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('company_id')
                    ->default(fn () => \Filament\Facades\Filament::getTenant()->id),
                
                Forms\Components\Section::make('Rank Promotion Information')
                    ->schema([
                        Forms\Components\Select::make('previous_rank_id')
                            ->relationship('previousRank', 'name')
                            ->label('Previous Rank')
                            ->preload()
                            ->searchable()
                            ->nullable(),
                        
                        Forms\Components\Select::make('new_rank_id')
                            ->relationship('newRank', 'name')
                            ->label('New Rank')
                            ->preload()
                            ->searchable()
                            ->required(),
                        
                        Forms\Components\DatePicker::make('promotion_date')
                            ->label('Promotion Date')
                            ->required(),
                        
                        Forms\Components\Textarea::make('notes')
                            ->label('Notes')
                            ->nullable()
                            ->columnSpanFull(),
                    ])->columns(2)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('promotion_date')
            ->columns([
                Tables\Columns\TextColumn::make('previousRank.name')
                    ->label('Previous Rank')
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('new')
                    ->label('')
                    ->icon('heroicon-o-arrow-right'),
                
                Tables\Columns\TextColumn::make('newRank.name')
                    ->label('New Rank')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('promotion_date')
                    ->label('Promotion Date')
                    ->date()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('notes')
                    ->limit(30)
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('promotion_date', 'desc')
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
