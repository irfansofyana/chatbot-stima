from Sastrawi.StopWordRemover.StopWordRemoverFactory import StopWordRemoverFactory
# stop = StopWordRemoverFactory().get_stop_words()

# stopword
data = open("stopword.txt",'r')
stop = []
for line in data:
    stop.append(line.rstrip("\n"))
data.close()


# pertanyaan wajib
data = open("wajib.txt",'r')
db = []
pos = 0
# read database
for line in data:
    line = line.rstrip("\n")
    if(pos%2==0):
        quest = line
    else:
        ans = line
        db.append((quest.lower(),ans))
    pos+=1
data.close()

data = open("wajib_clear.txt","w")
for quest,ans in db:
    # asking a question
    quest = quest[:-1]
    # clear stopword
    split = quest.split(' ')
    result = [kata for kata in split if kata not in stop]
    quest = ' '.join(result)
    data.write(quest+'\n')
    data.write(ans+'\n')