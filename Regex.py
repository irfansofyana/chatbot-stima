import re

def transform(s):
    ret = ".*"
    i = 0
    while (i < len(s)):
        if (s[i] == ' '):
            ret = ret + ".*"
            i+=1
            while (i < len(s) and s[i] == ' '):
                i+=1
        else:
            ret = ret+s[i]
            i += 1
    ret = ret + ".*"
    return ret

def isMatch(pattern, text):
    pattern = transform(pattern)
    x = re.search(pattern, text)
    if (x == None):
        return False
    else:
        return True

# a = input()
# b = input()
# if (isMatch(a, b)):
#     print ("Yes")
# else:
#     print("No")