-- All values in the database not created from this file are either from someone creating a new 
-- account on the website or from running the Python scripts also on the server
INSERT INTO Users (email_address, `password`, first_name, last_name, date_of_birth, Permission) 
VALUES ('test@vcu.edu',
        '$2y$10$m2VseJAjEXWM5MTYb8dfaehQGNzok5eT4GtNFu4nFw5hp6iLZ.yAK',
        'Test',
        'User',
        '1970-01-01', 1);

INSERT INTO Exchange (Market_Identifier_Code, market_cap, no_of_securities) VALUES ('NYSE', 270000000000000, 1936);
INSERT INTO Exchange (Market_Identifier_Code, market_cap, no_of_securities) VALUES ('NASDAQ', 224200000000000, 2918);

INSERT INTO Exchange (Market_Identifier_Code, market_cap, no_of_securities) VALUES ('CRYPTO.COM', 200000000000, 192);
INSERT INTO Exchange (Market_Identifier_Code, market_cap, no_of_securities) VALUES ('COINBASE', 336000000, 10063);
INSERT INTO Exchange (Market_Identifier_Code, market_cap, no_of_securities) VALUES ('GEMINI', 128957638, 118);

INSERT INTO Exchange_Cryptocurrency VALUES ('CRYPTO.COM', "BTC");
INSERT INTO Exchange_Cryptocurrency VALUES ('CRYPTO.COM', "ETH");
INSERT INTO Exchange_Cryptocurrency VALUES ('CRYPTO.COM', "SOL");
INSERT INTO Exchange_Cryptocurrency VALUES ('COINBASE', "BTC");
INSERT INTO Exchange_Cryptocurrency VALUES ('COINBASE', "ETH");
INSERT INTO Exchange_Cryptocurrency VALUES ('COINBASE', "SOL");
INSERT INTO Exchange_Cryptocurrency VALUES ('GEMINI', "BTC");
INSERT INTO Exchange_Cryptocurrency VALUES ('GEMINI', "ETH");
INSERT INTO Exchange_Cryptocurrency VALUES ('GEMINI', "SOL");

INSERT INTO Exchange_ETF (SELECT 'NASDAQ', stock_symbol FROM ETF GROUP BY stock_symbol);
INSERT INTO Exchange_Mutual_Fund (SELECT 'NASDAQ', fund_symbol FROM Mutual_Fund GROUP BY fund_symbol);
INSERT INTO Exchange_Option (SELECT 'NASDAQ', o.ETF_symbol, o.expiration_date, o.strike_price, o.PC FROM Stock_Option o);

INSERT INTO Brokerage (EIN, broker_name) VALUES (844313004, "FORIS DAX, INC.");
INSERT INTO Brokerage (EIN, broker_name) VALUES (464707224, "COINBASE, INC.");
INSERT INTO Brokerage (EIN, broker_name) VALUES (410854683, "GEMINI, INC.");

INSERT INTO Brokerage (EIN, broker_name) VALUES (941737782, "Charles Schwab & Co., Inc.");
INSERT INTO Brokerage (EIN, broker_name) VALUES (042882358, "Fidelity Investments Institutional Services Company, Inc.");
INSERT INTO Brokerage (EIN, broker_name) VALUES (136038768, "Jpmorgan Chase Bank, N.a.");

INSERT INTO Broker_Cryptocurrency VALUES (844313004, "BTC");
INSERT INTO Broker_Cryptocurrency VALUES (844313004, "ETH");
INSERT INTO Broker_Cryptocurrency VALUES (844313004, "SOL");
INSERT INTO Broker_Cryptocurrency VALUES (464707224, "BTC");
INSERT INTO Broker_Cryptocurrency VALUES (464707224, "ETH");
INSERT INTO Broker_Cryptocurrency VALUES (464707224, "SOL");
INSERT INTO Broker_Cryptocurrency VALUES (410854683, "BTC");
INSERT INTO Broker_Cryptocurrency VALUES (410854683, "ETH");
INSERT INTO Broker_Cryptocurrency VALUES (410854683, "SOL");

INSERT INTO Broker_ETF VALUES (941737782, "AAPL");
INSERT INTO Broker_ETF VALUES (941737782, "GOOGL");
INSERT INTO Broker_ETF VALUES (941737782, "MSFT");
INSERT INTO Broker_ETF VALUES (042882358, "AAPL");
INSERT INTO Broker_ETF VALUES (042882358, "GOOGL");
INSERT INTO Broker_ETF VALUES (042882358, "MSFT");
INSERT INTO Broker_ETF VALUES (136038768, "AAPL");
INSERT INTO Broker_ETF VALUES (136038768, "GOOGL");
INSERT INTO Broker_ETF VALUES (136038768, "MSFT");

INSERT INTO Broker_Mutual_Fund (SELECT 844313004, m.fund_symbol FROM Mutual_Fund m);
INSERT INTO Broker_Mutual_Fund (SELECT 464707224, m.fund_symbol FROM Mutual_Fund m);
INSERT INTO Broker_Mutual_Fund (SELECT 410854683, m.fund_symbol FROM Mutual_Fund m);

INSERT INTO Broker_Option (SELECT 844313004, o.ETF_symbol, o.expiration_date, o.strike_price, o.PC FROM Stock_Option o);
INSERT INTO Broker_Option (SELECT 464707224, o.ETF_symbol, o.expiration_date, o.strike_price, o.PC FROM Stock_Option o);
INSERT INTO Broker_Option (SELECT 410854683, o.ETF_symbol, o.expiration_date, o.strike_price, o.PC FROM Stock_Option o);

-- Inserting values in Enchange_Index
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('NYSE', 'ABCERI', 'AUSPICE BROAD COMMODITIES EXCESS RETURN INDEX');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('NYSE', 'ACSI.IV', 'American Customer Satisfaction Core Alpha ETF');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('NYSE', 'ACWF.IV', 'iShares Edge MSCI Multifactor Global ETF');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('NYSE', 'ADR', 'INTER NATIONAL MARKET INDEX');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('NYSE', 'ADZ.IV', 'DB Agriculture Short ETN (Intraday Value)');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('NYSE', 'AFK.IV', 'VANECK AFRICA INDEX ETF INTRADAY VALUE');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('NYSE', 'AGA.IV', 'DB Agriculture Double Short ETN (Intraday Value)');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('NYSE', 'AGA.SO', 'DB Agriculture Double Short ETN (Shares Outst and ing)');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('NASDAQ', 'NASDAQ', 'Nasdaq Composite Index');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('NASDAQ', 'NDX', 'Nasdaq-100');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('NASDAQ', 'OMXS30', 'OMX Stockholm 30 Index');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('NASDAQ', 'SOX', 'PHLX Semiconductor');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('NASDAQ', 'NQGI', 'Nasdaq Global Equity Index');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('GEMINI', 'BGCI', 'Bloomberg Galaxy Crypto Index');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('CRYPTO.COM', 'BGCI', 'Bloomberg Galaxy Crypto Index');
INSERT INTO Exchange_Index (Exchange, Index_Symbol, Name) VALUES
('COINBASE', 'BGCI', 'Bloomberg Galaxy Crypto Index');