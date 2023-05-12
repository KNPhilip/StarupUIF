-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generatingtime: 08. 01 2023 kl. 20:57:25
-- Serverversion: 10.3.37-MariaDB-cll-lve
-- PHP-version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starupuif`
--

-- --------------------------------------------------------

--
-- Structure-dump for table `events`
--

CREATE TABLE `events` (
  `EID` int(11) NOT NULL,
  `EName` varchar(200) NOT NULL,
  `ECategory` varchar(50) NOT NULL,
  `EDescription` varchar(2500) DEFAULT NULL,
  `EImage` varchar(100) DEFAULT NULL,
  `EDate` date NOT NULL,
  `EStartTime` varchar(50) NOT NULL,
  `EEndTime` varchar(50) DEFAULT NULL,
  `EPlace` varchar(100) DEFAULT NULL,
  `EPrice` smallint(6) NOT NULL,
  `EContactName` varchar(100) DEFAULT NULL,
  `EContactPhone` int(11) DEFAULT NULL,
  `ECreatedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Data dump for table `events`
--

INSERT INTO `events` (`EID`, `EName`, `ECategory`, `EDescription`, `EImage`, `EDate`, `EStartTime`, `EEndTime`, `EPlace`, `EPrice`, `EContactName`, `EContactPhone`, `ECreatedBy`) VALUES
(1, 'Håndboldkamp - serie 1 herrer', 'Sport', 'Kom og bak op om vores serie 1 herrer, som spiller om oprykning til Danmarksserie.\r\n Kampen mod Næssets IF skal vindes for at holde liv i drømmen om oprykning', 'Serie1haandbold.jpg', '2023-03-26', '16:00', '17:10', 'Starup Hallen - Hal 1', 0, NULL, NULL, 'halu@aspit.dk'),
(2, 'Vegetarisk inspiration til aftensmaden', 'Andet', 'Vi sætter fokus på kødløs inspiration til hele familiens aftensmad. Der laves mad med masser af protein og fiber, som sikrer at i føler jer mætte i lang tid - også uden kød.', 'VegetarKokkeskole.jpg', '2023-02-23', '17:00', '20:00', 'Starup Skole - Madkundskab', 200, 'Jette Justesen', 11223344, 'halu@aspit.dk'),
(3, '4-dages arbejdsuge? Med Lars Kornager', 'Foredrag', 'Er I 100 % effektive eller kan produktiviteten øges og nedbringe stress samtidig?\r\n\r\nTænk hvis produktiviteten i Jeres organisation kunne øges med 5 %, 10 %, 20 % eller enddog mere! Lars’ arbejde som optimeringskonsulent hos IIH Nordic har udmøntet sig i en yderst kontroversiel 4-dages arbejdsuge og mest interessant rekordhøje top- og bundlinjer.\r\n\r\nI virkeligheden er det ærgerligt, at folk er blevet så fokuserede på idéen om en 4-dages arbejdsuge. Den idé er i Lars’ øjne allerede forældet og har aldrig været målet. I stedet findes essensen i at turde ændre sine arbejdsvaner, for at frigive tid til mere.\r\n\r\nLars mindes aldrig at have besøgt en arbejdsplads og tænkt “De er virkelig effektive her. Sikke imponerende”. Der er tværtimod altid ting at tage fat på for at øge effektiviteten. Og det er for i øvrigt ret simple småting, der kan bane vejen for højere effektivitet.\r\n\r\nDette kan der være mange gode grunde til at stræbe efter. Effektivisering frigiver tid. Tid medarbejderne kan bruge med deres familie eller på deres hobbyer. Tiden kan også bruges på at nå endnu mere og skabe endnu større værdi og vækst i virksomheden. Effektivisering kan hjælpe til at nedsætte stress og sygefravær og øge medarbejdertilfredsheden og på sigt også virksomhedens brand og tiltrækningskraft i rekrutteringssammenhæng.', 'ForedragLarsKornager.jpg', '2023-05-25', '19:00', '21:30', 'Starup Forsamlingshus', 50, 'Henrik Cornelius', 22222222, 'halu@aspit.dk'),
(4, 'Fælles hundeluftningstur', 'Natur', 'Vi mødes på parkeringspladsen ved Starup Skov. Sammen går vi en smuk tur med vores hund og laver lidt sjov motion undervejs.\r\n\r\nDeltagelse er gratis og alle kan være med.', 'Hundetur.jpg', '2023-02-02', '10:00', '12:00', 'Parkeringspladsen ved Starup Skov', 0, 'Niels Rasmussen', 33333333, 'niels.rasmussen@gmail.com'),
(5, 'Yoga for begyndere', 'Sport', 'Vi skal arbejde med yogaens grundstillinger og også lidt mere udfordrende yoga. Alle kan dog være med, da der altid ville kunne laves alternative øvelser.\r\n\r\nYogaen henvender sig både til unge/ældre, mænd og kvinder.\r\n\r\nMedbring din egen yogamåtte, samt et tæppe og en pude.\r\n\r\nInstruktør: Lone Brodersen', 'YogaForBegyndere.jpg', '2023-04-10', '10:00', '11:00', 'Starup Forsamlingshus', 100, 'Lone Brodersen', 44444444, 'lone@yogastudio.dk'),
(6, 'Klassisk guitar koncert', 'Musik', 'Den tyske guitarist Peter Graneis og den danske guitarist Mikkel Schou spiller værker af bla. Hans Werner Henze, Simon Steen Andersen, Silvius Leopold Weiss, Manuel Ponce, Alexandre Tansman og Claude Debussy.', 'GuitarKoncert.jpg', '2023-03-27', '19:00', NULL, 'Starup Forsamlingshus', 150, 'Andreas Hartmann', 55555555, 'torben@suif.dk'),
(7, 'Haderslev Musikskoles Big Band og Jomfru Fannys Big Band', 'Musik', 'I godt to måneder har talenteleverne fra Haderslev Musikskole øvet sig på musikken forud for en koncert med Jomfru Fanny Big Band på Slesvigske Musikhus.\r\n\r\nSangeleverne står i front for bigbandet og synger sange fra jazz- og bigbandrepertoiret, mens instrumentaleleverne sidder med i orkestret. Det er ikke nogen let genre, og projektet har været og er derfor en stor udfordring for eleverne. Men det er samtidigt en uvurderlig erfaring, de får med sig fremover.\r\n\r\nJomfru Fanny Big Band er et amatørorkester på et semiprofessionelt niveau. De har til huse i Aabenraa, men spiller i hele regionen.\r\n\r\nSamarbejdet mellem bandet og musikskolen går efterhånden nogle år tilbage og er et af de mest frugtbare i landsdelen - også for orkestret. Musikerne nyder at spille sammen med musikskoleeleverne.\r\n\r\nBigbandet dirigeres af Jack Lawrence.', 'HMSBigbandKoncert.jpg', '2023-02-19', '16:00', '18:00', 'Starup Hallen - Hal 2', 0, 'Jesper Ry', 12345678, 'torben@suif.dk'),
(8, 'Moderne Mormormad', 'Andet', 'På kurset skal vi eksperimentere og lege med de gamle danske mormorretter. Vi tænker ud af boksen, og her er plads til at være kreativ med råvarer og anretning. Maden får nyt udseende og konsistens, men vi beholder stadig de smage, vi kender og elsker.\r\n\r\nVær med når vi omdanner de klassiske mormorretter til helt nye moderne og mere raffineret versioner af bl.a.:\r\n\r\nRejecocktail\r\nBrændende kærlighed\r\nStegt flæsk med persillesovs\r\nCitronfromage\r\nRødgrød m/fløde\r\n\r\nFokus er på de gode råvarer, og ser på hvilke ingredienser, der egner sig bedst i de forskellige retter.\r\n\r\nVi smager selvfølgelig på alt, og efter kurset kan du fortsætte derhjemme og imponere familie og venner med dejlig hjemmelavet mad.\r\n\r\nMedbring\r\n\r\nDrikkevarer, viskestykke, karklud, en god køkkenkniv og forklæde.', 'ModerneMormormad.jpg', '2023-03-07', '17:00', NULL, 'Starup Skole - Madkundskab', 500, 'Jette Jessen', 87654321, 'torben@suif.dk'),
(9, 'Folkekons koncert', 'Musik', 'Folkekons består af studerende fra folkemusikuddannelsen på Syddansk Musikkonservatorium, som er den eneste af sin art i Danmark. De spiller folkemusik med udgangspunkt i de danske og nordiske rødder, og de fortolker både traditionel og ny folkemusik.\r\nDerudover komponerer de også selv ny folkemusik, som I også vil få mulighed for at opleve til koncerten.', 'FolkekonsKoncert.jpg', '2023-03-22', '19:00', NULL, 'Starup Forsamlingshus', 100, 'Jesper Ry', 12345678, 'torben@suif.dk'),
(10, 'Detox din hjerne - foredrag', 'Foredrag', 'Madmyter, pseudovidenskab og regulær bullshit fylder alt for meget i sundhedsdebatten. Misinformationen forvirrer og får for mange til at fokusere på det forkerte, i jagten på sundhed – eller får dem til at tage på, i jagten på vægttab.\r\nDerfor er det tid til en cleanse – ikke af din krop, men af dine tanker. En detox, der udrenser dit sind for usunde usandheder om sundhed,  og erstatter dem med brugbare fakta. Til foredraget giver Morten Kristiansen blandt andet svar på, hvor farligt det kunstige sødemiddel aspartam i virkeligheden er, hvad forskningen egentlig siger om sukkerafhængighed og hvor vigtigt det er at undgå kulhydrater, hvis du gerne vil tabe dig.', 'ForedragMortenKristiansen.jpg', '2023-04-29', '20:00', '21:30', 'Starup Skole - Fællessalen', 50, 'Anette Lorenzen', 88888888, 'halu@aspit.dk'),
(11, 'Gåtur i Haderslev Tunneldal', 'Natur', 'Haderslev Tunneldal strækker sig over 25 km. fra Haderslev til Vojens, og er sandsynligvis formet af vandløb, der har eroderet sig ned i landskabet. Tunneldalen byder på mange spændende strækninger, der er oplagte til en vandretur, cykeltur eller løbetur. Naturen i og omkring tunneldalen består af et tæt net af små veje, bække samt et bakket landskab.\r\n\r\nDerudover fortæller området en spændende kulturhistorie som fx ved Tørning Mølle og i Dyrehaven.', 'GaaturTunneldal.jpg', '2023-02-19', '10:00', NULL, 'Mødested: P-pladsen ved Starup Skov', 0, 'Erik Henningsen', 76467652, 'niels.rasmussen@gmail.com'),
(12, 'Foredrag om ensomhed', 'Foredrag', 'Teolog, ph.d. og forsker Jørn Henrik Olsen har sat sig for at bekæmpe ensomhed og sorg - og i et foredrag i Fjelsted Kirke 19.november kl. 19, fortæller han, hvordan man finder fornyet glæde og mod i sit liv.\r\n\r\nDe fleste mennesker kender til ensomhedsfølelser. Ensomhed er både åbning og smerte. Ensomhed kan være en god følelse, som kan skabe frihed, uafhængighed og giver arbejdsro, lyder det i en pressemeddelelse.\r\n\r\nMen ensomhed kan også være ganske hårdhændet og ond. Hos mange kan den opleves som en noget pinlig, social smerte. Som en tyngende følelse af at være mislykket. Tit med alvorlige konsekvenser for helbred og velvære. Vi behøver i den grad andre - og en del af dette behov er at behøves af andre, forklarer arrangørerne i pressemeddelelsen.\r\n\r\nForedraget afslører ikke blot dybe indsigter i ensomhedens problem, men giver også masser af inspiration til at lære den svære kunst at være alene og få gavn af den gode ensomhed.', 'ForedragOmEnsomhed.jpg', '2023-05-09', '20:00', NULL, 'Starup Forsamlingshus', 150, 'Henrik Cornelius', 22222222, 'halu@aspit.dk'),
(13, 'Die Herren koncert', 'Musik', 'Die Herren har fra det det første undseelige sekund – siden de i 1991 så et lille lysglimt i U2’s musik – været i bevægelse mod noget større! Større forståelse for U2’s musik og for at skabe den bedste koncert. Større musikalsk spændvidde. Større indlevelse i hvad publikum ønsker – og for hver gang, at gøre en Die Herren-koncert til noget større – selv i de mindste sammenhænge!\r\n\r\nDet er ikke nødvendigvis kun et spørgsmål om mange og store højttalere, lamper og skærme – men i lige så høj grad et spørgsmål om nærvær og kontakt til publikum. Et spørgsmål om opfindsomhed, intuition – og om at gribe nuet, krydret med ydmyghed, humor, fandenivoldsknerve – og så selvfølgelig – dygtighed og overskud', 'KoncertDieHerren.jpg', '2023-03-20', '21:00', NULL, 'Starup Hallen - Hal 1', 450, 'Jesper Ry', 12345678, 'torben@suif.dk'),
(14, 'Kim Larsen Kopiband', 'Musik', 'Hvem har ikke sunget med på Kim Larsen\r\nog Kjukken eller Gasolins mange populære sange. Jo det har vi alle, og gør det til stadighed. Med Munch og Broderskabet vil du opleve præcis den samme stemning, som var det Kim Larsen selv, der stod på scenen. Fordi her er et af de allerbedste look alike og cowerbands til Kim Larsen og Gasolin. Munch og Broderskabet er nørdet i at lave den samme sound. Når du ser Anders Munch, tror du det er Kim Larsen. Anders har den samme mimik som Kim, og rent \"stemmemæssigt\", er det den bedste sammenligning, vi længe har hørt. Nok ikke enæggede tvillinger, men tæt derpå.\r\n\r\nSkal du have musik og rabalder til din næste fest, så er Munch & Broderskabet noget for dig. Med stor loyalitet fortolker bandet Kim Larsen og Gasolin\' for fuld udblæsning!\r\n\r\nAnders Munch har nu været på landevejen med sit Kim Larsen og Gasolin\'-show i mere end 20 år, og festen fortsætter. Anders spiller til alt - lige fra konfirmationsfester og Go\'aften Danmark til koncerter i Danmark, Norge, Sverige, Tyskland og Færøerne.', 'KoncertKimLarsenKopiBand.jpg', '2023-06-15', '20:00', NULL, 'Starup Hallen - Hal 1', 250, 'Jesper Ry', 12345678, 'torben@suif.dk'),
(15, 'Forårskoncert i Starup Kirke', 'Musik', 'En sikker forårsbebuder er musikskolens forårskoncert i Starup Kirke.\r\n\r\nOg en tradition er det blevet, for siden 2001 har elever fra Haderslev Musikskole gæstet vores dejlige kirkerum med et afvekslende program af akustisk musik, sunget og spillet på klaver, guitar, violin, fløjte, klarinet mm.\r\n\r\nFor eleverne – specielt de der spiller på de svage og sarte instrumenter – er koncerten et af årets højdepunkter: Musikken lyder bare bedre, når den spilles i Starup Kirkes fantastiske akustik!', 'KoncertMusikskolen.jpg', '2023-03-05', '12:00', '14:00', 'Starup Kirke', 0, 'Jesper Ry', 12345678, 'torben@suif.dk'),
(16, 'Løb for begyndere', 'Sport', 'Begynderholdet tager udgangspunkt i at give dig en succesoplevelse, som er med til at styrke motivationen og lysten til at gøre løb til en naturlig del af hverdagen. Programmet bygger på en kombination af løb og gang, hvor træningsmængden øges langsomt for til sidst at afsluttes med et 5 km testløb. Under træningerne sørger trænerne for, at alle er med – både de hurtigste løbere (omkring 5:45 min/km) og de langsomste. Alle begynderløbere får et komplet træningsprogram, så man har mulighed for at passe sin træning ind med ugens andre gøremål. ', 'LoebForBegyndere.jpg', '2023-03-16', '10:00', NULL, 'Mødested: P-pladsen ved Starup Hallen', 0, 'Erik Henningsen', 76467652, 'niels.rasmussen@gmail.com'),
(17, 'Fodboldkamp - serie 3 herrer', 'Sport', 'Starup UIF møder Vojens BI i serie 3 herrer', 'Serie3Fodbold.jpg', '2023-04-26', '18:30', NULL, 'Fodboldbanerne bag Starup Hallen', 0, NULL, NULL, 'torben@suif.dk'),
(18, 'Rock i Parken 2023', 'Musik', 'Kl. 12:00 - dørene åbnes\r\nKl. 13:00 - Johnny Madsen\r\nKl. 14:45 - Scarlet Pleasure\r\nKl. 16:45 - MEDINA\r\nKl. 18:30 - Birthe Kjær & Feel Good Band\r\nKl. 20:15 - SAVEUS\r\nKl. 22:00 - Carpark North\r\nKl. 24:00 - Midt om Natten', 'RockiParken2020.jpg', '2023-08-12', '12:00', NULL, 'Mølleparken', 1500, 'Jesper Ry', 12345678, 'halu@aspit.dk'),
(19, 'Violinkoncert - Eliza Henderson og Fredrik From', 'Musik', 'Antonio Vivaldi – den store italienske barokkomponist – var en forrygende violinvirtuos; det mærker man bl.a. i hans berømte violinkoncerter De fire årstider. Men når Vivaldi komponerer for flere soloinstrumenter, hører man tydeligt, at der også var andre i hans samtid, der kunne flytte fingrene.\r\n\r\nDisse dobbeltkoncerter er opvisninger i hårrejsende, duellerende virtuositet, og vi har sat den engelske violinvirtuos Eliza Henderson og Concerto Copenhagens Fredrik From til at udfordre hinanden i disciplinen.', 'KoncertElizaHenderson.jpg', '2023-04-04', '14:00', NULL, 'Starup Kirke', 100, 'Jesper Ry', 12345678, 'torben@suif.dk'),
(20, 'Kr. Himmelfarts turnering - fodbold', 'Sport', 'Starup UIF indbyder for 34. gang til et hyggeligt fodboldstævne for alle. Vores senior fodboldspillere er dommere og kampene startes og afsluttes fælles fra speakervognen. Tilslut er der statuetter til alle spillere.', 'KrHimFodboldTurn.jpg', '2023-05-18', '10:00', NULL, 'Fodboldbanerne bag Starup Hallen', 200, 'Anders Johansen', 65465412, 'torben@suif.dk');

-- --------------------------------------------------------

--
-- Structure-dump for table `users`
--

CREATE TABLE `users` (
  `UID` int(11) NOT NULL,
  `UEmail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UPassword` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UFirstname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ULastname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `UAddress` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `UPostcode` mediumint(9) DEFAULT NULL,
  `UCity` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `UPhone` int(11) DEFAULT NULL,
  `UPriviledge` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Data dump for table `users`
--

INSERT INTO `users` (`UID`, `UEmail`, `UPassword`, `UFirstname`, `ULastname`, `UAddress`, `UPostcode`, `UCity`, `UPhone`, `UPriviledge`) VALUES
(1, 'halu@aspit.dk', '', 'Hanne', 'Lund', 'Gadevej 1', 6100, 'Haderslev', 13246579, 'Administrator'),
(2, 'niels.rasmussen@gmail.com', '', 'Niels', 'Rasmussen', NULL, NULL, NULL, NULL, 'Administrator'),
(3, 'lone@yogastudio.dk', '', 'Lone', NULL, NULL, NULL, NULL, NULL, 'Administrator'),
(4, 'torben@suif.dk', '', 'Torben', 'Hansen', 'Starup Bygade 13', 6100, 'Haderslev', 78787878, 'Administrator');

--
-- Index for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EID`);

--
-- Index for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `Email` (`UEmail`);

--
-- Add AUTO_INCREMENT in table `events`
--
ALTER TABLE `events`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Add AUTO_INCREMENT in table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
