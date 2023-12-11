CREATE TABLE usuarios_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    hashed_password VARCHAR(255) NOT NULL,
    rol VARCHAR(10) NOT NULL DEFAULT 'usuario'
);

CREATE TABLE equipos (
    id_equipo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    estado VARCHAR(100) NOT NULL,
    anio_fundacion INT NOT NULL,
    imagen VARCHAR(255),
    descripcion VARCHAR(255)
);
CREATE TABLE estadisticas_partidos (
    id_partido INT AUTO_INCREMENT PRIMARY KEY,
    id_equipo INT,
    partidos_jugados INT NOT NULL,
    victorias INT NOT NULL,
    derrotas INT NOT NULL,
    empates INT NOT NULL,
    FOREIGN KEY (id_equipo) REFERENCES equipos(id_equipo)
);
CREATE TABLE jugadores (
    id_jugador INT AUTO_INCREMENT PRIMARY KEY,
    id_equipo INT,
    nombre VARCHAR(255) NOT NULL,
    numero INT NOT NULL,
    posicion VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_equipo) REFERENCES equipos(id_equipo)
);