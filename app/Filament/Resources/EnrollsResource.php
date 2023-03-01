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
    protected static ?string $recordTitleAttribute = 'code';

    public static function getGloballySearchableAttributes(): array
    {
        return ['lastname', 'firstname', 'option.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Option' => $record->option->name,
            // 'Category' => $record->category->name,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Card::make()->schema([

                    TextInput::make('lastname')->required()->label("Nom")
                        ->minLength(3)
                        ->maxLength(30),
                    TextInput::make('firstname')
                        ->label("Prenom")
                        ->required()
                        ->reactive()
                        ->minLength(3)
                        ->maxLength(30)
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
                        ->label("Sexe")->required()
                        ->searchable(),
                    TextInput::make('phone')->tel()
                        ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                        ->required()
                        ->minLength(8)
                        ->maxLength(12)
                        ->label("Téléphone"),
                    Select::make('option_id')->required()
                        ->relationship('option', 'name'),

                    DatePicker::make('date_of_birth')
                        ->maxDate(now())
                        ->label("Date de naissance")
                        ->required(),
                    Select::make('place_of_birth')->label("Lieu de naissance")
                        ->options([
                            'Anse à Foleur'   => 'Anse à Foleur',    
                            'Anse à Galets'   => 'Anse à Galets',
                            'Anse à Pitre'    => 'Anse à Pitre',
                            'Anse-à-Veau'     => 'Anse-à-Veau',
                            'Anse d’Hainault' => 'Anse d’Hainault',
                            'Anse Rouge'      => 'Anse Rouge',
                            'Arcahaie'        => 'Arcahaie',
                            'Arniquet'        => 'Arniquet',
                            'Aquin'           => 'Aquin',
                            'Acul du Nord'    => 'Acul du Nord',
                            'Acul Samedi'     => 'Acul Samedi',
                            'Bainet'          => 'Bainet',
                            'Barbon'          => 'Barbon',
                            'Baradères'       => 'Baradères',
                            'Bas Limbé'       => 'Bas Limbé',
                            'Bassin Bleu'     => 'Bassin Bleu',
                            'Belladères'      => 'Belle-Anse',
                            'Belle-Anse'      => 'Belle-Anse',
                            'Beaumont'        => 'Beaumont',
                            'Bonbon'          => 'Bonbon',
                            'Bombardopolis'   => 'Bombardopolis',
                            'Baie de Henne'   => 'Baie de Henne',
                            'Boucan Carré'    => 'Boucan Carré',
                            'Borgne'          => 'Borgne',
                            'Camp Perrin'     => 'Camp Perrin',
                            'Carrefour'       => 'Carrefour',
                            'Caracol'         => 'Caracol',
                            'Carice'          => 'Carice' ,
                            'Cabaret'         => 'Cabaret',
                            'Cap-Haïtien'     => 'Cap-Haïtien',
                            'Capotille'       => 'Capotille',
                            'Cayes'           => 'Cayes',
                            'Cayes Jacmel'    => 'Cayes Jacmel',
                            'Cavaillon'       => 'Cavaillon',    
                            'Chambellan'      => 'Chambellan',
                            'Chansolme'       => 'Chansolme',
                            'Chardonnières'   => 'Chardonnières',
                            'Cerca Cavajal'   => 'Cerca Cavajal',
                            'Cerca-La-source' => 'Cerca-La-source',
                            'Côteaux'         => 'Côteaux',
                            'Corail'          => 'Corail' ,
                            'Cornillon'       => 'Cornillon',
                            'Côte de Fer'     => 'Côte de Fer',
                            'Cité soleil'     => 'Cité soleil',
                            'Croix-des-Bouquets' => 'Croix-des-Bouquets',
                            'Dame-Marie'       => 'Dame-Marie',
                            'Delmas'          => 'Delmas',
                            'Desdunes'        => 'Desdunes',
                            'Dessalines / Marchand' => 'Dessalines / Marchand',
                            'Dondon'          => 'Dondon',
                            'Ennery'          => 'Ennery',
                            'Ferrier'         => 'Ferrier',
                            'Fort Liberté'    => 'Fort Liberté',
                            'Fond des Nègres' => 'Fond des Nègres',
                            'Fonds Verettes'  => 'Fonds Verettes',
                            'Ganthier'        => 'Ganthier',
                            'Gonaives'        => 'Gonaives',
                            'Grand Boucan'    => 'Grand Boucan',
                            'Grand Goâve'     => 'Grand Goâve',
                            'Grand Gosier'    => 'Grand Gosier',
                            'Grande Rivière du Nord ' => 'Grande Rivière du Nord ',
                            'Grande Saline'   => 'Grande Saline',
                            'Gressier'        => 'Gressier',
                            'Gros Morne'      => 'Gros Morne',
                            'Hinche'          => 'Hinche',
                            'Jacmel'          => 'Jacmel',
                            'Jean-Rabel'      => 'Jean-Rabel',
                            'Jérémie'         => 'Jérémie',
                            'Kens-coff'       => 'Kens-coff',
                            'La Tortue'       => 'La Tortue',
                            'La Vallée de Jacmel'   => 'La Vallée de Jacmel',
                            'La Victoire'     => 'La Victoire',
                            'L’Asile'         => 'L’Asile',
                            'Lascahobas'      => 'Lascahobas',
                            'L’Estère'        => 'L’Estère',
                            'Léogâne'         => 'Léogâne',
                            'Les Irois'       => 'Les Irois',
                            'Les Anglais'     => 'Les Anglais',
                            'Limbé'           => 'Limbé',
                            'Limonade'        => 'Limonade',
                            'Maïssade'        => 'Maïssade',
                            'Maniche'         => 'Maniche',
                            'Marmelade'       => 'Marmelade',
                            'Marigot'         => 'Marigot',
                            'Milot'           => 'Milot' ,
                            'Mirebalais'      => 'Mirebalais',
                            'Miragoâne'       => 'Miragoâne' ,
                            'Mont Organisé'   => 'Mont Organisé',
                            'Mombrin Crochu'  => 'Mombrin Crochu',
                            'Môle Saint Nicolas'=> 'Môle Saint Nicolas',
                            'Moron'           => 'Moron',
                            'Ouanaminthe'     => 'Ouanaminthe',
                            'Paillant'        => 'Paillant',
                            'Pestel'          => 'Pestel',
                            'Perches'         => 'Perches',
                            'Pétion-Ville'    => 'Pétion-Ville',
                            'PetitGoâve'      => 'PetitGoâve',
                            'Petite Rivière de Nippes' => 'Petite Rivière de Nippes',
                            'Petit Trou de Nippes'     => 'Petit Trou de Nippes',
                            'Petite Rivière de l’Artibonite' => 'Petite Rivière de l’Artibonite',
                            'Plaine du Nord'  => 'Plaine du Nord',
                            'Plaisance'       => 'Plaisance',
                            'Pilate'          => 'Pilate',
                            'Pignon'          => 'Pignon',
                            'Pointe à Raquette' => 'Pointe à Raquette',
                            'Port à Piment'     => 'Port à Piment',
                            'Port-de-Paix'      => 'Port-de-Paix',
                            'Port-au-Prince'    => 'Port-au-Prince',
                            'Port-Margot'       => 'Port-Margot',
                            'Port-Salut'        => 'Port-Salut',
                            'Quartier Morin'    => 'Quartier Morin',
                            'Ranquitte'         => 'Ranquitte',
                            'Roseaux'           => 'Roseaux',
                            'Roche à Bateau'    => 'Roche à Bateau',
                            'Savanette'         => 'Savanette',
                            'Saut d’Eau'        => 'Saut d’Eau',
                            'Saint Louis du Nord' => 'Saint Louis du Nord',
                            'Saint Louis du Sud'  => 'Saint Louis du Sud',
                            'Saint Marc'          => 'Saint Marc',
                            'Saint Michel de l’Attalaye' => 'Saint Michel de l’Attalaye',
                            'Saint Michel du Sud'        => 'Saint Michel du Sud',
                            'Saint Raphaël'     => 'Saint Raphaël',
                            'Saint Suzanne'     => 'Saint Suzanne',
                            'Tabarre'           => 'Tabarre',
                            'Terre Neuve'       => 'Terre Neuve',
                            'Terrier Rouge'     => 'Terrier Rouge',
                            'Thomazeau'         => 'Thomazeau',
                            'Thomassique'       => 'Thomassique',
                            'Thomonde'          => 'Thomonde',
                            'Tiburon'           => 'Tiburon',
                            'Torbeck'           => 'Torbeck',
                            'Trou du Nord'      => 'Trou du Nord',
                            'Vallières'         => 'Vallières',
                            'Verrettes'         => 'Verrettes',
                        ]),
                    TextInput::make('address')->label("Adresse")
                        ->minLength(3)
                        ->maxLength(50),
                    TextInput::make('nationality')->label("Nationalité")
                        ->minLength(3)
                        ->maxLength(20),
                    TextInput::make('study_level')->label("Niveau d'étude")
                        ->minLength(5)
                        ->maxLength(50),
                    TextInput::make('last_school_enrolled')->label("Dernière étabalissement fréquenté")
                        ->minLength(5)
                        ->maxLength(50),
                    Select::make('type_blood')->label("Groupe sanguin")
                        ->options([
                            'O+' => 'O+',
                            'O-' => 'O-',
                            'A+' => 'A+',
                            'B+' => 'B-',
                            'AB+' => 'AB+',
                            'AB-' => 'AB-',
                        ]),
                    TextInput::make('full_name_person_in_charge')->label("Nom complet personne responsable")
                        ->minLength(3)
                        ->maxLength(50),
                    Select::make('sexe_person_in_charge')
                        ->options([
                            'Male' => 'Masculin',
                            'Female' => 'Feminin',
                            'Other' => 'Autre',
                        ])
                        ->label("Sexe"),
                    TextInput::make('telephone_person_in_charge')->tel()
                        ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                        ->minLength(8)
                        ->maxLength(12)
                        ->label("Téléphone personne responsable"),
                    TextInput::make('address_person_in_charge')->label("Adresse du personne responsable")
                        ->minLength(5)
                        ->maxLength(50),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('code')->searchable()->sortable()->label('Code Étudiant'),
                TextColumn::make('lastname')->searchable()->sortable()->label('Nom'),
                TextColumn::make('firstname')->searchable()->sortable()->label('Prénom'),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('gender')->searchable()->label("Sexe"),
                TextColumn::make('phone')->searchable()->sortable()->label("Numéro de téléphone"),
                TextColumn::make('date_of_birth')->searchable()->sortable()->dateTime('j M Y')->label("Date de naissance"),
                TextColumn::make('option.name')->searchable()->sortable(),
                TextColumn::make('created_at')->searchable()->dateTime('j M Y')->label('Date inscription'),
                TextColumn::make('place_of_birth')->searchable()->sortable()->label('Lieu de naissance'),
                TextColumn::make('address')->searchable()->sortable()->label('Adresse'),
                TextColumn::make('study_level')->searchable()->sortable()->label("Niveau d'édute"),
                TextColumn::make('nationality')->searchable()->sortable()->label('Nationalité'),
                TextColumn::make('last_school_enrolled')->searchable()->sortable()->label("Dernière étabalissement fréquenté"),
                TextColumn::make('type_blood')->searchable()->label("Groupe sanguin"),
                TextColumn::make('full_name_person_in_charge')->searchable()->sortable()->label("Nom complet personne responsable"),
                TextColumn::make('sexe_person_in_charge')->searchable()->sortable()->label("Sexe"),
                TextColumn::make('telephone_person_in_charge')->searchable()->label("Téléphone"),
                TextColumn::make('address_person_in_charge')->searchable()->sortable()->label("Adresse")
            ])
            ->filters([
                //
                // Filter::make('Date')
                // ->query(fn (Builder $query): Builder => $query->where('created_at', true)),
                SelectFilter::make('Option')->relationship('option', 'name'),

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
