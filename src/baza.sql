
-- -----------------------------------------------------
-- Table `mydb`.`pwd`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS pwd (
                                   pwd_id SERIAL NOT NULL,
                                   pwd_hash VARCHAR(45) NOT NULL,
    PRIMARY KEY (pwd_id)
    );



-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS user_account
(
    user_id     SERIAL NOT NULL UNIQUE,
    username    VARCHAR(16)  NOT NULL,
    email       VARCHAR(255) NULL UNIQUE,
    pwd_id      INT          NOT NULL,
    create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id),
    FOREIGN KEY (pwd_id) REFERENCES pwd (pwd_id)
    );


-- -----------------------------------------------------
-- Table `mydb`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS category (
                                        category_id SERIAL NOT NULL UNIQUE,
                                        name VARCHAR(255) NOT NULL,
    amount_assigned DECIMAL NOT NULL,
    user_id INT NOT NULL,
    amount_spent DECIMAL NULL,
    amount_last DECIMAL NULL,
    PRIMARY KEY (category_id),
    FOREIGN KEY (user_id) REFERENCES user_account (user_id)
    ON DELETE NO ACTION
    );

-- -----------------------------------------------------
-- Table `mydb`.`transaction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS transaction
(
    transaction_id SERIAL      NOT NULL UNIQUE,
    amount         DECIMAL     NOT NULL,
    comment        VARCHAR(45) NULL,
    create_time    TIMESTAMP   NULL,
    edit_time      TIMESTAMP   NULL,
    category_id    INT         NOT NULL,
    PRIMARY KEY (transaction_id),
    FOREIGN KEY (category_id) REFERENCES category (category_id)
    );


-- -----------------------------------------------------
-- Table `mydb`.`session`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS session
(
    session_id SERIAL NOT NULL UNIQUE,
    token VARCHAR(32) NOT NULL UNIQUE,
    user_id INT NOT NULL,
    expire TIMESTAMP NOT NULL,
    PRIMARY KEY (session_id),
    FOREIGN KEY (user_id) REFERENCES user_account (user_id)
);
