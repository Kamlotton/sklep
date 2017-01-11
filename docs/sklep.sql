CREATE TYPE TEST_TYPE AS ENUM ('other', 'test');

CREATE SEQUENCE seq_sklep_test_id;
CREATE TABLE tbl_sklep_test
(
    id              int DEFAULT nextval('seq_sklep_test_id') NOT NULL,    
    code            varchar(10), --przykładowe dane
    description     varchar(255), 
    type            int REFERENCES tbl_nz_company_type(id), --typ firmy
    tmp_added       timestamp without time zone DEFAULT now() NOT NULL,
    tmp_updated     timestamp without time zone DEFAULT now() NOT NULL,
    type            TEST_TYPE NOT NULL,

    PRIMARY KEY (id)
);

CREATE SEQUENCE seq_user_id;
CREATE TABLE tbl_user
(
    id          int DEFAULT nextval('seq_user_id') NOT NULL,    
    access      int DEFAULT 0, --access, 0 - zwykły user, 100 - admin
    username    varchar(255) NOT NULL, --login/nazwa użytkownika
    password    varchar(255) NOT NULL, --zahaszowane hasło
    email       varchar(255) NOT NULL, --email usera, stosowany jako login
    name        varchar(255), --imie
    second_name varchar(255), --drugie imie
    surname     varchar(255), --nazwisko

    PRIMARY KEY (id)
);

CREATE SEQUENCE seq_user_address_id;
CREATE TABLE tbl_user_address
(
    id      int DEFAULT nextval('seq_user_address_id') NOT NULL,
    iduser  int REFERENCES tbl_nz_company_type(id), --typ firmy

    PRIMARY KEY (id)
);

CREATE SEQUENCE seq_user_comment_id;
CREATE TABLE tbl_user_comment --tabela z uwagami o userach
(
    id int DEFAULT nextval('seq_user_comment_id') NOT NULL,
    iduser  int REFERENCES tbl_nz_company_type(id), --typ firmy
    text    text,  --treść uwagi

    PRIMARY KEY (id)
);


