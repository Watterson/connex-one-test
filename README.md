# connex-one
 
Laravel Developer Technical test
 
There is a picture of a quick workflow diagram sketch saved in 'public/img'.

Postgres DB only recquires one table
This table allows users to set rules for the payload to be analysed against a JSON payload is analysed against these rules and routed accordingly to a microservice

CREATE TABLE rules (
      id serial PRIMARY KEY,
      microservice VARCHAR ( 1 ) UNIQUE NOT NULL,
      recieve_all BOOLEAN NOT NULL,
      receive_sales BOOLEAN NOT NULL,
      campaign VARCHAR ( 15 )
);

