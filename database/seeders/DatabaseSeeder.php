<?php

namespace Database\Seeders;

use App\Models\GuestBookEntry;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'test@example.com',
            'is_admin' => true,
        ]);

        User::factory()->forEachSequence(
            ['name' => 'AkseliKult'],
            ['name' => 'RoniRider22'],
            ['name' => 'Lumimarja83'],
            ['name' => 'Tunturilta'],
            ['name' => 'VilleVespa'],
            ['name' => 'Arska998'],
            ['name' => 'SinisorsaX'],
            ['name' => 'NinjaNick11'],
            ['name' => 'KaneliKissa'],
            ['name' => 'User', 'email' => 'user@example.com']
        )->create();

        $lines = [
            ['user_id' => 2, 'body' => 'Hei! Olen aivan innoissani löytäessäni tämän sivuston. Tämä aihe kiinnostaa minua suuresti. Kiitos, että olette luoneet tämän paikan keskustelulle. :)',],
            ['user_id' => 1, 'body' => 'Tervetuloa Vieraskirjaan! Hienoa kuulla, että sait iloa sivuistamme. Kerro rohkeasti ajatuksiasi tai kysy, jos jokin asia mietityttää.',],
            ['user_id' => 3, 'body' => 'LOL, en voi uskoa, että löysin tämän paikan! Onko täällä ketään muuta, joka fanittaa samaa asiaa kuin minä? :-D',],
            ['user_id' => 4, 'body' => 'Samat sanat! Olen seurannut näitä juttuja jo pidempään ja on mukavaa jakaa kiinnostuksen kohteet muiden kanssa. ICQ- tai AIM-yhteystiedot vaihdetaan, jos haluat jatkaa juttelua yksityisesti!',],
            ['user_id' => 2, 'body' => 'Voidaanko keskustella lisää aiheesta X? Minulla on pari kysymystä, ja arvostan teidän asiantuntemustanne!',],
            ['user_id' => 1, 'body' => 'Totta kai! Kerro, mitä haluat tietää, niin yritämme auttaa parhaamme mukaan.',],
            ['user_id' => 3, 'body' => 'Muuten, ajattelin mainita sen, että kuulin huhun uudesta ohjelmistopäivityksestä, joka on tulossa. Onko kukaan muu kuullut tästä? Teksasi?, ja irkataan!? ;)',],
            ['user_id' => 5, 'body' => 'Wow!!! Älä missaa tätä mahdollisuutta rikastua! Käy sivustollamme nyt ja ansaitse tuhansia dollareita KODISTASI käsin! Helppoa ja yksinkertaista! Klikkaa tästä [linkki] lisätietoja varten! Muista, että tämä EI ole huijaus – tuhannet ihmiset ovat jo hyötyneet! Tule mukaan heti!',],
        ];

        GuestBookEntry::factory()->forEachSequence(...$lines)->create();

    }
}
