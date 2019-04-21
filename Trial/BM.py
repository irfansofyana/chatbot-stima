def lastFunc(pattern):
    # fungsi menghasilkan last Occurence
    # inisialisasi dictionary
    last = {}
    # cari posisi karakter terakhir
    for i in range(len(pattern)):
        last[pattern[i]] = i
    return last
    

def bmFindPercentage(text ,pattern):
    last = lastFunc(pattern)
    n = len(text)
    m = len(pattern)
    # index text
    i = m-1
    # index pattern
    j = m-1
    # partial match count
    count = 0
    # do while index is in range
    while(i<=n-1):
        if(pattern[j]==text[i]):
            if(j==0):
                # match
                return m/n*100
            else: # looking-glass technique
                count = m-j
                i-=1
                j-=1
        else: # charecter jump technique
            lo = -1
            # find last occ
            if text[i] in last:
                lo = last[text[i]]
            i = i + m - min(j,1+lo)
            j = m-1  
    # no match
    return count/n*100

# if __name__ == "__main__":
#     text = input()
#     pattern = input().lower()
#     print(bmFindPercentage(text, pattern))