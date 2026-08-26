<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Upimaji wa Ardhi ni Nini?',
                'slug' => 'upimaji-wa-ardhi-ni-nini',
                'excerpt' => 'Fahamu maana ya upimaji wa ardhi, faida zake, na kwa nini ni hatua muhimu kabla ya kuanza ujenzi au kuuza kiwanja chako.',
                'content' => '<p>Upimaji wa ardhi ni mchakato wa kitaalamu wa kubainisha mipaka halisi ya kipande cha ardhi kwa kutumia vipimo na alama (beacons). Mchakato huu hufanywa na wapimaji waliosajiliwa na kuidhinishwa na Wizara ya Ardhi.</p><p>Kupima ardhi yako kuna faida nyingi, ikiwemo kuondoa migogoro ya mipaka, kuongeza thamani ya ardhi, na kukuwezesha kupata hati miliki.</p>',
                'image_url' => 'https://images.unsplash.com/photo-1544377193-33dcf4d68fb5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Umuhimu wa Kuwa na Hati Miliki',
                'slug' => 'umuhimu-wa-kuwa-na-hati-miliki',
                'excerpt' => 'Hati miliki ni nyaraka muhimu sana kwa mmiliki yeyote wa ardhi. Jifunze faida zake na jinsi ya kuanza mchakato wa kuipata.',
                'content' => '<p>Hati miliki ya ardhi inakupa haki ya kisheria ya kumiliki na kutumia ardhi yako. Inakulinda dhidi ya matapeli na migogoro.</p><p>Pia, ukiwa na hati miliki, unaweza kuitumia kama dhamana benki kupata mkopo wa kuendeleza biashara au ujenzi.</p>',
                'image_url' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Mambo ya Kuzingatia Kabla ya Kununua Kiwanja',
                'slug' => 'mambo-ya-kuzingatia-kabla-ya-kununua-kiwanja',
                'excerpt' => 'Usinunue kiwanja kabla ya kujua mambo haya muhimu ili kuepuka matapeli na kununua eneo lenye mgogoro.',
                'content' => '<p>Kununua kiwanja ni uwekezaji mkubwa. Kabla ya kutoa fedha, hakikisha umefanya "official search" (Upekuzi) wizarani au manispaa kujua mmiliki halali.</p><p>Pia hakikisha unapata mkataba wa mauziano unaotambulika kisheria, na shirikisha ofisi ya serikali ya mtaa.</p>',
                'image_url' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'published_at' => now()->subDays(15),
            ],
            [
                'title' => 'Tofauti Kati ya Eneo Lililopimwa na Ambalo Halijapimwa',
                'slug' => 'tofauti-kati-ya-eneo-lililopimwa-na-ambalo-halijapimwa',
                'excerpt' => 'Fahamu utofauti uliopo kisheria na kithamani kati ya viwanja vilivyopimwa na viwanja vya squatter (visivyopimwa).',
                'content' => '<p>Kiwanja kilichopimwa (surveyed plot) kina mipaka inayotambulika kisheria na kipo kwenye mipango miji. Kina thamani kubwa na ni rahisi kuuzwa au kuwekewa dhamana.</p><p>Eneo lisilopimwa (squatter) halitambuliki rasmi katika ramani ya mipango miji na lina hatari kubwa ya migogoro ya mipaka.</p>',
                'image_url' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Jinsi ya Kurasimisha Makazi Yako',
                'slug' => 'jinsi-ya-kurasimisha-makazi-yako',
                'excerpt' => 'Mwongozo kamili wa hatua kwa hatua wa jinsi ya kurasimisha makazi (formalization) kwenye maeneo yasiyopimwa.',
                'content' => '<p>Urasimishaji ni utaratibu wa serikali kutambua maeneo yaliyojengwa bila kupimwa na kuyapatia hadhi ya kisheria.</p><p>Hatua zinajumuisha utambuzi kupitia kamati za mitaa, upimaji shirikishi, upangaji wa matumizi ya ardhi, na hatimaye utoaji wa Leseni za Makazi au Hati.</p>',
                'image_url' => 'https://images.unsplash.com/photo-1449844908441-8829872d2607?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'published_at' => now()->subDays(25),
            ],
        ];

        foreach ($articles as $article) {
            \App\Models\Article::create($article);
        }
    }
}
