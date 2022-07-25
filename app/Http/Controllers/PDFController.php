<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = [

            'emetteur' => 'Kylian Mbappe',
            'adresse_em' => 'Lot IV 5 Tanjombato',
            'codePostal_em' => '101',
            'ville_em'=>'Antananarivo',
            'phone_em' => '+261 34 00 000 00',
            'email_em' => 'kylianmbappe@edf.com',

            'destinataire' => 'Canal+ Madagascar',
            'responsable' => 'Madame des Ressources Humaine',
            'adresse_dest' => 'Zone Galaxy Andraharo Cube B 3e étage',
            'ville_dest'=>'Antananarivo',
            'codePostal_dest' => '101',
            'phone_dest' => '+020 22 00 000 00',
            'email_dest' => 'canalplusmada@edf.com',


            'title' => 'Demande de congé',
            'date' => now()->format('d/m/Y'),
            'motif' => 'Voyages',
            'depart_date' => date('m/d/Y'),
            'retour_date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('demande_conge.pdf');
    }
}
