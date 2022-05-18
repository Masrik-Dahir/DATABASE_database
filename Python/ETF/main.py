import random
import string
import time
from datetime import timedelta
from datetime import datetime

def str_time_prop(start, end, time_format, prop):
    """Get a time at a proportion of a range of two formatted times.

    start and end should be strings specifying times formatted in the
    given format (strftime-style), giving an interval [start, end].
    prop specifies how a proportion of the interval to be taken after
    start.  The returned time will be in the specified format.
    """

    stime = time.mktime(time.strptime(start, time_format))
    etime = time.mktime(time.strptime(end, time_format))

    ptime = stime + prop * (etime - stime)

    return time.strftime(time_format, time.localtime(ptime))

def between_date(Begindatestring, Enddatestring):
    Begindate = datetime.strptime(Begindatestring, "%Y-%m-%d")
    Enddate = datetime.strptime(Enddatestring, "%Y-%m-%d")


    a = Begindate - Enddate
    return int(a.days)


def random_date_time(start, end):
    return str_time_prop(start, end, '%Y-%m-%d', random.random())

def increment_date(Begindatestring, days=10):
    Begindate = datetime.strptime(Begindatestring, "%Y-%m-%d")
    Enddate = Begindate + timedelta(days=days)

    return (Enddate.strftime("%Y-%m-%d"))

def random_date(start, end):
    return str_time_prop(start, end, '%Y-%m-%d', random.random())

def random_int (start, end):
    return random.randint(start, end)

def random_double (start, end, decimal):
    return round(random.uniform(start, end), decimal)

def random_string(length, digit = True):
    if digit == True:
        return ''.join(random.SystemRandom().choice(string.ascii_uppercase + string.digits) for _ in range(length))
    else:
        return ''.join(random.SystemRandom().choice(string.ascii_uppercase) for _ in range(length))


# print(ramdom_int(12.1, 12.2))
# print(ramdom_double(12.1, 12.2, 5))
# print(random_string(5, digit=False))

# print(random_date("2008-12-01", "2009-01-01"))
# print(increment_date("2008-12-31", 10))

# print(between_date('2022-01-05', '2022-01-09'))

