CREATE TABLE usuarios (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          username VARCHAR(50) NOT NULL UNIQUE,
                          password VARCHAR(255) NOT NULL,
                          acesso_admin BOOLEAN NOT NULL DEFAULT 0
);
