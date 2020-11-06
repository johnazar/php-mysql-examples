CREATE TABLE categories (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
)COLLATE='utf8_general_ci';

CREATE TABLE jobs (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    category_id VARCHAR(255) NOT NULL,
    company VARCHAR(255) NOT NULL,
    job_title VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    salary VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    contact_user VARCHAR(255) NOT NULL,
    contact_email VARCHAR(255) NOT NULL
)COLLATE='utf8_general_ci';
