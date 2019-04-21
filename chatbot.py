from KMP import *
from BM import *
from Regex import *
import sys
# from sortedcontainers import SortedDict

CONFIDENCE_MIN_LEVEL = 90

if __name__ == "__main__":
    # pertanyaan wajib
    data = open("wajib_clear.txt",'r')
    db = []
    pos = 0
    # read database
    for line in data:
        line = line.rstrip("\n")
        if(pos%2==0):
            quest = line
        else:
            ans = line
            db.append((quest,ans))
        pos+=1
    data.close()
    # pertanyaan skenario
    data = open("skenario_clear.txt",'r')
    db = []
    pos = 0
    # read database
    for line in data:
        line = line.rstrip("\n")
        if(pos%2==0):
            quest = line
        else:
            ans = line
            db.append((quest,ans))
        pos+=1
    data.close()

    # stopword
    data = open("stopword.txt",'r')
    stop = []
    for line in data:
        stop.append(line.rstrip("\n"))
    data.close()
    # stop = StopWordRemoverFactory().get_stop_words()
    # print(stop)
    
    pattern = ""
    quitKey = "q"
    # while pattern!=quitKey:
    # print("Pertanyaan: ")
    pattern = ' '.join(sys.argv[1:]).lower()
    # pattern = input("Pertanyaan: ").lower()
    if(not pattern.endswith("?") and pattern != quitKey):
        print("Input bukan pertanyaan")
    elif pattern == quitKey:
        print("Terima Kasih!")    
    else:
        # asking a question
        pattern = pattern[:-1]
        # clear stopword
        split = pattern.split(' ')
        result = [kata for kata in split if kata not in stop]
        pattern = ' '.join(result)
        if (len(pattern)==0):
            print("Maaf saya tidak mengerti petanyaan anda")
        else:
            # print(pattern)
            confi = 0
            # found = False
            # rest = []
            cont = []
            for quest, ans in db:
                # print("loop")
                confi = bmFindPercentage(quest.lower(),pattern)
                # print(quest+' '+str(confi))
                # print(pattern)
                # print(confi)
                if(confi>=CONFIDENCE_MIN_LEVEL):
                    # print(ans)
                    # found = True
                    # break
                    cont.append((confi,(quest,ans)))
                else:
                    if(isMatch(pattern,quest.lower())):
                        cont.append((confi,(quest,ans)))
            if(len(cont)>0):
                # print("here")
                # ada minimal 1 yang pass
                cont.sort(key=lambda tuple: tuple[0],reverse = True)
                # print(cont)
                if(cont[0][0]==100):
                    # if(cont[0][0]!=cont[1][0]):
                    print(cont[0][1][1])
                    exit(0)
                        # continue
                    # else:
                else:
                    top3 = cont[:3]
                    print("Apakah yang anda maksud:")
                    for el in top3:
                        print(el[1][0]+'?')
                    # print(cont[0][1][1])
                    exit(0)
                    # continue
            # if(len(rest)>0):
            #     # rest minimal 1
            #     rest.sort(key=lambda tuple: tuple[0],reverse = True)
            #     # print(rest)
            #     top3 = rest[:3]
            #     print("Apakah yang anda maksud:")
            #     for el in top3:
            #         print(el[1][0]+'?')
            # else:
            print("Maaf saya tidak memiliki jawaban untuk pertanyaan anda")
    # print(stop)

