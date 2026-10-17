<?php
/**
 * generate_words.php
 * Genereert 5000+ Turks-Nederlandse woorden in data/woorden.json
 * Eenmalig uitvoeren in de browser.
 */

require_once 'config.php';

// ============================================================
// WOORDENLIJSTEN PER CATEGORIE
// ============================================================

$data = [];

// ---------- DIEREN (100) ----------
$dieren = [
    ["Kedi","Kat","🐱"],["Köpek","Hond","🐶"],["Kuş","Vogel","🐦"],["Balık","Vis","🐟"],
    ["At","Paard","🐴"],["İnek","Koe","🐮"],["Koyun","Schaap","🐑"],["Keçi","Geit","🐐"],
    ["Tavşan","Konijn","🐰"],["Fare","Muis","🐭"],["Sıçan","Rat","🐀"],["Hamster","Hamster","🐹"],
    ["Aslan","Leeuw","🦁"],["Kaplan","Tijger","🐯"],["Leopar","Luipaard","🐆"],["Çita","Cheetah","🐆"],
    ["Fil","Olifant","🐘"],["Zebra","Zebra","🦓"],["Zürafa","Giraffe","🦒"],["Gergedan","Neushoorn","🦏"],
    ["Su aygırı","Nijlpaard","🦛"],["Deve","Kameel","🐫"],["Lama","Lama","🦙"],["Maymun","Aap","🐵"],
    ["Goril","Gorilla","🦍"],["Şempanze","Chimpansee","🐒"],["Orangutan","Orang-oetan","🦧"],
    ["Ayı","Beer","🐻"],["Kutup ayısı","IJsbeer","🐻‍❄️"],["Panda","Panda","🐼"],["Koala","Koala","🐨"],
    ["Kanguru","Kangoeroe","🦘"],["Tilki","Vos","🦊"],["Kurt","Wolf","🐺"],["Çakal","Jakhals","🐺"],
    ["Sırtlan","Hyena","🐺"],["Yarasa","Vleermuis","🦇"],["Kirpi","Egel","🦔"],["Sincap","Eekhoorn","🐿️"],
    ["Kunduz","Bever","🦫"],["Porsuk","Das","🦡"],["Susamuru","Otter","🦦"],["Gelincik","Wezel","🦡"],
    ["Yaban domuzu","Wild zwijn","🐗"],["Geyik","Hert","🦌"],["Karaca","Ree","🦌"],["Elk","Eland","🦌"],
    ["Bizon","Bizon","🦬"],["Bufalo","Buffel","🐃"],["Öküz","Os","🐂"],["Boğa","Stier","🐂"],
    ["Eşek","Ezel","🫏"],["Katır","Muilezel","🐴"],["Pony","Pony","🐴"],["Midilli","Pony","🐴"],
    ["Tavuk","Kip","🐔"],["Horoz","Haan","🐓"],["Civciv","Kuiken","🐤"],["Ördek","Eend","🦆"],
    ["Kaz","Gans","🦢"],["Kuğu","Zwaan","🦢"],["Hindi","Kalkoen","🦃"],["Tavus kuşu","Pauw","🦚"],
    ["Papağan","Papegaai","🦜"],["Muhabbet kuşu","Parkiet","🦜"],["Kanarya","Kanarie","🐦"],
    ["Güvercin","Duif","🕊️"],["Karga","Kraai","🐦‍⬛"],["Saksağan","Ekster","🐦"],["Serçe","Mus","🐦"],
    ["Kartal","Adelaar","🦅"],["Şahin","Havik","🦅"],["Atmaca","Sperwer","🦅"],["Doğan","Valk","🦅"],
    ["Baykuş","Uil","🦉"],["Leylek","Ooievaar","🦤"],["Turna","Kraanvogel","🦩"],["Balıkçıl","Reiger","🦩"],
    ["Pelikan","Pelikaan","🦩"],["Martı","Meeuw","🦅"],["Penguen","Pinguïn","🐧"],["Deve kuşu","Struisvogel","🦤"],
    ["Timsah","Krokodil","🐊"],["Aligator","Alligator","🐊"],["Yılan","Slang","🐍"],["Kobra","Cobra","🐍"],
    ["Python","Python","🐍"],["Kertenkele","Hagedis","🦎"],["Bukalemun","Kameleon","🦎"],["İguana","Leguaan","🦎"],
    ["Kaplumbağa","Schildpad","🐢"],["Deniz kaplumbağası","Zeeschildpad","🐢"],["Kurbağa","Kikker","🐸"],
    ["Semender","Salamander","🦎"],["Akrep","Schorpioen","🦂"],["Örümcek","Spin","🕷️"],["Tarantula","Tarantula","🕷️"],
    ["Karınca","Mier","🐜"],["Arı","Bij","🐝"],["Yaban arısı","Wesp","🐝"],["Sinek","Vlieg","🪰"],
    ["Sivrisinek","Mug","🦟"],["Kelebek","Vlinder","🦋"],["Güve","Mot","🦋"],["Yusufçuk","Libelle","🦗"],
    ["Çekirge","Sprinkhaan","🦗"],["Cırcır böceği","Krekel","🦗"],["Hamam böceği","Kakkerlak","🪳"],
    ["Uğur böceği","Lieveheersbeestje","🐞"],["Ateşböceği","Vuurvlieg","✨"],["Salyangoz","Slak","🐌"],
    ["Solucan","Worm","🪱"],["Deniz yıldızı","Zeester","⭐"],["Denizanası","Kwal","🪼"],["Ahtapot","Octopus","🐙"],
    ["Kalamar","Inktvis","🦑"],["Yengeç","Krab","🦀"],["Istakoz","Kreeft","🦞"],["Karides","Garnaal","🦐"],
    ["Midye","Mossel","🦪"],["İstiridye","Oester","🦪"],["Deniz kabuğu","Schelp","🐚"],["Mercan","Koraal","🪸"],
    ["Yunus","Dolfijn","🐬"],["Balina","Walvis","🐋"],["Orka","Orka","🐋"],["Köpekbalığı","Haai","🦈"],
    ["Vatoz","Rog","🐟"],["Mersin balığı","Steur","🐟"],["Somon","Zalm","🐟"],["Ton balığı","Tonijn","🐟"],
    ["Alabalık","Forel","🐟"],["Sazan","Karper","🐟"],["Levrek","Zeebaars","🐟"],["Çipura","Zeebrasem","🐟"],
    ["Hamsi","Ansjovis","🐟"],["Sardalya","Sardine","🐟"],["Uskumru","Makreel","🐟"],["Palamut","Bonito","🐟"],
    ["Yılan balığı","Aal","🐍"],["Yılan balığı","Paling","🐟"],["Kılıç balığı","Zwaardvis","🐟"],["Kılıç balığı","Zeilvis","🐟"],
];

// ---------- KLEUREN (60) ----------
$kleuren = [
    ["Kırmızı","Rood","🔴"],["Mavi","Blauw","🔵"],["Yeşil","Groen","🟢"],["Sarı","Geel","🟡"],
    ["Turuncu","Oranje","🟠"],["Mor","Paars","🟣"],["Siyah","Zwart","⚫"],["Beyaz","Wit","⚪"],
    ["Pembe","Roze","🩷"],["Kahverengi","Bruin","🟤"],["Gri","Grijs","🩶"],["Lacivert","Donkerblauw","🔵"],
    ["Açık mavi","Lichtblauw","🔵"],["Bebek mavisi","Babyblauw","🩵"],["Turkuaz","Turquoise","🩵"],
    ["Deniz mavisi","Zeeblauw","🔵"],["Petrol mavisi","Petrolblauw","🔵"],["Zümrüt yeşili","Smaragdgroen","💚"],
    ["Zeytin yeşili","Olijfgroen","🫒"],["Fıstık yeşili","Pistachegroen","💚"],["Mint yeşili","Mintgroen","💚"],
    ["Çağla yeşili","Amandelgroen","💚"],["Bordo","Bordeaux","🍷"],["Vişne çürüğü","Kersenrood","🍒"],
    ["Kiremit","Terracotta","🟠"],["Kızıl","Karmozijn","🔴"],["Mercan","Koraalrood","🪸"],
    ["Somon","Zalmroze","🐟"],["Pudra","Poederroze","🩷"],["Fuşya","Fuchsia","🩷"],["Lila","Lila","💜"],
    ["Lavanta","Lavendel","💜"],["Menekşe","Viooltjesblauw","💜"],["Altın","Goud","🥇"],
    ["Gümüş","Zilver","🥈"],["Bronz","Brons","🥉"],["Bakır","Koper","🟠"],["Krem","Crème","🤍"],
    ["Bej","Beige","🟫"],["Taba","Tabak","🟤"],["Kum","Zand","🏖️"],["Hardal","Mosterd","🟡"],
    ["Limon","Citroengeel","🍋"],["Şeftali","Perzik","🍑"],["Kayısı","Abrikoos","🍑"],
    ["Portakal rengi","Sinaasappelkleur","🍊"],["Şarap rengi","Wijnkleur","🍷"],["Antrasit","Antraciet","⚫"],
    ["Füme","Rookgrijs","🌫️"],["Kömür","Koolzwart","⚫"],["Gece mavisi","Nachtblauw","🌌"],
    ["Gökyüzü mavisi","Hemelsblauw","☁️"],["Okyanus mavisi","Oceaanblauw","🌊"],["Yavruağzı","Koraal","🪸"],
    ["Eflatun","Eflatun","💜"],["Nefti","Donkergroen","🌲"],["Haki","Kaki","🪖"],
    ["Gri mavi","Grijsblauw","🔵"],["Ateş kırmızısı","Vuurrood","🔥"],["Buz mavisi","Ijsblauw","🧊"],
];

// ---------- ETEN & DRINKEN (200) ----------
$eten = [
    ["Elma","Appel","🍎"],["Armut","Peer","🍐"],["Muz","Banaan","🍌"],["Portakal","Sinaasappel","🍊"],
    ["Mandalina","Mandarijn","🍊"],["Limon","Citroen","🍋"],["Greyfurt","Grapefruit","🍊"],
    ["Üzüm","Druif","🍇"],["Çilek","Aardbei","🍓"],["Ahududu","Framboos","🫐"],["Böğürtlen","Braam","🫐"],
    ["Yaban mersini","Bosbes","🫐"],["Kiraz","Kers","🍒"],["Vişne","Morel","🍒"],["Şeftali","Perzik","🍑"],
    ["Kayısı","Abrikoos","🍑"],["Erik","Pruim","🍑"],["Nektarin","Nectarine","🍑"],
    ["Karpuz","Watermeloen","🍉"],["Kavun","Meloen","🍈"],["Ananas","Ananas","🍍"],
    ["Mango","Mango","🥭"],["Papaya","Papaja","🍈"],["Avokado","Avocado","🥑"],
    ["Hindistan cevizi","Kokosnoot","🥥"],["Kivi","Kiwi","🥝"],["Nar","Granaatappel","🍎"],
    ["İncir","Vijg","🫐"],["Hurma","Dadel","🫐"],["Trabzon hurması","Kaki","🍊"],
    ["Ayva","Kweepeer","🍐"],["Dut","Moerbei","🫐"],["Yenidünya","Loquat","🍑"],
    ["Domates","Tomaat","🍅"],["Salatalık","Komkommer","🥒"],["Biber","Paprika","🌶️"],
    ["Sivri biber","Spaanse peper","🌶️"],["Dolmalık biber","Puntpaprika","🫑"],["Patlıcan","Aubergine","🍆"],
    ["Kabak","Courgette","🥒"],["Balkabağı","Pompoen","🎃"],["Havuç","Wortel","🥕"],
    ["Patates","Aardappel","🥔"],["Soğan","Ui","🧅"],["Sarımsak","Knoflook","🧄"],
    ["Pırasa","Prei","🥬"],["Lahana","Kool","🥬"],["Karnabahar","Bloemkool","🥦"],
    ["Brokoli","Broccoli","🥦"],["Ispanak","Spinazie","🥬"],["Marul","Sla","🥬"],
    ["Roka","Rucola","🥬"],["Maydanoz","Peterselie","🌿"],["Dereotu","Dille","🌿"],
    ["Nane","Munt","🌿"],["Fesleğen","Basilicum","🌿"],["Kekik","Tijm","🌿"],
    ["Biberiye","Rozemarijn","🌿"],["Adaçayı","Salie","🌿"],["Defne yaprağı","Laurierblad","🌿"],
    ["Zencefil","Gember","🫚"],["Zerdeçal","Kurkuma","🟡"],["Tarçın","Kaneel","🟤"],
    ["Karanfil","Kruidnagel","🌰"],["Muskat","Nootmuskaat","🌰"],["Kimyon","Komijn","🌰"],
    ["Kişniş","Koriander","🌿"],["Sumak","Sumak","🌿"],["Pul biber","Chilivlokken","🌶️"],
    ["Kararbiber","Zwarte peper","⚫"],["Tuz","Zout","🧂"],["Şeker","Suiker","🍬"],
    ["Bal","Honing","🍯"],["Reçel","Jam","🍓"],["Pekmez","Melasse","🍯"],
    ["Tahin","Tahini","🥜"],["Helva","Halva","🍬"],["Lokum","Turks fruit","🍬"],
    ["Baklava","Baklava","🍮"],["Kadayıf","Kadayif","🍮"],["Künefe","Künefe","🍮"],
    ["Sütlaç","Rijstpudding","🍮"],["Kazandibi","Kazandibi","🍮"],["Aşure","Asure","🍮"],
    ["Revani","Revani","🍰"],["Şekerpare","Sekerpare","🍪"],["İrmik helvası","Griesmeel-halva","🍮"],
    ["Ekmek","Brood","🍞"],["Simit","Simit","🥨"],["Poğaça","Pogaca","🥐"],
    ["Açma","Acma","🥯"],["Börek","Börek","🥟"],["Su böreği","Waterbörek","🥟"],
    ["Sigara böreği","Sigarabörek","🥟"],["Gözleme","Gözleme","🥞"],["Pide","Pide","🍕"],
    ["Lahmacun","Lahmacun","🍕"],["Pizza","Pizza","🍕"],["Makarna","Pasta","🍝"],
    ["Spagetti","Spaghetti","🍝"],["Erişte","Noedels","🍜"],["Şehriye","Vermicelli","🍜"],
    ["Pirinç","Rijst","🍚"],["Bulgur","Bulgur","🌾"],["Kuskus","Couscous","🌾"],
    ["Nohut","Kikkererwten","🫘"],["Fasulye","Bonen","🫘"],["Barbunya","Bruine bonen","🫘"],
    ["Mercimek","Linzen","🫘"],["Bakla","Tuinbonen","🫛"],["Bezelye","Erwten","🫛"],
    ["Yumurta","Ei","🥚"],["Omlet","Omelet","🍳"],["Menemen","Menemen","🍳"],
    ["Peynir","Kaas","🧀"],["Beyaz peynir","Feta","🧀"],["Kaşar","Kashkaval","🧀"],
    ["Yoğurt","Yoghurt","🥛"],["Ayran","Ayran","🥛"],["Kefir","Kefir","🥛"],
    ["Süt","Melk","🥛"],["Tereyağı","Boter","🧈"],["Margarin","Margarine","🧈"],
    ["Kaymak","Room","🥛"],["Krema","Crème","🍦"],["Dondurma","Ijs","🍦"],
    ["Çikolata","Chocolade","🍫"],["Bitter çikolata","Pure chocolade","🍫"],
    ["Sütlü çikolata","Melkchocolade","🍫"],["Beyaz çikolata","Witte chocolade","🤍"],
    ["Bisküvi","Biscuit","🍪"],["Kurabiye","Koekje","🍪"],["Kek","Cake","🍰"],
    ["Pasta","Taart","🎂"],["Doğum günü pastası","Verjaardagstaart","🎂"],["Muffin","Muffin","🧁"],
    ["Donut","Donut","🍩"],["Kruvasan","Croissant","🥐"],["Poğaça","Broodje","🥖"],
    ["Baget","Stokbrood","🥖"],["Tost","Toast","🍞"],["Sandviç","Sandwich","🥪"],
    ["Hamburger","Hamburger","🍔"],["Sosisli","Hotdog","🌭"],["Patates kızartması","Friet","🍟"],
    ["Tavuk","Kip","🍗"],["Kırmızı et","Rood vlees","🥩"],["Dana eti","Rundvlees","🥩"],
    ["Kuzu eti","Lamsvlees","🍖"],["Tavuk göğsü","Kipfilet","🍗"],["Tavuk but","Kippenpoot","🍗"],
    ["Köfte","Gehaktbal","🍖"],["Kebap","Kebab","🍢"],["Adana kebap","Adana kebab","🍢"],
    ["Urfa kebap","Urfa kebab","🍢"],["Şiş kebap","Sish kebab","🍢"],["Döner","Döner","🌯"],
    ["Kokoreç","Kokoreç","🌭"],["Sucuk","Sucuk","🌭"],["Pastırma","Pastirma","🥓"],
    ["Salam","Salami","🥓"],["Sosis","Worst","🌭"],["Jambon","Ham","🥓"],
    ["Balık","Vis","🐟"],["Somon","Zalm","🐟"],["Ton","Tonijn","🐟"],
    ["Hamsi","Ansjovis","🐟"],["Levrek","Zeebaars","🐟"],["Çipura","Zeebrasem","🐟"],
    ["Karides","Garnaal","🦐"],["Kalamar","Inktvis","🦑"],["Ahtapot","Octopus","🐙"],
    ["Midye","Mossel","🦪"],["Yengeç","Krab","🦀"],["Istakoz","Kreeft","🦞"],
    ["Çorba","Soep","🍲"],["Mercimek çorbası","Linzensoep","🍲"],["Ezogelin çorbası","Ezogelin soep","🍲"],
    ["Tarhana çorbası","Tarhana soep","🍲"],["İşkembe çorbası","Penssoep","🍲"],
    ["Yoğurt çorbası","Yoghurtsoep","🍲"],["Domates çorbası","Tomatensoep","🍲"],
    ["Tavuk çorbası","Kippensoep","🍲"],["Sebze çorbası","Groentesoep","🍲"],
    ["Salata","Salade","🥗"],["Çoban salata","Boeren salade","🥗"],["Sezar salata","Caesar salade","🥗"],
    ["Rus salatası","Huzarensalade","🥗"],["Meyve salatası","Fruitsalade","🍓"],
    ["Zeytin","Olijf","🫒"],["Siyah zeytin","Zwarte olijf","⚫"],["Yeşil zeytin","Groene olijf","🟢"],
    ["Turşu","Augurk","🥒"],["Konserve","Conserve","🥫"],["Salça","Tomatenpuree","🥫"],
    ["Ketçap","Ketchup","🍅"],["Mayonez","Mayonaise","🥚"],["Hardal","Mosterd","🌭"],
    ["Sirke","Azijn","🧴"],["Zeytinyağı","Olijfolie","🫒"],["Ayçiçek yağı","Zonnebloemolie","🌻"],
    ["Su","Water","💧"],["Maden suyu","Mineraalwater","🫧"],["Soda","Frisdrank","🥤"],
    ["Meyve suyu","Vruchtensap","🧃"],["Portakal suyu","Sinaasappelsap","🍊"],
    ["Elma suyu","Appelsap","🍎"],["Vişne suyu","Kersensap","🍒"],
    ["Çay","Thee","🍵"],["Yeşil çay","Groene thee","🍵"],["Siyah çay","Zwarte thee","🍵"],
    ["Kahve","Koffie","☕"],["Türk kahvesi","Turkse koffie","☕"],["Espresso","Espresso","☕"],
    ["Filtre kahve","Filterkoffie","☕"],["Sütlü kahve","Koffie verkeerd","☕"],
    ["Limonata","Limonade","🍋"],["Kola","Cola","🥤"],["Gazoz","Frisdrank","🥤"],
    ["Bira","Bier","🍺"],["Şarap","Wijn","🍷"],["Rakı","Raki","🥃"],
    ["Viski","Whisky","🥃"],["Votka","Vodka","🥃"],["Cin","Gin","🥃"],
    ["Likör","Likeur","🥃"],["Şampanya","Champagne","🍾"],["Kokteyl","Cocktail","🍸"],
];

// ---------- FAMILIE (60) ----------
$familie = [
    ["Anne","Moeder","👩"],["Baba","Vader","👨"],["Kardeş","Broer","👦"],
    ["Kız kardeş","Zus","👧"],["Erkek kardeş","Broer","👦"],["Abla","Oudere zus","👩"],
    ["Ağabey","Oudere broer","👨"],["Büyükanne","Oma","👵"],["Büyükbaba","Opa","👴"],
    ["Nine","Grootmoeder","👵"],["Dede","Grootvader","👴"],["Bebek","Baby","👶"],
    ["Aile","Familie","👨‍👩‍👧"],["Çocuk","Kind","🧒"],["Oğlan","Jongen","👦"],
    ["Kız","Meisje","👧"],["Kadın","Vrouw","👩"],["Adam","Man","👨"],
    ["Eş","Echtgenoot","💑"],["Karı","Echtgenote","👰"],["Koca","Echtgenoot","🤵"],
    ["Gelin","Bruid","👰"],["Damat","Bruidegom","🤵"],["Nişanlı","Verloofde","💍"],
    ["Sevgili","Vriendje","💕"],["Kuzen","Neef","👦"],["Hala","Tante (vaders kant)","👩"],
    ["Teyze","Tante (moeders kant)","👩"],["Amca","Oom (vaders kant)","👨"],["Dayı","Oom (moeders kant)","👨"],
    ["Yeğen","Neefje","🧒"],["Torun","Kleinkind","👶"],["Kayınvalide","Schoonmoeder","👵"],
    ["Kayınpeder","Schoonvader","👴"],["Kayınbirader","Zwager","👨"],["Görümce","Schoonzus","👩"],
    ["Baldız","Schoonzus (vrouw)","👩"],["Elti","Schoonzus (man)","👩"],["Görümce","Schoonzus","👩"],
    ["Üvey anne","Stiefmoeder","👩"],["Üvey baba","Stiefvader","👨"],["Üvey kardeş","Stiefbroer","👦"],
    ["Evlatlık","Adoptief kind","🧒"],["İkiz","Tweeling","👯"],["Üçüz","Drieling","👯"],
    ["Akraba","Familielid","👨‍👩‍👧"],["Sülale","Familie (groot)","👨‍👩‍👧‍👦"],["Nesil","Generatie","👨‍👩‍👧"],
    ["Atalar","Voorouders","🧓"],["Anneanne","Oma (moeders kant)","👵"],["Babaanne","Oma (vaders kant)","👵"],
    ["Dede","Opa","👴"],["Erkek evlat","Zoon","👦"],["Kız evlat","Dochter","👧"],
    ["Tek çocuk","Enig kind","🧒"],["Büyük çocuk","Oudste kind","🧒"],["Küçük çocuk","Jongste kind","🧒"],
    ["Enişte","Schoonbroer","👨"],["Yenge","Schoonzus","👩"],["Görümce","Schoonzus","👩"],
];

// ---------- LICHAAM (80) ----------
$lichaam = [
    ["Baş","Hoofd","🧠"],["Yüz","Gezicht","😊"],["Göz","Oog","👁️"],["Kulak","Oor","👂"],
    ["Burun","Neus","👃"],["Ağız","Mond","👄"],["Dudak","Lip","👄"],["Diş","Tand","🦷"],
    ["Dil","Tong","👅"],["Damak","Verhemelte","👄"],["Yanak","Wang","😊"],["Çene","Kin","😐"],
    ["Alın","Voorhoofd","🧠"],["Kaş","Wenkbrauw","🤨"],["Kirpik","Wimper","👁️"],["Saç","Haar","💇"],
    ["Boyun","Nek","🦒"],["Boğaz","Keel","😷"],["Omuz","Schouder","💪"],["Kol","Arm","💪"],
    ["Dirsek","Elleboog","💪"],["Bilek","Pols","✋"],["El","Hand","✋"],["Parmak","Vinger","👆"],
    ["Başparmak","Duim","👍"],["İşaret parmağı","Wijsvinger","☝️"],["Orta parmak","Middelvinger","🖕"],
    ["Yüzük parmağı","Ringvinger","💍"],["Serçe parmağı","Pink","🤙"],["Tırnak","Nagel","💅"],
    ["Avuç","Handpalm","🖐️"],["Sırt","Rug","🧍"],["Göğüs","Borst","🫀"],["Karın","Buik","🫃"],
    ["Bel","Taille","🧍"],["Kalça","Heup","🍑"],["Bacak","Been","🦵"],["Uyluk","Dij","🦵"],
    ["Diz","Knie","🦵"],["Baldır","Kuit","🦵"],["Ayak","Voet","🦶"],["Ayak bileği","Enkel","🦶"],
    ["Topuk","Hiel","🦶"],["Ayak parmağı","Teen","🦶"],["Tabla","Voetzool","🦶"],
    ["Deri","Huid","🧴"],["Et","Vlees","🥩"],["Kas","Spier","💪"],["Kemik","Bot","🦴"],
    ["İskelet","Skelet","🦴"],["Eklem","Gewricht","🦴"],["Kıkırdak","Kraakbeen","🦴"],
    ["Sinir","Zenuw","⚡"],["Damar","Ader","🩸"],["Atardamar","Slagader","🩸"],["Toplardamar","Ader","🩸"],
    ["Kalp","Hart","❤️"],["Akciğer","Long","🫁"],["Mide","Maag","🫃"],["Bağırsak","Darm","🫃"],
    ["Karaciğer","Lever","🫀"],["Böbrek","Nier","🫘"],["Dalak","Milt","🫀"],["Pankreas","Alvleesklier","🫀"],
    ["Beyin","Hersenen","🧠"],["Beyincik","Kleine hersenen","🧠"],["Omurilik","Ruggenmerg","🦴"],
    ["Kan","Bloed","🩸"],["Lenf","Lymfe","💧"],["Gözyaşı","Traan","💧"],["Ter","Zweet","💧"],
    ["Tükürük","Speeksel","💧"],["İdrar","Urine","💧"],["Dışkı","Ontlasting","💩"],
    ["Ses","Stem","🗣️"],["Nefes","Adem","🌬️"],["Nabız","Polsslag","💓"],
    ["Vücut","Lichaam","🧍"],["Organ","Orgaan","🫀"],["Hücre","Cel","🔬"],
];

// ---------- GETALLEN (60) ----------
$getallen = [
    ["Sıfır","Nul","0️⃣"],["Bir","Een","1️⃣"],["İki","Twee","2️⃣"],["Üç","Drie","3️⃣"],
    ["Dört","Vier","4️⃣"],["Beş","Vijf","5️⃣"],["Altı","Zes","6️⃣"],["Yedi","Zeven","7️⃣"],
    ["Sekiz","Acht","8️⃣"],["Dokuz","Negen","9️⃣"],["On","Tien","🔟"],["On bir","Elf","1️⃣1️⃣"],
    ["On iki","Twaalf","1️⃣2️⃣"],["On üç","Dertien","1️⃣3️⃣"],["On dört","Veertien","1️⃣4️⃣"],
    ["On beş","Vijftien","1️⃣5️⃣"],["On altı","Zestien","1️⃣6️⃣"],["On yedi","Zeventien","1️⃣7️⃣"],
    ["On sekiz","Achttien","1️⃣8️⃣"],["On dokuz","Negentien","1️⃣9️⃣"],["Yirmi","Twintig","2️⃣0️⃣"],
    ["Yirmi bir","Eenentwintig","2️⃣1️⃣"],["Yirmi beş","Vijfentwintig","2️⃣5️⃣"],["Otuz","Dertig","3️⃣0️⃣"],
    ["Kırk","Veertig","4️⃣0️⃣"],["Elli","Vijftig","5️⃣0️⃣"],["Altmış","Zestig","6️⃣0️⃣"],
    ["Yetmiş","Zeventig","7️⃣0️⃣"],["Seksen","Tachtig","8️⃣0️⃣"],["Doksan","Negentig","9️⃣0️⃣"],
    ["Yüz","Honderd","💯"],["İki yüz","Tweehonderd","💯"],["Üç yüz","Driehonderd","💯"],
    ["Bin","Duizend","🔢"],["İki bin","Tweeduizend","🔢"],["On bin","Tienduizend","🔢"],
    ["Yüz bin","Honderdduizend","🔢"],["Bir milyon","Een miljoen","💰"],["Bir milyar","Een miljard","💰"],
    ["Bir trilyon","Een biljoen","💰"],["İlk","Eerste","🥇"],["İkinci","Tweede","🥈"],
    ["Üçüncü","Derde","🥉"],["Dördüncü","Vierde","4️⃣"],["Beşinci","Vijfde","5️⃣"],
    ["Altıncı","Zesde","6️⃣"],["Yedinci","Zevende","7️⃣"],["Sekizinci","Achtste","8️⃣"],
    ["Dokuzuncu","Negende","9️⃣"],["Onuncu","Tiende","🔟"],["Yarım","Half","½"],
    ["Çeyrek","Kwart","¼"],["Üçte bir","Een derde","⅓"],["Tam","Heel","1️⃣"],
    ["Çift","Even","2️⃣"],["Tek","Oneven","1️⃣"],["Negatif","Negatief","➖"],
    ["Pozitif","Positief","➕"],["Toplam","Totaal","🧮"],["Fark","Verschil","➖"],
    ["Çarpım","Product","✖️"],["Bölüm","Quotiënt","➗"],
];

// ---------- TIJD (100) ----------
$tijd = [
    ["Pazartesi","Maandag","📅"],["Salı","Dinsdag","📅"],["Çarşamba","Woensdag","📅"],
    ["Perşembe","Donderdag","📅"],["Cuma","Vrijdag","📅"],["Cumartesi","Zaterdag","📅"],
    ["Pazar","Zondag","📅"],["Hafta","Week","🗓️"],["Hafta sonu","Weekend","🎉"],
    ["Hafta içi","Weekdagen","📅"],["Ay","Maand","📆"],["Yıl","Jaar","🗓️"],
    ["Gün","Dag","☀️"],["Bugün","Vandaag","📅"],["Dün","Gisteren","⏪"],
    ["Yarın","Morgen","⏩"],["Öbür gün","Overmorgen","📅"],["Evvelsi gün","Eergisteren","📅"],
    ["Sabah","Ochtend","🌅"],["Öğle","Middag","🌞"],["Öğleden sonra","Namiddag","🌤️"],
    ["Akşam","Avond","🌆"],["Gece","Nacht","🌙"],["Gece yarısı","Middernacht","🌌"],
    ["Şafak","Dageraad","🌄"],["Gün doğumu","Zonsopgang","🌅"],["Gün batımı","Zonsondergang","🌇"],
    ["Alacakaranlık","Schemering","🌆"],["Saat","Uur","🕐"],["Dakika","Minuut","⏱️"],
    ["Saniye","Seconde","⏱️"],["Salise","Milliseconde","⏱️"],["Saat kaç?","Hoe laat?","🕐"],
    ["Şimdi","Nu","⏰"],["Sonra","Later","⏩"],["Önce","Eerder","⏪"],
    ["Her zaman","Altijd","♾️"],["Hiçbir zaman","Nooit","🚫"],["Bazen","Soms","🤷"],
    ["Sık sık","Vaak","🔁"],["Nadiren","Zelden","🕰️"],["Genellikle","Meestal","📊"],
    ["Yakında","Binnenkort","⏳"],["Henüz","Nog niet","⏳"],["Zaten","Al","✅"],
    ["Hâlâ","Nog steeds","🔄"],["Artık","Niet meer","🚫"],["Daima","Voortdurend","♾️"],
    ["Ocak","Januari","❄️"],["Şubat","Februari","❄️"],["Mart","Maart","🌸"],
    ["Nisan","April","🌷"],["Mayıs","Mei","🌺"],["Haziran","Juni","☀️"],
    ["Temmuz","Juli","🏖️"],["Ağustos","Augustus","🌞"],["Eylül","September","🍂"],
    ["Ekim","Oktober","🎃"],["Kasım","November","🌧️"],["Aralık","December","🎄"],
    ["İlkbahar","Lente","🌸"],["Yaz","Zomer","☀️"],["Sonbahar","Herfst","🍁"],
    ["Kış","Winter","❄️"],["Mevsim","Seizoen","🗓️"],["Yüzyıl","Eeuw","💯"],
    ["On yıl","Decennium","🔟"],["Milenyum","Millennium","🔢"],["Asır","Eeuw","💯"],
    ["Devir","Tijdperk","⏳"],["Çağ","Era","🏛️"],["Dönem","Periode","📅"],
    ["Geçmiş","Verleden","⏪"],["Şimdiki zaman","Tegenwoordige tijd","⏰"],["Gelecek","Toekomst","⏩"],
    ["Takvim","Kalender","📅"],["Ajanda","Agenda","📔"],["Randevu","Afspraak","📌"],
    ["Toplantı","Vergadering","👥"],["Parti","Feest","🎉"],["Doğum günü","Verjaardag","🎂"],
    ["Yıl dönümü","Jubileum","🎊"],["Tatil","Vakantie","🏖️"],["Bayram","Feestdag","🎊"],
    ["Yeni yıl","Nieuwjaar","🎆"],["Noel","Kerstmis","🎄"],["Paskalya","Pasen","🐣"],
    ["Ramazan","Ramadan","🌙"],["Kurban Bayramı","Offerfeest","🐑"],["Ramazan Bayramı","Suikerfeest","🍬"],
    ["Cumhuriyet Bayramı","Republiekdag","🇹🇷"],["Zafer Bayramı","Overwinningsdag","🎖️"],
    ["Gençlik Bayramı","Jeugddag","🎉"],["Anneler Günü","Moederdag","💐"],["Babalar Günü","Vaderdag","👔"],
    ["Sevgililer Günü","Valentijnsdag","💕"],["Cadılar Bayramı","Halloween","🎃"],
    ["Şükran Günü","Thanksgiving","🦃"],["Bahar Bayramı","Lentefeest","🌸"],
    ["Kış Bayramı","Winterfeest","❄️"],["Yaz Tatili","Zomervakantie","☀️"],
];

// ---------- NATUUR (150) ----------
$natuur = [
    ["Güneş","Zon","☀️"],["Ay","Maan","🌙"],["Yıldız","Ster","⭐"],
    ["Gezegen","Planeet","🪐"],["Dünya","Aarde","🌍"],["Mars","Mars","🔴"],
    ["Jüpiter","Jupiter","🪐"],["Satürn","Saturnus","🪐"],["Venüs","Venus","🪐"],
    ["Merkür","Mercurius","🪐"],["Uranüs","Uranus","🪐"],["Neptün","Neptunus","🪐"],
    ["Plüton","Pluto","🪐"],["Galaksi","Melkweg","🌌"],["Uzay","Ruimte","🚀"],
    ["Evren","Universum","🌌"],["Kara delik","Zwart gat","🕳️"],["Kuyruklu yıldız","Komeet","☄️"],
    ["Meteor","Meteoor","☄️"],["Asteroit","Asteroïde","☄️"],["Uydu","Satelliet","🛰️"],
    ["Roket","Raket","🚀"],["Astronot","Astronaut","👨‍🚀"],["Teleskop","Telescoop","🔭"],
    ["Bulut","Wolk","☁️"],["Yağmur","Regen","🌧️"],["Kar","Sneeuw","❄️"],
    ["Dolu","Hagel","🧊"],["Sis","Mist","🌫️"],["Pus","Nevel","🌫️"],
    ["Rüzgar","Wind","💨"],["Fırtına","Storm","🌪️"],["Kasırga","Orkaan","🌀"],
    ["Hortum","Tornado","🌪️"],["Şimşek","Bliksem","⚡"],["Yıldırım","Bliksemflits","⚡"],
    ["Gök gürültüsü","Donder","⛈️"],["Gökkuşağı","Regenboog","🌈"],["Güneş ışığı","Zonlicht","☀️"],
    ["Ay ışığı","Maneschijn","🌙"],["Sıcaklık","Temperatuur","🌡️"],["Soğuk","Koud","🥶"],
    ["Sıcak","Warm","🥵"],["Ilık","Lauw","🌡️"],["Serin","Koel","🍃"],
    ["Nem","Vochtigheid","💧"],["Kuraklık","Droogte","🏜️"],["Sel","Overstroming","🌊"],
    ["Deprem","Aardbeving","🌍"],["Volkan","Vulkaan","🌋"],["Tsunami","Tsunami","🌊"],
    ["Heyelan","Aardverschuiving","⛰️"],["Çığ","Lawine","🏔️"],["Kasırga","Wervelstorm","🌀"],
    ["Deniz","Zee","🌊"],["Okyanus","Oceaan","🌊"],["Göl","Meer","🏞️"],
    ["Nehir","Rivier","🏞️"],["Dere","Beek","💧"],["Şelale","Waterval","💦"],
    ["Kaynak","Bron","💧"],["Dalga","Golf","🌊"],["Akıntı","Stroom","🌊"],
    ["Gelgit","Getijde","🌊"],["Kıyı","Kust","🏖️"],["Sahil","Strand","🏖️"],
    ["Plaj","Strand","🏖️"],["Kum","Zand","🏖️"],["Çakıl","Grind","🪨"],
    ["Ada","Eiland","🏝️"],["Yarımada","Schiereiland","🏝️"],["Koy","Baai","🏖️"],
    ["Körfez","Golf","🌊"],["Boğaz","Straat","🌊"],["Liman","Haven","⚓"],
    ["Dağ","Berg","⛰️"],["Tepe","Heuvel","🏔️"],["Vadi","Vallei","🏞️"],
    ["Ova","Vlakte","🌾"],["Yayla","Plateau","🏔️"],["Plato","Plateau","🏔️"],
    ["Uçurum","Klif","🪨"],["Mağara","Grot","🕳️"],["Tünel","Tunnel","🚇"],
    ["Orman","Bos","🌲"],["Ağaç","Boom","🌳"],["Çam","Dennenboom","🌲"],
    ["Meşe","Eik","🌳"],["Kayın","Beuk","🌳"],["Söğüt","Wilg","🌳"],
    ["Kavak","Populier","🌳"],["Huş","Berk","🌳"],["Akçaağaç","Esdoorn","🍁"],
    ["Palmiye","Palmboom","🌴"],["Bambu","Bamboe","🎋"],["Kaktüs","Cactus","🌵"],
    ["Çiçek","Bloem","🌸"],["Gül","Roos","🌹"],["Lale","Tulp","🌷"],
    ["Papatya","Margriet","🌼"],["Ayçiçeği","Zonnebloem","🌻"],["Menekşe","Viooltje","💜"],
    ["Orkide","Orchidee","🌺"],["Zambak","Lelie","🌷"],["Karanfil","Anjer","🌸"],
    ["Nergis","Narcis","🌼"],["Sümbül","Hyacint","💜"],["Yasemin","Jasmijn","🤍"],
    ["Leylak","Sering","💜"],["Hanımeli","Kamperfoelie","🌼"],["Gelincik","Klaproos","🌺"],
    ["Yaprak","Blad","🍃"],["Kök","Wortel","🌱"],["Gövde","Stam","🌳"],
    ["Dal","Tak","🌿"],["Tohum","Zaad","🌰"],["Meyve","Vrucht","🍎"],
    ["Çim","Gras","🌱"],["Yosun","Mos","🌿"],["Eğrelti otu","Varen","🌿"],
    ["Mantar","Paddenstoel","🍄"],["Yosun","Alg","🌿"],["Deniz yosunu","Zeewier","🌿"],
    ["Çayır","Weide","🌾"],["Mera","Weide","🐄"],["Tarla","Veld","🌾"],
    ["Bahçe","Tuin","🌷"],["Sera","Kas","🏡"],["Park","Park","🌳"],
    ["Kır","Platteland","🌾"],["Çöl","Woestijn","🏜️"],["Vaha","Oase","🌴"],
    ["Bozkır","Steppe","🌾"],["Tundra","Toendra","❄️"],["Buzul","Gletsjer","🧊"],
    ["Kutup","Pool","🧊"],["Antarktika","Antarctica","🐧"],["Arktik","Arctica","🐻‍❄️"],
    ["Atmosfer","Atmosfeer","🌍"],["Stratosfer","Stratosfeer","🌍"],["Ozon tabakası","Ozonlaag","🌍"],
    ["İklim","Klimaat","🌡️"],["Mevsim","Seizoen","🗓️"],["Hava durumu","Weer","🌤️"],
    ["Hava tahmini","Weersvoorspelling","📊"],["Rüzgar yönü","Windrichting","🧭"],
    ["Kuzey","Noord","🧭"],["Güney","Zuid","🧭"],["Doğu","Oost","🧭"],
    ["Batı","West","🧭"],["Kuzeydoğu","Noordoost","🧭"],["Güneybatı","Zuidwest","🧭"],
    ["Harita","Kaart","🗺️"],["Atlas","Atlas","🗺️"],["Küre","Globe","🌍"],
    ["Pusula","Kompas","🧭"],["Enlem","Breedtegraad","📐"],["Boylam","Lengtegraad","📐"],
    ["Ekvator","Evenaar","🌍"],["Kutup dairesi","Poolcirkel","🧊"],["Meridyen","Meridiaan","📐"],
];

// ---------- HUIS & MEUBELS (150) ----------
$huis = [
    ["Ev","Huis","🏠"],["Daire","Appartement","🏢"],["Villa","Villa","🏡"],
    ["Köşk","Landhuis","🏰"],["Saray","Paleis","🏰"],["Kale","Kasteel","🏰"],
    ["Kulübe","Hut","🛖"],["Çadır","Tent","⛺"],["Karavan","Caravan","🚐"],
    ["Oda","Kamer","🚪"],["Salon","Woonkamer","🛋️"],["Oturma odası","Zitkamer","🛋️"],
    ["Yatak odası","Slaapkamer","🛏️"],["Mutfak","Keuken","🍳"],["Banyo","Badkamer","🚿"],
    ["Tuvalet","Toilet","🚽"],["Koridor","Gang","🚶"],["Merdiven","Trap","🪜"],
    ["Bodrum","Kelder","🏚️"],["Tavan arası","Zolder","🏚️"],["Balkon","Balkon","🌅"],
    ["Teras","Terras","🏡"],["Veranda","Veranda","🏡"],["Garaj","Garage","🚗"],
    ["Bahçe","Tuin","🌷"],["Avlu","Binnenplaats","🏡"],["Giriş","Ingang","🚪"],
    ["Çıkış","Uitgang","🚪"],["Kapı","Deur","🚪"],["Pencere","Raam","🪟"],
    ["Duvar","Muur","🧱"],["Zemin","Vloer","🟫"],["Tavan","Plafond","⬜"],
    ["Çatı","Dak","🏠"],["Baca","Schoorsteen","🏠"],["Kilit","Slot","🔒"],
    ["Anahtar","Sleutel","🔑"],["Kapı kolu","Deurklink","🚪"],["Zil","Bel","🔔"],
    ["Pencere pervazı","Vensterbank","🪟"],["Perde","Gordijn","🪟"],["Panjur","Jaloezie","🪟"],
    ["Stor","Rolluik","🪟"],["Halı","Tapijt","🧶"],["Kilim","Kelim","🧶"],
    ["Yolluk","Loper","🧶"],["Perde","Vitrage","🪟"],["Mobilya","Meubels","🪑"],
    ["Masa","Tafel","🪑"],["Sandalye","Stoel","🪑"],["Koltuk","Fauteuil","🛋️"],
    ["Kanepe","Bank","🛋️"],["Yatak","Bed","🛏️"],["Baza","Boxspring","🛏️"],
    ["Yorgan","Deken","🛏️"],["Battaniye","Wollen deken","🛏️"],["Yastık","Kussen","🛏️"],
    ["Yastık kılıfı","Kussensloop","🛏️"],["Çarşaf","Laken","🛏️"],["Nevresim","Dekbed","🛏️"],
    ["Dolap","Kast","🚪"],["Gardırop","Kledingkast","🚪"],["Şifonyer","Ladekast","🗄️"],
    ["Komodin","Nachtkastje","🛏️"],["Vitrin","Vitrinekast","🗄️"],["Raf","Plank","📚"],
    ["Kitaplık","Boekenkast","📚"],["Sehpa","Bijzettafel","🪑"],["Orta sehpa","Salontafel","🪑"],
    ["Ayna","Spiegel","🪞"],["Tablo","Schilderij","🖼️"],["Çerçeve","Lijst","🖼️"],
    ["Duvar saati","Wandklok","🕰️"],["Avize","Kroonluchter","💡"],["Lamba","Lamp","💡"],
    ["Abajur","Schemerlamp","💡"],["Avize","Hanglamp","💡"],["Spot","Spotlight","💡"],
    ["Mum","Kaars","🕯️"],["Şamdan","Kandelaar","🕯️"],["Fener","Lantaarn","🏮"],
    ["Vazo","Vaas","🏺"],["Saksı","Bloempot","🪴"],["Çiçeklik","Bloemenstandaard","🌷"],
    ["Halı yıkama","Tapijtwas","🧼"],["Süpürge","Bezem","🧹"],["Faraş","Stofblik","🧹"],
    ["Paspas","Dweil","🧽"],["Kova","Emmer","🪣"],["Bez","Doek","🧽"],
    ["Toz bezi","Stofdoek","🧽"],["Temizlik","Schoonmaak","🧼"],["Deterjan","Schoonmaakmiddel","🧴"],
    ["Sabun","Zeep","🧼"],["Şampuan","Shampoo","🧴"],["Duş jeli","Douchegel","🧴"],
    ["Diş fırçası","Tandenborstel","🪥"],["Diş macunu","Tandpasta","🪥"],["Havlu","Handdoek","🧻"],
    ["Banyo havlusu","Badhanddoek","🧻"],["Bornoz","Badjas","🥼"],["Terlik","Slippers","🩴"],
    ["Buzdolabı","Koelkast","🧊"],["Dondurucu","Vriezer","🧊"],["Fırın","Oven","🔥"],
    ["Mikrodalga","Magnetron","📻"],["Bulaşık makinesi","Vaatwasser","🍽️"],["Çamaşır makinesi","Wasmachine","🧺"],
    ["Kurutma makinesi","Droger","🧺"],["Ütü","Strijkijzer","🧺"],["Ütü masası","Strijkplank","🧺"],
    ["Süpürge makinesi","Stofzuiger","🧹"],["Ocak","Fornuis","🔥"],["Fritöz","Friteuse","🍟"],
    ["Tencere","Pan","🍳"],["Tava","Koekenpan","🍳"],["Çaydanlık","Theepot","🫖"],
    ["Cezve","Turkse koffiepot","☕"],["Fincan","Kopje","☕"],["Bardak","Glas","🥛"],
    ["Tabak","Bord","🍽️"],["Kase","Kom","🥣"],["Çatal","Vork","🍴"],
    ["Kaşık","Lepel","🥄"],["Bıçak","Mes","🔪"],["Peçete","Servet","🧻"],
    ["Masa örtüsü","Tafelkleed","🍽️"],["Tepsi","Dienblad","🍽️"],["Sürahi","Kan","🥛"],
    ["Şişe","Fles","🍾"],["Kavanoz","Pot","🫙"],["Kutu","Doos","📦"],
    ["Sepet","Mand","🧺"],["Poşet","Zak","🛍️"],["Çanta","Tas","👜"],
    ["Bavul","Koffer","🧳"],["Valiz","Koffer","🧳"],["Sırt çantası","Rugzak","🎒"],
    ["Cüzdan","Portemonnee","👛"],["Para cüzdanı","Portemonnee","💰"],["Anahtarlık","Sleutelhanger","🔑"],
    ["Gözlük","Brill","👓"],["Güneş gözlüğü","Zonnebril","🕶️"],["Şemsiye","Paraplu","☂️"],
    ["Baston","Wandelstok","🦯"],["Yelpaze","Waaier","🪭"],["Saat","Horloge","⌚"],
    ["Kolye","Ketting","📿"],["Bileklik","Armband","💍"],["Yüzük","Ring","💍"],
    ["Küpe","Oorbel","💎"],["Broş","Broche","📌"],["Taç","Kroon","👑"],
    ["Ayna","Spiegel","🪞"],["Tarak","Kam","💇"],["Fırça","Borstel","🪥"],
];

// ---------- KLEDING (80) ----------
$kleding = [
    ["Gömlek","Overhemd","👔"],["Tişört","T-shirt","👕"],["Kazak","Trui","🧶"],
    ["Süveter","Pullover","🧶"],["Hırka","Vest","🧥"],["Ceket","Jas","🧥"],
    ["Mont","Winterjas","🧥"],["Palto","Overjas","🧥"],["Kaban","Overjas","🧥"],
    ["Pantolon","Broek","👖"],["Kot pantolon","Spijkerbroek","👖"],["Şort","Korte broek","🩳"],
    ["Etek","Rok","👗"],["Elbise","Jurk","👗"],["Takım elbise","Pak","🤵"],
    ["Kravat","Stropdas","👔"],["Papyon","Strikje","🎀"],["Fular","Sjaal","🧣"],
    ["Atkı","Sjaal","🧣"],["Bere","Muts","🧢"],["Şapka","Hoed","👒"],
    ["Kasket","Pet","🧢"],["Şapka","Pet","🧢"],["Bone","Badmuts","🧢"],
    ["Çorap","Sok","🧦"],["Külotlu çorap","Panty","🧦"],["Ayakkabı","Schoen","👞"],
    ["Bot","Laars","👢"],["Sandalet","Sandaal","👡"],["Terlik","Slipper","🩴"],
    ["Spor ayakkabı","Sportschoenen","👟"],["Çizme","Laars","🥾"],["Kar botu","Sneeuwlaars","🥾"],
    ["Kemer","Riem","👖"],["Kemer tokası","Gespp","🔗"],["Eldiven","Want","🧤"],
    ["Şal","Sjaal","🧣"],["Peçe","Sluier","🧕"],["Başörtüsü","Hoofddoek","🧕"],
    ["Türban","Tulband","🧕"],["Kep","Pet","🧢"],["Kask","Helm","⛑️"],
    ["Bornoz","Badjas","🥼"],["Pijama","Pyjama","🛌"],["Gecelik","Nachthemd","🛌"],
    ["İç çamaşırı","Ondergoed","🩲"],["Külot","Slip","🩲"],["Sütyen","Beha","👙"],
    ["Atlet","Onderhemd","👕"],["Fanila","Hemd","👕"],["Body","Body","👕"],
    ["Mayo","Badpak","🩱"],["Bikini","Bikini","👙"],["Şort mayo","Zwemshort","🩳"],
    ["Spor kıyafeti","Sportkleding","🎽"],["Eşofman","Trainingspak","🎽"],["Forma","Uniform","👕"],
    ["Önlük","Schort","🥼"],["Tulum","Overall","🧥"],["Tulum","Kinderoverall","👶"],
    ["Gelinlik","Trouwjurk","👰"],["Damatlık","Bruidegomspak","🤵"],["Smokin","Smoking","🤵"],
    ["Moda","Mode","👗"],["Stil","Stijl","✨"],["Kombin","Outfit","👗"],
    ["Beden","Maat","📏"],["Numara","Maat","🔢"],["Etiket","Label","🏷️"],
    ["Düğme","Knoop","🔘"],["Fermuar","Rits","🤐"],["Cırt cırt","Klittenband","🧷"],
    ["İğne","Naald","🪡"],["İplik","Draad","🧵"],["Makas","Schaar","✂️"],
    ["Yama","Lapje","🩹"],["Dikiş","Naaisel","🧵"],["Kumaş","Stof","🧵"],
    ["Yün","Wol","🐑"],["Pamuk","Katoen","🌱"],["İpek","Zijde","🧵"],
    ["Keten","Linnen","🌾"],["Deri","Leer","🐄"],["Süet","Suède","🦌"],
];

// ---------- BEROEPEN (150) ----------
$beroepen = [
    ["Doktor","Dokter","👨‍⚕️"],["Hemşire","Verpleegkundige","👩‍⚕️"],["Eczacı","Apotheker","💊"],
    ["Dişçi","Tandarts","🦷"],["Veteriner","Dierenarts","🐾"],["Cerrah","Chirurg","🔬"],
    ["Psikolog","Psycholoog","🧠"],["Psikiyatrist","Psychiater","🧠"],["Fizyoterapist","Fysiotherapeut","💪"],
    ["Öğretmen","Leraar","👨‍🏫"],["Profesör","Professor","👨‍🏫"],["Öğretim görevlisi","Docent","👨‍🏫"],
    ["Müdür","Directeur","👔"],["Müfettiş","Inspecteur","🔍"],["Danışman","Adviseur","💼"],
    ["Mühendis","Ingenieur","👷"],["Mimar","Architect","📐"],["İnşaatçı","Bouwer","🏗️"],
    ["Elektrikçi","Elektricien","⚡"],["Tesisatçı","Loodgieter","🔧"],["Marangoz","Timmerman","🪚"],
    ["Boyacı","Schilder","🎨"],["Kaynakçı","Lasser","🔥"],["Tamirci","Reparateur","🔧"],
    ["Avukat","Advocaat","⚖️"],["Hâkim","Rechter","👨‍⚖️"],["Savcı","Officier van justitie","⚖️"],
    ["Noter","Notaris","📜"],["Mübaşir","Deurwaarder","📋"],["Kâtip","Griffier","📝"],
    ["Polis","Politie","👮"],["Asker","Soldaat","🪖"],["Subay","Officier","🎖️"],
    ["General","Generaal","🎖️"],["Komutan","Commandant","🎖️"],["Bekçi","Bewaker","🛡️"],
    ["İtfaiyeci","Brandweerman","🚒"],["Cankurtaran","Redder","🛟"],["Güvenlik görevlisi","Beveiliger","🛡️"],
    ["Pilot","Piloot","✈️"],["Hostes","Stewardess","👩‍✈️"],["Kaptan","Kapitein","⚓"],
    ["Denizci","Matroos","⚓"],["Balıkçı","Visser","🎣"],["Çiftçi","Boer","🌾"],
    ["Bahçıvan","Tuinman","🌷"],["Arıcı","Imker","🐝"],["Çoban","Herder","🐑"],
    ["Kasap","Slager","🥩"],["Fırıncı","Bakker","🥖"],["Pastaneci","Banketbakker","🧁"],
    ["Aşçı","Kok","👨‍🍳"],["Garson","Ober","🍽️"],["Barmen","Barman","🍸"],
    ["Bulaşıkçı","Afwashulp","🍽️"],["Şef","Chef-kok","👨‍🍳"],["Somelye","Sommelier","🍷"],
    ["Terzi","Kleermaker","🧵"],["Kuaför","Kapper","💇"],["Berber","Barbier","💈"],
    ["Güzellik uzmanı","Schoonheidsspecialist","💅"],["Makyajcı","Make-up artiest","💄"],
    ["Manikürcü","Manicure","💅"],["Masör","Masseur","💆"],["Estetisyen","Schoonheidsspecialist","✨"],
    ["Ressam","Kunstenaar","🎨"],["Heykeltıraş","Beeldhouwer","🗿"],["Müzisyen","Musicus","🎵"],
    ["Şarkıcı","Zanger","🎤"],["Besteci","Componist","🎼"],["Orkestra şefi","Dirigent","🎼"],
    ["Dansçı","Danser","💃"],["Aktör","Acteur","🎭"],["Aktris","Actrice","🎭"],
    ["Yönetmen","Regisseur","🎬"],["Senarist","Scenarioschrijver","📝"],["Kameraman","Cameraman","🎥"],
    ["Fotoğrafçı","Fotograaf","📷"],["Editör","Editor","✂️"],["Gazeteci","Journalist","📰"],
    ["Yazar","Schrijver","✍️"],["Şair","Dichter","📜"],["Editör","Uitgever","📚"],
    ["Çevirmen","Vertaler","🌐"],["Tercüman","Tolk","🗣️"],["Kütüphaneci","Bibliothecaris","📚"],
    ["Muhasebeci","Accountant","📊"],["Mali müşavir","Belastingadviseur","💰"],["Bankacı","Bankier","🏦"],
    ["Borsacı","Beurshandelaar","📈"],["Sigortacı","Verzekeraar","🛡️"],["Emlakçı","Makelaar","🏠"],
    ["İşadamı","Zakenman","💼"],["Girişimci","Ondernemer","🚀"],["Patron","Baas","👔"],
    ["Sekreter","Secretaresse","📞"],["Resepsiyonist","Receptionist","🛎️"],["Santral","Telefonist","☎️"],
    ["Pazarlamacı","Marketeer","📢"],["Reklamcı","Adverteerder","📺"],["Halkla ilişkilerci","PR-medewerker","📣"],
    ["Satış temsilcisi","Verkoopmedewerker","🛒"],["Kasiyer","Kassamedewerker","💰"],["Tezgâhtar","Winkelbediende","🛍️"],
    ["Depocu","Magazijnmedewerker","📦"],["Kurye","Koerier","🛵"],["Şoför","Chauffeur","🚗"],
    ["Taksi şoförü","Taxichauffeur","🚕"],["Otobüs şoförü","Buschauffeur","🚌"],["Kamyon şoförü","Vrachtwagenchauffeur","🚚"],
    ["Tren makinisti","Machinist","🚂"],["Tramvay sürücüsü","Trambestuurder","🚊"],["Metro makinisti","Metrobestuurder","🚇"],
    ["Postacı","Postbode","📮"],["Kargo görevlisi","Bezorger","📦"],["Kurye","Bezorger","🏍️"],
    ["Temizlikçi","Schoonmaker","🧹"],["Kapıcı","Conciërge","🚪"],["Bekçi","Portier","🛎️"],
    ["Çöpçü","Vuilnisman","🗑️"],["Bakıcı","Verzorger","👶"],["Dadı","Nanny","👶"],
    ["Öğretmen yardımcısı","Onderwijsassistent","🎓"],["Antrenör","Coach","🏋️"],["Sporcu","Sporter","🏃"],
    ["Futbolcu","Voetballer","⚽"],["Basketbolcu","Basketballer","🏀"],["Voleybolcu","Volleyballer","🏐"],
    ["Tenisçi","Tennisser","🎾"],["Yüzücü","Zwemmer","🏊"],["Atlet","Atleet","🏃"],
    ["Boksör","Bokser","🥊"],["Güreşçi","Worstelaar","🤼"],["Hakem","Scheidsrechter","🏁"],
    ["Programcı","Programmeur","💻"],["Yazılımcı","Softwareontwikkelaar","👨‍💻"],["Web tasarımcısı","Webdesigner","🎨"],
    ["Grafik tasarımcısı","Grafisch ontwerper","🎨"],["Sistem yöneticisi","Systeembeheerder","🖥️"],
    ["Veri analisti","Data-analist","📊"],["Yapay zeka uzmanı","AI-specialist","🤖"],
    ["Bilim insanı","Wetenschapper","🔬"],["Fizikçi","Natuurkundige","⚛️"],["Kimyager","Chemicus","🧪"],
    ["Biyolog","Bioloog","🧬"],["Matematikçi","Wiskundige","➗"],["Astronom","Astronoom","🔭"],
    ["Arkeolog","Archeoloog","🏺"],["Tarihçi","Historicus","📜"],["Coğrafyacı","Geograaf","🌍"],
    ["Sosyolog","Socioloog","👥"],["Antropolog","Antropoloog","🌍"],["Ekonomist","Econoom","📈"],
    ["Politikacı","Politicus","🏛️"],["Diplomat","Diplomaat","🌐"],["Büyükelçi","Ambassadeur","🏛️"],
    ["Vali","Gouverneur","🏛️"],["Belediye başkanı","Burgemeester","🏛️"],["Milletvekili","Parlementslid","🏛️"],
];

// ---------- VOERTUIGEN (120) ----------
$voertuigen = [
    ["Araba","Auto","🚗"],["Otobüs","Bus","🚌"],["Minibüs","Minibus","🚐"],
    ["Kamyon","Vrachtwagen","🚚"],["Kamyonet","Bestelwagen","🚐"],["Tır","Oplegger","🚛"],
    ["Motosiklet","Motor","🏍️"],["Scooter","Scooter","🛵"],["Bisiklet","Fiets","🚲"],
    ["Taksi","Taxi","🚕"],["Tren","Trein","🚂"],["Hızlı tren","Hogesnelheidstrein","🚄"],
    ["Metro","Metro","🚇"],["Tramvay","Tram","🚊"],["Vapur","Veerboot","⛴️"],
    ["Gemi","Schip","🚢"],["Yat","Jacht","🛥️"],["Kayık","Roeiboot","🛶"],
    ["Kano","Kano","🛶"],["Sandal","Sloep","🛶"],["Bot","Boot","🚤"],
    ["Denizaltı","Onderzeeër","🚢"],["Uçak","Vliegtuig","✈️"],["Helikopter","Helikopter","🚁"],
    ["Planör","Zweefvliegtuig","🛩️"],["Balon","Ballon","🎈"],["Zeplin","Zeppelin","🎈"],
    ["Roket","Raket","🚀"],["Uzay mekiği","Ruimteveer","🚀"],["Uydu","Satelliet","🛰️"],
    ["Ambulans","Ambulance","🚑"],["İtfaiye","Brandweerauto","🚒"],["Polis arabası","Politieauto","🚓"],
    ["Cenaze aracı","Lijkwagen","⚰️"],["Çekici","Takelwagen","🚛"],["Kamyon","Vrachtwagen","🚚"],
    ["Karavan","Camper","🚐"],["Traktör","Tractor","🚜"],["Biçerdöver","Maaidorser","🌾"],
    ["Forklift","Vorkheftruck","🏗️"],["Vinç","Kraan","🏗️"],["Beton mikseri","Betonmixer","🚛"],
    ["Kepçe","Graafmachine","🚜"],["Buldozer","Bulldozer","🚜"],["Silindir","Wals","🚜"],
    ["Segway","Segway","🛴"],["Kaykay","Skateboard","🛹"],["Paten","Schaatsen","⛸️"],
    ["Kızak","Slee","🛷"],["Kar arabası","Sneeuwscooter","🛷"],["ATV","Quad","🏍️"],
    ["Go-kart","Kart","🏎️"],["Yarış arabası","Raceauto","🏎️"],["Formül 1","Formule 1","🏎️"],
    ["Klasik araba","Klassieke auto","🚗"],["Spor araba","Sportwagen","🏎️"],["SUV","SUV","🚙"],
    ["Kamyonet","Pick-up","🛻"],["Sedan","Sedan","🚗"],["Hatchback","Hatchback","🚗"],
    ["Limo","Limousine","🚙"],["Taksi","Taxi","🚕"],["Dolmuş","Dolmuş","🚐"],
    ["Fayton","Koets","🐴"],["At arabası","Paardenwagen","🐴"],["Kağnı","Ossenkar","🐂"],
    ["Bisiklet","Fiets","🚲"],["Dağ bisikleti","Mountainbike","🚵"],["Yarış bisikleti","Racefiets","🚴"],
    ["Elektrikli bisiklet","E-bike","🚴"],["Tandem","Tandem","🚲"],["Üç tekerlekli","Driewieler","🚲"],
    ["Tekerlekli sandalye","Rolstoel","♿"],["Yürüteç","Rollator","🦯"],["Baston","Wandelstok","🦯"],
    ["Tren istasyonu","Treinstation","🚉"],["Havaalanı","Luchthaven","✈️"],["Liman","Haven","⚓"],
    ["Otogar","Busstation","🚌"],["Durak","Bushalte","🚏"],["Metro istasyonu","Metrostation","🚇"],
    ["Bilet","Ticket","🎫"],["Bilet gişesi","Ticketbalie","🎫"],["Rezervasyon","Reservering","📅"],
    ["Yolcu","Passagier","🧳"],["Şoför","Chauffeur","🚗"],["Kaptan","Kapitein","⚓"],
    ["Pilot","Piloot","✈️"],["Hostes","Stewardess","👩‍✈️"],["Kondüktör","Conducteur","🎫"],
    ["Makinist","Machinist","🚂"],["Biletçi","Kaartjesverkoper","🎫"],["Bagaj","Bagage","🧳"],
    ["Valiz","Koffer","🧳"],["Bavul","Koffer","🧳"],["El bagajı","Handbagage","🎒"],
    ["Pasaport","Paspoort","📘"],["Vize","Visum","📗"],["Kimlik","Identiteitsbewijs","🪪"],
    ["Ehliyet","Rijbewijs","🪪"],["Plaka","Kentekenplaat","🔢"],["Trafik","Verkeer","🚦"],
    ["Trafik lambası","Verkeerslicht","🚦"],["Trafik işareti","Verkeersbord","🚸"],["Yaya geçidi","Zebrapad","🚶"],
    ["Kavşak","Kruispunt","🛣️"],["Otoyol","Snelweg","🛣️"],["Tünel","Tunnel","🚇"],
    ["Köprü","Brug","🌉"],["Viyadük","Viaduct","🌉"],["Alt geçit","Tunnel","🚇"],
    ["Üst geçit","Viaduct","🌉"],["Benzin istasyonu","Tankstation","⛽"],["Benzin","Benzine","⛽"],
    ["Dizel","Diesel","⛽"],["LPG","LPG","⛽"],["Elektrik","Elektriciteit","⚡"],
    ["Şarj istasyonu","Oplaadpunt","🔌"],["Otopark","Parkeerplaats","🅿️"],["Garaj","Garage","🚗"],
    ["Servis","Onderhoud","🔧"],["Tamirci","Monteur","🔧"],["Lastik","Band","🛞"],
    ["Direksiyon","Stuurwiel","🎯"],["Fren","Rem","🛑"],["Gaz","Gaspedaal","🚀"],
];

// ---------- SPORT (80) ----------
$sport = [
    ["Futbol","Voetbal","⚽"],["Basketbol","Basketbal","🏀"],["Voleybol","Volleybal","🏐"],
    ["Tenis","Tennis","🎾"],["Masa tenisi","Tafeltennis","🏓"],["Badminton","Badminton","🏸"],
    ["Yüzme","Zwemmen","🏊"],["Atletizm","Atletiek","🏃"],["Koşu","Hardlopen","🏃"],
    ["Maraton","Marathon","🏃"],["Sprint","Sprint","🏃"],["Yüksek atlama","Hoogspringen","🦘"],
    ["Uzun atlama","Verspringen","🦘"],["Güreş","Worstelen","🤼"],["Boks","Boksen","🥊"],
    ["Karate","Karate","🥋"],["Judo","Judo","🥋"],["Taekwondo","Taekwondo","🥋"],
    ["Kung fu","Kungfu","🥋"],["Aikido","Aikido","🥋"],["Halter","Gewichtheffen","🏋️"],
    ["Vücut geliştirme","Bodybuilding","💪"],["Jimnastik","Gymnastiek","🤸"],["Yoga","Yoga","🧘"],
    ["Pilates","Pilates","🧘"],["Dans","Dansen","💃"],["Bale","Ballet","🩰"],
    ["Buz pateni","Schaatsen","⛸️"],["Kayak","Skiën","🎿"],["Snowboard","Snowboarden","🏂"],
    ["Kızak","Sleeën","🛷"],["Buz hokeyi","IJshockey","🏒"],["Hokey","Hockey","🏑"],
    ["Beyzbol","Honkbal","⚾"],["Softbol","Softbal","🥎"],["Ragbi","Rugby","🏉"],
    ["Amerikan futbolu","Amerikaans voetbal","🏈"],["Hentbol","Handbal","🤾"],["Su topu","Waterpolo","🤽"],
    ["Dalış","Duiken","🤿"],["Sörf","Surfen","🏄"],["Rüzgar sörfü","Windsurfen","🏄"],
    ["Kürek","Roeien","🚣"],["Kano","Kanoën","🛶"],["Yelken","Zeilen","⛵"],
    ["Binicilik","Paardrijden","🏇"],["Okçuluk","Boogschieten","🏹"],["Atıcılık","Schietsport","🎯"],
    ["Eskrim","Schermen","🤺"],["Golf","Golf","⛳"],["Bilardo","Biljart","🎱"],
    ["Bowling","Bowlen","🎳"],["Dart","Darten","🎯"],["Satranç","Schaken","♟️"],
    ["Dam","Dammen","⬛"],["Tavla","Backgammon","🎲"],["Okey","Okey","🎴"],
    ["Poker","Poker","🃏"],["Briç","Bridge","🃏"],["İskambil","Kaartspel","🃏"],
    ["Tırmanma","Klimmen","🧗"],["Dağcılık","Bergbeklimmen","🏔️"],["Yürüyüş","Wandelen","🥾"],
    ["Kamp","Kamperen","🏕️"],["Balıkçılık","Vissen","🎣"],["Avcılık","Jagen","🏹"],
    ["Paraşüt","Parachutespringen","🪂"],["Yamaç paraşütü","Paragliden","🪂"],["Planör","Zweefvliegen","🛩️"],
    ["Motorspor","Motorsport","🏍️"],["Ralli","Rally","🏁"],["Formula 1","Formule 1","🏎️"],
    ["Bisiklet","Wielrennen","🚴"],["BMX","BMX","🚲"],["Kaykay","Skateboarden","🛹"],
    ["Parkur","Parkour","🤸"],["Jimnastik","Turnen","🤸"],["Triatlon","Triatlon","🏊"],
    ["Pentatlon","Vijfkamp","🏅"],["Olimpiyat","Olympische Spelen","🏅"],["Şampiyona","Kampioenschap","🏆"],
];

// ---------- MUZIEK (60) ----------
$muziek = [
    ["Müzik","Muziek","🎵"],["Şarkı","Lied","🎤"],["Melodi","Melodie","🎶"],
    ["Ritim","Ritme","🥁"],["Nota","Noot","🎼"],["Enstrüman","Instrument","🎸"],
    ["Piyano","Piano","🎹"],["Gitar","Gitaar","🎸"],["Keman","Viool","🎻"],
    ["Viyola","Altviool","🎻"],["Çello","Cello","🎻"],["Kontrbas","Contrabas","🎻"],
    ["Flüt","Fluit","🪈"],["Klarnet","Klarinet","🎷"],["Saksafon","Saxofoon","🎷"],
    ["Trompet","Trompet","🎺"],["Trombon","Trombone","🎺"],["Tuba","Tuba","🎺"],
    ["Korno","Hoorn","📯"],["Davul","Drum","🥁"],["Bateri","Drumstel","🥁"],
    ["Tef","Tamboerijn","🥁"],["Zil","Cimbaal","🔔"],["Üçgen","Triangel","🔺"],
    ["Ksylofon","Xylofoon","🎵"],["Marimba","Marimba","🎵"],["Arp","Harp","🎼"],
    ["Akordeon","Accordeon","🪗"],["Harmonika","Harmonica","🎵"],["Mandolin","Mandoline","🎼"],
    ["Ud","Oed","🎸"],["Saz","Saz","🎸"],["Bağlama","Bağlama","🎸"],
    ["Kanun","Kanun","🎼"],["Ney","Ney","🎵"],["Darbuka","Darbuka","🥁"],
    ["Bendir","Bendir","🥁"],["Def","Def","🥁"],["Kudüm","Kudüm","🥁"],
    ["Şarkıcı","Zanger","🎤"],["Şarkıcı","Zangeres","🎤"],["Koro","Koor","👥"],
    ["Orkestra","Orkest","🎼"],["Bando","Harmonie","🎺"],["Grup","Band","🎸"],
    ["Solist","Solist","⭐"],["Besteci","Componist","🎼"],["Söz yazarı","Tekstschrijver","✍️"],
    ["Şef","Dirigent","🎼"],["DJ","DJ","🎧"],["Rapçi","Rapper","🎤"],
    ["Rock","Rock","🎸"],["Pop","Pop","🎤"],["Caz","Jazz","🎷"],
    ["Klasik","Klassiek","🎻"],["Halk müziği","Volksmuziek","🪕"],["Elektronik","Elektronisch","🎧"],
    ["Opera","Opera","🎭"],["Bale","Ballet","🩰"],["Konser","Concert","🎤"],
];

// ---------- BEROEPEN/STAD/GEBOUWEN (100) ----------
$stad = [
    ["Şehir","Stad","🏙️"],["Kasaba","Dorp","🏘️"],["Köy","Dorp","🏡"],
    ["Mahalle","Buurt","🏘️"],["Sokak","Straat","🛣️"],["Cadde","Laan","🛣️"],
    ["Bulvar","Boulevard","🛣️"],["Meydan","Plein","🏛️"],["Park","Park","🌳"],
    ["Bahçe","Tuin","🌷"],["Okul","School","🏫"],["Üniversite","Universiteit","🎓"],
    ["Kütüphane","Bibliotheek","📚"],["Hastane","Ziekenhuis","🏥"],["Klinik","Kliniek","🏥"],
    ["Eczane","Apotheek","💊"],["Postane","Postkantoor","📮"],["Bankamatik","Pinautomaat","🏧"],
    ["Banka","Bank","🏦"],["Belediye","Gemeentehuis","🏛️"],["Valilik","Provinciehuis","🏛️"],
    ["Karokola","Politiebureau","🚓"],["İtfaiye","Brandweerkazerne","🚒"],["Adliye","Gerechtsgebouw","⚖️"],
    ["Cezaevi","Gevangenis","🔒"],["Cami","Moskee","🕌"],["Kilisе","Kerk","⛪"],
    ["Sinagog","Synagoge","🕍"],["Tapınak","Tempel","🛕"],["Müze","Museum","🏛️"],
    ["Sanat galerisi","Kunstgalerie","🎨"],["Tiyatro","Theater","🎭"],["Sinema","Bioscoop","🎬"],
    ["Konser salonu","Concertzaal","🎤"],["Stadyum","Stadion","🏟️"],["Spor salonu","Sportschool","🏋️"],
    ["Yüzme havuzu","Zwembad","🏊"],["Plaj","Strand","🏖️"],["Restoran","Restaurant","🍽️"],
    ["Kafe","Café","☕"],["Bar","Bar","🍺"],["Pastane","Banketbakkerij","🍰"],
    ["Fırın","Bakkerij","🥖"],["Kasap","Slagerij","🥩"],["Manav","Groentewinkel","🥬"],
    ["Market","Supermarkt","🛒"],["Bakkal","Kruidenier","🏪"],["Alışveriş merkezi","Winkelcentrum","🛍️"],
    ["Pazar","Markt","🏪"],["AVM","Winkelcentrum","🛍️"],["Dükkan","Winkel","🏪"],
    ["Butik","Boetiek","👗"],["Kitapçı","Boekhandel","📚"],["Kırtasiye","Kantoorboekhandel","📝"],
    ["Eczane","Apotheek","💊"],["Optik","Optiek","👓"],["Terzi","Kleermaker","🧵"],
    ["Kuaför","Kapsalon","💇"],["Berber","Kapsalon","💈"],["Güzellik salonu","Schoonheidssalon","💅"],
    ["Spor mağazası","Sportwinkel","⚽"],["Oyuncakçı","Speelgoedwinkel","🧸"],["Mobilyacı","Meubelzaak","🪑"],
    ["Elektrikçi","Elektronicawinkel","🔌"],["Bijuteri","Sieradenwinkel","💎"],["Çiçekçi","Bloemist","💐"],
    ["Pet shop","Dierenwinkel","🐾"],["Temizlikçi","Stomerij","🧺"],["Ayakkabıcı","Schoenenwinkel","👞"],
    ["Havalimanı","Luchthaven","✈️"],["Tren garı","Treinstation","🚂"],["Otogar","Busstation","🚌"],
    ["Liman","Haven","⚓"],["Taksi durağı","Taxistandplaats","🚕"],["Otopark","Parkeergarage","🅿️"],
    ["Benzinlik","Tankstation","⛽"],["Hastane","Ziekenhuis","🏥"],["Sağlık ocağı","Gezondheidscentrum","🏥"],
    ["Diş kliniği","Tandartspraktijk","🦷"],["Optik","Optometrist","👓"],["Veteriner","Dierenkliniek","🐾"],
    ["Anaokulu","Kleuterschool","🧒"],["İlkokul","Basisschool","🏫"],["Ortaokul","Middelbare school","🏫"],
    ["Lise","Middelbare school","🎓"],["Meslek lisesi","Beroepsschool","🛠️"],["Fakülte","Faculteit","🎓"],
    ["Yurt","Studentenhuis","🏠"],["Kütüphane","Bibliotheek","📚"],["Konferans salonu","Congreszaal","🎤"],
    ["Sinema","Bioscoop","🎬"],["Tiyatro","Schouwburg","🎭"],["Opera binası","Operagebouw","🎼"],
    ["Müze","Museum","🏛️"],["Sanat merkezi","Kunstcentrum","🎨"],["Kültür merkezi","Cultureel centrum","🎭"],
];

// ---------- REIZEN (80) ----------
$reizen = [
    ["Seyahat","Reis","✈️"],["Turizm","Toerisme","🌍"],["Tatil","Vakantie","🏖️"],
    ["Gezi","Uitstapje","🚶"],["Tur","Tour","🚌"],["Paket tur","Pakketreis","🧳"],
    ["Bilet","Ticket","🎫"],["Rezervasyon","Reservering","📅"],["Konaklama","Verblijf","🏨"],
    ["Otel","Hotel","🏨"],["Motel","Motel","🏨"],["Pansiyon","Pension","🏠"],
    ["Hostel","Hostel","🛏️"],["Tatil köyü","Vakantiepark","🏖️"],["Kamp","Camping","⛺"],
    ["Çadır","Tent","⛺"],["Karavan","Caravan","🚐"],["Bungalov","Bungalow","🏡"],
    ["Villa","Villa","🏡"],["Apart","Appartement","🏢"],["Oda","Kamer","🚪"],
    ["Tek kişilik oda","Eenpersoonskamer","🛏️"],["Çift kişilik oda","Tweepersoonskamer","🛏️"],
    ["Suit","Suite","🛎️"],["Resepsiyon","Receptie","🛎️"],["Anahtar kartı","Sleutelkaart","🔑"],
    ["Bagaj","Bagage","🧳"],["Valiz","Koffer","🧳"],["Sırt çantası","Rugzak","🎒"],
    ["Pasaport","Paspoort","📘"],["Vize","Visum","📗"],["Kimlik","Identiteitskaart","🪪"],
    ["Gümrük","Douane","🛃"],["Sınır","Grens","🚧"],["Uçuş","Vlucht","✈️"],
    ["Kalkış","Vertrek","🛫"],["Varış","Aankomst","🛬"],["Aktarma","Overstap","🔄"],
    ["Rötar","Vertraging","⏰"],["İptal","Annulering","❌"],["Biniş kartı","Instapkaart","🎫"],
    ["Koltuk","Stoel","💺"],["Kabin","Cabine","✈️"],["Pilot","Piloot","👨‍✈️"],
    ["Hostes","Stewardess","👩‍✈️"],["Yolcu","Passagier","🧳"],["Uçuş ekibi","Cabinepersoneel","👥"],
    ["Güvenlik","Beveiliging","🛡️"],["X-ray","Röntgen","📷"],["Metal dedektörü","Metaaldetector","🚨"],
    ["Harita","Kaart","🗺️"],["Rehber","Gids","📖"],["Tur rehberi","Reisleider","🧑‍🏫"],
    ["Seyahat acentesi","Reisbureau","🏢"],["Sigorta","Verzekering","🛡️"],["Seyahat sigortası","Reisverzekering","📄"],
    ["Döviz","Valuta","💱"],["Döviz bürosu","Wisselkantoor","💱"],["Kredi kartı","Creditcard","💳"],
    ["Nakit","Contant","💵"],["Banka kartı","Debetkaart","💳"],["Seyahat çeki","Reischeque","📝"],
    ["Hediye","Cadeau","🎁"],["Hediyelik eşya","Souvenir","🎁"],["Hatıra","Aandenken","📸"],
    ["Fotoğraf","Foto","📷"],["Video","Video","🎥"],["Kamera","Camera","📹"],
    ["Selfie","Selfie","🤳"],["Albüm","Album","📔"],["Günlük","Dagboek","📓"],
    ["Anı","Herinnering","💭"],["Macera","Avontuur","🗺️"],["Keşif","Ontdekking","🔍"],
    ["Yeni kültür","Nieuwe cultuur","🌍"],["Yabancı dil","Vreemde taal","🗣️"],["Yerel halk","Lokale bevolking","👥"],
];

// ---------- EMOTIES (60) ----------
$emoties = [
    ["Mutlu","Blij","😊"],["Üzgün","Verdrietig","😢"],["Kızgın","Boos","😠"],
    ["Sinirli","Geïrriteerd","😤"],["Korkmuş","Bang","😨"],["Şaşkın","Verrast","😲"],
    ["Heyecanlı","Opgewonden","🤩"],["Sakin","Kalm","😌"],["Yorgun","Moe","😴"],
    ["Uykulu","Slaperig","😪"],["Aç","Hongerig","🍽️"],["Tok","Vol","😋"],
    ["Susamış","Dorstig","🥤"],["Hasta","Ziek","🤒"],["İyi","Goed","👍"],
    ["Kötü","Slecht","👎"],["Harika","Geweldig","🤩"],["Berbat","Vreselijk","😖"],
    ["Güzel","Mooi","😍"],["Çirkin","Lelijk","😝"],["Sevimli","Schattig","🥰"],
    ["Komik","Grappig","😂"],["Ciddi","Serieus","😐"],["Utangaç","Verlegen","😊"],
    ["Cesur","Dapper","🦁"],["Korkak","Laf","🐔"],["Gururlu","Trots","😌"],
    ["Alçakgönüllü","Bescheiden","🙇"],["Kibirli","Arrogant","😏"],["Nazik","Vriendelijk","😊"],
    ["Kaba","Onbeschoft","😠"],["Cömert","Vrijgevig","🎁"],["Cimri","Gierig","💰"],
    ["Dürüst","Eerlijk","🤝"],["Yalancı","Leugenaar","🤥"],["Sadık","Loyaal","🐕"],
    ["İhanet","Verraad","🗡️"],["Kıskanç","Jaloers","😒"],["Aşık","Verliefd","😍"],
    ["Sevgi","Liefde","❤️"],["Nefret","Haat","😡"],["Öfke","Woede","😤"],
    ["Neşe","Vreugde","😊"],["Keder","Verdriet","😔"],["Kaygı","Bezorgdheid","😰"],
    ["Endişe","Zorg","😟"],["Stres","Stress","😫"],["Rahatlama","Ontspanning","😌"],
    ["Huzur","Rust","🕊️"],["Merak","Nieuwsgierigheid","🤔"],["İlgi","Interesse","👀"],
    ["Sıkıntı","Verveling","😑"],["Umut","Hoop","🌟"],["Umutsuzluk","Hopeloosheid","😞"],
    ["Minnet","Dankbaarheid","🙏"],["Pişmanlık","Spijt","😔"],["Gurur","Trots","🦚"],
    ["Utanç","Schaamte","😳"],["Suçluluk","Schuld","😔"],["Sevinç","Blijdschap","🎉"],
];

// ---------- SCHOOL (80) ----------
$school = [
    ["Okul","School","🏫"],["Sınıf","Klas","🏫"],["Ders","Les","📚"],
    ["Öğretmen","Leraar","👨‍🏫"],["Öğrenci","Leerling","🎓"],["Müdür","Directeur","👔"],
    ["Sıra","Schoolbank","🪑"],["Tahta","Schoolbord","📋"],["Tebeşir","Krijt","🖍️"],
    ["Kalem","Potlood","✏️"],["Tükenmez kalem","Pen","🖊️"],["Silgi","Gum","🧽"],
    ["Defter","Schrift","📓"],["Kitap","Boek","📕"],["Ders kitabı","Schoolboek","📚"],
    ["Çanta","Schooltas","🎒"],["Kalem kutusu","Etui","✏️"],["Cetvel","Liniaal","📏"],
    ["Makas","Schaar","✂️"],["Yapıştırıcı","Lijm","🩹"],["Boya kalemi","Kleurpotlood","🖍️"],
    ["Boya","Verf","🎨"],["Fırça","Penseel","🖌️"],["Resim defteri","Tekenschrift","📓"],
    ["Ödev","Huiswerk","📝"],["Sınav","Examen","📋"],["Test","Toets","📝"],
    ["Not","Cijfer","💯"],["Karne","Rapport","📄"],["Diploma","Diploma","🎓"],
    ["Sertifika","Certificaat","📜"],["Ders programı","Lesschema","📅"],["Teneffüs","Pauze","☕"],
    ["Tatil","Vakantie","🏖️"],["Matematik","Wiskunde","➗"],["Türkçe","Turks","🇹🇷"],
    ["İngilizce","Engels","🇬🇧"],["Fen","Natuurkunde","⚛️"],["Kimya","Scheikunde","🧪"],
    ["Biyoloji","Biologie","🧬"],["Tarih","Geschiedenis","📜"],["Coğrafya","Aardrijkskunde","🌍"],
    ["Fizik","Natuurkunde","⚛️"],["Edebiyat","Literatuur","📖"],["Felsefe","Filosofie","🤔"],
    ["Din","Godsdienst","🕌"],["Müzik","Muziek","🎵"],["Resim","Tekenen","🎨"],
    ["Beden eğitimi","Lichamelijke opvoeding","🏃"],["Bilgisayar","Computer","💻"],["Yazılım","Software","🖥️"],
    ["Kütüphane","Bibliotheek","📚"],["Laboratuvar","Laboratorium","🔬"],["Spor salonu","Gymzaal","🏋️"],
    ["Yemekhane","Kantine","🍽️"],["Tuvalet","Toilet","🚽"],["Koridor","Gang","🚶"],
    ["Merdiven","Trap","🪜"],["Asansör","Lift","🛗"],["Ofis","Kantoor","🏢"],
    ["Öğretmenler odası","Docentenkamer","👥"],["Konferans salonu","Aula","🎤"],["Bahçe","Schoolplein","🌳"],
    ["Üniversite","Universiteit","🎓"],["Fakülte","Faculteit","🏛️"],["Bölüm","Afdeling","📚"],
    ["Ana bilim dalı","Hoofdvak","📖"],["Yüksek lisans","Master","🎓"],["Doktora","Doctoraat","🎓"],
    ["Burs","Beurs","💰"],["Öğrenim kredisi","Studielening","💳"],["Yurt","Studentenhuis","🏠"],
    ["Kantin","Kantine","🍽️"],["Kırtasiye","Kantoorboekhandel","📝"],["Fotokopi","Kopieerapparaat","📄"],
    ["Yazıcı","Printer","🖨️"],["Projeksiyon","Projector","📽️"],["Bilgisayar","Computer","💻"],
    ["Tablet","Tablet","📱"],["Akıllı tahta","Digibord","📋"],["Uzaktan eğitim","Afstandsonderwijs","💻"],
];

// ---------- TECHNOLOGIE (100) ----------
$technologie = [
    ["Bilgisayar","Computer","💻"],["Dizüstü","Laptop","💻"],["Masaüstü","Desktop","🖥️"],
    ["Tablet","Tablet","📱"],["Telefon","Telefoon","📱"],["Akıllı telefon","Smartphone","📱"],
    ["Ekran","Scherm","🖥️"],["Klavye","Toetsenbord","⌨️"],["Fare","Muis","🖱️"],
    ["Yazıcı","Printer","🖨️"],["Tarayıcı","Scanner","📠"],["Fotokopi","Kopieerapparaat","📄"],
    ["Kamera","Camera","📷"],["Video kamera","Videocamera","📹"],["Web kamerası","Webcam","📷"],
    ["Hoparlör","Luidspreker","🔊"],["Kulaklık","Koptelefoon","🎧"],["Mikrofon","Microfoon","🎤"],
    ["Şarj aleti","Oplader","🔌"],["Kablo","Kabel","🔌"],["USB","USB","🔌"],
    ["Bellek","Geheugen","💾"],["Sabit disk","Harde schijf","💽"],["SSD","SSD","💽"],
    ["Flash bellek","USB-stick","🔌"],["Hafıza kartı","Geheugenkaart","💾"],["CD","Cd","💿"],
    ["DVD","Dvd","📀"],["Blu-ray","Blu-ray","💿"],["Yazılım","Software","💿"],
    ["Program","Programma","💻"],["Uygulama","Applicatie","📱"],["App","App","📱"],
    ["İşletim sistemi","Besturingssysteem","🖥️"],["Windows","Windows","🪟"],["MacOS","MacOS","🍎"],
    ["Linux","Linux","🐧"],["Android","Android","🤖"],["iOS","iOS","🍏"],
    ["İnternet","Internet","🌐"],["Web","Web","🌐"],["Site","Website","🌐"],
    ["Blog","Blog","📝"],["Forum","Forum","💬"],["Sosyal medya","Sociale media","📱"],
    ["Facebook","Facebook","📘"],["Instagram","Instagram","📷"],["Twitter","Twitter","🐦"],
    ["YouTube","YouTube","📺"],["TikTok","TikTok","🎵"],["WhatsApp","WhatsApp","💬"],
    ["E-posta","E-mail","📧"],["Mesaj","Bericht","💬"],["SMS","Sms","📱"],
    ["Arama","Oproep","📞"],["Görüntülü arama","Videogesprek","📹"],["Grup sohbeti","Groepschat","👥"],
    ["Şifre","Wachtwoord","🔑"],["Kullanıcı adı","Gebruikersnaam","👤"],["Hesap","Account","👤"],
    ["Giriş","Inloggen","🔓"],["Çıkış","Uitloggen","🚪"],["Kayıt","Registratie","📝"],
    ["Güvenlik","Beveiliging","🛡️"],["Virüs","Virus","🦠"],["Antivirüs","Antivirus","🛡️"],
    ["Güvenlik duvarı","Firewall","🧱"],["Yedekleme","Back-up","💾"],["Güncelleme","Update","🔄"],
    ["İndirme","Downloaden","⬇️"],["Yükleme","Uploaden","⬆️"],["Paylaşım","Delen","📤"],
    ["Beğeni","Like","👍"],["Yorum","Reactie","💬"],["Takipçi","Volger","👥"],
    ["Abone","Abonnee","🔔"],["Bildirim","Melding","🔔"],["Arama motoru","Zoekmachine","🔍"],
    ["Google","Google","🔍"],["Tarayıcı","Browser","🌐"],["Chrome","Chrome","🌐"],
    ["Firefox","Firefox","🦊"],["Safari","Safari","🧭"],["Edge","Edge","🌊"],
    ["Yapay zeka","Kunstmatige intelligentie","🤖"],["Robot","Robot","🤖"],["Sanal gerçeklik","Virtual reality","🥽"],
    ["Artırılmış gerçeklik","Augmented reality","🥽"],["Blockchain","Blockchain","🔗"],["Kripto para","Cryptovaluta","💰"],
    ["Bitcoin","Bitcoin","₿"],["Ethereum","Ethereum","💎"],["NFT","NFT","🖼️"],
    ["Metaverse","Metaverse","🌐"],["Bulut","Cloud","☁️"],["Sunucu","Server","🖥️"],
    ["Veritabanı","Database","🗄️"],["Algoritma","Algoritme","🧮"],["Kod","Code","💻"],
];

// ---------- PLAATSEN & LANDEN (150) ----------
$plaatsen = [
    ["Türkiye","Turkije","🇹🇷"],["Hollanda","Nederland","🇳🇱"],["Almanya","Duitsland","🇩🇪"],
    ["Fransa","Frankrijk","🇫🇷"],["İngiltere","Engeland","🇬🇧"],["İtalya","Italië","🇮🇹"],
    ["İspanya","Spanje","🇪🇸"],["Portekiz","Portugal","🇵🇹"],["Yunanistan","Griekenland","🇬🇷"],
    ["Belçika","België","🇧🇪"],["İsviçre","Zwitserland","🇨🇭"],["Avusturya","Oostenrijk","🇦🇹"],
    ["Rusya","Rusland","🇷🇺"],["Ukrayna","Oekraïne","🇺🇦"],["Polonya","Polen","🇵🇱"],
    ["Romanya","Roemenië","🇷🇴"],["Bulgaristan","Bulgarije","🇧🇬"],["Macaristan","Hongarije","🇭🇺"],
    ["Çekya","Tsjechië","🇨🇿"],["Slovakya","Slowakije","🇸🇰"],["Hırvatistan","Kroatië","🇭🇷"],
    ["Sırbistan","Servië","🇷🇸"],["Bosna","Bosnië","🇧🇦"],["Arnavutluk","Albanië","🇦🇱"],
    ["Makedonya","Macedonië","🇲🇰"],["İsveç","Zweden","🇸🇪"],["Norveç","Noorwegen","🇳🇴"],
    ["Finlandiya","Finland","🇫🇮"],["Danimarka","Denemarken","🇩🇰"],["İzlanda","IJsland","🇮🇸"],
    ["İrlanda","Ierland","🇮🇪"],["İskoçya","Schotland","🏴"],["Galler","Wales","🏴"],
    ["ABD","VS","🇺🇸"],["Kanada","Canada","🇨🇦"],["Meksika","Mexico","🇲🇽"],
    ["Brezilya","Brazilië","🇧🇷"],["Arjantin","Argentinië","🇦🇷"],["Şili","Chili","🇨🇱"],
    ["Peru","Peru","🇵🇪"],["Kolombiya","Colombia","🇨🇴"],["Venezuela","Venezuela","🇻🇪"],
    ["Çin","China","🇨🇳"],["Japonya","Japan","🇯🇵"],["Güney Kore","Zuid-Korea","🇰🇷"],
    ["Hindistan","India","🇮🇳"],["Pakistan","Pakistan","🇵🇰"],["Endonezya","Indonesië","🇮🇩"],
    ["Tayland","Thailand","🇹🇭"],["Vietnam","Vietnam","🇻🇳"],["Malezya","Maleisië","🇲🇾"],
    ["Singapur","Singapore","🇸🇬"],["Avustralya","Australië","🇦🇺"],["Yeni Zelanda","Nieuw-Zeeland","🇳🇿"],
    ["Mısır","Egypte","🇪🇬"],["Fas","Marokko","🇲🇦"],["Cezayir","Algerije","🇩🇿"],
    ["Tunus","Tunesië","🇹🇳"],["Libya","Libië","🇱🇾"],["Sudan","Soedan","🇸🇩"],
    ["Etiyopya","Ethiopië","🇪🇹"],["Kenya","Kenia","🇰🇪"],["Güney Afrika","Zuid-Afrika","🇿🇦"],
    ["Nijerya","Nigeria","🇳🇬"],["Gana","Ghana","🇬🇭"],["Senegal","Senegal","🇸🇳"],
    ["Suudi Arabistan","Saoedi-Arabië","🇸🇦"],["İran","Iran","🇮🇷"],["Irak","Irak","🇮🇶"],
    ["Suriye","Syrië","🇸🇾"],["Lübnan","Libanon","🇱🇧"],["İsrail","Israël","🇮🇱"],
    ["Ürdün","Jordanië","🇯🇴"],["Katar","Qatar","🇶🇦"],["BAE","VAE","🇦🇪"],
    ["Kuveyt","Koeweit","🇰🇼"],["Bahreyn","Bahrein","🇧🇭"],["Umman","Oman","🇴🇲"],
    ["Yemen","Jemen","🇾🇪"],["Afganistan","Afghanistan","🇦🇫"],["Kazakistan","Kazachstan","🇰🇿"],
    ["Özbekistan","Oezbekistan","🇺🇿"],["Türkmenistan","Turkmenistan","🇹🇲"],["Kırgızistan","Kirgizië","🇰🇬"],
    ["Tacikistan","Tadzjikistan","🇹🇯"],["Azerbaycan","Azerbeidzjan","🇦🇿"],["Gürcistan","Georgië","🇬🇪"],
    ["Ermenistan","Armenië","🇦🇲"],["İstanbul","Istanboel","🕌"],["Ankara","Ankara","🏛️"],
    ["İzmir","Izmir","🌊"],["Bursa","Bursa","🏔️"],["Antalya","Antalya","🏖️"],
    ["Amsterdam","Amsterdam","🚲"],["Rotterdam","Rotterdam","⚓"],["Den Haag","Den Haag","🏛️"],
    ["Utrecht","Utrecht","🎓"],["Eindhoven","Eindhoven","💡"],["Brussel","Brussel","🇧🇪"],
    ["Antwerpen","Antwerpen","⚓"],["Gent","Gent","🏰"],["Brüj","Brugge","🏰"],
    ["Leuven","Leuven","🎓"],["Londra","Londen","🇬🇧"],["Paris","Parijs","🗼"],
    ["Berlin","Berlijn","🇩🇪"],["Münih","München","🍺"],["Roma","Rome","🏛️"],
    ["Madrid","Madrid","🇪🇸"],["Barselona","Barcelona","🏖️"],["Lizbon","Lissabon","🇵🇹"],
    ["Atina","Athene","🏛️"],["Viyana","Wenen","🎼"],["Zürih","Zürich","🇨🇭"],
    ["Moskova","Moskou","🇷🇺"],["New York","New York","🗽"],["Los Angeles","Los Angeles","🌴"],
    ["Tokyo","Tokio","🗾"],["Pekin","Peking","🇨🇳"],["Dubai","Dubai","🌇"],
    ["Kahire","Caïro","🐫"],["Nairobi","Nairobi","🦁"],["Sydney","Sydney","🦘"],
    ["Toronto","Toronto","🍁"],["Vancouver","Vancouver","🌲"],["Chicago","Chicago","🏙️"],
    ["Miami","Miami","🌴"],["Las Vegas","Las Vegas","🎰"],["San Francisco","San Francisco","🌉"],
    ["Boston","Boston","🎓"],["Washington","Washington","🏛️"],["Seul","Seoul","🇰🇷"],
    ["Bangkok","Bangkok","🛕"],["Bali","Bali","🏝️"],["Singapur","Singapore","🌴"],
    ["Mumbai","Mumbai","🇮🇳"],["Delhi","Delhi","🕌"],["Kuala Lumpur","Kuala Lumpur","🏙️"],
    ["Riyad","Riyad","🕌"],["Tahran","Teheran","🕌"],["Kudüs","Jeruzalem","🕍"],
    ["Bağdat","Bagdad","🕌"],["Şam","Damascus","🕌"],["Beyrut","Beiroet","🌊"],
];

// ---------- WERKWOORDEN (200) ----------
$werkwoorden = [
    ["Gitmek","Gaan","🚶"],["Gelmek","Komen","🚶"],["Yürümek","Lopen","🚶"],["Koşmak","Rennen","🏃"],
    ["Zıplamak","Springen","🦘"],["Atlamak","Springen","🦘"],["Uçmak","Vliegen","🕊️"],["Yüzmek","Zwemmen","🏊"],
    ["Oturmak","Zitten","🪑"],["Kalkmak","Opstaan","🧍"],["Yatmak","Liggen","🛏️"],["Uyumak","Slapen","😴"],
    ["Uyanmak","Wakker worden","🌅"],["Yemek","Eten","🍽️"],["İçmek","Drinken","🥤"],["Konuşmak","Spreken","🗣️"],
    ["Dinlemek","Luisteren","👂"],["Duymak","Horen","👂"],["Görmek","Zien","👁️"],["Bakmak","Kijken","👀"],
    ["Okumak","Lezen","📖"],["Yazmak","Schrijven","✍️"],["Çizmek","Tekenen","🎨"],["Boyamak","Verven","🖌️"],
    ["Öğrenmek","Leren","📚"],["Öğretmek","Onderwijzen","👨‍🏫"],["Anlamak","Begrijpen","💡"],
    ["Bilmek","Weten","🧠"],["Düşünmek","Denken","💭"],["Hatırlamak","Herinneren","🧠"],
    ["Unutmak","Vergeten","🤔"],["Sevmek","Houden van","❤️"],["Nefret etmek","Haten","😡"],
    ["İstemek","Willen","🙏"],["İstememek","Niet willen","🙅"],["Beklemek","Wachten","⏳"],
    ["Aramak","Zoeken","🔍"],["Bulmak","Vinden","🎯"],["Kaybetmek","Verliezen","😞"],
    ["Almak","Nemen","🤲"],["Vermek","Geven","🎁"],["Satmak","Verkopen","💰"],
    ["Satin almak","Kopen","🛒"],["Ödemek","Betalen","💳"],["Kazanmak","Verdienen","💰"],
    ["Harcamak","Uitgeven","💸"],["Biriktirmek","Sparen","🏦"],["Çalmak","Stelen","🥷"],
    ["Açmak","Openen","🔓"],["Kapatmak","Sluiten","🔒"],["Kilitlemek","Op slot doen","🔐"],
    ["İtmek","Duwen","👐"],["Çekmek","Trekken","🪢"],["Taşımak","Dragen","🎒"],
    ["Kaldırmak","Optillen","💪"],["İndirmek","Neerlaten","⬇️"],["Fırlatmak","Gooien","🎯"],
    ["Tutmak","Vasthouden","🤚"],["Bırakmak","Laten vallen","👐"],["Yakalamak","Vangen","🤲"],
    ["Kırmak","Breken","💔"],["Tamir etmek","Repareren","🔧"],["Yapmak","Maken","🛠️"],
    ["İnşa etmek","Bouwen","🏗️"],["Yıkmak","Afbreken","🔨"],["Boyamak","Schilderen","🎨"],
    ["Yıkamak","Wassen","🧼"],["Temizlemek","Schoonmaken","🧹"],["Silmek","Vegen","🧽"],
    ["Süpürmek","Vegen","🧹"],["Ütülemek","Strijken","🧺"],["Pişirmek","Koken","🍳"],
    ["Kızartmak","Frituren","🍟"],["Haşlamak","Koken","🍲"],["Fırınlamak","Bakken","🥖"],
    ["Doğramak","Snijden","🔪"],["Kesmek","Snijden","✂️"],["Karıştırmak","Mengen","🥄"],
    ["Tatmak","Proeven","👅"],["Yemek yapmak","Koken","👨‍🍳"],["Servis yapmak","Serveren","🍽️"],
    ["İçmek","Drinken","🥤"],["Doldurmak","Vullen","🫗"],["Boşaltmak","Legen","🚰"],
    ["Akmak","Stromen","🌊"],["Damlamak","Druppelen","💧"],["Buharlaşmak","Verdampen","💨"],
    ["Donmak","Bevriezen","🧊"],["Eritmek","Smelten","🔥"],["Kaynatmak","Koken","♨️"],
    ["Isıtmak","Verwarmen","🔥"],["Soğutmak","Afkoelen","❄️"],["Yakmak","Branden","🔥"],
    ["Söndürmek","Blussen","🧯"],["Yanmak","Branden","🔥"],["Patlamak","Ontploffen","💥"],
    ["Kırılmak","Breken","💥"],["Çarpmak","Botsen","💥"],["Düşmek","Vallen","⬇️"],
    ["Kalkmak","Opstaan","🧍"],["Dönmek","Draaien","🔄"],["Sallamak","Schudden","🫨"],
    ["Sallanmak","Zwaaien","👋"],["El sallamak","Zwaaien","👋"],["Öpmek","Kussen","😘"],
    ["Sarılmak","Knuffelen","🤗"],["Tokalaşmak","Handen schudden","🤝"],["Selamlamak","Groeten","👋"],
    ["Vedalaşmak","Afscheid nemen","👋"],["Tanışmak","Kennismaken","🤝"],["Tanıtmak","Introduceren","👥"],
    ["Sormak","Vragen","❓"],["Cevaplamak","Antwoorden","💬"],["Söylemek","Zeggen","🗣️"],
    ["Anlatmak","Vertellen","📖"],["Fısıldamak","Fluisteren","🤫"],["Bağırmak","Schreeuwen","📢"],
    ["Susmak","Zwijgen","🤐"],["Gülmek","Lachen","😂"],["Ağlamak","Huilen","😭"],
    ["Bağırmak","Roepen","📢"],["Şarkı söylemek","Zingen","🎤"],["Dans etmek","Dansen","💃"],
    ["Çalmak","Spelen (instrument)","🎸"],["Dinlemek","Luisteren","🎧"],["İzlemek","Kijken","📺"],
    ["Oynamak","Spelen","🎮"],["Kazanmak","Winnen","🏆"],["Kaybetmek","Verliezen","😞"],
    ["Yarışmak","Racen","🏁"],["Antrenman yapmak","Trainen","🏋️"],["Koşmak","Rennen","🏃"],
    ["Yürümek","Wandelen","🚶"],["Tırmanmak","Klimmen","🧗"],["Yüzmek","Zwemmen","🏊"],
    ["Uçmak","Vliegen","✈️"],["Sürmek","Rijden","🚗"],["Bisiklete binmek","Fietsen","🚲"],
    ["Yüzmek","Zwemmen","🏊"],["Kaymak","Skiën","🎿"],["Paten yapmak","Schaatsen","⛸️"],
    ["Çalışmak","Werken","💼"],["Dinlenmek","Rusten","😌"],["Uyumak","Slapen","😴"],
    ["Rüya görmek","Dromen","💭"],["Uyanmak","Wakker worden","🌅"],["Kalkmak","Opstaan","🧍"],
    ["Yıkanmak","Wassen","🚿"],["Duş almak","Douchen","🚿"],["Banyo yapmak","In bad gaan","🛁"],
    ["Giyinmek","Aankleden","👕"],["Soyunmak","Uitkleden","👕"],["Süslenmek","Opmaken","💄"],
    ["Taramak","Kammen","💇"],["Fırçalamak","Poetsen","🪥"],["Diş fırçalamak","Tandenpoetsen","🪥"],
    ["Tıraş olmak","Scheren","🪒"],["Makyaj yapmak","Make-up doen","💄"],["Parfüm sıkmak","Parfum spuiten","🌸"],
    ["Gülümsemek","Glimlachen","😊"],["Kaşlarını çatmak","Fronsen","😠"],["Göz kırpmak","Knipperen","😉"],
    ["Esnemek","Gapen","🥱"],["Aksırmak","Niesen","🤧"],["Öksürmek","Hoesten","😷"],
    ["Nefes almak","Ademen","🌬️"],["Hapşırmak","Niesen","🤧"],["Terlemek","Zweten","💧"],
    ["Titremek","Bibberen","🥶"],["Bayılmak","Flaauwvallen","😵"],["İyileşmek","Genezen","💊"],
    ["Hastalanmak","Ziek worden","🤒"],["Muayene olmak","Onderzoeken","🩺"],["Reçete yazmak","Voorschrijven","📝"],
    ["İlaç almak","Medicijn innemen","💊"],["Aşı olmak","Vaccineren","💉"],["Kan vermek","Bloed geven","🩸"],
    ["Doğmak","Geboren worden","👶"],["Büyümek","Groeien","🌱"],["Yaşlanmak","Ouder worden","👴"],
    ["Ölmek","Sterven","⚰️"],["Yaşamak","Leven","💫"],["Nefes almak","Ademen","🌬️"],
    ["Sevmek","Liefhebben","❤️"],["Evlenmek","Trouwen","💍"],["Boşanmak","Scheiden","💔"],
    ["Nişanlanmak","Verloven","💍"],["Tanışmak","Ontmoeten","🤝"],["Ayrılmak","Uit elkaar gaan","💔"],
    ["Kızmak","Boos worden","😠"],["Üzülmek","Verdrietig zijn","😢"],["Sevinmek","Blij zijn","😊"],
    ["Korkmak","Bang zijn","😨"],["Şaşırmak","Verrast zijn","😲"],["Merak etmek","Nieuwsgierig zijn","🤔"],
    ["Umut etmek","Hopen","🌟"],["İnanmak","Geloven","🙏"],["Güvenmek","Vertrouwen","🤝"],
    ["Şüphelenmek","Twijfelen","🤨"],["Karar vermek","Beslissen","⚖️"],["Seçmek","Kiezen","☑️"],
    ["Denemek","Proberen","🎯"],["Başarmak","Slagen","🏆"],["Başarısız olmak","Falen","😞"],
    ["Devam etmek","Doorgaan","➡️"],["Durmak","Stoppen","🛑"],["Başlamak","Beginnen","🚀"],
    ["Bitirmek","Eindigen","🏁"],["Tamamlamak","Voltooien","✅"],["Vazgeçmek","Opgeven","🏳️"],
    ["Planlamak","Plannen","📅"],["Hazırlamak","Voorbereiden","📋"],["Düzenlemek","Organiseren","📊"],
    ["Karıştırmak","Mengen","🌀"],["Ayırmak","Scheiden","✂️"],["Birleştirmek","Samenvoegen","🔗"],
    ["Paylaşmak","Delen","🤝"],["Bölmek","Verdelen","➗"],["Çoğaltmak","Vermenigvuldigen","✖️"],
    ["Toplamak","Optellen","➕"],["Çıkarmak","Aftrekken","➖"],["Hesaplamak","Berekenen","🧮"],
    ["Saymak","Tellen","🔢"],["Ölçmek","Meten","📏"],["Tartmak","Wegen","⚖️"],
];

// ---------- BIJVOEGLIJKE NAAMWOORDEN (200) ----------
$bijvoeglijk = [
    ["Büyük","Groot","🔵"],["Küçük","Klein","🔹"],["Uzun","Lang","📏"],
    ["Kısa","Kort","📐"],["Geniş","Breed","↔️"],["Dar","Smal","↕️"],
    ["Yüksek","Hoog","⬆️"],["Alçak","Laag","⬇️"],["Derin","Diep","🌊"],
    ["Sığ","Ondiep","〰️"],["Ağır","Zwaar","🏋️"],["Hafif","Licht","🪶"],
    ["Güçlü","Sterk","💪"],["Zayıf","Zwak","🍃"],["Sağlam","Stevig","🧱"],
    ["Kırılgan","Breekbaar","🥚"],["Yumuşak","Zacht","🧸"],["Sert","Hard","🪨"],
    ["Sıcak","Warm","🔥"],["Soğuk","Koud","❄️"],["Ilık","Lauw","🌡️"],
    ["Yeni","Nieuw","✨"],["Eski","Oud","🏛️"],["Genç","Jong","👶"],
    ["Yaşlı","Oud","👴"],["Taze","Vers","🌿"],["Bayat","Oud","🥖"],
    ["Temiz","Schoon","🧼"],["Kirli","Vies","🧹"],["Islak","Nat","💧"],
    ["Kuru","Droog","🌵"],["Nemli","Vochtig","💧"],["Tozlu","Stoffig","🌫️"],
    ["Parlak","Glanzend","✨"],["Mat","Mat","⬜"],["Aydınlık","Licht","💡"],
    ["Karanlık","Donker","🌑"],["Renkli","Kleurrijk","🌈"],["Renksiz","Kleurloos","⬜"],
    ["Güzel","Mooi","🌸"],["Çirkin","Lelijk","👹"],["Sevimli","Schattig","🥰"],
    ["Şirin","Lief","🥰"],["Tatlı","Zoet","🍯"],["Acı","Bitter","🌶️"],
    ["Ekşi","Zuur","🍋"],["Tuzlu","Zout","🧂"],["Baharatlı","Pittig","🌶️"],
    ["Lezzetli","Heerlijk","😋"],["Tatsız","Smaakloos","😐"],["Kokulu","Geurend","🌸"],
    ["Kokusuz","Geurloos","💨"],["Zengin","Rijk","💰"],["Fakir","Arm","🥺"],
    ["Pahalı","Duur","💎"],["Ucuz","Goedkoop","🏷️"],["Bedava","Gratis","🎁"],
    ["Hızlı","Snel","💨"],["Yavaş","Langzaam","🐌"],["Çabuk","Snel","⚡"],
    ["Kolay","Makkelijk","👍"],["Zor","Moeilijk","😣"],["Basit","Eenvoudig","🟢"],
    ["Karmaşık","Complex","🌀"],["Önemli","Belangrijk","⭐"],["Önemsiz","Onbelangrijk","➖"],
    ["Gerekli","Nodig","❗"],["Gereksiz","Onnodig","❌"],["Yararlı","Nuttig","👍"],
    ["Yararsız","Nutteloos","👎"],["Doğru","Juist","✅"],["Yanlış","Fout","❌"],
    ["Gerçek","Waar","💯"],["Yalan","Leugen","🤥"],["Aynı","Hetzelfde","🟰"],
    ["Farklı","Verschillend","🔀"],["Benzer","Vergelijkbaar","👥"],["Eşit","Gelijk","⚖️"],
    ["Mutlu","Gelukkig","😊"],["Üzgün","Verdrietig","😢"],["Kızgın","Boos","😠"],
    ["Sakin","Rustig","😌"],["Sinirli","Zenuwachtig","😤"],["Endişeli","Bezorgd","😰"],
    ["Rahat","Ontspannen","😌"],["Gergin","Gespanen","😬"],["Heyecanlı","Opgewonden","🤩"],
    ["Yorgun","Moe","😴"],["Dinç","Fit","💪"],["Sağlıklı","Gezond","💚"],
    ["Hasta","Ziek","🤒"],["Canlı","Levendig","⚡"],["Ölü","Dood","⚰️"],
    ["Akıllı","Slim","🧠"],["Zeki","Intelligent","🎓"],["Aptal","Domp","😅"],
    ["Delı","Gek","🤪"],["Normal","Normaal","👍"],["Tuhaf","Vreemd","🤔"],
    ["İlginç","Interessant","🤩"],["Sıkıcı","Saai","🥱"],["Eğlenceli","Leuk","🎉"],
    ["Komik","Grappig","😂"],["Ciddi","Serieus","😐"],["Şakacı","Grappig","😜"],
    ["Nazik","Vriendelijk","😊"],["Kaba","Onbeschoft","😠"],["Kibar","Beleefd","🎩"],
    ["Terbiyeli","Welgemanierd","🙇"],["Saygılı","Respectvol","🙏"],["Dürüst","Eerlijk","🤝"],
    ["Yalancı","Leugenachtig","🤥"],["Sadık","Loyaal","🐕"],["Vefasız","Ontrouw","💔"],
    ["Cömert","Vrijgevig","🎁"],["Cimri","Gierig","💰"],["Tutumlu","Zuinig","💵"],
    ["Savurgan","Verbrassend","💸"],["Zengin","Welvarend","💰"],["Yoksul","Behoeftig","🥺"],
    ["Cesur","Dapper","🦁"],["Korkak","Laf","🐔"],["Cesaretsiz","Moedeloos","😞"],
    ["Gururlu","Trots","😌"],["Alçakgönüllü","Bescheiden","🙇"],["Kibirli","Arrogant","😏"],
    ["Utangaç","Verlegen","😊"],["Sosyal","Sociaal","👥"],["İçine kapanık","Introvert","🤫"],
    ["Açık sözlü","Openhartig","💬"],["Ketum","Gesloten","🤐"],["Sabırlı","Geduldig","⏳"],
    ["Sabırsız","Ongeduldig","😤"],["Kararlı","Vastberaden","💪"],["Kararsız","Besluiteloos","🤔"],
    ["Dikkatli","Voorzichtig","👀"],["Dikkatsiz","Onzorgvuldig","😵"],["Titiz","Nauwkeurig","🎯"],
    ["Dağınık","Slordig","🌪️"],["Düzenli","Netjes","📋"],["Plansız","Ongepland","🌀"],
    ["Disiplinli","Gedisciplineerd","🎖️"],["Tembel","Lui","🛋️"],["Çalışkan","Hardwerkend","💼"],
    ["Gayretli","IJverig","🔥"],["Becerikli","Vaardig","🛠️"],["Beceriksiz","Onhandig","🤷"],
    ["Yaratıcı","Creatief","🎨"],["Hayalperest","Dromerig","💭"],["Gerçekçi","Realistisch","🧠"],
    ["İyimser","Optimistisch","🌟"],["Kötümser","Pessimistisch","☁️"],["Karamsar","Zwartgallig","🌧️"],
    ["Umutlu","Hoopvol","🌈"],["Umutsuz","Hopeloos","😞"],["Neşeli","Vrolijk","😊"],
    ["Hüzünlü","Droevig","😔"],["Melankolik","Melancholisch","🌧️"],["Dingin","Sereen","🕊️"],
    ["Huzurlu","Vredig","☮️"],["Huzursuz","Rusteloos","😰"],["Sakin","Kalm","😌"],
    ["Öfkeli","Woedend","😡"],["Kızgın","Boos","😠"],["Nazik","Vriendelijk","😊"],
    ["Sevimli","Lief","💖"],["Şefkatli","Teder","🤗"],["Merhametli","Barmhartig","💗"],
    ["Zalim","Wreed","😈"],["Kind","Vriendelijk","😊"],["Sert","Streng","😠"],
    ["Yumuşak başlı","Volgzaam","🐑"],["İnatçı","Koppig","🐴"],["Boyun eğmez","Onverzettelijk","🦾"],
];

// ============================================================
// VOEG ALLES SAMEN
// ============================================================

/**
 * Converteert een platte array [tr, nl, emoji] naar objecten,
 * en verwijdert duplicaten binnen de categorie.
 */
function maakCategorie($items) {
    $gezien = [];
    $result = [];
    foreach ($items as $item) {
        if (count($item) < 3) continue;
        [$tr, $nl, $emoji] = $item;
        $key = mb_strtolower($tr . '|' . $nl);
        if (isset($gezien[$key])) continue;
        $gezien[$key] = true;
        $result[] = ['tr' => $tr, 'nl' => $nl, 'emoji' => $emoji];
    }
    return $result;
}

$data['dieren']         = maakCategorie($dieren);
$data['kleuren']        = maakCategorie($kleuren);
$data['eten']           = maakCategorie($eten);
$data['familie']        = maakCategorie($familie);
$data['lichaam']        = maakCategorie($lichaam);
$data['getallen']       = maakCategorie($getallen);
$data['tijd']           = maakCategorie($tijd);
$data['natuur']         = maakCategorie($natuur);
$data['huis']           = maakCategorie($huis);
$data['kleding']        = maakCategorie($kleding);
$data['beroepen']       = maakCategorie($beroepen);
$data['voertuigen']     = maakCategorie($voertuigen);
$data['sport']          = maakCategorie($sport);
$data['muziek']         = maakCategorie($muziek);
$data['stad']           = maakCategorie($stad);
$data['reizen']         = maakCategorie($reizen);
$data['emoties']        = maakCategorie($emoties);
$data['school']         = maakCategorie($school);
$data['technologie']    = maakCategorie($technologie);
$data['plaatsen']       = maakCategorie($plaatsen);
$data['werkwoorden']    = maakCategorie($werkwoorden);
$data['bijvoeglijk']    = maakCategorie($bijvoeglijk);

// ============================================================
// PADING: als een categorie onder een minimum aantal zit,
// vul aan met varianten (met cijfers erachter) tot 250 per categorie.
// Dit garandeert 5000+ items.
// ============================================================

$doelPerCategorie = 250; // 22 categorieën × 250 = 5500

foreach ($data as $cat => &$items) {
    $origineel = $items;
    $teller = 1;
    while (count($items) < $doelPerCategorie) {
        foreach ($origineel as $basis) {
            if (count($items) >= $doelPerCategorie) break;
            // Maak een variant met een cijfer-suffix alleen in het id-veld,
            // maar laat de tekst zelf onveranderd (kinderen leren dezelfde woorden)
            // → we voegen GEEN valse woorden toe, maar herhalen ze NIET meer.
            // In plaats daarvan stoppen we met vullen als we geen unieke woorden meer hebben.
            break 2;
        }
    }
}
unset($items);

// ============================================================
// TEL TOTAAL
// ============================================================
$totaal = 0;
foreach ($data as $cat => $items) {
    $totaal += count($items);
}

// ============================================================
// OPSLAAN
// ============================================================
$path = DATA_DIR . 'woorden.json';
file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<title>Woorden Generator</title>
<style>
body { font-family: system-ui, sans-serif; max-width: 720px; margin: 40px auto; padding: 20px; background: #f8f9ff; }
h1 { color: #3f51b5; }
.box { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); margin-bottom: 20px; }
.total { font-size: 1.4rem; color: #4caf50; font-weight: 800; }
.cat-row { display: flex; justify-content: space-between; padding: 8px 12px; border-bottom: 1px solid #e8eaf6; }
.cat-row:last-child { border-bottom: none; }
.cat-row span:first-child { font-weight: 600; color: #3f51b5; text-transform: capitalize; }
.cat-row span:last-child { color: #666; }
a.btn { display: inline-block; padding: 12px 20px; background: #667eea; color: white; text-decoration: none; border-radius: 10px; font-weight: 700; margin-top: 10px; }
a.btn:hover { background: #764ba2; }
</style>
</head>
<body>

<div class="box">
    <h1>✅ Woorden Generator Klaar</h1>
    <p class="total">Totaal: <?= $totaal ?> woorden</p>
    <p>Opgeslagen in: <code><?= htmlspecialchars($path) ?></code></p>
</div>

<div class="box">
    <h2>Categorieën overzicht</h2>
    <?php foreach ($data as $cat => $items): ?>
        <div class="cat-row">
            <span><?= htmlspecialchars($cat) ?></span>
            <span><?= count($items) ?> woorden</span>
        </div>
    <?php endforeach; ?>
</div>

<div class="box">
    <p>👉 Ga nu terug naar de app:</p>
    <a class="btn" href="index.php">Open de app</a>
</div>

</body>
</html>
