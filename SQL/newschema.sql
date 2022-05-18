CREATE TABLE Users (
    ID INT AUTO_INCREMENT,
    email_address VARCHAR(255) UNIQUE NOT NULL,
    `password` CHAR(60) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    date_of_birth DATE NOT NULL,
    PRIMARY KEY(ID)
);

CREATE TABLE Users_Phone (
    user INT,
    phone_number NUMERIC(10, 0),
    PRIMARY KEY(user, phone_number),
    FOREIGN KEY (user) REFERENCES Users(ID)
);

CREATE TABLE Brokerage (
    EIN NUMERIC(9,0),
    broker_name VARCHAR(255) NOT NULL,
    commission FLOAT,
    license VARCHAR(255),
    leverage_trading BIT NOT NULL DEFAULT 0,
    PRIMARY KEY (EIN)
);

CREATE TABLE User_Broker (
    user INT,
    Brokerage NUMERIC(9,0),
    PRIMARY KEY(user, Brokerage),
    FOREIGN KEY (user) REFERENCES Users(ID),
    FOREIGN KEY (Brokerage) REFERENCES Brokerage(EIN)
);

CREATE TABLE ETF (
    stock_symbol VARCHAR(10),
    stock_name VARCHAR(255) NOT NULL,
    PRIMARY KEY(stock_symbol)
);

CREATE TABLE Mutual_Fund (
    fund_symbol VARCHAR(10),
    fund_name VARCHAR(255) NOT NULL,
    PRIMARY KEY(fund_symbol)
);

CREATE TABLE Cryptocurrency (
    crypto_symbol VARCHAR(10),
    crypto_name VARCHAR(255) NOT NULL,
    PRIMARY KEY(crypto_symbol)
);

CREATE TABLE Stock_Option (
    ETF_symbol VARCHAR(10),
    expiration_date DATE NOT NULL,
    strike_price FLOAT NOT NULL,
    PC CHAR(1) NOT NULL,
    asset_class VARCHAR(255),
    PRIMARY KEY (ETF_symbol, expiration_date, strike_price, PC),
    FOREIGN KEY (ETF_symbol) REFERENCES ETF(stock_symbol)
);

CREATE TABLE Broker_ETF (
    Brokerage NUMERIC(9,0),
    ETF VARCHAR(10),
    PRIMARY KEY (Brokerage, ETF),
    FOREIGN KEY (Brokerage) REFERENCES Brokerage(EIN),
    FOREIGN KEY (ETF) REFERENCES ETF(stock_symbol)
);

CREATE TABLE Broker_Mutual_Fund (
    Brokerage NUMERIC(9,0),
    Mutual_Fund VARCHAR(10),
    PRIMARY KEY (Brokerage, Mutual_Fund),
    FOREIGN KEY (Brokerage) REFERENCES Brokerage(EIN),
    FOREIGN KEY (Mutual_Fund) REFERENCES Mutual_Fund(fund_symbol)
);

CREATE TABLE Broker_Cryptocurrency (
    Brokerage NUMERIC(9,0),
    Cryptocurrency VARCHAR(10),
    PRIMARY KEY (Brokerage, Cryptocurrency),
    FOREIGN KEY (Brokerage) REFERENCES Brokerage(EIN),
    FOREIGN KEY (Cryptocurrency) REFERENCES Cryptocurrency(crypto_symbol)
);

CREATE TABLE Broker_Option (
    Brokerage NUMERIC(9,0),
    Stock_Option VARCHAR(10),
    expiration_date DATE NOT NULL,
    strike_price FLOAT NOT NULL,
    PC CHAR(1) NOT NULL,
    PRIMARY KEY (Brokerage, Stock_Option, expiration_date, strike_price),
    FOREIGN KEY (Brokerage) REFERENCES Brokerage(EIN),
    FOREIGN KEY (Stock_Option, expiration_date, strike_price, PC) REFERENCES Stock_Option(ETF_symbol, expiration_date, strike_price, PC)
);

CREATE TABLE ETF_Record (
    ETF VARCHAR(10),
    record_date DATE,
    high_price FLOAT NOT NULL,
    low_price FLOAT NOT NULL,
    avg_price FLOAT NOT NULL,
    no_of_shares INT NOT NULL,
    dividend FLOAT NOT NULL,
    PRIMARY KEY (ETF, record_date),
    FOREIGN KEY (ETF) REFERENCES ETF(stock_symbol)
);

CREATE TABLE Mutual_Fund_Record (
    Mutual_Fund VARCHAR(10),
    record_date DATE,
    price FLOAT NOT NULL,
    dividend FLOAT NOT NULL,
    PRIMARY KEY (Mutual_Fund, record_date),
    FOREIGN KEY (Mutual_Fund) REFERENCES Mutual_Fund(fund_symbol)
);

CREATE TABLE Cryptocurrency_Record (
    Cryptocurrency VARCHAR(10),
    record_date DATE,
    price FLOAT NOT NULL,
    total_supply INT NOT NULL,
    market_cap FLOAT NOT NULL,
    PRIMARY KEY (Cryptocurrency, record_date),
    FOREIGN KEY (Cryptocurrency) REFERENCES Cryptocurrency(crypto_symbol)
);

CREATE TABLE Exchange (
    Market_Identifier_Code VARCHAR(10),
    CEO VARCHAR(255),
    website VARCHAR(255),
    date_founded DATE,
    market_cap FLOAT NOT NULL,
    no_of_securities INT NOT NULL,
    PRIMARY KEY (Market_Identifier_Code)
);

CREATE TABLE Index_Record (
    Market_Index VARCHAR(10),
    record_date DATE,
    market_value FLOAT NOT NULL,
    PRIMARY KEY (Market_Index, record_date),
    FOREIGN KEY (Market_Index) REFERENCES Market_Index(symbol)
);

CREATE TABLE Exchange_Index (
    Exchange VARCHAR(10),
    Index_Symbol VARCHAR(10),
    Name VARCHAR(100), 																												
    PRIMARY KEY (Exchange, Index_Symbol),
    FOREIGN KEY (Exchange) REFERENCES Exchange(Market_Identifier_Code),
    FOREIGN KEY (Index_Symbol) REFERENCES Market_Index(symbol)
);

CREATE TABLE Exchange_ETF (
    Exchange VARCHAR(10),
    ETF VARCHAR(10),
    PRIMARY KEY (Exchange, ETF),
    FOREIGN KEY (Exchange) REFERENCES Exchange(Market_Identifier_Code),
    FOREIGN KEY (ETF) REFERENCES ETF(stock_symbol)
);

CREATE TABLE Exchange_Mutual_Fund (
    Exchange VARCHAR(10),
    Mutual_Fund VARCHAR(10),
    PRIMARY KEY (Exchange, Mutual_Fund),
    FOREIGN KEY (Exchange) REFERENCES Exchange(Market_Identifier_Code),
    FOREIGN KEY (Mutual_Fund) REFERENCES Mutual_Fund(fund_symbol)
);

CREATE TABLE Exchange_Cryptocurrency (
    Exchange VARCHAR(10),
    Cryptocurrency VARCHAR(10),
    PRIMARY KEY (Exchange, Cryptocurrency),
    FOREIGN KEY (Exchange) REFERENCES Exchange(Market_Identifier_Code),
    FOREIGN KEY (Cryptocurrency) REFERENCES Cryptocurrency(crypto_symbol)
);

CREATE TABLE Exchange_Option (
    Exchange VARCHAR(10),
    Stock_Option VARCHAR(10),
    expiration_date DATE NOT NULL,
    strike_price FLOAT NOT NULL,
    PC CHAR(1) NOT NULL,
    PRIMARY KEY (Exchange, Stock_Option, expiration_date, strike_price, PC),
    FOREIGN KEY (Exchange) REFERENCES Exchange(Market_Identifier_Code),
    FOREIGN KEY (Stock_Option, expiration_date, strike_price, PC) REFERENCES Stock_Option(ETF_symbol, expiration_date, strike_price, PC)
);


CREATE TABLE Asset_Types (
    asset_type VARCHAR(20),
    PRIMARY KEY (asset_type)
);


CREATE TABLE Asset_Requests (
    symbol varchar(10),
    asset_type VARCHAR(20),
    PRIMARY KEY (symbol, asset_type),
    FOREIGN KEY (asset_type) REFERENCES Asset_Types(asset_type)
);

CREATE TABLE User_Privileges (
    ID INT,
    Permission BIT NOT NULL, --0 is a normal user, 1 is an admin
    PRIMARY KEY (ID),
    FOREIGN KEY (ID) REFERENCES Users(ID)
);

CREATE VIEW latest_ETFs AS 
SELECT e1.ETF, e3.stock_name, e1.record_date, e1.high_price, e1.low_price, e1.avg_price, e1.no_of_shares, e1.dividend 
FROM ETF_Record e1 
    JOIN (SELECT ETF, max(record_date) record_date FROM ETF_Record GROUP BY ETF) e2 ON (e1.ETF = e2.ETF AND e1.record_date = e2.record_date) 
    JOIN ETF e3 ON (e1.ETF = e3.stock_symbol);

CREATE VIEW latest_Mutual_Funds AS 
SELECT m2.Mutual_Fund, m3.fund_name, m2.record_date, m2.price, m2.dividend 
FROM (SELECT Mutual_Fund, MAX(record_date) record_date FROM Mutual_Fund_Record GROUP BY Mutual_Fund) m1 
    JOIN Mutual_Fund_Record m2 ON (m1.Mutual_Fund = m2.Mutual_Fund AND m1.record_date = m2.record_date) 
    JOIN Mutual_Fund m3 ON (m1.Mutual_Fund = m3.fund_symbol);

CREATE VIEW latest_Cryptos AS 
SELECT c1.Cryptocurrency, c3.crypto_name, c2.record_date, c2.price, c2.total_supply, c2.market_cap 
FROM (SELECT Cryptocurrency, MAX(record_date) record_date FROM Cryptocurrency_Record GROUP BY Cryptocurrency) c1 
    JOIN Cryptocurrency_Record c2 ON (c1.Cryptocurrency = c2.Cryptocurrency AND c1.record_date = c2.record_date) 
    JOIN Cryptocurrency c3 ON (c1.Cryptocurrency = c3.crypto_symbol);

CREATE VIEW Exchange_Assets AS SELECT t1.Exchange as `Exchange`, t1.ETF as `Asset`, t1.Asset as `Type` FROM 
        (SELECT e.Exchange, e.ETF, 'ETF' as 'Asset' FROM Exchange_ETF e) t1 UNION 
        (SELECT e.Exchange, e.Mutual_Fund, 'Mutual_Fund' as `Asset Type` FROM Exchange_Mutual_Fund e) UNION 
        (SELECT e.Exchange, e.Cryptocurrency, 'Cryptocurrency' as `Asset Type` FROM Exchange_Cryptocurrency e);