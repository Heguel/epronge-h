<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Enrolls;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EnrollsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EnrollsResource\RelationManagers;

class EnrollsResource extends Resource
{
    protected static ?string $model = Enrolls::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    TextInput::make('code')->required(),
                    TextInput::make('lastname')->required(),
                    TextInput::make('firstname')->required(),
                    TextInput::make('email')->email()->required(),
                    Select::make('gender')
                        ->options([
                            'Male' => 'Masculin',
                            'Female' => 'Feminin',
                            'Other' => 'Autre',
                        ]),
                    TextInput::make('phone')->tel()
                        ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                        ->required(),
                    Select::make('option_id')
                        ->relationship('option', 'name'),

                    DatePicker::make('date_of_birth')->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable(),
                TextColumn::make('lastname')->searchable()->sortable(),
                TextColumn::make('firstname')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('gender')->searchable(),
                TextColumn::make('phone')->searchable()->sortable(),
                TextColumn::make('date_of_birth')->searchable()->sortable(),
                TextColumn::make('option.name')->searchable()->sortable(),
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
            'index' => Pages\ListEnrolls::route('/'),
            // 'create' => Pages\CreateEnrolls::route('/create'),
            'edit' => Pages\EditEnrolls::route('/{record}/edit'),
        ];
    }
}
