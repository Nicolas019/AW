CREATE USER 'athenea'@'%' IDENTIFIED BY 'athenea';
GRANT ALL PRIVILEGES ON `athenea`.* TO 'athenea'@'%';

CREATE USER 'athenea'@'localhost' IDENTIFIED BY 'athenea';
GRANT ALL PRIVILEGES ON `athenea`.* TO 'athenea'@'localhost';