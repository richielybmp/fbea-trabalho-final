SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `api_apolice`
--
CREATE DATABASE IF NOT EXISTS `api_apolice` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `api_apolice`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apolices`
--

CREATE TABLE `apolices` (
  `inicio` date NOT NULL,
  `seguradora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(13,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

COMMIT;

