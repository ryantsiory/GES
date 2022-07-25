<!DOCTYPE html>
<html>
<head>
    <style>
        .destinataire {
          text-align: right;
        }
        .signature{
            text-align: right;
        }
        </style>

    <title>Demande_Congé</title>
</head>
<body>
    <div class="emetteur">
        {{ $emetteur }} <br>
        {{ $adresse_em }}<br>
        {{ $codePostal_em }} {{ $ville_em }}<br>
        {{ $phone_em }}<br>
        {{ $email_em }}<br>
    </div>
    <br><br><br>
    <div class="destinataire">
        {{ $destinataire }} <br>
        {{ $responsable }}<br>
        {{ $adresse_dest }}<br>
        {{ $ville_dest }} {{ $codePostal_dest }}<br>
        {{ $phone_dest }}<br>
        {{ $email_dest }}<br>
    </div>
<br><br>
    <p>
        Courrier recommandé avec accusé de réception (pour tous les congés autres que congés payés)
    </p>
    <p>
        Objet : {{ $title }} <br><br>
        P.J. : (préciser les pièces justificatives éventuelles requises selon l’objet de votre demande : extrait de naissance…)

    </p>

    <p>
        Antananarivo, le {{ $date }}
    </p>

    <p>

        « Civilité » « titre » (ou « Madame, Monsieur »),
    </p>

    <p>

        Je tiens par la présente à vous informer de mon souhait de prendre un (des) congé(s) « nature du congé » pour la période allant du {{ $depart_date }} au {{ $retour_date }} inclus, soit « nombre » jours ouvrables / ouvrés (selon le mode de calcul en vigueur dans l’entreprise).
    <br><br>
        S’il s’agit d’une demande de congé pour {{ $motif }} :
        Conformément à l’application du Code du travail, ce congé  me permettra de célébrer mon mariage dont la cérémonie est prévue le « date ». Je vous adresserai dans les plus brefs délais un acte de mariage.
    </p>

    <p>
        Je vous remercie par avance de la bienveillance que vous porterez à ma demande, et vous saurais gré de bien vouloir m’informer de votre décision (à adapter selon que la demande de congé doive ou non faire l’objet d’une autorisation de l’employeur).
    <br><br>
        Dans cette attente, je vous prie d’agréer, « civilité » « titre » (ou « Madame, Monsieur »), l’expression de mes respectueuses salutations.
    </p>
    <br><br><br>
    <div class="signature">
            Signature
            <br>
            <br>
            <br>
            <br>
            <br>
            {{ $emetteur }}
    </div>

</body>
</html>
