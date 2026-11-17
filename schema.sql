-- Run AFTER creating database and user (see deployment guide)
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_no VARCHAR(30) NOT NULL UNIQUE,
  full_name VARCHAR(120) NOT NULL,
  course VARCHAR(60) NOT NULL,
  year_level TINYINT NOT NULL DEFAULT 1,
  email VARCHAR(120),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Default login: admin / admin123
INSERT INTO users (username, password) VALUES ('admin', '$2y$10$wJiHcaC9WlpGRR.Rm4iGE.gj6ND0.w565UA5hCvlzwbI2RrJJMPEC');

INSERT INTO students (student_no, full_name, course, year_level, email) VALUES
('2023-0001','Juan Dela Cruz','BSIT',4,'juan@example.com'),
('2023-0002','Maria Santos','BSIT',3,'maria@example.com'),
('2023-0003','Pedro Reyes','BSCS',2,'pedro@example.com');
