from random import random

import main
i = 0
name = "BTC" # main.random_string(5)
price = 0
total_supply = 21000000.00
start_date = "2022-01-01"

# INSERT INTO Cryptocurrency
# (`crypto_symbol`, `crypto_name`)
# VALUES ('BTC', 'Bitcoin');

while i <= 100:
    date = main.increment_date(start_date,i)

    price = main.random_double(35000.00, 64000.00, 2)
    market_cap = total_supply * price

    print("INSERT INTO Cryptocurrency_Record "
          "(`Cryptocurrency`,`record_date`,`price`,`total_supply`,`market_cap`) VALUES"
          "('%s', '%s', %.2f, %.2f , %.2f);" %(name, date, price, total_supply, market_cap))

    i += 1