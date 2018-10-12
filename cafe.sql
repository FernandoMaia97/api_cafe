-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Out-2018 às 19:40
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `nome`, `descricao`) VALUES
(1, 'Café Expresso', 'O café espresso (ou expresso, dependendo da preferência de escrita) é um dos principais tipos de café – e é a base de diversos outros. O nome “espresso” vem do italiano “espremido, pressionado”. Ele é feito em poucos segundos sob alta pressão de água na temperatura de consumo. Isso faz com que acumule muito sabor e intensidade'),
(2, 'Cappuccino', 'O Cappuccino é bastante parecido com um Latte, e é um dos tipos de café mais populares em cafeterias e bares ao redor do mundo. A diferença entre os dois está no fato de o cappuccino possuir mais leite vaporizado em sua fórmula, além de chocolate adicionado à receita.\r\n\r\nSua receita inclui uma dose de café espresso misturado com leite vaporizado, espuma de leite e chocolate em pequenos pedaços ou em pó sobre a bebida.'),
(3, 'Mocha', 'O Mocha é uma versão ainda mais achocolatada do Cappuccino. Na prática, é uma mistura entre um Cappuccino e chocolate quente. É feito a partir da mistura do chocolate em pó com uma dose de espresso, adicionando leite vaporizado e espuma de leite – todos homogeneamente misturados dentro da bebida.\n\nPara completar na apresentação, costuma-se polvilhar chocolate em pó ou em pequenos pedaços sobre a bebida.'),
(6, 'Café Ristretto', 'O ristretto é uma versão mais concentrada do café espresso padrão. Entre os tipos de café mais populares, é o que apresenta maior intensidade. Basicamente, trata-se da extração da mesma quantidade de café de um espresso, mas em apenas metade da quantidade de água.\n\nPara ser feito, basta utilizar metade da água na realização de um espresso, ou simplesmente interromper a máquina na metade do processo. Isso garante um sabor concentrado e bastante forte.'),
(7, 'Affogato', 'O affogato é mais uma sobremesa do que um drink, o que o torna especialmente delicioso, Consiste na mistura de uma boa colherada de sorvete de baunilha com uma ou duas doses de café espresso. Muitas pessoas discutem sua presença entre os tipos de café, dizendo que deveria ser considerado um doce.\n\nNo entanto, uma receita tão deliciosa simplesmente não poderia ficar de fora da lista. Além disso, há uma versão ainda mais animada da bebida que inclui uma dose de licor de amêndoas na mistura.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
