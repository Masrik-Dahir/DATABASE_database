import datetime
from random import random

import main
i = 0
name = "FXAIX" # main.random_string(5)
record_date = "2021-01-01"
dividend = 0.46

print("INSERT INTO Mutual_Fund "
      "(`fund_symbol`, `fund_name`) "
      "VALUES ('FXAIX', 'Fidelity 500 Index Fund');")

while i <= 100:
    date = main.increment_date(record_date,i)

    price = main.random_double(130.00, 180.00, 2)
    put_or_call = main.random_int(0,1)

    if (main.between_date('2022-05-07', date) < 0):
        break

    print("INSERT INTO Mutual_Fund_Record"
          "(`Mutual_Fund`,`record_date`, `price`,`dividend`) VALUES"
          "('%s', '%s', %.2f, '%.2f');" %(name, date, price, dividend))

    i += 1