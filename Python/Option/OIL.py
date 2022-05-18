import datetime
from random import random

import main
i = 0
name = "OIL" # main.random_string(5)
expiration_date = "2018-01-01"

# INSERT INTO ETF
# (`stock_symbol`, `stock_name`)
# VALUES ('AAPL', 'APPLE Inc.');

while i <= 15000:
    date = main.increment_date(expiration_date,i)

    strike_price = main.random_double(60.00, 105.00, 2)
    put_or_call = main.random_int(0,1)

    if (main.between_date('2022-08-07', date) < 0):
        break


    print("INSERT INTO Stock_Option"
          "(`ETF_symbol`,`expiration_date`,`strike_price`, `PC`, `asset_class`) VALUES"
          "('%s', '%s', %.2f, %d, '%s');" %(name, date, strike_price, put_or_call, "commodities"))

    i += 15