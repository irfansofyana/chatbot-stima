import re

def isMatch(pattern, text):
    # pattern = transform(pattern)
    pattern = pattern.split(' ')
    pattern = '.*'+'.*'.join(pattern) + '.*'
    # print(pattern)
    x = re.search(pattern, text)
    if (x):
        return True
    else:
        return False

# a = input()
# b = input()
# if (isMatch(a, b)):
#     print ("Yes")
# else:
#     print("No")