-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Maio-2024 às 05:32
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `altair`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `ProductID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `name`, `price`, `quantity`, `image`, `ProductID`) VALUES
(9, 2, 'Cabelos Cacheados ', 60, 1, 'cc.jpg', NULL),
(10, 2, 'Cabelo Ruivo (Natural)', 80, 1, 'cc1.jpg', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cortes`
--

CREATE TABLE `cortes` (
  `CorteID` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Valor` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `cortes`
--

INSERT INTO `cortes` (`CorteID`, `Nome`, `Valor`) VALUES
(1, 'Corte Masculino', 10.00),
(2, 'Corte Feminino', 12.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `depilacao`
--

CREATE TABLE `depilacao` (
  `DepilacaoID` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Valor` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `depilacao`
--

INSERT INTO `depilacao` (`DepilacaoID`, `Nome`, `Valor`) VALUES
(1, 'Sobrancelhas', 7.00),
(2, 'Buço', 5.00),
(3, 'Axilia', 5.00),
(4, 'Baço', 9.00),
(5, 'Virilha', 18.00),
(6, 'Meia Perna', 10.00),
(7, 'Perna', 18.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `massagem`
--

CREATE TABLE `massagem` (
  `MassagemID` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Valor` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `massagem`
--

INSERT INTO `massagem` (`MassagemID`, `Nome`, `Valor`) VALUES
(1, 'Relaxante 1 hora', 40.00),
(2, 'Localizada 20 minutos', 20.00),
(3, 'Drenagem Linfática', 35.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--
-- Erro ao ler a estrutura para a tabela altair.message: #1932 - Table &#039;altair.message&#039; doesn&#039;t exist in engine
-- Erro ao ler dados para tabela altair.message: #1064 - Você tem um erro de sintaxe no seu SQL próximo a &#039;FROM `altair`.`message`&#039; na linha 1

-- --------------------------------------------------------

--
-- Estrutura da tabela `olhos`
--

CREATE TABLE `olhos` (
  `OlhosID` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Valor` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `olhos`
--

INSERT INTO `olhos` (`OlhosID`, `Nome`, `Valor`) VALUES
(1, 'Pestanas', 25.00),
(2, 'Manutenção de Pestanas', 15.00),
(3, 'Tinta Sobrancelhas', 10.00),
(4, 'Volume Russo', 30.00),
(5, 'Lifting pestanas + tinta', 25.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(100) NOT NULL,
  `UserID` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `ProductID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `ProductID` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `price`, `image`) VALUES
(1, 'Cabelos Cacheados ', 60, 'cc.jpg'),
(2, 'Cabelo Ruivo (Natural)', 80, 'cc1.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `idservices` mediumint(9) NOT NULL,
  `nome` char(50) NOT NULL,
  `price` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`idservices`, `nome`, `price`) VALUES
(1, 'Corte Masculino', 10.00),
(2, 'Corte Feminino', 12.00),
(3, 'Manicure', 10.00),
(4, 'Pedicure', 20.00),
(5, 'Gelinho mãos', 18.00),
(6, 'Gelinho pés', 25.00),
(7, 'Gel na propria unha', 30.00),
(8, 'Manutenção', 25.00),
(9, 'Alongamento do gel', 35.00),
(10, 'Tratamento dos pés', 25.00),
(11, 'Pestanas', 25.00),
(12, 'Manutenção de Pestanas', 15.00),
(13, 'Tinta Sobrancelhas', 10.00),
(14, 'Volume Russo', 30.00),
(15, 'Lifting pestanas + tinta', 25.00),
(16, 'Sobrancelhas', 7.00),
(17, 'Buço', 5.00),
(18, 'Axilia', 5.00),
(19, 'Baço', 9.00),
(20, 'Virilha', 18.00),
(21, 'Meia Perna', 10.00),
(22, 'Perna', 18.00),
(23, 'Relaxante 1 hora', 40.00),
(24, 'Localizada 20 minutos', 20.00),
(25, 'Drenagem Linfática', 35.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unhas`
--

CREATE TABLE `unhas` (
  `UnhasID` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Valor` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `unhas`
--

INSERT INTO `unhas` (`UnhasID`, `Nome`, `Valor`) VALUES
(1, 'Manicure', 10.00),
(2, 'Pedicure', 20.00),
(3, 'Gelinho mãos', 18.00),
(4, 'Gelinho pés', 25.00),
(5, 'Gel na propria unha', 30.00),
(6, 'Manutenção', 25.00),
(7, 'Alongamento do gel', 35.00),
(8, 'Tratamento dos pés', 25.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `UserID` int(100) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL,
  `User_Type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`UserID`, `Nome`, `Email`, `Pass`, `User_Type`) VALUES
(2, 'John', 'user1@gmail.com', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `UserID` (`user_id`);

--
-- Índices para tabela `cortes`
--
ALTER TABLE `cortes`
  ADD PRIMARY KEY (`CorteID`);

--
-- Índices para tabela `depilacao`
--
ALTER TABLE `depilacao`
  ADD PRIMARY KEY (`DepilacaoID`);

--
-- Índices para tabela `massagem`
--
ALTER TABLE `massagem`
  ADD PRIMARY KEY (`MassagemID`);

--
-- Índices para tabela `olhos`
--
ALTER TABLE `olhos`
  ADD PRIMARY KEY (`OlhosID`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `UserID` (`UserID`) USING BTREE;

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`idservices`);

--
-- Índices para tabela `unhas`
--
ALTER TABLE `unhas`
  ADD PRIMARY KEY (`UnhasID`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cortes`
--
ALTER TABLE `cortes`
  MODIFY `CorteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `depilacao`
--
ALTER TABLE `depilacao`
  MODIFY `DepilacaoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `massagem`
--
ALTER TABLE `massagem`
  MODIFY `MassagemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `olhos`
--
ALTER TABLE `olhos`
  MODIFY `OlhosID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `idservices` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `unhas`
--
ALTER TABLE `unhas`
  MODIFY `UnhasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Limitadores para a tabela `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
