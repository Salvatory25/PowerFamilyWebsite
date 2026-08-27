<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Define the 6 primary services of RELAND
     */
    public static function getServicesList(): array
    {
        return [
            'land-surveying' => [
                'slug' => 'land-surveying',
                'aliases' => ['upimaji-wa-ardhi'],
                'icon' => 'surveying',
                'title_en' => 'Land Surveying (Upimaji wa Ardhi)',
                'title_sw' => 'Upimaji wa Ardhi (Cadastral & Topographical)',
                'subtitle_en' => 'Precision boundary surveying, RTK GPS beacon pegging, and official Ministry-approved Deed Plans.',
                'subtitle_sw' => 'Upimaji wa kisasa wa kijiografia, uwekaji wa beacons na kuandaa ramani rasmi za upimaji (Deed Plan).',
                'badge_en' => 'Cadastral & Topographical',
                'badge_sw' => 'Upimaji wa Kina & Beacons',
                'hero_image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1600&q=80',
                'whatsapp_topic' => 'Land Surveying / Upimaji wa Ardhi',
                'overview_en' => 'RELAND delivers licensed cadastral and engineering land surveying solutions in Arusha and northern Tanzania. Utilizing high-precision RTK GNSS receivers, Electronic Total Stations, and GIS processing software, our registered land surveyors accurately establish physical boundary lines, recover lost corner beacons, and produce Ministry-compliant survey plans.',
                'overview_sw' => 'RELAND inatoa huduma za kitaalamu za upimaji wa ardhi (Cadastral & Topographical Surveying) jijini Arusha na kanda ya kaskazini. Kwa kutumia vifaa vya kisasa vya RTK GNSS na Total Station, wapimaji wetu waliosajiliwa wanapima mipaka kwa usahihi wa kiwango cha juu na kuandaa ramani zilizoidhinishwa na Wizara ya Ardhi.',
                'deliverables_en' => [
                    'Boundary beacon relocation, verification, and concrete monumentation',
                    'Cadastral survey for new title deed processing',
                    'Topographical contour surveys and digital elevation models (DEM)',
                    'Preparation of official Deed Plans (Ramani za Upimaji)',
                    'Engineering surveys for roads, construction, and utilities alignment',
                    'GIS mapping and spatial boundary data integration'
                ],
                'deliverables_sw' => [
                    'Ukaguzi, uhakiki na uwekaji wa beacons mpya za zege',
                    'Upimaji rasmi kwa ajili ya kuandaa Hati Miliki',
                    'Upimaji wa mwinuko na mandhari ya ardhi (Topographical Surveys)',
                    'Uandaaji wa ramani zilizoidhinishwa (Approved Deed Plans)',
                    'Upimaji wa miundombinu ya barabara, ujenzi na mifereji',
                    'Ramani za kisasa za kijiografia (GIS Maps)'
                ],
                'process_en' => [
                    ['step' => '01', 'title' => 'Consultation & Cadastral Search', 'desc' => 'We examine your title deed, letter of offer, or village documentation and perform official cadastral searches at the Arusha Lands registry.'],
                    ['step' => '02', 'title' => 'Field GNSS / RTK Survey', 'desc' => 'Our certified surveyors deploy to the site with millimeter-accurate GPS and Total Station equipment to capture precise boundary coordinates.'],
                    ['step' => '03', 'title' => 'Beacon Pegging & Monumentation', 'desc' => 'We physically install and verify standard cadastral boundary beacons in presence of neighbors and local leaders.'],
                    ['step' => '04', 'title' => 'Computation & Ministry Approval', 'desc' => 'We compile survey data, produce Deed Plans, and process official approvals through the Ministry of Lands surveying directorate.']
                ],
                'process_sw' => [
                    ['step' => '01', 'title' => 'Ushauri & Ukaguzi wa Kumbukumbu', 'desc' => 'Tunaanza kwa kukagua nyaraka zako na kufanya ukaguzi kwenye kumbukumbu rasmi za ramani Wizara ya Ardhi.'],
                    ['step' => '02', 'title' => 'Upimaji wa Shamba kwa RTK GPS', 'desc' => 'Wataalamu wetu wanafika eneo la mradi na kupima mipaka yote kwa kutumia vifaa vya kiwango cha juu cha GPS na Total Station.'],
                    ['step' => '03', 'title' => 'Uwekaji wa Beacons & Ushuhuda', 'desc' => 'Tunaweka vigingi na beacons rasmi za zege mbele ya wajumbe wa serikali ya mtaa na majirani wa eneo.'],
                    ['step' => '04', 'title' => 'Uidhinishaji wa Ramani Wizarani', 'desc' => 'Tunaandaa na kuwasilisha ramani rasmi za upimaji (Deed Plans) kwa ajili ya kusajiliwa na Mkurugenzi wa Upimaji wa Ardhi.']
                ],
                'faqs' => [
                    [
                        'q_en' => 'Why do I need a cadastral land survey before building or buying?',
                        'a_en' => 'A cadastral survey ensures that you are building strictly within your legal property boundaries and verifies that the seller actually owns the exact dimensions described in the documentation.',
                        'q_sw' => 'Kwanini ninahitaji kupima ardhi kabla ya kujenga au kununua?',
                        'a_sw' => 'Upimaji unakuhakikishia kuwa unajenga ndani ya mipaka yako halali na kukulinda dhidi ya migogoro ya kuingiliana na majirani au kununua eneo hewa.'
                    ],
                    [
                        'q_en' => 'How long does beacon relocation or boundary survey take in Arusha?',
                        'a_en' => 'Field survey and beacon re-establishment typically takes 1-3 business days depending on terrain size, with official Deed Plan computations completed within 1-2 weeks.',
                        'q_sw' => 'Upimaji na uwekaji wa beacons unachukua muda gani Arusha?',
                        'a_sw' => 'Upimaji shambani unachukua siku 1 hadi 3, na ukamilishaji wa mahesabu ya ramani unachukua wiki 1 hadi 2.'
                    ]
                ]
            ],

            'land-formalization' => [
                'slug' => 'land-formalization',
                'aliases' => ['urasimishaji-wa-ardhi'],
                'icon' => 'formalization',
                'title_en' => 'Land Formalization (Urasimishaji wa Ardhi)',
                'title_sw' => 'Urasimishaji wa Makazi & Hati Miliki',
                'subtitle_en' => 'Transforming unplanned settlements and customary land holdings into legally recognized, title-deeded properties.',
                'subtitle_sw' => 'Kurasimisha makazi yasiyopangwa na mashamba ya asili ili kupata Hati Miliki halali za kiserikali.',
                'badge_en' => 'Settlement Regularization',
                'badge_sw' => 'Urasimishaji Makazi',
                'hero_image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb18086f6?auto=format&fit=crop&w=1600&q=80',
                'whatsapp_topic' => 'Land Formalization / Urasimishaji wa Ardhi',
                'overview_en' => 'Land Formalization (Urasimishaji) is a critical legal and urban planning initiative in Tanzania that converts customary or unplanned properties into formally surveyed plots with secure Certificate of Customary Rights of Occupancy (CCRO) or long-term Title Deeds (Hati Miliki). RELAND facilitates complete formalization schemes for individuals, neighborhoods, and community landholders across Arusha.',
                'overview_sw' => 'Urasimishaji wa Ardhi ni mchakato wa kisheria na mipango miji unaobadili maeneo yasiyopangwa au mashamba ya kimila kuwa viwanja vilivyopimwa rasmi na kupata Hati Miliki. RELAND inaratibu na kusimamia miradi yote ya urasimishaji kwa watu binafsi, mitaa na jamii jijini Arusha.',
                'deliverables_en' => [
                    'Community mobilization and property baseline boundary mapping',
                    'Preparation of Approved Town Planning Layout Schemes (Michoro ya Mipango Mji)',
                    'Cadastral survey, beacon installation, and deed plan approvals',
                    'Title deed application processing at Ministry of Lands registry',
                    'Resolution of overlapping boundary disputes with local elders',
                    'Road reservation alignment and public amenity zoning'
                ],
                'deliverables_sw' => [
                    'Uhamasishaji na utambuzi wa mipaka ya wamiliki wote',
                    'Uandaaji wa Michoro ya Mipango Mji (Town Planning Schemes)',
                    'Upimaji rasmi, uwekaji wa beacons na kuidhinisha Deed Plans',
                    'Uratibu wa kutoa Hati Miliki (Title Deeds) Wizarani',
                    'Usuluhishi wa migogoro ya mipaka kwa njia ya amani na maridhiano',
                    'Kutenga barabara na maeneo ya huduma za kijamii'
                ],
                'process_en' => [
                    ['step' => '01', 'title' => 'Settlement Appraisal & Mapping', 'desc' => 'We survey the target neighborhood and document existing houses, pathways, and property claims.'],
                    ['step' => '02', 'title' => 'Town Planning Scheme Drafting', 'desc' => 'Our urban planners design a compliant layout allocating roads, plot boundaries, and public infrastructure.'],
                    ['step' => '03', 'title' => 'Ministry & Municipal Approvals', 'desc' => 'The town planning drawing is submitted and endorsed by Arusha Local Government Authorities and the Ministry.'],
                    ['step' => '04', 'title' => 'Title Deed Issuance', 'desc' => 'Individual plot owners receive official Title Deeds from the Registrar of Titles.']
                ],
                'process_sw' => [
                    ['step' => '01', 'title' => 'Utambuzi wa Eneo & Wamiliki', 'desc' => 'Tunafanya utambuzi wa kina wa makazi, wamiliki wa ardhi, na njia zilizopo katika mtaa husika.'],
                    ['step' => '02', 'title' => 'Kuchora Mchoro wa Mipango Mji', 'desc' => 'Wataalamu wetu wa Mipango Mji wanaandaa mchoro rasmi unaoainisha barabara, viwanja na maeneo ya jamii.'],
                    ['step' => '03', 'title' => 'Idhini ya Halmashauri na Wizara', 'desc' => 'Mchoro unapitishwa na Baraza la Madiwani, Mipango Mji ya Halmashauri na Kamishna wa Ardhi.'],
                    ['step' => '04', 'title' => 'Upimaji na Kupata Hati Miliki', 'desc' => 'Upimaji unakamilika na kila mmiliki anapokea Hati yake rasmi ya Miliki ya miaka 33, 66 au 99.']
                ],
                'faqs' => [
                    [
                        'q_en' => 'Can an individual land owner initiate formalization?',
                        'a_en' => 'Yes. While community-wide schemes are common, individual land parcels within urban expansion zones can also be formalized and regularized through proper town planning and surveying.',
                        'q_sw' => 'Je, mtu mmoja anaweza kuomba urasimishaji wa kiwanja chake?',
                        'a_sw' => 'Ndiyo, mtu binafsi au mtaa mzima unaweza kuanzisha urasimishaji kupitia wataalamu wetu wa Mipango Mji na Upimaji.'
                    ],
                    [
                        'q_en' => 'What is the financial value of formalizing land?',
                        'a_en' => 'Formalized land with a Title Deed increases property value by up to 200%, protects against state expropriation disputes, and serves as institutional collateral for bank loans.',
                        'q_sw' => 'Kuna faida gani za kiuchumi za kurasimisha ardhi?',
                        'a_sw' => 'Ardhi iliyorasimishwa na yenye Hati Miliki inaongeza thamani ya mali mara 2 au zaidi, inazuia migogoro, na inatumika kama dhamana ya mikopo benki.'
                    ]
                ]
            ],

            'plot-subdivision' => [
                'slug' => 'plot-subdivision',
                'aliases' => ['ugawaji-wa-viwanja'],
                'icon' => 'subdivision',
                'title_en' => 'Plot & Land Subdivision',
                'title_sw' => 'Ugawaji wa Viwanja na Mashamba',
                'subtitle_en' => 'Professional partitioning of large land parcels and master schemes into high-value individual surveyed plots.',
                'subtitle_sw' => 'Kugawa mashamba makubwa na maeneo kuwa viwanja vidogo vilivyopimwa vyenye ramani na njia bora za barabara.',
                'badge_en' => 'Master Planning & Partitioning',
                'badge_sw' => 'Ugawaji na Mipango Mji',
                'hero_image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1600&q=80',
                'whatsapp_topic' => 'Plot Subdivision / Ugawaji wa Viwanja',
                'overview_en' => 'Whether you are subdividing a family estate in USA River, partitioning a commercial tract in Kisongo, or executing a large residential subdivision in Njiro, RELAND delivers turnkey subdivision engineering. We manage the entire lifecycle: town planning scheme approval, internal road design, cadastral beacon placement, and separate individual title deeds processing.',
                'overview_sw' => 'Iwe unataka kugawa shamba la urithi wa familia, kugawa eneo la biashara Kisongo, au kutekeleza mradi wa viwanja vya makazi, RELAND inatoa huduma kamilifu ya ugawaji wa ardhi. Tunasimamia uchoraji wa ramani, ufunguaji wa barabara, uwekaji wa beacons na kutoa hati miliki kwa kila kiwanja.',
                'deliverables_en' => [
                    'Subdivision feasibility study and maximum yield plot layout design',
                    'Approved Town Planning Subdivision Scheme (Mchoro wa Ugawaji)',
                    'Internal road reservation (6m, 10m, 15m, 20m) planning',
                    'Cadastral survey and individual beacon pegging for each sub-plot',
                    'Preparation and submission of separate Deed Plans',
                    'Transfer documentation and individual title deed acquisition support'
                ],
                'deliverables_sw' => [
                    'Uchambuzi wa mradi ili kupata idadi nzuri na kubwa ya viwanja vyenye thamani',
                    'Mchoro rasmi wa ugawaji uliopitishwa na Mipango Mji',
                    'Mpangilio wa barabara za ndani zenye upana unaokubalika kisheria',
                    'Upimaji na uwekaji wa beacons kwa kila kiwanja kilichogawiwa',
                    'Uandaaji wa ramani za kila kiwanja (Individual Deed Plans)',
                    'Uratibu wa kupata Hati Miliki kwa kila mteja au mnunuzi'
                ],
                'process_en' => [
                    ['step' => '01', 'title' => 'Master Boundary Verification', 'desc' => 'We measure and verify the outer perimeter of the mother parcel using RTK GPS.'],
                    ['step' => '02', 'title' => 'Layout Scheme Design', 'desc' => 'Our urban planners create an optimal subdivision layout maximizing sellable plot area and road access.'],
                    ['step' => '03', 'title' => 'Planning & Municipal Approval', 'desc' => 'We submit the subdivision scheme to the relevant Council Planning Authority for legal endorsement.'],
                    ['step' => '04', 'title' => 'Beacon Pegging & Deed Plans', 'desc' => 'We plant physical beacons for every subdivided plot and prepare separate Deed Plans.']
                ],
                'process_sw' => [
                    ['step' => '01', 'title' => 'Kupima Mipaka ya Nje ya Shamba', 'desc' => 'Tunapima na kuhakiki mipaka ya shamba mama kwa GPS kuhakikisha ukubwa halisi.'],
                    ['step' => '02', 'title' => 'Uchoraji wa Mchoro wa Ugawaji', 'desc' => 'Tunaandaa mchoro wa viwanja unaozingatia barabara, miundombinu na matumizi bora ya ardhi.'],
                    ['step' => '03', 'title' => 'Idhini ya Idara ya Mipango Mji', 'desc' => 'Mchoro unawasilishwa na kuidhinishwa na Idara ya Mipango Mji na Halmashauri husika.'],
                    ['step' => '04', 'title' => 'Uwekaji wa Vigingi & Hati za Kila Kiwanja', 'desc' => 'Tunaweka beacons kwa kila kiwanja na kuandaa Deed Plans kwa ajili ya hati miliki binafsi.']
                ],
                'faqs' => [
                    [
                        'q_en' => 'What is the minimum plot size allowed for subdivision in Arusha?',
                        'a_en' => 'Urban planning regulations in Arusha typically require high-density residential plots to be at least 300–400 SQM, while medium/low-density zones vary from 600 SQM to 1500+ SQM.',
                        'q_sw' => 'Ukubwa wa chini wa kiwanja kinachoruhusiwa kisheria Arusha ni upi?',
                        'a_sw' => 'Kulingana na kanuni za mipango miji, viwanja vya makazi ya msongamano mkubwa huanzia mita za mraba 300–400, na msongamano wa kati/chini huanzia SQM 600 hadi 1500+.'
                    ]
                ]
            ],

            'boundary-demarcation' => [
                'slug' => 'boundary-demarcation',
                'aliases' => ['uhakiki-wa-mipaka'],
                'icon' => 'demarcation',
                'title_en' => 'Boundary Demarcation & Verification',
                'title_sw' => 'Uhakiki na Uwekaji wa Mipaka (Demarcation)',
                'subtitle_en' => 'Definitive boundary retracement, dispute resolution, and concrete beacon restoration.',
                'subtitle_sw' => 'Kuhakiki na kurejesha mipaka iliyopotea, kuzuia migogoro na kuweka beacons imara za zege.',
                'badge_en' => 'Boundary Security & Dispute Prevention',
                'badge_sw' => 'Ulinzi wa Mipaka',
                'hero_image' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?auto=format&fit=crop&w=1600&q=80',
                'whatsapp_topic' => 'Boundary Demarcation / Uhakiki wa Mipaka',
                'overview_en' => 'Encroachment, missing beacons, and conflicting boundary claims are among the most common land vulnerabilities in Tanzania. RELAND provides rigorous cadastral boundary demarcation, beacon retracement, and technical boundary dispute resolution using historical survey records, Ministry coordinates, and high-precision field instruments.',
                'overview_sw' => 'Kuingiliana kwa mipaka, kupotea kwa beacons na migogoro ya ardhi ni changamoto kubwa. RELAND inatoa huduma ya uhakiki wa kina wa mipaka, kurejesha beacons zilizong\'olewa au kupotea kwa kutumia coordinates halisi za Wizarani na vifaa vya kisasa.',
                'deliverables_en' => [
                    'Official cadastral coordinate retrieval from national geodetic network',
                    'Accurate RTK GPS boundary line tracking and dispute mapping',
                    'Replacement of destroyed or missing concrete beacons (Vigingi vya Upimaji)',
                    'Official Surveyor Verification Certificate and boundary report',
                    'On-site neighbor consensus coordination and local authority witness signing',
                    'Perimeter fencing alignment guidance'
                ],
                'deliverables_sw' => [
                    'Kupata coordinates rasmi za Wizara ya Ardhi kutoka kanzi data ya taifa',
                    'Kufuatilia na kuweka alama sahihi ya mstari wa mpaka kwa RTK GPS',
                    'Kuweka upya beacons za zege zilizong\'olewa au kufukiwa',
                    'Cheti na ripoti rasmi ya uhakiki wa mpaka kutoka kwa mpimaji aliyesajiliwa',
                    'Kushirikisha majirani na viongozi wa mtaa kushuhudia na kuthibitisha',
                    'Ushauri wa ujenzi sahihi wa uzio/ukuta bila kuingilia hifadhi ya barabara'
                ],
                'process_en' => [
                    ['step' => '01', 'title' => 'Registry Coordinate Extraction', 'desc' => 'We obtain official cadastral survey records and control point coordinates from the Ministry archive.'],
                    ['step' => '02', 'title' => 'Field Boundary Retracement', 'desc' => 'Using RTK GNSS, our surveyors pinpoint the mathematical coordinates of every corner.'],
                    ['step' => '03', 'title' => 'Beacon Re-Installation', 'desc' => 'We plant reinforced concrete beacons and paint standard identifying markings.'],
                    ['step' => '04', 'title' => 'Certification & Handover', 'desc' => 'We provide an official Surveyor Certificate verifying the physical coordinates and dimensions.']
                ],
                'process_sw' => [
                    ['step' => '01', 'title' => 'Kutoa Coordinates za Wizarani', 'desc' => 'Tunachukua kumbukumbu rasmi za ramani na vipimo halisi kutoka Wizara ya Ardhi.'],
                    ['step' => '02', 'title' => 'Uhakiki Shambani kwa GPS', 'desc' => 'Wapimaji wetu wanatafuta na kuweka alama mahali halisi ambapo kila beacon inapaswa kuwepo.'],
                    ['step' => '03', 'title' => 'Ujenzi wa Beacons Mpya', 'desc' => 'Tunaweka vigingi imara vya zege vilivyoandikwa namba rasmi za upimaji.'],
                    ['step' => '04', 'title' => 'Kutoa Cheti cha Uhakiki', 'desc' => 'Mteja anapewa ripoti na cheti cha uthibitisho wa mipaka kuzuia migogoro yote ya baadaye.']
                ],
                'faqs' => [
                    [
                        'q_en' => 'What if my neighbor disputes the newly established boundary beacon?',
                        'a_en' => 'Our surveys are anchored on official Ministry of Lands geodetic records. We provide the registered survey report, and when required, convene joint field inspections with the District Survey Officer.',
                        'q_sw' => 'Je, nifanye nini kama jirani anakataa mpaka uliowekwa?',
                        'a_sw' => 'Upimaji wetu unategemea coordinates rasmi za kiserikali. Tunatoa ripoti ya kitaalamu na ikibidi tunaalika Afisa Upimaji wa Halmashauri kusimamia utatuzi wa amani.'
                    ]
                ]
            ],

            'land-consultation' => [
                'slug' => 'land-consultation',
                'aliases' => ['ushauri-wa-ardhi'],
                'icon' => 'consultation',
                'title_en' => 'Land & Property Consultation',
                'title_sw' => 'Ushauri wa Kitaalamu wa Ardhi & Uwekezaji',
                'subtitle_en' => 'Strategic land advisory, title search due diligence, zoning analysis, and investment risk mitigation.',
                'subtitle_sw' => 'Ushauri makini wa ununuzi, ukaguzi wa nyaraka Wizarani, na mikakati salama ya uwekezaji wa ardhi.',
                'badge_en' => 'Due Diligence & Advisory',
                'badge_sw' => 'Ukaguzi & Ushauri',
                'hero_image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1600&q=80',
                'whatsapp_topic' => 'Land Consultation / Ushauri wa Ardhi',
                'overview_en' => 'Navigating land acquisition, statutory approvals, and property laws in Tanzania requires trusted professional insight. RELAND offers comprehensive land consultation services in Arusha for individual buyers, diaspora investors, commercial developers, and institutional entities to safeguard their investments from fraud, double allocation, or regulatory encumbrances.',
                'overview_sw' => 'Kununua au kuwekeza kwenye ardhi kunahitaji umakini na utaalamu wa kisheria. RELAND inatoa ushauri wa kitaalamu kwa wananchi, watanzania wanaoishi nje (Diaspora), na wawekezaji ili kuepuka utapeli, kuuziwa eneo lenye mgogoro au lililotengwa kwa matumizi ya umma.',
                'deliverables_en' => [
                    'Official Title Search & Encumbrance Verification at Ministry Registry',
                    'Land zoning and statutory permitted-use verification',
                    'Road reserve, railway, and environmental buffer zone compliance checks',
                    'Diaspora land purchase due diligence and remote supervision',
                    'Land tax, ground rent (kodi ya ardhi), and municipal rate assessments',
                    'Conveyancing agreement review and land transfer support'
                ],
                'deliverables_sw' => [
                    'Ukaguzi rasmi wa Hati Miliki (Official Search) Wizara ya Ardhi',
                    'Uhakiki wa matumizi ya ardhi (Makazi, Biashara, Viwanda, Kilimo)',
                    'Uhakiki wa hifadhi ya barabara (Road Reserve) na vyanzo vya maji',
                    'Msaada maalum kwa Watanzania wa Diaspora kununua ardhi kwa usalama',
                    'Ushauri wa kodi ya pango la ardhi (Land Rent) na tozo za halmashauri',
                    'Uhakiki wa mikataba ya mauziano na uratibu wa uhamisho wa umiliki'
                ],
                'process_en' => [
                    ['step' => '01', 'title' => 'Documentation Intake', 'desc' => 'You provide plot details, survey numbers, or seller documentation for preliminary scrutiny.'],
                    ['step' => '02', 'title' => 'Multi-Agency Registry Search', 'desc' => 'We perform exhaustive official searches at the Ministry of Lands, TARURA, and Municipal councils.'],
                    ['step' => '03', 'title' => 'Physical On-Site Inspection', 'desc' => 'Our technical team visits the ground to verify actual possession, topography, and utility access.'],
                    ['step' => '04', 'title' => 'Advisory Report & Next Steps', 'desc' => 'We issue a comprehensive Due Diligence Report with clear legal and financial recommendations.']
                ],
                'process_sw' => [
                    ['step' => '01', 'title' => 'Kupokea Nyaraka za Eneo', 'desc' => 'Mteja anawasilisha nyaraka au maelezo ya eneo analotaka kununua au kuliendeleza.'],
                    ['step' => '02', 'title' => 'Ukaguzi wa Kina Wizarani', 'desc' => 'Tunafanya ukaguzi rasmi katika masjala ya Wizara ya Ardhi, TARURA, na Halmashauri.'],
                    ['step' => '03', 'title' => 'Ukaguzi wa Eneo Shambani', 'desc' => 'Timu yetu inatembelea eneo kukagua mipaka, hali ya udongo, barabara na majirani.'],
                    ['step' => '04', 'title' => 'Ripoti ya Ushauri wa Kitaalamu', 'desc' => 'Unapokea ripoti kamili ya maandishi inayokupa mwongozo salama wa kuendelea na malipo au kusitisha.']
                ],
                'faqs' => [
                    [
                        'q_en' => 'I am living abroad (Diaspora). How can RELAND help me buy land safely in Arusha?',
                        'a_en' => 'We act as your certified eyes and ears on the ground: verifying documents, conducting live video inspections, executing cadastral surveys, and facilitating safe legal transfers without family/broker fraud.',
                        'q_sw' => 'Nipo nje ya nchi (Diaspora). RELAND inanisaidiaje kununua kiwanja salama?',
                        'a_sw' => 'Tunakufanyia ukaguzi wa kina wa kisheria, video za eneo live, kupima mipaka na kusimamia uhamisho wa hati bila kutegemea madalali au kuingizwa kwenye mikataba hewa.'
                    ]
                ]
            ],

            'plot-sales' => [
                'slug' => 'plot-sales',
                'aliases' => ['uuzaji-wa-viwanja'],
                'icon' => 'plots',
                'title_en' => 'Plot & Land Sales (Verified Listings)',
                'title_sw' => 'Uuzaji wa Viwanja Vilivyohakikiwa',
                'subtitle_en' => 'Verified residential, commercial, and agricultural land in prime Arusha corridors with 100% legal title assurance.',
                'subtitle_sw' => 'Viwanja bora vya makazi, biashara na miradi ya kilimo jijini Arusha vyenye hati na beacons zilizohakikiwa.',
                'badge_en' => 'Verified Prime Parcels',
                'badge_sw' => 'Viwanja Vilivyohakikiwa',
                'hero_image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1600&q=80',
                'whatsapp_topic' => 'Plot Sales & Land Listings / Viwanja Vinavyouzwa',
                'overview_en' => 'Unlike conventional real estate brokerages, every plot offered for sale through RELAND is pre-surveyed, boundary-verified, and legally scrutinized by our certified land professionals. We provide genuine, dispute-free plots across Arusha including Njiro, Kisongo, Sakina, USA River, Moshono, and Karatu.',
                'overview_sw' => 'Tofauti na madalali wa kawaida, kila kiwanja kinachouzwa kupitia RELAND kimepimwa kitaalamu, beacons zake zimekaguliwa na nyaraka zake zimethibitishwa Wizarani. Tunatoa viwanja halisi na salama katika maeneo ya Njiro, Kisongo, Sakina, USA River, Moshono, na Karatu.',
                'deliverables_en' => [
                    '100% verified ownership status (Title Deed / CCRO / Surveyed Beaconed Plots)',
                    'Escorted on-site viewings with professional land survey specialists',
                    'Transparent and negotiable direct pricing with zero hidden middleman fees',
                    'Flexible payment plans on select residential and commercial projects',
                    'Immediate physical beacon handover and possession guarantee',
                    'End-to-end legal title transfer into the buyer’s name'
                ],
                'deliverables_sw' => [
                    'Uhakika wa 100% wa umiliki safi bila mgogoro wala madai',
                    'Safari za bure za kwenda kukagua kiwanja ukiongozana na mtaalamu wetu wa ardhi',
                    'Bei halisi ya wazi bila gharama zilizofichika za madalali',
                    'Mpango wa malipo ya awamu kwa baadhi ya miradi teule ya viwanja',
                    'Kukabidhiwa beacons zako rasmi siku ya makabidhiano ya eneo',
                    'Msaada kamili wa kisheria mpaka Hati Miliki inasajiliwa kwa jina lako'
                ],
                'process_en' => [
                    ['step' => '01', 'title' => 'Browse Verified Catalog', 'desc' => 'Explore our catalog of surveyed plots in top Arusha growth zones.'],
                    ['step' => '02', 'title' => 'Guided Field Inspection', 'desc' => 'We escort you to the site to inspect terrain, road frontage, utilities, and beacons.'],
                    ['step' => '03', 'title' => 'Legal Contract Signing', 'desc' => 'Execution of official sales agreement prepared by qualified advocates.'],
                    ['step' => '04', 'title' => 'Beacon Handover & Title Transfer', 'desc' => 'Immediate physical possession and official title deed registration in your name.']
                ],
                'process_sw' => [
                    ['step' => '01', 'title' => 'Chagua Kiwanja Kwenye Tovuti', 'desc' => 'Tazama orodha yetu ya viwanja vilivyopo kwenye maeneo bora ya Arusha.'],
                    ['step' => '02', 'title' => 'Kutembelea Kiwanja Shambani', 'desc' => 'Tunakusindikiza kwenda eneo husika ukague barabara, umeme, maji na beacons.'],
                    ['step' => '03', 'title' => 'Kusaini Mkataba wa Mauziano', 'desc' => 'Mkataba rasmi unaandaliwa kwa mujibu wa sheria za ardhi Tanzania.'],
                    ['step' => '04', 'title' => 'Kukabidhiwa Eneo & Hati Miliki', 'desc' => 'Unakabidhiwa kiwanja chako na kuanza mchakato wa kuhamishiwa Hati rasmi.']
                ],
                'faqs' => [
                    [
                        'q_en' => 'Are all plots listed on RELAND surveyed with beacons?',
                        'a_en' => 'Yes. RELAND strictly lists plots that have verified boundary beacons, clear access roads, and authentic ownership documents verified with Arusha land records.',
                        'q_sw' => 'Je, viwanja vyote vinavyouzwa RELAND vimepimwa na vina beacons?',
                        'a_sw' => 'Ndiyo. RELAND inauza viwanja vilivyopimwa, vyenye beacons na ramani kamili ili kumlinda mnunuzi 100% dhidi ya utapeli.'
                    ]
                ]
            ]
        ];
    }

    /**
     * Services Overview Hub
     */
    public function index(): View
    {
        $services = self::getServicesList();
        $featuredProjects = collect();
        $featuredPlots = collect();

        try {
            $featuredProjects = Project::published()->featured()->latest()->take(3)->get();
            $featuredPlots = Plot::with(['plotType', 'location', 'images'])->published()->featured()->latest()->take(3)->get();
        } catch (\Throwable $e) {
            // DB offline fallback
        }

        return view('public.pages.services', compact('services', 'featuredProjects', 'featuredPlots'));
    }

    /**
     * Dedicated Service Detail Page
     */
    public function show(string $slug): View
    {
        $services = self::getServicesList();

        // Check if slug matches directly or via aliases
        $selectedService = null;
        foreach ($services as $key => $data) {
            if ($data['slug'] === $slug || in_array($slug, $data['aliases'] ?? [])) {
                $selectedService = $data;
                break;
            }
        }

        if (!$selectedService) {
            abort(404);
        }

        // Fetch related projects and plots
        $relatedProjects = collect();
        $relatedPlots = collect();

        try {
            $relatedProjects = Project::published()->latest()->take(3)->get();
            $relatedPlots = Plot::with(['plotType', 'location', 'images'])->published()->latest()->take(3)->get();
        } catch (\Throwable $e) {
            // DB offline fallback
        }

        return view('public.services.show', compact('selectedService', 'relatedProjects', 'relatedPlots', 'services'));
    }
}
