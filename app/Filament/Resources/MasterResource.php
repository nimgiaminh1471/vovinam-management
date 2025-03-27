<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterResource\Pages;
use App\Filament\Resources\MasterResource\RelationManagers;
use App\Models\Master;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasterResource extends Resource
{
    protected static ?string $model = Master::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    protected static ?string $navigationLabel = 'Masters';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Master Information')
                    ->schema([
                        Forms\Components\TextInput::make('full_name')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\DatePicker::make('dob')
                            ->label('Date of Birth')
                            ->nullable(),
                        Forms\Components\Select::make('gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                            ])
                            ->nullable(),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(20)
                            ->nullable(),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(100)
                            ->nullable(),
                        Forms\Components\Select::make('rank_id')
                            ->relationship('rank', 'name')
                            ->label('Current Rank')
                            ->preload()
                            ->searchable()
                            ->nullable(),
                        Forms\Components\Textarea::make('address')
                            ->maxLength(255)
                            ->nullable()
                            ->columnSpanFull(),
                        SpatieMediaLibraryFileUpload::make('avatar')
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Master ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dob')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'male' => 'blue',
                        'female' => 'pink',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rank.name')
                    ->label('Current Rank')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                SpatieMediaLibraryImageColumn::make('avatar')
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            RelationManagers\DegreesRelationManager::class,
            RelationManagers\RankHistoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMasters::route('/'),
            'create' => Pages\CreateMaster::route('/create'),
            'edit' => Pages\EditMaster::route('/{record}/edit'),
        ];
    }
}
