CREATE TABLE users (
    userId INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(100),
    email VARCHAR(100),
    role ENUM('client', 'admin'),
    password VARCHAR(100),
    isActive BOOLEAN DEFAULT TRUE,
);

CREATE TABLE category (
    categoryId INT AUTO_INCREMENT PRIMARY KEY,
    categoryName VARCHAR(200),
    categoryImage VARCHAR(400)
);

CREATE TABLE vehicles (
    vehicleId INT AUTO_INCREMENT PRIMARY KEY,
    vehicleName VARCHAR(100),
    vehicleModel VARCHAR(200),
    vehiclePrice DECIMAL(8,2) DEFAULT 0.00,
    available boolean DEFAULT TRUE,
    vehicleType VARCHAR(100),
    vehicleImage VARCHAR(200),
    idCategory INT,
    
    FOREIGN KEY (idCategory) REFERENCES category(categoryId)
);

CREATE TABLE appointment (
    appointmentId INT AUTO_INCREMENT PRIMARY KEY,
    appointmentStartDate DATETIME,
    appointmentEndDate DATETIME,
    appointmentPlace VARCHAR(100),
    idVehicle INT,
    idUser INT,
    
    FOREIGN KEY (idVehicle) REFERENCES vehicles(vehicleId),
    FOREIGN KEY (idUser) REFERENCES users(userId)
);

CREATE TABLE review (
    reviewId INT AUTO_INCREMENT PRIMARY KEY,
    stars INT CHECK (stars BETWEEN 1 AND 5),
    reviewComment text,
    idVehicle INT,
    idUser INT,
    
    FOREIGN KEY (idVehicle) REFERENCES vehicles(vehicleId),
    FOREIGN KEY (idUser) REFERENCES users(userId)
);