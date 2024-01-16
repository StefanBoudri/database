CREATE DATABASE IF NOT EXISTS Winkel;

USE Winkel;

CREATE TABLE IF NOT EXISTS Producten (
    product_code INT PRIMARY KEY,
    product_naam VARCHAR(255) NOT NULL,
    prijs_per_stuk DECIMAL(10, 2) NOT NULL,
    omschrijving TEXT -- text zorgt ervoor dat er geen limiet aan karakters is
);
