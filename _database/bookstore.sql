-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 19. zář 2023, 17:04
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `bookstore`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author_name` varchar(150) NOT NULL,
  `author_surname` varchar(150) NOT NULL,
  `year` year(4) NOT NULL,
  `publisher` varchar(150) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `language` varchar(100) NOT NULL,
  `pieces` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `books`
--

INSERT INTO `books` (`id`, `name`, `author_name`, `author_surname`, `year`, `publisher`, `text`, `img`, `language`, `pieces`, `price`) VALUES
(1, 'Harry Potter a Kámen mudrců', 'Joanne K.', 'Rowlingová', '2021', 'Albatros Media', 'První rok v Bardavicích. Až do svých jedenáctých narozenin si o sobě Harry myslel, že je jen obyčejný chlapec. Pak ale dostal soví poštou dopis, kterým byl zván ke studiu na prestižní soukromé Škole čar a kouzel v Bradavicích, a jeho život se rázem proměnil. Leccos se dozvídá o minulosti svých zemřelých rodičů, získá pár dobrých kamarádů, naučí se mistrovsky hrát famfrpál a kvůli Kameni mudrců podstoupí smrtelný souboj se zloduchem Voldemortem...', 'harry-potter-and-the-philosopher-s-stone.jpg', 'česky', 10, 350),
(2, 'Harry Potter a Tajemná komnata', 'Joanne K.', 'Rowlingová', '2022', 'Albatros Media', 'Harry si za uplynulé léto prožil ty nejhorší narozeniny v životě, dostal několik zlověstných varování od domácího skřítka Dobbyho a od Dursleyových ho nakonec musel zachránit Ron Weasley v kouzelném létajícím autě. Na chodbách bradavické školy pak Harry slyší podivný šepot – a útoky na sebe nenechají dlouho čekat. Několik studentů zdánlivě zkamení a Dobbyho předpovědi se začínají vyplňovat…', 'harry-potter-and-the-chamber-of-secrets.jpg', 'česky', 10, 350),
(3, 'Harry Potter a vězeň z Azkabanu', 'Joanne K.', 'Rowlingová', '2022', 'Albatros Media', 'Ze tmy se vyřítí Záchranný autobus a se skřípěním zastavím přímo před Harrym Potterem. Začíná další neobyčejný rok v Bradavicích. Sirius Black, masový vrah a následovník Lorda Voldemorta, je na útěku a proslýchá se, že má spadeno právě na Harryho. Na první hodině jasnovidectví profesorka Trelawneyová v Harryho čajových lístcích spatří znamení smrti. Ale ze všeho nejděsivější jsou mozkomorové, kteří hlídají školní pozemky. Jejich polibek vysaje člověku duši…', 'harry-potter-and-the-prisoner-of-azkaban.jpg', 'česky', 10, 350),
(4, 'Harry Potter a Ohnivý pohár', 'Joanne K.', 'Rowlingová', '2021', 'Albatros Media', 'V Bradavicích se bude konat Turnaj tří kouzelníků. Zúčastnit se ho smí jen studenti, kterým už bylo sedmnáct let, a tak Harry Potter zatím alespoň sní o tom, že turnaj jednou vyhraje. Jenže když o Halloweenu Ohnivý pohár vyřkne své rozhodnutí, Harry s úžasem zjistí, že je mezi vybranými. Čekají ho smrtící úkoly, draci a temní čarodějové, ale s pomocí svých nejlepších přátel Rona a Hermiony to Harry možná… přežije.', 'harry-potter-and-the-goblet-of-fire.jpg', 'český', 10, 350),
(5, 'Harry Potter a Fénixův řád', 'Joanne K.', 'Rowlingová', '2022', 'Albatros Media', 'Do Bradavic přišly temné časy. Po útoku mozkomorů na bratrance Dudleyho Harry ví, že Voldemort udělá cokoli, jen aby ho našel. Mnozí jeho návrat popírají, ale Harry přesto není sám: na Grimmauldově náměstí se schází tajný řád, který chce bojovat proti temným silám. Harry se musí od profesora Snapea naučit, jak se chránit před Voldemortovými útoky na jeho duši. Jenže Pán zla je den ode dne silnější a Harrymu dochází čas…', 'harry-potter-and-the-order-of-the-phoenix.jpg', 'český', 10, 350),
(6, 'Harry Potter a princ dvojí krve', 'Joanne K.', 'Rowlingová', '2018', 'Albatros Media', 'Moc Lorda Voldemorta stále roste a smrtijedi působí spoušť ve světě mudlů i kouzelníků. Když Harry Potter objeví starou učebnici lektvarů patřící tajemnému princi dvojí krve, spoléhá na její kouzla i přes varování svých kamarádů. Profesor Brumbál poodhaluje Voldemortovu minulost a s Harryho pomocí se snaží odkrýt tajemství jeho nesmrtelnosti. Jenže zlo se dere k moci stále silněji, neštěstí se blíží a Bradavice už nikdy nebudou jako dřív.', 'harry-potter-and-the-half-blood-prince.jpg', 'český', 10, 439),
(7, 'Harry Potter a relikvie smrti', 'Joanne K.', 'Rowlingová', '2018', 'Albatros Media', 'Věrní kamarádi Harry, Ron a Hermiona do posledního ročníku bradavické školy nenastoupí. Musí splnit nelehký úkol, který moudrý ředitel školy Albus Brumbál již nemůže dokončit. Společně se vydávají hledat tajemné viteály, do kterých Pán zla roztříštil svou duši. Zničení viteálů je tak jedinou šancí, jak nad ním zvítězit. Na trojici kamarádů číhají na cestě nebezpečné nástrahy, ale ani v těch nejtemnějších úkrytech neztrácejí podporu svých přátel.', 'harry-potter-and-the-deathly-hallows.jpg', 'český', 10, 539),
(8, 'Vinnetou', 'Karl', 'May', '2020', 'Albatros', 'Nesmrtelná dobrodružství Vinnetoua, rudého gentlemana, a Old Shatterhanda přinášíme v převyprávění Vítězslava Kocourka. Kniha je plná romantiky a věčného souboje dobra se zlem uprostřed divoké, nezkrotné přírody. Ukazuje obraz indiánů, původních obyvatel Ameriky, v nesmlouvavých soubojích s bílými dobyvateli. Příběh doprovází nepřekonatelné ilustrace Zdeňka Buriana. ', 'vinnetou.jpg', 'český', 10, 290);

-- --------------------------------------------------------

--
-- Struktura tabulky `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `users_id` int(11) NOT NULL,
  `books_id` int(11) NOT NULL,
  `pieces` int(11) NOT NULL,
  `finish` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `nickname` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `address`, `city`, `nickname`, `role`, `password`) VALUES
(1, 'Josef', 'Novák', 'pepazdepa@depo.cz', 'Neznámá 1111', 'Neználkov', 'pepan', 'admin', '$2y$10$OJdADiHq9glIVlVs.46lQeQy6THtsnpydRfnBtgMd26rbP1918rT6');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pro tabulku `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
