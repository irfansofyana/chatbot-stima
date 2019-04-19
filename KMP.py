#Modifikasi algoritma KMP

def findLPSArray(pattern, lps):
    #pangjang prefix suffix terbesar sebelumnya
    length = 0 
    
    #panjang pattern
    m = len(pattern)

    lps[0] = 0
    idx = 1
    while (idx < m):
        if (pattern[idx] == pattern[length]):
            length+=1
            lps[idx] = length
            idx += 1
        else:
            if (length!=0):
                length = lps[length-1]
            else:
                lps[idx] = 0
                idx += 1

def kmpFindPercentage(text, pattern):
    #array prefix suffix
    lps = [0] * len(pattern)
    findLPSArray(pattern, lps)
    #panjang text
    n = len(text)
    #panjang pattern
    m = len(pattern)
    #maksimum karakter yang sesuai
    maks = 0
    #pencacah karakter yang sama
    count = 0
    #indeks untuk text
    i = 0
    #indeks untuk pattern
    j = 0
    while (i < n):
        if (text[i] == pattern[j]):
            count += 1
            maks = max(count, maks)
            i += 1
            j += 1
        if (j == m):
            j = lps[j-1]
            count = j
        elif (i < n and pattern[j] != text[i]):
            if (j != 0):
                j = lps[j-1]
                count = j
            else:
                i += 1
                count = 0
    
    return (maks / n) * 100

text = input()
pattern = input()
print(kmpFindPercentage(text, pattern))
