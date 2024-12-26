CREATE DATABASE voyage_2;

USE voyage_2;

CREATE TABLE role(
  role_id INT AUTO_INCREMENT PRIMARY KEY,
  titre VARCHAR(225)
);

CREATE TABLE User(
  User_id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(100),
  prenom VARCHAR(100),
  email VARCHAR(100),
  password VARCHAR(100),
  status ENUM('active', 'blocked'),
  role_id INT,
  FOREIGN KEY (role_id) REFERENCES role(role_id)
);

CREATE TABLE activity(
  activity_id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100),
  description VARCHAR(100),
  price DECIMAL(10, 2),
  date_activite DATETIME
);

CREATE TABLE reservation(
  reservation_id INT AUTO_INCREMENT PRIMARY KEY,
  date_activite DATETIME,
  status ENUM('waiting', 'accepte', 'refuse'),
  User_id INT,
  activity_id INT,
  FOREIGN KEY (User_id) REFERENCES User(User_id),
  FOREIGN KEY (activity_id) REFERENCES activity(activity_id)
);
