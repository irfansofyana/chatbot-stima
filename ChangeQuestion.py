f = open("sinonim.txt", "r")
hashing = {}

def generate():
    f1 = f.readlines()
    get = ""
    for string in f1:
        first = True
        key = ""
        get = ""
        j = 0
        while (j < len(string)-1):
            if (string[j] == ','):
                if (len(get) > 0):
                    if (first):
                        first = False
                        key = get
                    # print(get, key)
                    hashing[get] = key
                    get = ""
                k = j+1
                while (k < len(string) and string[k] == ' '):
                    k += 1
                j = k
            else:
                get += string[j]
                j+=1
        hashing[get] = key

def change(text):
    res = ""
    first = True
    for i in text.split():
        if ('?' in i):
            i = i[:len(i)-1]
        if (first):
            first = False
        else:
            res += " "
        if (i in hashing):
            res += hashing[i]
        else:
            res += i
    return res+'?'
