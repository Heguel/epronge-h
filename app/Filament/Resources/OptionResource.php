<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Option;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OptionResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OptionResource\RelationManagers;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;

class OptionResource extends Resource
{
    protected static ?string $model = Option::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $modelLabel = 'Options';
    protected static ?string $navigationGroup = 'Fonctionnalités';


    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    TextInput::make('name')->required()
                        ->minLength(5)
                        ->maxLength(50),
                    TextInput::make('description')->nullable(),
                    // Toggle::make('active')
                    //     ->required()
                    //     ->inline(true)
                    //     ->label("Actif")
                    //     ->onColor('warning')
                    //     ->offColor('gray'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->searchable()->sortable(),
                // IconColumn::make('active')
                //     ->options([
                //         'heroicon-o-check-circle',
                //         'heroicon-o-x-circle' => fn ($state): bool => $state === false,
                //     ])
                //     ->colors([
                //         'primary',
                //         'secondary' => fn ($state): bool => $state === false,
                //     ]),
                TextColumn::make('description'),
                TextColumn::make('created_at')->searchable()
                    ->datetime('j M Y')->label("Date créée"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListOptions::route('/'),
            // 'create' => Pages\CreateOption::route('/create'),
            // 'edit' => Pages\EditOption::route('/{record}/edit'),
        ];
    }
}
