<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;
use App\Models\User;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmes = Programme::all();
        return view('programmes.index', compact('programmes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $programme = Programme::findOrFail($id);
        $programme->delete();
        return redirect('/')->with('Success', 'l\'ultisateur a bien été supprimer');
    }

    public function genererProgramme()
    {
        $horaires = ['7h00-14h00', '14h-19h30', '19h30-7h00'];
        $jourDeLaSemaines = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $users = User::all();
        $indexUser = 0;
        $indexHoraire = 0;

        $nbusers = count($users);
        $nbJourDeLaSemaine = count($jourDeLaSemaines);

        foreach ($jourDeLaSemaines as $jourDeLaSemaine) {

            $user = $users[$indexUser];
            $horaire = $horaires[$indexHoraire];

            $programme1 = Programme::firstOrNew([
                'horaire_id' => $horaire,
                'jour_de_la_semaine_id' => $jourDeLaSemaine,
            ]);

            $programme1->user_id = $user->id;
            $programme1->save();

            $indexUser = ($indexUser + 1) % $nbusers;


            $indexHoraire = $indexHoraire + 1;

            $horaire2 = $horaires[$indexHoraire];
            $user = $user[$indexUser];

            $programme2 = Programme::firstOrNew([
                'horaire_id' => $horaire2,
                'jour_de_la_semaine_id' => $jourDeLaSemaine,
            ]);

            $programme2->user_id = $user->id;
            $programme2->save();

            $indexHoraire = $indexHoraire + 1;
            $indexUser = ($indexUser + 1) % $nbusers;
            $horaire3 = $horaires[$indexHoraire];
            $user = $user[$indexUser];

            $programme3 = Programme::firstOrNew([
                'horaire_id' => $horaire3,
                'jour_de_la_semaine_id' => $jourDeLaSemaine,
            ]);
            $programme3->user_id = $user->id;
            $programme3->save();

            $indexUser = ($indexUser + 1) % $nbusers;
            $user = $user[$indexUser];
            $programme4 = Programme::firstOrNew([
                'horaire_id' => $horaire3,
                'jour_de_la_semaine_id' => $jourDeLaSemaine,
            ]);

            $programme4->user_id = $user->id;
            $programme4->save();
        }
    }



    private function createProgramme($jour, $horaire, $user)
    {
        return Programme::firstOrNew([
            'horaire_id' => $horaire,
            'jour_de_la_semaine_id' => $jour,
        ])->fill(['user_id' => $user->id])->save();
    }

    public function genererProgramme()
    {
        $horaires = ['7h00-14h00', '14h-19h30', '19h30-7h00'];
        $joursDeLaSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $users = User::all();
        $nbUsers = count($users);

        foreach ($joursDeLaSemaine as $jour) {
            for ($i = 0; $i < count($horaires); $i++) {
                $user = $users[$i % $nbUsers];
                $horaire = $horaires[$i];

                $this->createProgramme($jour, $horaire, $user);
            }
        }
    }
}