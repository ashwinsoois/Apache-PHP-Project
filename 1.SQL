CREATE DATABASE IF NOT EXISTS home_dashboard;
USE home_dashboard;

-- 1. RECIPE MANAGER
CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    ingredients TEXT NOT NULL,
    instructions TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. BOOK & MOVIE CATALOG
CREATE TABLE media_catalog (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    media_type ENUM('Book', 'Movie', 'TV Show') NOT NULL,
    genre VARCHAR(100),
    location_or_shelf VARCHAR(100), -- Where is it in the house?
    is_loaned BOOLEAN DEFAULT FALSE,
    loaned_to VARCHAR(100) NULL
);

-- 3. RETRO GAME ROM BROWSER
CREATE TABLE retro_games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    system ENUM('NES', 'SNES', 'N64', 'Sega Genesis', 'PlayStation', 'GameBoy') NOT NULL,
    file_path VARCHAR(512) NOT NULL, -- Path to the ROM on your local drive
    play_count INT DEFAULT 0
);

-- 4. NETWORK STATUS MONITOR
CREATE TABLE network_devices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    device_name VARCHAR(100) NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    device_type VARCHAR(50) DEFAULT 'Generic'
);

-- Insert some default devices to monitor
INSERT INTO network_devices (device_name, ip_address, device_type) VALUES 
('Main Router', '192.168.1.1', 'Router'),
('Primary Smart TV', '192.168.1.50', 'TV'),
('Home NAS Storage', '192.168.1.100', 'Storage');
