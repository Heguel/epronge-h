<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\NewEnrollEvent;
use RealRashid\SweetAlert\Facades\Alert;

class NewEnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inscriptionFunc()
    {
        //all options that come from the database
        $options = Option::all();
        // table of type blood for using in NewEnrollController for selecting
        $type_bloods = [
            'O+'  => 'O+',
            'O-'  => 'O-',
            'A+'  => 'A+',
            'B+'  => 'B-',
            'AB+' => 'AB+',
            'AB-' => 'AB-',
        ];
        // table of place of birth for using in NewEnrollController for selecting
        $place_of_births =[
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
            'Verrettes'         => 'Verrettes',
            'Vallières'         => 'Vallières',
        ];

        return view('frontend.enroll.create_enroll', compact([
            'options', 'place_of_births', 'type_bloods'
        ]));
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        /*

'phone' => 'required|unique:enrolls,phone',
        'email' => 'required|unique:enrolls,email'
        */
        $validatedData = $request->validate([
            'lastname' => 'required|string|min:3|max:30',
            'firstname' => 'required|string|min:3|max:30',
            'gender' => 'required|in:Female,Male',
            'phone' => 'required|string|min:8|max:12|unique:enrolls,phone',
            'email' => 'nullable|email|unique:enrolls,email',
            'date_of_birth' => 'required|date|before:-12 years',
            'option_id' => 'required|exists:options,id',
            'place_of_birth' => 'nullable|string',
            'address' => 'nullable|string|min:5|max:50',
            'nationality' => 'nullable|string|min:3|max:20',
            'study_level' => 'nullable|string|min:5|max:50',
            'last_school_enrolled' => 'nullable|string|min:5|max:50',
            'type_blood' => 'nullable|string',
            'full_name_person_in_charge' => 'nullable|string|min:5|max:50',
            'sexe_person_in_charge' => 'nullable|in:Female,Male',
            'telephone_person_in_charge' => 'nullable|string|min:8|max:12',
            'address_person_in_charge' => 'nullable|string|min:5|max:50',
        ]);

        // Generate code before inserting
        $code = Str::upper(substr($validatedData['lastname'], 0, 1) . substr($validatedData['firstname'], 0, 1) . "-" . mt_rand(100000, 999999));
        $validatedData['code'] = $code;


        // Save the enroll in the database
        if ($validatedData) {
            $newEnr = Enroll::create($validatedData);
            Alert::success('event-success-create-enroll', 'Inscription reussie!<br/> Veuillez conservez votre code pour valider votre inscription à l\'administration:<br/><br/> Code: ' . $newEnr->code);
            event('event-success-create-enroll', $newEnr);

            return redirect()->route('newEnroll.form')->with([
                'success' => 'Inscription reussie!',
                'info' => 'Veuillez conservez votre code pour valider votre inscription à l\'administration:\n Code: ' . $newEnr->code,
            ]);
        } else {
            return redirect()->route('newEnroll.form')->with('error', 'Quelque chose s\'est mal passé!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
