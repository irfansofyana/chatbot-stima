from KMP import *
from BM import *
from Regex import *
from ChangeQuestion import *
import sys

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

    generate()

    pattern = ""
    pattern = ' '.join(sys.argv[1:]).lower()
    pattern = change(pattern)
    if(not pattern.endswith("?")):
        print("Input bukan pertanyaan")
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
            confi = 0
            cont = []
            for quest, ans in db:
                confi = bmFindPercentage(quest.lower(),pattern)
                if(confi>=CONFIDENCE_MIN_LEVEL):
                    cont.append((confi,(quest,ans)))
                else:
                    if(isMatch(pattern,quest.lower())):
                        cont.append((confi,(quest,ans)))
            if(len(cont)>0):
                # ada minimal 1 yang pass
                cont.sort(key=lambda tuple: tuple[0],reverse = True)
                if(len(cont)==1 or cont[0][0]==100):
                    print(cont[0][1][1])
                else:
                    top3 = cont[:3]
                    print("Apakah yang anda maksud:")
                    for el in top3:
                        print(el[1][0]+'?')
            else:
                print("Maaf saya tidak memiliki jawaban untuk pertanyaan anda")
