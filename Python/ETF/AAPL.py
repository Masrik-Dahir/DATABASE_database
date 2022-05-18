from random import random
import main

i = 0
name = "AAPL" # main.random_string(5)
num_share = 17528000000
dividend = 0.23
start_date = "2022-01-01"

# INSERT INTO ETF
# (`stock_symbol`, `stock_name`)
# VALUES ('AAPL', 'APPLE Inc.');
while i <= 100:
    date_history = []
    date = main.increment_date(start_date,i)

    high = main.random_double(150.00, 200.00, 2)
    low = main.random_double(high-20, high, 2)
    average = main.random_double(low, high, 2)

    print("INSERT INTO ETF_Record "
          "(`ETF`,`record_date`,`high_price`,`low_price`,`avg_price`,`no_of_shares`,`dividend`) VALUES"
          "('%s', '%s', %.2f, %.2f , %.2f, %d, %.2f);" %(name, date, high, low, average, num_share, dividend))

    i += 1
