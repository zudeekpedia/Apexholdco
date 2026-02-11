-- Create the database
CREATE DATABASE IF NOT EXISTS p2ptradetech;

-- Use the database 
USE watch_and_earn;

-- Create users table 
CREATE TABLE IF NOT EXISTS users (user_id INT AUTO_INCREMENT PRIMARY KEY, 
                                  username VARCHAR(50) NOT NULL UNIQUE, 
                                  fullname VARCHAR(255) NOT NULL, 
                                  firstname VARCHAR(255) NOT NULL,
                                  lastname VARCHAR(255) NOT NULL,
                                  email VARCHAR(255) NOT NULL, 
                                  password VARCHAR(255) NOT NULL, 
                                  tokens INT DEFAULT 0, 
                                  email_verified VARCHAR(255) NOT NULL, 
                                  created_at INT );

-- Create transactions table for deposit and withdrawals
CREATE TABLE IF NOT EXISTS transactions (transaction_id INT AUTO_INCREMENT PRIMARY KEY,
                                         user_id INT NOT NULL,  -- The ID of the user performing the transaction
                                         transaction_type ENUM('deposit', 'withdrawal') NOT NULL,
                                         amount DECIMAL(15, 2) NOT NULL,                  -- Amount of the transaction
                                         currency VARCHAR(10) DEFAULT 'USD',              -- Currency used in the transaction
                                         direction ENUM('credit', 'debit') NOT NULL,      -- Indicates if funds are credited or debited
                                         status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
                                         created_at INT ,
                                         updated_at INT,
                                         description VARCHAR(255),                        -- Optional description of the transaction
                                         FOREIGN KEY (user_id) REFERENCES users(user_id)  -- Assuming you have a users table
                                         );
      
-- Create tokens/coins table                                   
CREATE TABLE IF NOT EXISTS tokens (token_id INT AUTO_INCREMENT PRIMARY KEY,          -- Unique identifier for each token
                                   name VARCHAR(255) NOT NULL,                        -- Name of the coin/token (e.g., Bitcoin, Ethereum)
                                   symbol VARCHAR(20) NOT NULL,                       -- Symbol of the coin (e.g., BTC, ETH)
                                   wallet_address VARCHAR(255),                       -- Wallet address for storing tokens
                                   network VARCHAR(100) NOT NULL,                     -- Network for the token (e.g., Ethereum, Binance Smart Chain)
                                   logo VARCHAR(255),                                 -- File name or path to the uploaded logo (e.g., logo.png)
                                   created_at INT DEFAULT,    -- Time when the token entry was created
                                   updated_at INT DEFAULT, -- Time of last update
                                   UNIQUE (symbol)                                   -- Ensure each coin symbol is unique
                                  );
       
-- Create user balances table                           
CREATE TABLE IF NOT EXISTS user_balances (
    user_id INT NOT NULL,
    token_symbol VARCHAR(50) NOT NULL,
    balance DECIMAL(15, 2) NOT NULL,
    PRIMARY KEY (user_id, token_symbol)  -- composite primary key
);
                                  
-- Create p2p trade table
CREATE TABLE IF NOT EXISTS p2p_trades (trade_id INT AUTO_INCREMENT PRIMARY KEY,            -- Unique identifier for the trade
                                       room_id VARCHAR(255),                                -- Alphanumeric 8 digit trade room identifier 
                                       user_id INT NOT NULL,                                -- User ID, shows who created the trade
                                       buyer_id INT NOT NULL,                               -- Buyer ID, links to the users table
                                       seller_id INT NOT NULL,                              -- Seller ID, links to the users table
                                       buyer_email VARCHAR(255) NOT NULL,                   -- Email of the buyer
                                       seller_email VARCHAR(255) NOT NULL,                  -- Email of the seller
                                       buyer_currency VARCHAR(50) NOT NULL,                 -- The token/currency that the buyer is sending
                                       buyer_amount DECIMAL(15, 2) NOT NULL,                -- Amount of the token the buyer is sending
                                       seller_currency VARCHAR(50) NOT NULL,                -- The token/currency the buyer will receive
                                       seller_amount DECIMAL(15, 2) NOT NULL,               -- Amount of the token the buyer will receive
                                       fee_payer ENUM('buyer', 'seller', 'split') NOT NULL, -- Who pays the trade fee: buyer, seller, or split
                                       exchange_fee DECIMAL(5, 2) DEFAULT 2.00,             -- Exchange fee (in percentage, e.g., 2% fee)
                                       status ENUM('pending', 'completed', 'canceled') NOT NULL DEFAULT 'pending', -- Status of the trade
                                       buyer_payment_status ENUM('unpaid', 'paid') NOT NULL DEFAULT 'unpaid', -- Payment status of the buyer
                                       seller_payment_status ENUM('unpaid', 'paid') NOT NULL DEFAULT 'unpaid', -- Payment status of the seller
                                       escrow_fee_status ENUM('unpaid', 'paid') NOT NULL DEFAULT 'unpaid',  -- Status of the escrow fee
                                       created_at INT ,      -- Date and time when the trade was created
                                       updated_at INT ,  -- Date and time when the trade was last updated
                                       FOREIGN KEY (buyer_id) REFERENCES users(user_id),   -- Foreign key for buyer (assuming a users table exists)
                                       FOREIGN KEY (seller_id) REFERENCES users(user_id)   -- Foreign key for seller (assuming a users table exists)
                                    );


                                  
-- Create admin table 
CREATE TABLE IF NOT EXISTS admins (admin_id INT AUTO_INCREMENT PRIMARY KEY, 
                                  adminname VARCHAR(50) NOT NULL UNIQUE, 
                                  fullname VARCHAR(255) NOT NULL, 
                                  firstname VARCHAR(255) NOT NULL,
                                  lastname VARCHAR(255) NOT NULL,
                                  email VARCHAR(255) NOT NULL, 
                                  password VARCHAR(255) NOT NULL,  
                                  created_at INT );

-- Create videos table
CREATE TABLE IF NOT EXISTS videos(video_id INT AUTO_INCREMENT PRIMARY KEY,
                                  video_url VARCHAR(255) NOT NULL,
                                  watch_time INT NOT NULL, -- Duration in seconds
                                  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

-- Create watch_history table
CREATE TABLE IF NOT EXISTS watch_history(user_id INT NOT NULL,
	                              video_id INT AUTO_INCREMENT PRIMARY KEY,
	                              start_time TIMESTAMP,
	                              end_time TIMESTAMP,
	                              duration INT DEFAULT 0;
                                  wacth_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                  PRIMARY KEY (user_id, video_id),
                                  FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
                                  FOREIGN KEY (video_id) REFERENCES videos(video_id) ON DELETE CASCADE);
