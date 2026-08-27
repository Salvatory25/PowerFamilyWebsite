<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate or clean existing articles to refresh with new long-form guides
        Article::truncate();

        $articles = [
            [
                'title' => 'Mwongozo Kamili: Hatua kwa Hatua za Kupima Ardhi na Kupata Hati Miliki Tanzania',
                'slug' => 'mwongozo-kamili-hatua-za-kupima-ardhi-na-kupata-hati-miliki-tanzania',
                'excerpt' => 'Fahamu mchakato mzima wa kisheria na kiufundi wa kupima kiwanja au shamba lako kwa kutumia vifaa vya kisasa vya RTK GNSS, kuandaa Deed Plan, na kupata Hati ya Miaka 99 kutoka Wizara ya Ardhi.',
                'image_url' => '/images/blogs/survey-process.jpg',
                'published_at' => now()->subDays(2),
                'content' => '
                    <p class="lead text-lg text-slate-700 font-medium leading-relaxed mb-6">
                        Umiliki wa ardhi nchini Tanzania unaongozwa na Sheria ya Ardhi Na. 4 ya Mwaka 1999 (Land Act No. 4 of 1999) pamoja na Sheria ya Ardhi ya Vijiji Na. 5 ya Mwaka 1999. Ili ardhi yako iwe na usalama wa kisheria na thamani kamili ya kiuchumi, mchakato wa <strong>upimaji wa kitalaamu (Cadastral Land Surveying)</strong> na utoaji wa <strong>Hati Miliki (Certificate of Title)</strong> ni wa lazima.
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">1. Kwa Nini Upimaji wa Ardhi Ni Hatua ya Kwanza na ya Msingi?</h2>
                    <p class="mb-4">
                        Kununua au kumiliki ardhi bila kuipima kunaambatana na hatari kubwa za migogoro ya mipaka, kudhulumiwa na majirani, au kujenga ndani ya hifadhi za barabara na mifereji ya umma. Upimaji halisi unaofanywa na Kampuni iliyosajiliwa kama <strong>RELAND CONSULT LTD</strong> unakuhakikishia:
                    </p>
                    <ul class="list-disc pl-6 space-y-2 mb-6 text-slate-700">
                        <li><strong>Usahihi wa Mipaka (Coordinate Accuracy):</strong> Kutambua coordinates halisi za GPS za beacons zenye usahihi wa &plusmn;2cm.</li>
                        <li><strong>Ukubwa Halisi wa Eneo (Precise Acreage/SQM):</strong> Kujua ukubwa kamili kwa mita za mraba (SQM) au ekari bila makadirio ya macho.</li>
                        <li><strong>Utambuzi wa Kisheria Wizarani:</strong> Kupata mchoro uliosajiliwa (Approved Survey Plan) unaotambulika katika masjala ya ardhi ya taifa.</li>
                        <li><strong>Kuzuia Uingilianaji wa Mipaka (Zero Boundary Overlap):</strong> Uhakiki unaofanywa unahakikisha hakuna kiwanja kingine kilichopimwa ndani ya eneo lako.</li>
                    </ul>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">2. Hatua 5 Muhimu za Mchakato wa Upimaji Mpaka Kupata Hati</h2>
                    
                    <h3 class="text-xl font-bold text-[#16325c] mt-6 mb-2">Hatua ya 1: Upekuzi wa Awali na Ukaguzi wa Eneo (Site Reconnaissance)</h3>
                    <p class="mb-4">
                        Wapimaji hufanya ziara ya awali shambani kutambua alama zilizopo, kuangalia topografia, na kukutana na majirani wanaopakana na eneo hilo kwa ajili ya kupata ridhaa ya pamoja ya mipaka (Neighbor Boundary Consent).
                    </p>

                    <h3 class="text-xl font-bold text-[#16325c] mt-6 mb-2">Hatua ya 2: Upimaji wa Uwandani kwa Vifaa vya RTK GNSS GPS (Field Survey)</h3>
                    <p class="mb-4">
                        Kwa kutumia mitambo ya kisasa ya GNSS GPS na Total Stations, wataalamu hupanda <em>beacons za saruji za serikali</em> zenye pini za shaba katikati na kurekodi viwianishi vya kijiografia (Eastings na Northings) kwa mfumo wa UTM Arc 1960 au WGS84.
                    </p>

                    <h3 class="text-xl font-bold text-[#16325c] mt-6 mb-2">Hatua ya 3: Uhesabuji na Uandaaji wa Michoro ya Upimaji (Survey Computations)</h3>
                    <p class="mb-4">
                        Data zilizochukuliwa shambani huchakatwa ofisini kwa mifumo ya kijiografia (GIS & CAD) ili kuandaa <strong>Survey Plan</strong> inayowasilishwa kwa Mpimaji Mkuu wa Mkoa (Regional Surveyor) kwa ajili ya uhakiki na uidhinishaji.
                    </p>

                    <h3 class="text-xl font-bold text-[#16325c] mt-6 mb-2">Hatua ya 4: Utengenezaji wa Deed Plans (Mchoro wa Hati)</h3>
                    <p class="mb-4">
                        Baada ya Survey Plan kupitishwa wizarani, Deed Plan maalum ya kiwanja chako hutolewa ikiwa na namba rasmi ya kiwanja (Plot Number) na Kitalu (Block Number) na kugongwa mihuri ya Mkurugenzi wa Upimaji na Ramani wa Taifa.
                    </p>

                    <h3 class="text-xl font-bold text-[#16325c] mt-6 mb-2">Hatua ya 5: Usajili wa Hati Miliki (Title Registration)</h3>
                    <p class="mb-4">
                        Deed Plan pamoja na barua ya ofa (Letter of Offer), fomu za kisheria za tathmini ya kodi ya pango la ardhi, na stakabadhi za malipo huwasilishwa kwa Msajili wa Hati (Registrar of Titles) na hati halisi (Certificate of Title) hutolewa kwa mmiliki kwa umiliki wa miaka 33, 66 au 99.
                    </p>

                    <div class="my-8 p-6 bg-[#fbf6ea] border-l-4 border-[#c89a3b] rounded-r-2xl">
                        <h4 class="font-extrabold text-[#16325c] text-base mb-1">Ushauri wa Kitaalamu kutoka RELAND CONSULT:</h4>
                        <p class="text-sm text-slate-700">
                            Kamwe usilipe fedha za ununuzi wa ardhi kabla ya kufanya upekuzi (Search) na upimaji wa uhakiki. Wasiliana nasi kupitia ofisi zetu Arusha kwa namba <strong>+255 742 448 965</strong> ili wataalamu wetu waliosajiliwa wakusaidie kufanikisha mchakato huu kwa haraka na usalama 100%.
                        </p>
                    </div>
                ',
            ],
            [
                'title' => 'Urasimishaji wa Makazi: Jinsi ya Kugeuza Eneo Lisilopimwa Kuwa na Hati Rasmi',
                'slug' => 'urasimishaji-wa-makazi-jinsi-ya-kugeuza-eneo-kuwa-na-hati-rasmi',
                'excerpt' => 'Mfahamu mchakato wa kurasimisha makazi yasiyopangwa (Regularization), kuingizwa kwenye ramani ya Mipango Miji, kupata miundombinu ya barabara, na kupewa Hati Miliki.',
                'image_url' => '/images/blogs/formalization-guide.jpg',
                'published_at' => now()->subDays(6),
                'content' => '
                    <p class="lead text-lg text-slate-700 font-medium leading-relaxed mb-6">
                        Zaidi ya asilimia 60 ya makazi mijini nchini Tanzania yalianza kama makazi yasiyopangwa (Squatter / Unplanned settlements). Mpango wa Kitaifa wa <strong>Urasimishaji wa Makazi (Land Regularization Scheme)</strong> unalenga kuwasaidia wananchi wanaoishi katika maeneo haya kupata usalama wa miliki na kupanga miji yetu kisasa.
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">Urasimishaji wa Makazi Ni Nini?</h2>
                    <p class="mb-4">
                        Urasimishaji ni mchakato wa kisheria na kiufundi unaohusisha kutambua wamiliki wa ardhi, kupima maeneo yao, kuweka akiba ya barabara za mtaa, maeneo ya huduma za jamii (shule, vituo vya afya, masoko), na kisha kutoa Hati Miliki kwa kila mwenye kiwanja.
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">Faida Kubwa 4 za Kurasimisha Eneo Lako</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-6">
                        <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                            <span class="text-xs font-extrabold text-[#c89a3b] uppercase">01. Usalama wa Miliki</span>
                            <h4 class="font-bold text-base text-[#16325c] mt-1 mb-2">Kinga Dhidi ya Migogoro</h4>
                            <p class="text-xs text-slate-600">Unapata hati inayotambulika kisheria inayokulinda wewe na vizazi vyako dhidi ya kudhulumiwa au kuingiliwa mipaka.</p>
                        </div>
                        <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                            <span class="text-xs font-extrabold text-[#c89a3b] uppercase">02. Ongezeko la Thamani</span>
                            <h4 class="font-bold text-base text-[#16325c] mt-1 mb-2">Ardhi Kupanda Bei Mara 3</h4>
                            <p class="text-xs text-slate-600">Eneo lililorasimishwa na kupangiwa barabara hupanda thamani mara dufu ukilinganisha na eneo la uswazi lisilopimwa.</p>
                        </div>
                        <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                            <span class="text-xs font-extrabold text-[#c89a3b] uppercase">03. Mikopo ya Kibenki</span>
                            <h4 class="font-bold text-base text-[#16325c] mt-1 mb-2">Dhamana Rasmi ya Fedha</h4>
                            <p class="text-xs text-slate-600">Benki zote za biashara nchini zinakubali Hati ya Makazi kama dhamana thabiti ya kupata mikopo mikubwa ya kibiashara.</p>
                        </div>
                        <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                            <span class="text-xs font-extrabold text-[#c89a3b] uppercase">04. Miundombinu Bora</span>
                            <h4 class="font-bold text-base text-[#16325c] mt-1 mb-2">Huduma za Umma Kufika</h4>
                            <p class="text-xs text-slate-600">Ufunguzi wa barabara za mitaa (mita 6 hadi 9) huwezesha magari ya dharura (kama Zimamoto na Ambulance) na nguzo za umeme na maji kupita kwa urahisi.</p>
                        </div>
                    </div>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">Jinsi Kamati za Mitaa Zinavyofanya Kazi na Kampuni ya Upimaji</h2>
                    <p class="mb-4">
                        Mchakato wa urasimishaji hufanyika kwa ushirikiano wa karibu kati ya <strong>Kamati ya Urasimishaji ya Mtaa</strong>, <strong>Ofisi ya Mkurugenzi wa Halmashauri</strong>, na <strong>Kampuni ya Upimaji (kama RELAND)</strong>. Hatua hizo ni:
                    </p>
                    <ol class="list-decimal pl-6 space-y-2 mb-6 text-slate-700">
                        <li><strong>Mkutano Mkuu wa Wananchi:</strong> Wananchi wanakubaliana kwa pamoja kuanza mradi na kuchagua kamati ya uongozi.</li>
                        <li><strong>Upigaji Picha za Angani na Upimaji Awali:</strong> Matumizi ya ndege zisizo na rubani (Drones) kutengeneza picha za ramani ya msingi (Base Map).</li>
                        <li><strong>Utambuzi wa Wamiliki na Mipaka:</strong> Kutembea kiwanja kwa kiwanja na majirani kubainisha mipaka halisi.</li>
                        <li><strong>Uandaaji wa Mchoro wa Mipango Miji (Town Planning Layout):</strong> Wataalamu wa Mipango Miji wanapanga barabara na maeneo ya wazi.</li>
                        <li><strong>Kupanda Beacons na Kutoa Hati:</strong> Upandaji wa beacons za serikali na uwasilishaji wa faili wizarani kwa ajili ya kutoa Hati Miliki.</li>
                    </ol>
                ',
            ],
            [
                'title' => 'Mbinu 7 za Kuepuka Matapeli Wakati wa Kununua Kiwanja au Shamba',
                'slug' => 'mbinu-7-za-kuepuka-matapeli-wakati-wa-kununua-kiwanja',
                'excerpt' => 'Mwongozo wa kiusalama kwa wanunuzi wa viwanja Tanzania. Jinsi ya kufanya upekuzi (Search), kukagua beacons, na kuhakikisha unanunua ardhi isiyo na mgogoro.',
                'image_url' => '/images/blogs/title-deed-importance.jpg',
                'published_at' => now()->subDays(12),
                'content' => '
                    <p class="lead text-lg text-slate-700 font-medium leading-relaxed mb-6">
                        Sekta ya ardhi na ujenzi imekuwa ikikabiliwa na changamoto ya matapeli wanaouza kiwanja kimoja kwa watu zaidi ya watatu, kughushi mikataba ya mauziano, au kuuza maeneo ya hifadhi za serikali. Ukizingatia mbinu hizi 7, utalinda fedha zako na kuhakikisha unamiliki ardhi safi.
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">1. Fanya Upekuzi Rasmi Wizarani (Official Land Search)</h2>
                    <p class="mb-4">
                        Kama kiwanja kina Hati Miliki au namba ya upimaji, omba nakala ya Hati au Deed Plan na ufanye <strong>Official Search</strong> kwenye Masjala ya Ardhi ya Kanda au Manispaa. Hii itathibitisha kama muuzaji ndiye mmiliki halisi, na kama hati hiyo haijawekwa rehani benki (Mortgage) au kuzuiwa na mahakama (Caveat).
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">2. Kagua Beacons na Mipaka Uwandani na Mpimaji</h2>
                    <p class="mb-4">
                        Usinunue kiwanja kwa kuonyeshwa kwa kidole na dalali! Nenda shambani ukiwa na <strong>Mpimaji wa Ardhi aliyesajiliwa (Registered Surveyor)</strong>. Mpimaji atatumia GPS kuhakiki kama beacons zilizopo ardhini zinalingana 100% na viwianishi vilivyopo kwenye mchoro wa serikali.
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">3. Shirikisha Majirani Wanaopakana na Eneo</h2>
                    <p class="mb-4">
                        Majirani ndio walinzi wa kwanza wa taarifa za eneo hilo. Uliza majirani wa pande zote nne: Je, eneo hili lina mgogoro wa kifamilia au mirathi? Je, huyu anayeuza ndiye mwenye uhalali wa kuuza?
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">4. Tembelea Ofisi ya Serikali ya Mtaa / Kijiji</h2>
                    <p class="mb-4">
                        Mwenyekiti wa Mtaa na Mtendaji wana daftari la wamiliki wa ardhi katika eneo lao. Hakikisha wanamtambua muuzaji na wanathibitisha kuwa eneo halina mashauri yoyote yanayosubiri usuluhishi.
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">5. Andaa Mkataba wa Mauziano Mbele ya Wakili</h2>
                    <p class="mb-4">
                        Epuka mikataba ya kuandikishana kwenye karatasi ya kawaida bila ushuhuda wa kisheria. Mkataba unapaswa kuandaliwa na Wakili aliyesajiliwa (Advocate of the High Court), uwe na picha za pande zote mbili, namba za NIDA, na ushuhuda wa mashahidi halali.
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">6. Fanya Malipo Kupitia Benki (Bank Transfer)</h2>
                    <p class="mb-4">
                        Kamwe usilipe pesa taslimu (Cash mkononi). Fanya malipo kupitia akaunti ya benki ya mmiliki halisi ili uwe na ushahidi usiopingika wa kielektroniki wa muamala (Bank Audit Trail).
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">7. Anza Mara Moja Mchakato wa Kubadili Jina (Transfer of Title)</h2>
                    <p class="mb-4">
                        Mara tu baada ya kukamilisha ununuzi, wasilisha maombi ya kubadili umiliki (Transfer of Title) kwenye ofisi ya ardhi ili Hati itolewe kwa jina lako moja kwa moja.
                    </p>
                ',
            ],
            [
                'title' => 'Ugawaji wa Viwanja (Subdivision Schemes): Utaratibu wa Kugawa Shamba na Kuuza Viwanja Bila Migogoro',
                'slug' => 'ugawaji-wa-viwanja-subdivision-schemes-utaratibu-wa-kugawa-shamba',
                'excerpt' => 'Una shamba kubwa unataka kuligawa katika viwanja vidogo vya kuuza? Fahamu kanuni za Mipango Miji, akiba za barabara, na namna ya kuandaa Subdivision Scheme iliyoidhinishwa.',
                'image_url' => '/images/blogs/plot-subdivision-scheme.jpg',
                'published_at' => now()->subDays(18),
                'content' => '
                    <p class="lead text-lg text-slate-700 font-medium leading-relaxed mb-6">
                        Uwekezaji wa kugawa mashamba makubwa (Acreage Land Subdivision) na kuuza viwanja vidogo vya makazi au biashara ni mojawapo ya biashara zenye faida kubwa zaidi nchini Tanzania. Hata hivyo, kugawa shamba kienyeji bila kufuata taratibu za <strong>Subdivision Scheme</strong> ni kosa la kisheria na husababisha migogoro mikubwa na wanunuzi.
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">Sheria ya Mipango Miji Inasemaje Kuhusu Ugawaji wa Ardhi?</h2>
                    <p class="mb-4">
                        Kwa mujibu wa Sheria ya Mipango Miji Na. 8 ya Mwaka 2007 (Urban Planning Act, 2007), huwezi kugawa eneo lolote la ardhi na kuliuza bila kupata kibali cha Mamlaka ya Mipango Miji ya Halmashauri na Wizara ya Ardhi.
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">Kanuni Muhimu za Kuzingatia Wakati wa Kugawa Viwanja</h2>
                    <ul class="list-disc pl-6 space-y-3 mb-6 text-slate-700">
                        <li><strong>Upana wa Barabara za Ndani (Access Roads):</strong> Barabara za ndani za makazi zinapaswa kuwa na upana wa angalau <em>mita 9 hadi mita 12</em>, na barabara kuu za kuunganisha mitaa (Collector roads) ziwe <em>mita 15 hadi 20</em>.</li>
                        <li><strong>Ukubwa wa Chini wa Kiwanja (Minimum Plot Size):</strong> Kulingana na ukanda wa makazi (Low Density, Medium Density, au High Density), kiwanja cha chini kinapaswa kukidhi ukubwa uliowekwa na kanuni za serikali za mtaa (k.m. angalau 400 SQM hadi 1,000+ SQM).</li>
                        <li><strong>Maeneo ya Wazi na Huduma za Jamii (Public Open Spaces):</strong> Kwa miradi mikubwa yenye zaidi ya viwanja 20, lazima kutenga maeneo ya wazi kwa ajili ya michezo ya watoto, maeneo ya ibada, na huduma za afya.</li>
                    </ul>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">Hatua kwa Hatua: Jinsi RELAND Inavyosimamia Mradi wa Ugawaji</h2>
                    <ol class="list-decimal pl-6 space-y-3 mb-6 text-slate-700">
                        <li><strong>Upimaji wa Mzunguko Mzima (Perimeter Cadastral Survey):</strong> Kupima mipaka ya nje ya shamba lote kuhakikisha ukubwa kamili na kuthibitisha hati asili.</li>
                        <li><strong>Sanifu ya Mchoro wa Ugawaji (Town Planning Layout Design):</strong> Wahandisi wetu wanachora mpangilio wa viwanja kwa kompyuta ili kutumia ardhi kwa ufanisi wa juu na kuacha barabara zilizonyooka.</li>
                        <li><strong>Uwasilishaji na Vibali vya Kamati ya Mipango Miji:</strong> Kuwasilisha michoro kwenye Halmashauri husika na Wizara ya Ardhi kupata idhini rasmi.</li>
                        <li><strong>Upandaji wa Beacons za Kila Kiwanja:</strong> Kupanda beacons za saruji za serikali kwa kila kiwanja kilichogawiwa.</li>
                        <li><strong>Utoaji wa Deed Plans za Kila Kiwanja:</strong> Kila kiwanja kinapata Deed Plan yake binafsi tayari kwa ajili ya kupewa hati na kuuzwa kwa mnunuzi.</li>
                    </ol>
                ',
            ],
            [
                'title' => 'Migogoro ya Mipaka ya Ardhi: Jinsi ya Kuitatua Kisheria kwa Kutumia Upimaji Halisi',
                'slug' => 'migogoro-ya-mipaka-ya-ardhi-jinsi-ya-kuitatua-kisheria',
                'excerpt' => 'Beacons ziking\'olewa au jirani akijenga ndani ya eneo lako, ufanyeje? Jifunze utaratibu wa kisheria wa Boundary Re-establishment na masjala ya ardhi.',
                'image_url' => '/images/blogs/boundary-disputes.jpg',
                'published_at' => now()->subDays(24),
                'content' => '
                    <p class="lead text-lg text-slate-700 font-medium leading-relaxed mb-6">
                        Mgogoro wa mipaka ni mojawapo ya migogoro inayochukua muda mrefu na kupoteza fedha nyingi mahakamani. Sababu kuu za migogoro hii ni kung\'oka kwa beacons za zamani, ujenzi usiofuata vipimo, au mauziano ya makadirio. Hata hivyo, sayansi ya upimaji wa ardhi inatoa suluhisho la kudumu la kisayansi na kisheria.
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">Nini Kinafanyika Beacons Zikipotea au Kung\'olewa?</h2>
                    <p class="mb-4">
                        Kila upimaji unaofanyika kihalali huwekwa kwenye kumbukumbu za kudumu za <strong>Survey Records & Field Notes</strong> za Wizara ya Ardhi. Hata beacon iking\'olewa ardhini, viwianishi vyake vya kijiografia (Coordinates) haviwezi kufutika.
                    </p>
                    <p class="mb-4">
                        Mpimaji Mweledi aliyesajiliwa kutoka <strong>RELAND</strong> anachukua data za asili kutoka wizarani na kutumia kifaa cha GNSS GPS kurejesha beacon mahali pake halisi (Boundary Re-establishment) kwa usahihi wa sentimita 1 hadi 2.
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">Hatua 4 za Kisheria za Kutatua Mgogoro wa Mipaka</h2>
                    <ol class="list-decimal pl-6 space-y-3 mb-6 text-slate-700">
                        <li><strong>Kuitisha Uhakiki wa Pamoja wa Mpimaji (Joint Survey Verification):</strong> Pande zote mbili zinazohusika zinakutana shambani zikiwa na mpimaji aliyesajiliwa na viongozi wa mtaa kuhakiki mipaka mbele ya mashahidi.</li>
                        <li><strong>Utoaji wa Ripoti ya Kitaalamu ya Upimaji (Surveyor Report):</strong> Mpimaji anaandaa ripoti rasmi inayoonyesha kama kuna muingiliano (Encroachment) na kiwango halisi cha mita zilizoingiliwa.</li>
                        <li><strong>Usuluhishi wa Kijamii (Alternative Dispute Resolution):</strong> Kurekebisha mipaka au kulipa fidia ya eneo lililoingiliwa kwa maelewano ya pande zote mbele ya serikali ya mtaa.</li>
                        <li><strong>Mabaraza ya Ardhi ya Wilaya na Mahakama:</strong> Ikiwa maelewano yatashindikana, ripoti ya mpimaji hutumika kama ushahidi mkuu usiopingika katika Baraza la Ardhi la Wilaya (District Land and Housing Tribunal).</li>
                    </ol>
                ',
            ],
            [
                'title' => 'Teknolojia ya Kisasa katika Upimaji: Faida za RTK GNSS GPS na Ndege Zisizo na Rubani (Drones)',
                'slug' => 'teknolojia-ya-kisasa-katika-upimaji-rtk-gnss-gps-na-drones',
                'excerpt' => 'Gundua jinsi teknolojia ya satelaiti ya RTK na upigaji picha wa anga kwa drones inavyoongeza kasi, usahihi, na kupunguza gharama za upimaji wa mashamba makubwa.',
                'image_url' => '/images/blogs/drone-survey-tech.jpg',
                'published_at' => now()->subDays(30),
                'content' => '
                    <p class="lead text-lg text-slate-700 font-medium leading-relaxed mb-6">
                        Zama za kutumia kamba za kupimia (measuring tapes) na vifaa vya zamani vya macho zimepitwa na wakati. Sekta ya upimaji wa ardhi nchini Tanzania sasa inatumia teknolojia ya kisasa zaidi ya satelaiti na picha za anga zenye mchanganuo wa hali ya juu (Photogrammetry).
                    </p>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">1. Teknolojia ya RTK GNSS (Real-Time Kinematic)</h2>
                    <p class="mb-4">
                        Vifaa vya RTK GNSS vinavyotumiwa na <strong>RELAND CONSULT LTD</strong> vinaunganishwa moja kwa moja na satelaiti za GPS (Marekani), GLONASS (Urusi), Galileo (Ulaya), na BeiDou (China). Faida zake ni pamoja na:
                    </p>
                    <ul class="list-disc pl-6 space-y-2 mb-6 text-slate-700">
                        <li><strong>Usahihi wa Kiwango cha Sentimita:</strong> Kurekodi viwianishi kwa usahihi usiozidi sentimita 2 (&plusmn;2cm).</li>
                        <li><strong>Kasi ya Juu Uwandani:</strong> Upimaji wa shamba la ekari 50 unaweza kukamilika ndani ya siku moja badala ya wiki nzima.</li>
                        <li><strong>Upatikanaji wa Data Papo Hapo:</strong> Taarifa zinatumwa kidigitali ofisini kwa ajili ya uchakataji wa haraka.</li>
                    </ul>

                    <h2 class="text-2xl font-black text-[#16325c] mt-8 mb-4 border-l-4 border-[#c89a3b] pl-3">2. Upimaji wa Angani kwa Drones (UAV Drone Mapping)</h2>
                    <p class="mb-4">
                        Ndege zisizo na rubani (Drones) zimeleta mapinduzi makubwa hasa katika miradi mikubwa ya urasimishaji wa miji, upimaji wa migodi, na mashamba ya kilimo:
                    </p>
                    <ul class="list-disc pl-6 space-y-2 mb-6 text-slate-700">
                        <li><strong>Picha za Juu zenye Mchoro Halisi (High-Resolution Orthomosaic):</strong> Picha za angani zinazoonyesha kila nyumba, mti, barabara na mifereji kwa uwazi mkubwa.</li>
                        <li><strong>Modeli za 3D za Mandhari (3D Elevation Models - DEM):</strong> Kujua mwinuko na miinuko ya ardhi kwa ajili ya usanifu wa mifereji ya maji ya mvua na barabara.</li>
                        <li><strong>Kupunguza Gharama za Wananchi:</strong> Urasimishaji wa mtaa mzima unaweza kufanyika kwa gharama nafuu zaidi kwa kutumia picha za drone.</li>
                    </ul>

                    <div class="my-8 p-6 bg-[#16325c] text-white rounded-2xl">
                        <h4 class="font-extrabold text-[#dfb256] text-base mb-2">Unahitaji Upimaji wa Kisasa kwa Kiwanja au Shamba Lako?</h4>
                        <p class="text-sm text-slate-200">
                            RELAND CONSULT LTD inatumia mitambo ya kisasa zaidi ya RTK GNSS na Drones kwa wateja binafsi, taasisi, na halmashauri kote Arusha na Kanda ya Kaskazini. Wasiliana nasi leo upate huduma yenye ubora na uthibitisho wa kisheria.
                        </p>
                    </div>
                ',
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
