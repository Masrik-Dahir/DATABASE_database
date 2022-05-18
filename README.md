# DATABASE
[![Java_ant CI](https://github.com/Masrik-Dahir/DATABASE_database/actions/workflows/java_ant.yml/badge.svg)](https://github.com/Masrik-Dahir/DATABASE_database/actions/workflows/java_ant.yml)

DATABASE is an application that monitors the current state of the equity market, crypto market,
and futures contract market and documents past transactions. DATABASE uses its vibrant
database to find correlations and predict market trends.

# Live Server
http://cmsc508.com/~nguyenvt35/508-project-nguyenvt35-dahirma/PHP

# Tables
Companies are entities that produce goods and services for their customers. Private companies
and non-profit organizations can’t issue shares of ownership like a stock. If a private company
wants to go public, it has to offer shares for sale on an exchange (NYSE, NASDAQ, etc.). Every
company has a founding date and a CEO. Public companies are operated by a board of directors
and substantial shareholders vote on crucial decisions. Every public company has a stock symbol
that is traded on a stock exchange. A publicly-traded company has an IPO (Initial Public
Offering) date, which indicates the date when the company went public. Companies have to take
short-term and long-term loans to buy equipment, services, and rent offices. Therefore,
short-term and long-term loans are considered liabilities. The leverage ratio is the total liability
and total shareholders’ equity. The DATABASE database also categorizes each company by its
industry. Each company has an EID (Employer ID) number. Internal Revenue Service (IRS)
assigns a unique nine-digit number assigned to every U.S. business entity for identification.
1. **User**:
   A user is an individual or identity. In the DATABASE database, the user entity contains basic
   attributes - mailing address, email address(es), phone number(s), and TIN. TIN is a unique
   identification number used by the IRS to identify identity or individual- the TIN of an entity is
   known as EIN and the TIN of an individual is known as Social Security Number (SSN).
   Direct Investors:
   Direct investors are entities or individuals who own stocks, options, mutual funds, and
   cryptocurrency from the stock exchanges or from the company itself. The direct investor can be
   either an individual or an entity. Each direct Investor has its Taxpayer Identification Numbers
   (TIN). Each direct investor has a mailing name, address, email address, and phone number(s).
2. **Broker**:
   Brokers buy and keep records of stocks for individuals and entities who are not direct investors.
   Brokers profit from the commission of each trade by its customers. Each broker has its unique
   EIN, name, address, phone number(s), and email address. Each broker must hold a stock-broker
   license to trade equities for its customers. Brokers can offer leverage trading. Leveraged trading
   is buying equities with borrowed money. The brokers charge interest on the borrowed funds.
   There is a margin of liquidation in leverage trading. If the leveraged value of the equity drops
   under a certain margin, the broker would liquidate the equity to protect the borrowed amount.
3. **Exchanges**:
   In Exchanges, both brokers and traders buy and sell securities and cryptocurrencies. Every
   exchange has a market identifier code (MIC). The total market Cap of all securities in an
   exchange is the market cap of an exchange. Every exchange has a CEO, website, mailing
   address. An exchange may have multiple email addresses and phone numbers. Exchanges are
   operated by the currency of its country. Every exchange has Indices to track the performance of a
   group of assets in the exchange.
4. **ETF**:
   An ETF is a security for a company. It is identified by the stock symbol. The ETF has some key
   attributes- market cap, volume, value, fully diluted shares. Market cap is the total value of a
   company’s stock. Volume is the total value of stocks that are being actively traded. A fully
   diluted share is the total number of stocks of a company. Some ETFs offer quarterly dividends.
5. **Option**:
   An option contract is a right (but not the obligation) to buy to sell a security/asset. An option has
   an expiration date until the contract holder can exercise his/her right to buy or sell the underlying
   asset. The identifier of an option contract is the options symbol. Every options contract has a
   strike price.
6. **Mutual Fund**:
   A mutual fund is a collection of securities held by an institution. The institution generally holds
   the right to buy or sell securities observing the market trend. Mutual funds are not listed on stock
   exchanges rather they are traded through financial professionals, brokerage firms, and directly
   from fund companies. A mutual fund's market opening and closing are also different from stock
   exchanges. Mutual funds are identified with stock symbols. Every mutual fund has net asset
   value, current market value, minimum investment. Mutual funds are categorized by asset class,
   the type of underlying assets. All mutual funds are required to distribute dividends.
7. **Cryptocurrency**:
   Cryptocurrencies are identified by their currency symbols. Unlike stokes, cryptocurrencies have
   predictable inflation. The rate of inflation varies by currency. As a result, the current supply
   indicates current circulating coins. Total supply indicates the total number of coins in circulation
   including staked coins. Max supply indicates the maximum number of coins that can be in
   circulation in a lifetime. Every cryptocurrency has a market capitalization. Some cryptocurrency
   projects are open source (i.e., BTC, ETH, ADA, SOL, ALGO), while some projects are not
   open-source (i.e., HBAR). Unlike stocks, crypto-currencies can be exchanged in different
   exchanges including (centralized and decentralized exchange). The value for each coin is
   approximately the same on every exchange. The total value of stocks that are being actively
   traded in a particular exchange is the volume of the coin in the particular exchange.
8. **Transaction**:
   The transaction is the transfer of a security or asset from one individual or entity to another
   individual or entity. Every transaction has a unit price. The transactions are concluded in an
   exchange. Each transaction must have the price and the quantity of the security/asset. The type of
   security/asset transferred is also recorded from each transaction.
9. **Individual Investors**:
   Individual investors are also able to purchase and sell stocks through any financial service
   provider of their choice. One investor can use multiple services like Robinhood, Fidelity, Charles
   Schwab, etc. Individual investors can only have one account with each service but there can be
   multiple sub-accounts for each account. Individual investors are identified using their social
   security number and must have a name, date of birth, and address. An individual investor must
   provide one unique email address, although they are allowed to have anywhere from zero to
   multiple phone numbers.
10. **Brokerage Account**:
    Each user must have a brokerage account to trade securities and assets. Each brokerage account
    is linked to an individual's or entity’s bank account. The investors are identified with their SSN
    numbers.
11. **Bank Account**:
    Each user must have a bank account to transfer funds to a financial account. Bank accounts have
    an account number and a routing number.
