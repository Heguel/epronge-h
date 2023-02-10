<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Enrolls;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\EnrollsResource\Pages;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EnrollsResource\RelationManagers;
use App\Filament\Resources\DashboardResource\Widgets\DasboardStatsOverview;

class EnrollsResource extends Resource
{
    protected static ?string $model = Enrolls::class;
    protected static ?string $modelLabel = 'Réservations';
    protected static ?string $navigationGroup = 'Fonctionnalités';
    protected static ?string $navigationLabel = 'Réservations';
    protected static ?string $navigationIcon = 'bi-list-check';
    protected static ?string $recordTitleAttribute = 'lastname';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([
                    TextInput::make('code')->required()->placeholder('AB-000000')
                    ->disabled(true),
                    TextInput::make('lastname')->required()->label("Nom"),
                    TextInput::make('firstname')
                    ->label("Prenom")
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function (callable $get, callable $set) {
                            if ($get('lastname') && $get('firstname')) {
                                $lastn = $get('lastname');
                                $firstn = $get('firstname');
                                $set('code', self::getRandomCode($lastn, $firstn));
                            } else {
                                $set('code', null);
                            }
                        }),
                    TextInput::make('email')->email(),
                    Select::make('genre')
                        ->options([
                            'Male' => 'Masculin',
                            'Female' => 'Feminin',
                            'Other' => 'Autre',
                        ])
                        ->label("Sexe")
                        ->searchable(),
                    TextInput::make('phone')->tel()
                        ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                        ->required()
                        ->label("Telephone"),
                    Select::make('option_id')
                        ->relationship('option', 'name'),

                    DatePicker::make('date_of_birth')->required()->label("Date de naissance"),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('lastname')->searchable()->sortable()->label('Nom'),
                TextColumn::make('firstname')->searchable()->sortable()->label('Prénom'),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('gender')->searchable()->label("Sexe"),
                TextColumn::make('phone')->searchable()->sortable()->label("Numéro de téléphone"),
                TextColumn::make('date_of_birth')->searchable()->sortable()->dateTime('j M Y')->label("Date de naissance"),
                TextColumn::make('option.name')->searchable()->sortable(),
                TextColumn::make('created_at')->searchable()->dateTime('j M Y')->label('Date inscription'),
            ])
            ->filters([
                //
                // Filter::make('Date')
                // ->query(fn (Builder $query): Builder => $query->where('created_at', true)),
                SelectFilter::make('Option')->relationship('option', 'name'),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    public static function getRandomCode($first, $last)
    {
        return substr($first, 0, 1) . substr($last, 0, 1) . "-" . mt_rand(100000, 999999);
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

    public static function getWidgets(): array
    {
        return [
            DasboardStatsOverview::class,
        ];
    }
}
