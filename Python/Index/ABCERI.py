import datetime
from random import random

import main
i = 0
name = "ABCERI" # main.random_string(5)
start_date = "2022-01-01"

while i <= 15000:
    date = main.increment_date(start_date,i)

    price = main.random_double(4400.91, 5558.91, 2)
    put_or_call = main.random_int(0,1)

    if (main.between_date('2022-05-08', date) < 0):
        break


    print("INSERT INTO Index_Record"
          "(`Market_Index`,`record_date`,`market_value`) VALUES"
          "('%s', '%s', %.2f);" %(name, date, price))

    i += 1